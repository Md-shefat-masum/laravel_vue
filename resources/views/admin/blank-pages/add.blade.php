@extends('layouts.admin')
@section('contents')
@push('css_plugin')
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/plugins/dropify/dist/css/dropify.min.css">
@endpush
@push('js_plugin')
    <script src="{{asset('contents/admin')}}/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endpush
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
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> User Registration</h3>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a href="#" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-th"></i> All User</a>
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

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
