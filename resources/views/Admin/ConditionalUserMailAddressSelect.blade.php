@include('Admin.inc.header source')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('Admin.inc.adminHeader')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Admin.inc.adminSideBar')
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section id="app" style="margin-top: 10px;" class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <span style="font-weight: bolder;">Current Selected User: </span>
                            <span id="customercounter" style="background-color: red;border-radius: 9px;padding: 4px;color: white;">
                                @php
                                    echo count(App\User::all());
                                @endphp
                            </span>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/conditional-user-mail-address-get')}}" method="post">
                                @csrf
                                    <div class="col-sm-12">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <b>Successfully</b> Customer Mail Send Complete....!
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="customertype">SELECT USER TYPE <span style="color:red;">*</span></label>
                                                <select  id="customertype" class="form-control conditionalcustomer" name="customertype">
                                                    <option selected disabled>SELECT USER TYPE</option>
                                                    @foreach(\App\UserType::get() as $UserType)
                                                        <option value="{{$UserType->Value}}" >{{$UserType->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="servicetype">Business Category <span style="color:red;">*</span></label>
                                                <select id="servicetype" class="form-control conditionalcustomer" name="servicetype">
                                                    <option selected disabled>Business Category</option>
                                                    @foreach(\App\BusinessCategory::get() as $BusinessCategory)
                                                        <option value="{{$BusinessCategory->id}}" >{{$BusinessCategory->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="activestatus">Active Status <span style="color:red;">*</span></label>
                                                <select id="activestatus" class="form-control conditionalcustomer" name="activestatus">
                                                    <option selected disabled>SELECT ACTIVE STATUS</option>
                                                    @foreach(\App\ActiveStatus::get() as $ActiveStatus)
                                                        <option value="{{$ActiveStatus->Value}}">{{$ActiveStatus->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="skipvalue">Skip: <span style="color:red;">*</span></label>
                                                    <input style="border: 1px solid #586bde;" type="text" name="skipvalue" placeholder="Enter Skip Number" class="form-control{{$errors->has('skipvalue') ? ' is-invalid' : ''}}" value="{{old('skipvalue')}}" id="skipvalue">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="takevalue">Take: <span style="color:red;">*</span></label>
                                                    <input style="border: 1px solid #586bde;" type="text" name="takevalue" placeholder="Enter Take Number" class="form-control{{$errors->has('takevalue') ? ' is-invalid' : ''}}" value="{{old('takevalue')}}" id="takevalue">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="delimiter">Delimiter: <span style="color:red;">*</span></label>
                                                    <input style="border: 1px solid #586bde;" type="text" name="delimiter" placeholder="Enter Delimiter" class="form-control{{$errors->has('delimiter') ? ' is-invalid' : ''}}" value="{{old('delimiter')}}" id="delimiter">
                                                </div>
                                            <div class="form-group col-sm-12">
                                                <label for="MailDetails">Mail Details:
                                                    @if($errors->has('MailDetails'))
                                                        <small style="color:red;"> {{$errors->first('MailDetails')}}</small>
                                                    @endif
                                                </label>
                                                <textarea style="border: 1px solid #586bde;" type="text" class="form-control{{$errors->has('MailDetails') ? ' is-invalid' : ''}}"  rows="7" placeholder="Enter Mail Details" name="MailDetails" id="MailDetails">{{old('MailDetails')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                <button type="button" class="btn btn-success mailget">GET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="#">SOSHINE</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.3-pre
        </div>
    </footer>
</div>
<!-- ./wrapper -->
@include('Admin.inc.footersource')
<script>
    $(document).ready(function() {

        $('.conditionalcustomer').change(function(){
            var activestatus = $('#activestatus').val();
            var servicetype = $('#servicetype').val();
            var customertype= $('#customertype').val();
            $.ajax({
                url:"{{ url('admin/conditional-user-mail-count') }}",
                method:'GET',
                data:{activestatus:activestatus,servicetype:servicetype,customertype:customertype},
                dataType:'html',
                success:function(data)
                {
                    $('#customercounter').empty();
                    $('#customercounter').html(data);
                }
            })
        });


        $('.mailget').click(function(){
            var activestatus = $('#activestatus').val();
            var servicetype = $('#servicetype').val();
            var customertype= $('#customertype').val();
            var skipvalue= $('#skipvalue').val();
            var takevalue= $('#takevalue').val();
            var delimiter= $('#delimiter').val();
            $.ajax({
                url:"{{ url('admin/conditional-user-mail-address-get') }}",
                method:'POST',
                data:{activestatus:activestatus,servicetype:servicetype,customertype:customertype,skipvalue,takevalue,delimiter,_token: '{{csrf_token()}}'},
                dataType:'JSON',
                success:function(data)
                {   
                    if(data.status=='1'){
                        alert(data.success);
                    }else{
                        $('#MailDetails').empty();
                        $('#MailDetails').html(data.message);
                    }
                }
            })
        });
    });
</script>