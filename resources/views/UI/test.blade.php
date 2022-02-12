
@php
    $title = "Job Circular | Soshine Marketing Company";
    $keywords =  "Job Circular, registration, soshine marketing company, user registration, login, signup";
    $description =  "Job Circular | Soshine Marketing Company";
@endphp

@include('UI.inc.headersource')
@include('UI.inc.menubar')


<div style="margin-top: 30px;margin-bottom: 20px;" class="container">
    <div class="row">
        <div style="margin: 0 auto;width: 100%" class="col-12 col-sm-12 col-md-8 col-lg-8">
            <div style="box-shadow: 1px 1px 7px 1px #787878;" class="card">
                <div style="color:red;font-weight: bold" class="card-header">Job Circular</div>
                <div class="card-body">
                     <form enctype="multipart/form-data" action="{{url('jobsalesexecutive')}}" method="POST" >
                         @csrf
                         <div class="row">
                             @if(Session::has('message'))
                                 <div class="alert alert-success alert-dismissible">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     {{Session::get('message')}}
                                 </div>
                             @endif

                             <div class="form-group col-12 col-lg-6">
                                 <label style="margin-bottom: 0px;" for="Name">Name</label>
                                 @if($errors->has('Name'))<small style="color:red;font-weight: bold;">{{$errors->first('Name')}}</small>@endif
                                 <input type="text" value="{{old('Name')}}" id="Name"  name="Name" placeholder="Name" class="form-control">
                             </div>

                             <div class="form-group col-12 col-lg-6">
                                 <label style="margin-bottom: 0px;" for="Mobile">Mobile</label>
                                 @if($errors->has('Mobile'))<small style="color:red;font-weight: bold;">{{$errors->first('Mobile')}}</small>@endif
                                 <input type="text" class="form-control" value="{{old('Mobile')}}"  placeholder="Mobile" id="Mobile" name="Mobile" >
                             </div>

                             <div class="form-group col-12  col-lg-4">
                                 <label style="margin-bottom: 0px;" for="Email">Email</label>
                                 @if($errors->has('Email'))<small style="color:red;font-weight: bold;">{{$errors->first('Email')}}</small>@endif
                                 <input type="text" class="form-control" value="{{old('Email')}}" placeholder="Email" id="Email" name="Email" >
                             </div>

                             <div class="form-group col-12  col-lg-4">
                                 <label style="margin-bottom: 0px;" for="BirthDate">Birth Date</label>
                                 @if($errors->has('BirthDate'))<small style="color:red;font-weight: bold;">{{$errors->first('BirthDate')}}</small>@endif
                                 <input type="date" class="form-control" value="{{old('BirthDate')}}" id="BirthDate" name="BirthDate" >
                             </div>

                             <div class="form-group col-12  col-lg-4">
                                 <label style="margin-bottom: 0px;" for="SalaryDemand">Demand Salary</label>
                                 @if($errors->has('SalaryDemand'))<small style="color:red;font-weight: bold;">{{$errors->first('SalaryDemand')}}</small>@endif
                                 <input type="integer" class="form-control" value="{{old('SalaryDemand')}}" placeholder="Demand Salary" id="SalaryDemand" name="SalaryDemand" >
                             </div>

                             <div class="form-group col-lg-4 col-6">
                                <label style="margin-bottom: 0px;" for="City">City</label>
                                @if($errors->has('City'))<small style="color:red;font-weight: bold;">{{$errors->first('City')}}</small>@endif
                                <select id="City" class="form-control" name="City">
                                    <option selected disabled>Select City</option>
                                    @foreach($DistrictList as $District)
                                    <option value="{{$District->id}}" {{ old('City') == $District->id ? 'selected' : '' }}>{{$District->Name}}</option>
                                    @endforeach
                                </select>
                             </div>


                             <div class="form-group col-lg-4 col-6">
                                <label style="margin-bottom: 0px;" for="MartialStatus">Martial Status</label>
                                @if($errors->has('MartialStatus'))<small style="color:red;font-weight: bold;">{{$errors->first('MartialStatus')}}</small>@endif
                                <select id="MartialStatus" class="form-control" name="MartialStatus">
                                    <option selected disabled>Select Martial Status</option>
                                    <option value="Unmarried" {{ old('MartialStatus') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                                    <option value="Married" {{ old('MartialStatus') == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Devorced" {{ old('MartialStatus') == 'Devorced' ? 'selected' : '' }}>Devorced</option>
                                </select>
                             </div>

                             <div class="form-group col-lg-4 col-6">
                             <label style="margin-bottom: 0px;" for="CV">CV</label>
                                 @if($errors->has('CV'))<small style="color:red;font-weight: bold;">{{$errors->first('CV')}}</small>@endif
                                 <input type="file" class="form-control" value="{{old('CV')}}" accept=".pdf,.jpg,.jpeg,.png,.dox,.docx,.doc" id="CV"  name="CV" >
                             </div>

                             <div class="form-group col-lg-12 col-6">
                                 <label style="margin-bottom: 0px;" for="CurrentAddress">Current Address</label>
                                 @if($errors->has('CurrentAddress'))<small style="color:red;font-weight: bold;">{{$errors->first('CurrentAddress')}}</small>@endif
                                 <textarea class="form-control" id="CurrentAddress" rows="2" name="CurrentAddress" >{{old('CurrentAddress') }}</textarea>
                             </div>
                         </div>
                         <button style="background-color: #d71920" type="submit" class="btn btn-danger">Submit</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('UI.inc.footerbar')
@include('UI.inc.footersource')
<script type="text/javascript">
    $(document).ready(function(){
        $('#customertype').change(function(){
          var $type =  $(this).val();
          if($type=='End User'){
             $('.ifcompany').hide();
          }else{
              $('.ifcompany').show();
          }
        })
    });
</script>
</body>
</html>