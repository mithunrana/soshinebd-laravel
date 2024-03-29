<?php

namespace App\Http\Controllers;
use App\BlogTutorial;
use App\Course;
use App\Service;
use App\SiteProfile;
use App\Software;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Mail;
use App\ElectroPronoSlider;
use App\Mail\RegisterSendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class UserDataController extends Controller
{


    public function userPanel(){
        $SiteProfile = SiteProfile::first();
        return view('UI.user-panel',compact('SiteProfile'));
    }


    public function userPanelInfoEdit(){
        $SiteProfile = SiteProfile::first();
        return view('UI.user-panel-info-edit',compact('SiteProfile'));
    }

    public function userInfoUpdate(Request $request){
        Auth::user()->name = request('name');
        Auth::user()->phone = request('phone');
        Auth::user()->email = request('email');
        Auth::user()->country = request('country');
        Auth::user()->address = request('address');
        Auth::user()->save();
        return redirect()->to('user-panel')->with('message','Profile Update Successfully');
    }


    public function userImageUpload(Request $request){
        $this->validate($request,[
            'userimage' => 'required|max:1024|mimes:png,jpg,jpeg'
        ]);
        if(File::exists(Auth::user()->image)){
            unlink(Auth::user()->image);
            $file = $request->file('userimage');
            $extension = $file->getClientOriginalExtension();
            $image = Auth::user()->username.'.'.$extension;
            $file->move('user image',$image);
            Auth::user()->image = 'user image'."/".$image;
            Auth::user()->save();
            return redirect()->to('user-panel')->with('message','Profile Picture Added Successfully');
        }else{
            $file = $request->file('userimage');
            $extension = $file->getClientOriginalExtension();
            $image = Auth::user()->username.'.'.$extension;
            $file->move('user image',$image);
            Auth::user()->image = 'user image'."/".$image;
            Auth::user()->save();
            return redirect()->to('user-panel')->with('message','Profile Picture Added Successfully');
        }
    }

    public function userPasswordEdit(Request $request){
        $SiteProfile = SiteProfile::first();
        return view('UI.user-panel-password-eidt',compact('SiteProfile'));
    }

    public function userPasswordChange(Request $request){
        $this->validate($request,[
            'currentpassword' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (Hash::check($request->currentpassword, Auth::user()->password)) {
            Auth::user()->password = Hash::make($request->password);
            Auth::user()->save();
            return redirect()->to('user-panel')->with('message','Password Change Successfully');
        } else {
            return redirect()->to('user-panel-pass-edit')->with('message','Previous Password Do Not Match');
        }
    }
















    public function selfUserRegister(Request $request){
        //<<<<<<<<<<------- it check for if i already insert the mail from admin panel ------>>>>>>>>>>>>>>>>>>//
        $Check = User::where('email',$request->email)->where('activestatus','TechRegister')->first();
        if($Check!==null){
            if($request->customertype=='End User'){
                $this->validate($request,[
                    'name' => 'required|min:3',
                    'username' => 'required|unique:users,username|min:4|max:255',
                    'phone' => 'required|min:5|max:255',
                    'password' => 'required|min:6|confirmed',
                    'customertype' => 'required',
                    'country' => 'required|max:255',
                    'address' => 'required|min:10',
                ]);
            }else{
                $this->validate($request,[
                    'name' => 'required|min:3',
                    'username' => 'required|unique:users,username|min:4|max:255',
                    'phone' => 'required|min:5|max:255',
                    'password' => 'required|min:6|confirmed',
                    'customertype' => 'required',
                    'companyname' => 'required|max:255',
                    'servicetype' => 'required',
                    'country' => 'required|max:255',
                    'address' => 'required|min:10',
                ]);
            }

            $code = mt_rand(100000,999999);
            $Check->name = $request->name;
            $Check->username = $request->username;
            $Check->password = Hash::make($request->password);
            $Check->phone = $request->phone;
            $Check->email = $request->email;
            $Check->customertype = $request->customertype;
            $Check->companyname = $request->companyname;
            $Check->servicetype = $request->servicetype;
            $Check->VerifyCode = $code;
            $Check->country = $request->country;
            $Check->address = $request->address;
            $Check->activestatus = 'EndUserNotActive';
            $Check->save();
            Mail::to($request->email)->send(new RegisterSendMail($code));
            return redirect()->to('/verify')->with(array('message'=>'Thanks For Your Registration Please Check Your Email Inbox Or Spam Folder For Verification Code','Email'=>$request->email));
        }else{
            if($request->customertype=='End User'){
                $this->validate($request,[
                    'name' => 'required|min:3',
                    'username' => 'required|unique:users,username|min:4|max:255',
                    'phone' => 'required|min:5|max:255',
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:6|confirmed',
                    'customertype' => 'required',
                    'country' => 'required|max:255',
                    'address' => 'required|min:10',
                ]);
            }else{
                $this->validate($request,[
                    'name' => 'required|min:3',
                    'username' => 'required|unique:users,username|min:4|max:255',
                    'phone' => 'required|min:5|max:255',
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:6|confirmed',
                    'customertype' => 'required',
                    'companyname' => 'required|max:255',
                    'servicetype' => 'required',
                    'country' => 'required|max:255',
                    'address' => 'required|min:10',
                ]);
            }

            $code = mt_rand(100000,999999);
            User::create([
                'name' => $request->name,
                'username' =>$request->username,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'email' => $request->email,
                'customertype' => $request->customertype,
                'companyname' => $request->companyname,
                'servicetype' => $request->servicetype,
                'VerifyCode' => $code,
                'country' => $request->country,
                'address' => $request->address,
            ]);
            Mail::to($request->email)->send(new RegisterSendMail($code));
            return redirect()->to('/verify')->with(array('message'=>'Thanks For Your Registration Please Check Your Email Inbox Or Spam Folder For Verification Code','Email'=>$request->email));
        }

    }


    public function userVerify(){
        $SiteProfile = SiteProfile::first();
        return view('UI.userverify',compact('SiteProfile'));
    }

    public function checkVerify(Request $request){
      $Result = User::where('email',$request->email)->where('VerifyCode',$request->VerifyCode)->first();
      if($Result==null){
          return redirect()->to('/verify')->with(array('message'=>'Email With Verification Code Does Not Match','Email'=>$request->email));
      }else{
          $Profile = User::findOrFail($Result->id);
          $Profile->activestatus = "EndUserActive";
          $Profile->save();
          return redirect()->to('/login')->with(array('message'=>'Account Verification Successfull Login Here'));
      }
    }


















    /*============USER DATA MANAGEMENT SECTION==========*/

    public function userDataAdd(){
        return view('Admin.userdataadd');
    }


    public function exitingCheck(Request $request){
        $Email = $request->get('Email');
        $Check = User::where('email',$Email)->count();
        if($Check>0){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function userDataStore(Request $request){
            $this->validate($request,[
                'name' => 'required|min:3',
                'phone' => 'required|min:5|max:255',
                'email' => 'required|unique:users,email',
                'customertype' => 'required',
                'activestatus' => 'required',
                'servicetype' => 'required',
                'country' => 'required|max:255',
                'address' => 'required|min:10',
                'partner' => 'required',
            ]);

        User::create([
            'name' => $request->name,
            'phone' =>$request->phone,
            'email' => $request->email,
            'customertype' => $request->customertype,
            'servicetype' => $request->servicetype,
            'companyname' => $request->companyname,
            'country' => $request->country,
            'activestatus' => $request->activestatus,
            'address' => $request->address,
            'BirthDate' => $request->BirthDate,
            'EmployeeStatus' => $request->EmployeeStatus,
            'TakeCare' => $request->TakeCare,
            'Designation' => $request->Designation,
            'Website' => $request->Website,
            'partner' => $request->partner,
        ]);

        return redirect()->to('admin/userdata-add')->with('message','User Data Added Successfully');
    }

    public function userDataEdit($id){
        $UserData =  User::findOrFail($id);
        return view('Admin.userdataedit',compact('UserData'));
    }


    public function userDataUpdate($id,Request $request){

        $this->validate($request,[
            'name' => 'required|min:3',
            'phone' => 'required|min:5|max:255',
            'email' => "required|unique:users,email,$id",
            'partner' => 'required',
            'customertype' => 'required',
            'EmployeeStatus' => 'required',
            'activestatus' => 'required',
            'servicetype' => 'required',
            'country' => 'required|max:255',
            'address' => 'required|min:10',
        ]);

        $User = User::findOrFail($id);
        $User->name = request('name');
        $User->email= request('email');
        $User->phone = request('phone');
        $User->customertype = request('customertype');
        $User->companyname = request('companyname');
        $User->servicetype = request('servicetype');
        $User->country = request('country');
        $User->activestatus = request('activestatus');
        $User->address = request('address');
        $User->BirthDate = request('BirthDate');
        $User->EmployeeStatus = request('EmployeeStatus');
        $User->TakeCare = request('TakeCare');
        $User->Designation = request('Designation');
        $User->Website = request('Website');
        $User->partner = request('partner');
        $User->save();
        return redirect()->to('admin/userdata-manage')->with('message','User Update Successfully');
    }

    public function userDataManage(){
        return view('Admin.userdatamanage');
    }

    public function techRegisterUser(){
        return view('Admin.userdataselfregister');
    }

    public function userDataDelete($id){
        $Blog = User::find($id);
        $Blog->delete();
        return redirect()->to('admin/userdata-manage')->with('message','User Delete Successfully');
    }

   /*============USER DATA MANAGEMENT SECTION==========*/





    #*===================API METHOD LIST=============================*

    public function register(Request $req)
    {
        //valdiate
        $validator = Validator::make($req->all(),[
            'name' => 'required|string',
            //'username' => 'required|string|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response(['message' => $validator->errors()->all()],400);
        }

        //create new user in users table
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        $token = $user->createToken('User')-> accessToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }


   public function login(Request $req)
   {

        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password'=> 'required',
        ]);

        if($validator->fails()){
            return response([
                'message' => $validator->errors()->all()
            ]);
        }

        // find user email in users table
        $user = User::where('email', $req->email)->first();
        // if user email found and password is correct
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('User')-> accessToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }


    public function sliderList(){
        //return response(['sliderdata' => ElectroPronoSlider::where('ActiveStatus',1)->get()],200);
        return response(['sliderdata' => DB::table('electro_prono_sliders')->selectRaw('electro_prono_sliders.sliderTopic,electro_prono_sliders.sliderimage,images.imageurl')->join('images', 'electro_prono_sliders.sliderimage', '=', 'images.id')->get()],200);
    }



public function discoverProducts(){
    return DB::table('discover_products')->join('products_images', 'discover_products.FeaturedImage', '=', 'products_images.id')->select('discover_products.*','products_images.imageurl')->get();
}


public function discoverProductsList($id){
    return DB::table('products')->join('products_images', 'products.FeaturedImage', '=', 'products_images.id')->join('products_secondary_categories','products_secondary_categories.id','=','products.Category')->join('products_primary_categories','products_primary_categories.id','=','products_secondary_categories.PrimaryCategoryId')->select('products.Model','products.Name','products.Datasheet','products.ProductShortDescription','products.FeaturedImage','products.CurrentPrice','products.PartnerPrice','products.PriceStatus','products_images.imageurl')->where('products.ActiveStatus', '=', 1)->where('products_primary_categories.id', '=', 10)->get();
}


public function recentProducts(){
    return DB::table('products')->join('products_images', 'products.FeaturedImage', '=', 'products_images.id')->select('products.Model','products.Name','products.Datasheet','products.ProductShortDescription','products.FeaturedImage','products.CurrentPrice','products.PartnerPrice','products.PriceStatus','products_images.imageurl')->where('products.ActiveStatus', '=', 1)->limit(10)->get();
}

public function fewHDCamera(){
    return DB::table('products')->join('products_images', 'products.FeaturedImage', '=', 'products_images.id')->join('products_secondary_categories','products_secondary_categories.id','=','products.Category')->join('products_primary_categories','products_primary_categories.id','=','products_secondary_categories.PrimaryCategoryId')->select('products.Model','products.Name','products.Datasheet','products.ProductShortDescription','products.FeaturedImage','products.CurrentPrice','products.PartnerPrice','products.PriceStatus','products_images.imageurl')->where('products.ActiveStatus', '=', 1)->where('products_primary_categories.CategoryName', '=', 'HD Camera')->limit(10)->get();
}


public function fewIPCamera(){
    return DB::table('products')->join('products_images', 'products.FeaturedImage', '=', 'products_images.id')->join('products_secondary_categories','products_secondary_categories.id','=','products.Category')->join('products_primary_categories','products_primary_categories.id','=','products_secondary_categories.PrimaryCategoryId')->select('products.Model','products.Name','products.Datasheet','products.ProductShortDescription','products.FeaturedImage','products.CurrentPrice','products.PartnerPrice','products.PriceStatus','products_images.imageurl')->where('products.ActiveStatus', '=', 1)->where('products_primary_categories.CategoryName', '=', 'IP Camera')->limit(10)->get();
}


public function fewDVR(){
    return DB::table('products')->join('products_images', 'products.FeaturedImage', '=', 'products_images.id')->join('products_secondary_categories','products_secondary_categories.id','=','products.Category')->join('products_primary_categories','products_primary_categories.id','=','products_secondary_categories.PrimaryCategoryId')->select('products.Model','products.Name','products.Datasheet','products.ProductShortDescription','products.FeaturedImage','products.CurrentPrice','products.PartnerPrice','products.PriceStatus','products_images.imageurl')->where('products.ActiveStatus', '=', 1)->where('products_primary_categories.CategoryName', '=', 'Digital Video Recorder(DVR)')->limit(10)->get();
}


public function fewNVR(){
    return DB::table('products')->join('products_images', 'products.FeaturedImage', '=', 'products_images.id')->join('products_secondary_categories','products_secondary_categories.id','=','products.Category')->join('products_primary_categories','products_primary_categories.id','=','products_secondary_categories.PrimaryCategoryId')->select('products.Model','products.Name','products.Datasheet','products.ProductShortDescription','products.FeaturedImage','products.CurrentPrice','products.PartnerPrice','products.PriceStatus','products_images.imageurl')->where('products.ActiveStatus', '=', 1)->where('products_primary_categories.CategoryName', '=', 'Network Video Recorder (NVR)')->limit(10)->get();
}


}
