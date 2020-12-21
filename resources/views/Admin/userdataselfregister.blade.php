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
        <section id="app" style="margin-top: 10px" class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success" href="{{url('admin/userdata-add')}}">Add New +</a>
                            <a class="btn btn-info" href="{{url('admin/userdata-manage')}}">Self Register User</a>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\User::where('activestatus','=','TechRegister')->get() as $User)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$User->name}}</td>
                                        <td>{{$User->email }}</td>
                                        <td>{{$User->username}}</td>
                                        <td>{{$User->companyname}}</td>
                                        <td>
                                            <a href="{{asset('')}}news/}}" target="_blank" class="btn btn-success">
                                                <i style="font-size:17px;" class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{url('admin/userdata-edit',[$User->id])}}" class="btn btn-info">
                                                <i style="font-size:17px;" class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url('admin/userdata-delete',[$User->id])}}" class="btn btn-danger" onclick="return ConfirmDelete();" >
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
