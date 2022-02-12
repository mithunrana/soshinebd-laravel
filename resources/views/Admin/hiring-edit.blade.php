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
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Application Edit</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <form action="{{url('admin/application-edit',[$Application->id])}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="CategoryName">{{$Application->Name}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="CategoryUrl">{{$Application->Mobile}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="CategoryUrl">{{$Application->Email}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ShortListStatus">Hiring Status</label>
                                            <select class="form-control{{$errors->has('ShortListStatus') ? ' is-invalid' : ''}}" id="ShortListStatus" name="ShortListStatus">
                                                <option value="" selected disabled>=============Hiring Status===========</option>
                                                @foreach($ApplicationHiringStatus as $Status)
                                                    <option value="{{$Status->StatusName}}" {{$Status->StatusName == $Application->ShortListStatus ? 'selected="selected"' : ''}}>{{$Status->StatusName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                    </form>
                                </div>
                            </div>
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
