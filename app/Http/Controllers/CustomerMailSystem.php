<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\SiteProfile;
use Session;
use Mail;
use DB;
use App\Mail\CustomerMailSend;
class CustomerMailSystem extends Controller
{

    public function CustomerMail(){
        return view('Admin.CustomerMailSendingSystem');
    }


    public function ConditionalUserCount(Request $request){
        $customertype = $request->get('customertype');
        $servicetype = $request->get('servicetype');
        $activestatus = $request->get('activestatus');
        if ($customertype || $servicetype || $activestatus ) {
            $MailList = User::where('customertype',$customertype)
                ->Where('servicetype', $servicetype)
                ->Where('activestatus', $activestatus)->get();
            $data = count($MailList);
        } else {
            $MailList = User::all();
            $data = count($MailList);
        }
        echo $data;
    }


    public function CustomerMailSend(Request $request){
        $this->validate($request,[
            'MailDetails' => 'required',
            'MailSubject' => 'required',
            'skipvalue' => 'required',
            'takevalue' => 'required',
        ]);
        $skip = $request->skipvalue;
        $take = $request->takevalue;
        $MailDetails = $request->MailDetails;
        $MailSubject = $request->MailSubject;

        $customertype = request('customertype');
        $servicetype = request('servicetype');
        $activestatus = request('activestatus');
        $tomail = "info@soshinebd.com";
               /*if ($customertype || $servicetype || $activestatus ) {
           $emails = User::where('customertype',$customertype)
               ->Where('servicetype', $servicetype)
               ->Where('activestatus', $activestatus)->skip($skip)->take($take)->get()->toArray();
       }*/
	   if ($customertype || $servicetype || $activestatus ) {
           $emails = User::where('customertype',$customertype)
               ->Where('servicetype', $servicetype)
               ->Where('activestatus', $activestatus)->skip($skip)->take($take)->get();
       }
	   /*else {
           $emails = User::get()->toArray();
       }*/
       else {
           $emails = User::get();
            }
	   foreach($emails as $email){
		   Mail::to($email)->send(new CustomerMailSend($MailDetails,$MailSubject));
	   }
       Session::flash("success");
       return redirect()->to('admin/customer-mail-send');
    }


    public function conditionalUsrMailAddressUI(){
        return view('Admin.ConditionalUserMailAddressSelect');
    }


    public function  conditionalUserMailAddressGet(Request $request){
        $customertype = $request->get('customertype');
        $servicetype = $request->get('servicetype');
        $activestatus = $request->get('activestatus');
        $skip = $request->get('skipvalue');
        $take = $request->get('takevalue');
        $delimiter = $request->get('delimiter');

        if($customertype == '' || $servicetype == '' || $activestatus == ''){
            return response()->json(['success' => "Please Fill Out The Required Fill", 'status' => '1']);
        }else{
            if($skip == '' || $take=='' || $delimiter==''){
                return response()->json(['success' => "Please Fill Out The Required Fill", 'status' => '1']);
            }else{
                $query = 'SELECT GROUP_CONCAT(IF(users.email !="", users.email, NULL) SEPARATOR "'.$delimiter.'") as messageMail FROM users WHERE users.customertype = "'.$customertype.'" and users.servicetype = "'.$servicetype.'" and users.activestatus = "'.$activestatus.'"';
                $data  = \DB::select($query);
                $TotalMailAddress = '';
                foreach($data as $singlemail){
                $TotalMailAddress = $singlemail->messageMail;
                }
                return response()->json(['message' => $TotalMailAddress, 'status' => '2']);
            }
        }
    }


}
