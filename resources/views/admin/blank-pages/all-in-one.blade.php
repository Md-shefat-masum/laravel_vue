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
                                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All User Information</h3>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <a href="#" data-toggle="modal" data-target=".add-modal" class="btn  btn-md btn-outline-success waves-effect custom-btn card_top_button"><i class="fa fa-plus-circle"></i> Add User</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered custom-table  mb-0">
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
                                                            <a class="text-danger  delete-btn" title="delete" data-id="3" data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a>
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
                                                            <a class="text-danger  delete-btn" title="delete" data-id="4" data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a>
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
                                                            <a class="text-danger delete-btn" title="delete" data-id="2" data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a>
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

            {{-- add modal --}}

            <div class="modal fade add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card mb-0">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> User Registration</h3>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="#" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-th"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="card-body card_form">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-7">
                                                    @if(Session::has('success'))
                                                        <div class="alert alert-success alertsuccess" role="alert">
                                                            <strong>Success!</strong> user registrion success.
                                                        </div>
                                                    @endif
                                                    @if(Session::has('error'))
                                                        <div class="alert alert-warning alerterror" role="alert">
                                                            <strong>Opps!</strong> please try again.
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">Name:<span class="req_star">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row custom_form_group">
                                                <label class="col-sm-3 control-label">Phone:</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row custom_form_group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">Username:<span class="req_star">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                                    @if ($errors->has('username'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row custom_form_group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">Email:<span class="req_star">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row custom_form_group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">Password:<span class="req_star">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control" name="password" value="">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row custom_form_group">
                                                <label class="col-sm-3 control-label">Confirm-Password:<span class="req_star">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control" name="password_confirmation" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row custom_form_group">
                                                <label class="col-sm-3 control-label">Photo:</label>
                                                <div class="col-sm-7">
                                                    <div class="input-group">
                                                        <input type="file" id="input-file-now-custom-1" class="dropify"/>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer card_footer_button text-center">
                                            <button type="submit" class="btn custom-btn btn-outline-success waves-effect">REGISTRATION</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- delete modal --}}

            <div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card mb-0">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h3 class="card-title card_top_title"><i class="mdi text-danger mdi-delete"></i> Delete</h3>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="#" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-th"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="card-body card_form text-danger">
                                            <input type="hidden" id="delete-id" value="" name="id">
                                            <h4>Confirm!! Do you want to delete?</h4>
                                        </div>
                                        <div class="card-footer card_footer_button text-center">
                                            <button type="submit" class="btn custom-btn btn-outline-danger waves-effect">Delete</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
