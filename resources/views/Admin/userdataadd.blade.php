@include('Admin.inc.header source')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
@include('Admin.inc.adminHeader')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('Admin.inc.adminSideBar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section id="app" style="margin-top: 10px;" class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">USER DATA ADD HERE</div>
                        <div class="card-body">
                            <form action="{{url('admin/userdata-add')}}" method="post">
                                @csrf
                                <div class="row">
                                    @if(Session::has('message'))
                                        <div style="background-color: #ce0909;color:white;font-weight: bold;width: 100%;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                    <div class="form-group col-lg-4">
                                        <label style="margin-bottom: 0px;" for="name">Name</label>
                                        @if($errors->has('name'))<small style="color:red;font-weight: bold;">{{$errors->first('name')}}</small>@endif
                                        <input type="text" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter Name Here"  name="name">
                                    </div>

                                    <div class="form-group col-6  col-lg-4">
                                        <label style="margin-bottom: 0px;" for="phone">Email</label>
                                        @if($errors->has('email'))<small style="color:red;font-weight: bold;">{{$errors->first('email')}}</small>@endif
                                        <small style="color:red;font-weight: bold;" id="Checking"></small>
                                        <input type="text" class="form-control" value="{{old('email')}}" placeholder="Enter Email Here" id="EmailId" name="email" >
                                    </div>

                                    <div class="form-group col-6  col-lg-4">
                                        <label style="margin-bottom: 0px;" for="phone">Phone</label>
                                        @if($errors->has('phone'))<small style="color:red;font-weight: bold;">{{$errors->first('phone')}}</small>@endif
                                        <input type="text" class="form-control" value="{{old('phone')}}" placeholder="Enter Phone Here" id="phone" name="phone" >
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="customertype">USER TYPE</label>
                                        @if($errors->has('customertype'))<small style="color:red;font-weight: bold;">{{$errors->first('customertype')}}</small>@endif
                                        <select id="customertype" class="form-control" name="customertype">
                                            <option selected disabled>SELECT USER TYPE</option>
                                            @foreach(\App\UserType::get() as $UserType)
                                                <option value="{{$UserType->Value}}" >{{$UserType->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 col-lg-4 ifcompany">
                                        <label style="margin-bottom: 0px;" for="servicetype">SELECT BUSINESS CATEGORY</label>
                                        @if($errors->has('servicetype'))<small style="color:red;font-weight: bold;">{{$errors->first('servicetype')}}</small>@endif
                                        <select id="servicetype" class="form-control" name="servicetype">
                                            <option selected disabled>SELECT BUSINESS CATEGORY</option>
                                            @foreach(\App\BusinessCategory::get() as $BusinessCategory)
                                                <option value="{{$BusinessCategory->id}}" >{{$BusinessCategory->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="activestatus">Active Status</label>
                                        @if($errors->has('activestatus'))<small style="color:red;font-weight: bold;">{{$errors->first('activestatus')}}</small>@endif
                                        <select id="activestatus" class="form-control" name="activestatus">
                                            <option selected disabled>SELECT ACTIVE STATUS</option>
                                            @foreach(\App\ActiveStatus::get() as $ActiveStatus)
                                                <option value="{{$ActiveStatus->Value}}">{{$ActiveStatus->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-4 ifcompany">
                                        <label style="margin-bottom: 0px;" for="companyname">Company Name</label>
                                        @if($errors->has('companyname'))<small style="color:red;font-weight: bold;">{{$errors->first('companyname')}}</small>@endif
                                        <input type="text" class="form-control" value="{{old('companyname')}}" placeholder="Company Name" id="companyname" name="companyname" >
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="country">Country</label>
                                        @if($errors->has('country'))<small style="color:red;font-weight: bold;">{{$errors->first('country')}}</small>@endif
                                        <input type="text" class="form-control" value="{{old('country')}}" placeholder="Enter Client Country Name" value="Bangladesh" id="country" name="country" >
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="BirthDate">Birth Date</label>
                                        @if($errors->has('BirthDate'))<small style="color:red;font-weight: bold;">{{$errors->first('BirthDate')}}</small>@endif
                                        <input type="date" class="form-control" value="{{old('BirthDate')}}" placeholder="Enter Birth Date" id="BirthDate" name="BirthDate" >
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="EmployeeStatus">Employee Status</label>
                                        <select id="EmployeeStatus" class="form-control" name="EmployeeStatus">
                                            <option value="NO">NO</option>
                                            <option value="YES">YES</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="TakeCare">Take Care</label>
                                        <select id="TakeCare" class="form-control" name="TakeCare">
                                            <option selected disabled>Select For Take Care</option>
                                            @foreach(\App\User::where('EmployeeStatus','YES')->get() as $Employee)
                                                <option value="{{$Employee->id}}">{{$Employee->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="Designation">Designation</label>
                                        @if($errors->has('Designation'))<small style="color:red;font-weight: bold;">{{$errors->first('Designation')}}</small>@endif
                                        <input type="text" class="form-control" value="{{old('Designation')}}" placeholder="Enter User Designation" id="Designation" name="Designation" >
                                    </div>

                                    <div class="form-group col-6 col-lg-4">
                                        <label style="margin-bottom: 0px;" for="Website">Website</label>
                                        @if($errors->has('Website'))<small style="color:red;font-weight: bold;">{{$errors->first('Website')}}</small>@endif
                                        <input type="text" class="form-control" value="{{old('Website')}}" placeholder="Enter Website Name" id="Website" name="Website" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 col-lg-12">
                                        <label style="margin-bottom: 0px;" for="address">Address</label>
                                        @if($errors->has('address'))<small style="color:red;font-weight: bold;">{{$errors->first('address')}}</small>@endif
                                        <textarea type="text" class="form-control" value="" id="address" placeholder="Enter Address" name="address" >{{old('address')}}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.3-pre
        </div>
    </footer>
</div>

<!-- ./wrapper -->
<script src=" {{ mix('js/app.js') }} "></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#EmailId').keyup(function(){
            var Email = $(this).val();
            $.ajax({
                url:"{{ url('admin/exiting-check') }}",
                method:'GET',
                data:{Email:Email},
                dataType:'html',
                success:function(data)
                {
                    if(data==1){
                        $('#Checking').text('This Email Address Already Added');
                    }else{
                        $('#Checking').text('');
                    }
                }
            })
        });
    });
</script>
@include('Admin.inc.footersource')