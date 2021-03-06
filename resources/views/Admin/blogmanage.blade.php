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
                        <div class="card-header"><a style="color:white;" href="{{url('admin/blog-add')}}" class="btn btn-success pull-right">Add New +</a></div>
                        <div class="card-body">
                            <table id="mytable" class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Blog Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Blogs as $Blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$Blog->BlogName}}</td>
                                        <td>
                                            @if($Blog->ActiveStatus==0)
                                                <a class="btn btn-danger" href="{{url('admin/blog-active-deactive',[$Blog->ActiveStatus,$Blog->id])}}">Deactive <i class="fa fa-ban" aria-hidden="true"></i></a>
                                            @endif
                                            @if($Blog->ActiveStatus==1)
                                                <a class="btn btn-success" href="{{url('admin/blog-active-deactive',[$Blog->ActiveStatus,$Blog->id])}}">Active <i class="fa fa-check"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{asset('')}}tutorial/{{$Blog->Permalink}}" target="_blank" class="btn btn-success"><i style="font-size:17px;" class="fa fa-eye"></i></a>
                                            <a href="{{url('admin/blog-edit',[$Blog->id])}}" class="btn btn-info"> <i style="font-size:17px;" class="fa fa-edit"></i></a>
                                            <a href="{{url('admin/blog-delete',[$Blog->id])}}" class="btn btn-danger" onclick="return ConfirmDelete();" ><i class="fa fa-trash" aria-hidden="true"></i></a>
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
