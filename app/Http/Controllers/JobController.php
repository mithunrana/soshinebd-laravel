<?php

namespace App\Http\Controllers;
use App\Hiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{

    public function test(){
        return view('UI.test');
    }

    public function success(){
        return view('UI.apply-success');
    }


    public function salesExecutivePost(Request $request){
        $this->validate($request,[
            'Name' => 'required|min:4|max:100',
            'Mobile' => 'required|min:11|max:14|unique:hirings,Mobile',
            'Email' => "required|min:5|max:50|unique:hirings,Email",
            'BirthDate' => 'required',
            'City' => 'required|max:50',
            'CV' => 'required|mimes:pdf,png,dox,docx,doc,jpg,jpeg|max:5120',
            'CurrentAddress' => 'required|min:3|max:400',
            'SalaryDemand' => 'required|min:3|max:15',
            'MartialStatus' => 'required|min:3|max:50',
        ]);

        $Hiring = new  Hiring();
        $CircularCode = "SE2022-02";
        $file = $request->file('CV');
        $extension = $file->getClientOriginalExtension();
        $CVName= $request->Mobile.$CircularCode.'.'.$extension;
        $file->move('CV',$CVName);
        $Hiring->Name = $request->Name;
        $Hiring->Mobile = $request->Mobile;
        $Hiring->Email = $request->Email;
        $Hiring->BirthDate = $request->BirthDate;
        $Hiring->City = $request->City;
        $Hiring->CV = 'CV'."/".$CVName;
        $Hiring->CurrentAddress = $request->CurrentAddress;
        $Hiring->SalaryDemand = $request->SalaryDemand;
        $Hiring->MartialStatus = $request->MartialStatus;
        $Hiring->ShortListStatus = "Undefined";
        $Hiring->CircularCode = $CircularCode;
        $Hiring->save();

        $latestRecord = Hiring::latest()->first(); 
        $ApplyID =  "SMCJB0".$latestRecord->id;

        return redirect("job-success")->with('apply-sucess-message','Thanks for you apply, Application ID: '.$ApplyID);

    }


    public function applicationManage(){
        $JobApplication= Hiring::all();
        return view('Admin.application-manage',Compact('JobApplication'));
    }


    public function applicationEdit($id){
        $Application= Hiring::findOrFail($id);
        return view('Admin.hiring-edit',Compact('Application'));
    }

    public function applicationEditStore(Request $request,$id){

        $this->validate($request,[
            'ShortListStatus' => 'required',
        ]);

        $Application = Hiring::findOrFail($id);
        $Application->ShortListStatus = request('ShortListStatus');
        $Application->save();
        return redirect()->to('admin/job-application')->with('message','Application Update Successfully');
    }

    public function applicationDelete($id){
        $Application = Hiring::find($id);
        $Application->delete();
        return redirect()->to('admin/job-application')->with('message','Application Delete Successfully');
    }

    
}
