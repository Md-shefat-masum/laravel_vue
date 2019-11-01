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
                                        <a href="#" data-toggle="modal" data-target=".add-modal"  class="btn btn-md btn-outline-success waves-effect custom-btn card_top_button"><i class="fa fa-plus-circle"></i> Add User</a>
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
                                                        <th>Email</th>
                                                        <th>User Role</th>
                                                        <th>Photo</th>
                                                        <th>control</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all as $item)
                                                        <tr>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->rolename->role_name}}</td>
                                                            <td><img width="80px" src="{{asset('').$item->photo}}" alt=""></td>
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
                                                                @if ($item->status == 0)
                                                                    <a class="text-info ml-1" title="active" href="#"><i class="ti ti-control-pause"></i></a>
                                                                @else
                                                                    <a class="text-blue ml-1" title="deactive" href="#"><i class="ti ti-control-play"></i></a>
                                                                @endif
                                                                <a class="text-success ml-1" title="view" href="#"><i class="ti ti-zoom-in"></i></a>
                                                                <a class="text-warning ml-1" title="edit" href="#"><i class="ti ti-pencil-alt"></i></a>
                                                                <a class="text-danger" title="delete" href="#"><i class="ti ti-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                                <form class="form-horizontal" novalidate method="POST" action="{{route('user_add')}}" enctype="multipart/form-data">
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
                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>Name</label>
                                                </div>
                                                <div class='input-group'>
                                                    <div class='input-group-addon'><i class='ti ti-user'></i></div>
                                                    <input name='name' value='' required data-validation-required-message="This field is required" class='form-control text-lower' id='exampleInputuname' placeholder='name'>
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>email</label>
                                                </div>
                                                <div class='input-group'>
                                                    <div class='input-group-addon'><i class='ti ti-envelope'></i></div>
                                                    <input name='email' type="email" value='' required data-validation-required-message="This field is required" class='form-control text-lower' id='exampleInputuname' placeholder='email'>
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>user role</label>
                                                </div>
                                                <div class='input-group'>
                                                    <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                    {{-- <input name='name' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'> --}}
                                                    <select name="user_role" id="" class='form-control text-lower' required data-validation-required-message="This field is required">
                                                        <option value="">select role</option>
                                                        @php
                                                            $select=App\user_role::where('status',1)->get();
                                                        @endphp
                                                        @foreach ($select as $item)
                                                            <option value="{{$item->role_serial}}">{{$item->role_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>password</label>
                                                </div>
                                                    <div class="controls">
                                                        <input type="password" name='password' required data-validation-required-message="This field is required" value='' class='form-control text-lower' id='exampleInputuname' placeholder='password'>
                                                    </div>
                                            </div>
                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>retype password</label>
                                                </div>
                                                    <div class="controls">
                                                        <input name='repass' type="password" value=''required data-validation-match-match="password" class='form-control text-lower' id='exampleInputuname' placeholder='re type password'>
                                                    </div>
                                            </div>

                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>Add Photo</label>
                                                </div>
                                                <div class='input-group'>
                                                    <div class='input-group-addon'><i class='ti ti-gallery'></i></div>
                                                    <input type="file" name='photo' required data-validation-required-message="This field is required" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
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

@endsection

