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
                            <form action="{{url('admin/customer-mail-send')}}" method="post">
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
                                                <label for="customertype">SELECT USER TYPE</label>
                                                <select  id="customertype" class="form-control conditionalcustomer" name="customertype">
                                                    <option selected disabled>SELECT USER TYPE</option>
                                                    @foreach(\App\UserType::get() as $UserType)
                                                        <option value="{{$UserType->Value}}" >{{$UserType->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="servicetype">Business Category</label>
                                                <select id="servicetype" class="form-control conditionalcustomer" name="servicetype">
                                                    <option selected disabled>Business Category</option>
                                                    @foreach(\App\BusinessCategory::get() as $BusinessCategory)
                                                        <option value="{{$BusinessCategory->id}}" >{{$BusinessCategory->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="activestatus">Active Status</label>
                                                <select id="activestatus" class="form-control conditionalcustomer" name="activestatus">
                                                    <option selected disabled>SELECT ACTIVE STATUS</option>
                                                    @foreach(\App\ActiveStatus::get() as $ActiveStatus)
                                                        <option value="{{$ActiveStatus->Value}}">{{$ActiveStatus->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="skipvalue">Skip:</label>
                                                    <input style="border: 1px solid #586bde;" type="text" name="skipvalue" placeholder="Enter Skip Number" class="form-control{{$errors->has('skipvalue') ? ' is-invalid' : ''}}" value="{{old('skipvalue')}}" id="skipvalue">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="takevalue">Take:</label>
                                                    <input style="border: 1px solid #586bde;" type="text" name="takevalue" placeholder="Enter Take Number" class="form-control{{$errors->has('takevalue') ? ' is-invalid' : ''}}" value="{{old('takevalue')}}" id="takevalue">
                                                </div>
                                            <div class="form-group col-sm-12">
                                                <label for="MailSubject">Mail Subject:</label>
                                                <input style="border: 1px solid #586bde;" type="text" name="MailSubject" placeholder="Enter Mail Subject" class="form-control{{$errors->has('MailSubject') ? ' is-invalid' : ''}}" value="{{old('MailSubject')}}" id="MailSubject">
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
                                <button type="submit" class="btn btn-success">Submit</button>
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


        tinymce.init({
            selector: '#MailDetails',
            theme: "modern",
            height: 200,
            width: '100%',
            relative_urls:false,
            remove_script_host: true,
            valid_children : "+body[style],-body[div],p[strong|a|#text]",
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor code"
            ],

            toolba1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            toolba2: "| link unlink anchor | image media | forecolor backcolor | print preview code | caption",

            image_caption: true,
            image_advtab: true
        });

    });
</script>