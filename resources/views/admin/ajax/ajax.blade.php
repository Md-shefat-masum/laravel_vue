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
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Banner Information</h3>
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
                                            <table id="table" class="table table-main table-bordered custom-table  mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>title</th>
                                                        <th>sub title</th>
                                                        <th>status</th>
                                                        <th>photo</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all as $item)
                                                        <tr id="del_row{{$item->id}}">
                                                            <td id="title{{$item->id}}">{{$item->title}}</td>
                                                            <td id="sub_title{{$item->id}}">{{$item->sub_title}}</td>
                                                            <td id="status{{$item->id}}">{{$item->status}}</td>
                                                            <td>
                                                                @if ($item->image != '')
                                                                    <img class="table_image_40" style="height:40px" src="{{asset('').$item->image}}" alt=""/>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="text-success ml-1 view-btn" data-server="{{url('')}}" data-view_url="/admin/ajax/view/" data-action="{{route('ajax_index_view',$item->id)}}" data-method="GET" data-id="{{$item->id}}" data-toggle="modal" data-target=".view-modal" title="view" href="#"><i class="ti ti-zoom-in"></i></a>
                                                                <a class="text-warning ml-1 edit-btn" data-action="{{route('ajax_index_view',$item->id)}}" data-method="GET" data-id="{{$item->id}}" data-toggle="modal" data-target=".edit-modal" title="edit" href="#"><i class="ti ti-pencil-alt"></i></a>
                                                                <a class="text-danger  delete-btn" title="delete" data-id="{{$item->id}}" data-toggle="modal" data-target=".delete-modal" href="#"><i class="ti ti-trash"></i></a>
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
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="card-title card_top_title"><i class="mdi mdi-pencil-box text-success"></i>Add New Banner</h3>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <a href="#" data-dismiss="modal" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-th"></i></a>
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
                                        <form class="form-horizontal" id="add_form" method="post" action="{{route('ajax_index_add')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row custom_form_group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">title:<span class="req_star"></span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                                    @if ($errors->has('title'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row custom_form_group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">Sub title:<span class="req_star"></span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="sub_title" value="{{old('sub_title')}}">
                                                    @if ($errors->has('sub_title'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('sub_title') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row custom_form_group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                <label class="col-sm-3 control-label">status:<span class="req_star"></span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="status" value="{{old('status')}}">
                                                    @if ($errors->has('status'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row custom_form_group">
                                                <label class="col-sm-3 control-label">Banner Image:</label>
                                                <div class="col-sm-7">
                                                    <div class="input-group">
                                                        <input type="file" name="image" id="input-file-now-custom-1" class="dropify"/>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer card_footer_button text-center">
                                        <button type="button" id="add_submit" class="btn custom-btn btn-outline-success waves-effect">Add Banner</a>
                                    </div>
                                </div>
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
                                <form class="form-horizontal" id="delete-form" method="post" action="{{route('ajax_index_delete')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card mb-0">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h3 class="card-title card_top_title"><i class="mdi text-danger mdi-delete"></i> Delete</h3>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="#" data-dismiss="modal" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="card-body card_form text-danger">
                                            <input type="hidden" id="delete-id" value="" name="id">
                                            <h6>Confirm!! Do you want to delete?</h6>
                                        </div>
                                        <div class="card-footer card_footer_button text-center">
                                            <button type="button" id="delete-btn" class="btn custom-btn btn-outline-danger waves-effect">Delete</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- view modal --}}

            <div class="modal fade view-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="card-title card_top_title"><i class="mdi text-success mdi-dice-5"></i> Veiw Information</h3>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <a href="#" data-dismiss="modal" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-close"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="card-body card_form text-center">
                                        <table class="table w-100 overflow-hidden table-striped table-bordered table-hover custom-table" id="view-result">

                                        </table>
                                        <img src="" data-server="{{asset('')}}" id="banner-img" alt="">
                                    </div>
                                    <div class="card-footer card_footer_button text-center">
                                        <button type="submit" class="btn d-none custom-btn btn-outline-danger waves-effect">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- edit modal --}}

            <div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="card-title card_top_title"><i class="fa fa-pencil-square"></i> Edit Information</h3>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <a href="#" data-dismiss="modal" class="btn btn-md btn-outline-success waves-effect card_top_button"><i class="fa fa-close"></i></a>
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
                                        <form class="form-horizontal edit-form" id="update_form" method="post" action="{{route('ajax_index_update')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row custom_form_group">
                                                <label class="col-sm-3 control-label">Banner Image:</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <input type="file" name="image" id="input-file-now-custom-1" class="dropify"/>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="col-sm-3 text-center">
                                                    <img src="" style="height: 200px;" id="update_img" data-server="{{asset('')}}" alt="">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer card_footer_button text-center">
                                        <button type="button" id="update_submit" class="btn custom-btn btn-outline-success waves-effect">Update Banner</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('admin.ajax.ajax_code') --}}
@endsection
