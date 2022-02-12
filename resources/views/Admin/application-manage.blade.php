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
        <section id="app" style="margin-top:10px;" class="content">
            <!-- Modal -->
            <image-component></image-component>
            <!-- Modal -->

            <div class="row">
                <div class="col-sm-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header"><a style="color:white;" href="" class="btn btn-success pull-right">Add New +</a></div>
                        <div class="card-body">
                        <table id="mytable" class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Birth Date</th>
                                    <th scope="col">Salary Demand</th>
                                    <th scope="col">Current Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Download</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($JobApplication as $Application)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$Application->Name}}</td>
                                        <td>{{$Application->Mobile}}</td>
                                        <td>{{$Application->Email}}</td>
                                        <td>{{$Application->CityName->Name}}</td>
                                        <td>{{$Application->BirthDate}}</td>
                                        <td>{{$Application->SalaryDemand}}</td>
                                        <td>{{$Application->CurrentAddress}}</td>
                                        <td>{{$Application->ShortListStatus}}</td>
                                        <td><a class="btn btn-danger" href="{{asset('')}}{{$Application->CV}}" download>Download</a></td>
                                        <td>
                                            <!-- when i make it please replace href-->
                                            <a href="{{url('admin/application-edit',[$Application->id])}}" class="btn btn-info"> <i style="font-size:17px;" class="fa fa-edit"></i></a>
                                            <a href="{{url('admin/application-delete',[$Application->id])}}" class="btn btn-danger" onclick="return ConfirmDelete();" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
<script>

    $(document).ready( function () {
        $('#mytable').DataTable();
    } );

    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x){
            return true;
        }
        else{
            return false;
        }
    }
</script>
@include('Admin.inc.footersource')
