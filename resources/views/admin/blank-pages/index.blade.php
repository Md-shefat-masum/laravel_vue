@extends('layouts.admin')
@section('contents')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item"> </li>
                        <li class="breadcrumb-item active"> </li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Information</h3>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <a href="#" class="btn  btn-md btn-outline-success waves-effect custom-btn card_top_button"><i class="fa fa-plus-circle"></i> Add User</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>User Role</th>
                                                        <th>Photo</th>
                                                        <th>control</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>abc</td>
                                                        <td>1235</td>
                                                        <td>eve</td>
                                                        <td>asd@gmail.com</td>
                                                        <td>admin</td>
                                                        <td>
                                                            <img class="table_image_40" style="width:40px" src="{{asset('uploads')}}/avatar-black.png" alt="user-photo"/>
                                                        </td>
                                                        <td>
                                                            <form id="add_switch" action="#" method="POST">
                                                                @csrf
                                                                <label class="switch">
                                                                    <input id="add_blog"  type="checkbox" checked>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a class="text-info ml-1" title="active" href="#"><i class="ti ti-control-pause"></i></a>
                                                            <a class="text-blue ml-1" title="deactive" href="#"><i class="ti ti-control-play"></i></a>
                                                            <a class="text-success ml-1" title="view" href="#"><i class="ti ti-zoom-in"></i></a>
                                                            <a class="text-warning ml-1" title="edit" href="#"><i class="ti ti-pencil-alt"></i></a>
                                                            <a class="text-danger" title="delete" href="#"><i class="ti ti-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>abc</td>
                                                        <td>1235</td>
                                                        <td>eve</td>
                                                        <td>asd@gmail.com</td>
                                                        <td>admin</td>
                                                        <td>
                                                            <img class="table_image_40" style="width:40px" src="{{asset('uploads')}}/avatar-black.png" alt="user-photo"/>
                                                        </td>
                                                        <td>
                                                            <form id="add_switch" action="#" method="POST">
                                                                @csrf
                                                                <label class="switch">
                                                                    <input id="add_blog"  type="checkbox" checked>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a class="text-info ml-1" title="active" href="#"><i class="ti ti-control-pause"></i></a>
                                                            <a class="text-blue ml-1" title="deactive" href="#"><i class="ti ti-control-play"></i></a>
                                                            <a class="text-success ml-1" title="view" href="#"><i class="ti ti-zoom-in"></i></a>
                                                            <a class="text-warning ml-1" title="edit" href="#"><i class="ti ti-pencil-alt"></i></a>
                                                            <a class="text-danger" title="delete" href="#"><i class="ti ti-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>abc</td>
                                                        <td>1235</td>
                                                        <td>eve</td>
                                                        <td>asd@gmail.com</td>
                                                        <td>admin</td>
                                                        <td>
                                                            <img class="table_image_40" style="width:40px" src="{{asset('uploads')}}/avatar-black.png" alt="user-photo"/>
                                                        </td>
                                                        <td>
                                                            <form id="add_switch" action="#" method="POST">
                                                                @csrf
                                                                <label class="switch">
                                                                    <input id="add_blog"  type="checkbox" checked>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a class="text-info ml-1" title="active" href="#"><i class="ti ti-control-pause"></i></a>
                                                            <a class="text-blue ml-1" title="deactive" href="#"><i class="ti ti-control-play"></i></a>
                                                            <a class="text-success ml-1" title="view" href="#"><i class="ti ti-zoom-in"></i></a>
                                                            <a class="text-warning ml-1" title="edit" href="#"><i class="ti ti-pencil-alt"></i></a>
                                                            <a class="text-danger" title="delete" href="#"><i class="ti ti-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer card_footer_expode">
                                <a href="#" class="btn btn-outline-danger waves-effect">PRINT</a>
                                <a href="#" class="btn btn-outline-warning waves-effect">EXCEL</a>
                                <a href="#" class="btn btn-outline-success waves-effect">PDF</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
