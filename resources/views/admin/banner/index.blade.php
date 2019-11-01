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
                    <h3 class="text-themecolor">banner section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">banner</li>
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
                @if(Session::has('success'))
                    <script>
                            swal({title: "Success!", text: "Successfully done !", icon: "success",timer:5000});
                    </script>
                @endif

                <div class="row">
                    <div class='col-md-6 m-auto' style="">
                        <div class='card'>
                            <div class='card-body'>
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('add_banner')}}">
                                    @csrf
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>banner heading</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='heading' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>banner subheading</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='subheading' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>button name</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='button_name' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>button link</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='button_url' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>banner image</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='banner_img' type="file" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add new Role</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- all banner --}}

                <div class="card card-default">
                        <div class="card-header">
                            <div class="card-actions">
                                <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                                {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                            </div>
                            <h4 class="card-title m-b-0">All active POSTS</h4>
                        </div>
                        <div class="card-body collapse show">
                            <div class="" style="width:100%;overflow-x:scroll;">
                                <table id="category_active" class="table product-overview text-center" >
                                    <thead class="sticky-top">
                                        <tr>
                                            <th>Serial</th>
                                            <th>Heading</th>
                                            <th>Subheading</th>
                                            <th>Button Name</th>
                                            <th>Button Link</th>
                                            <th>Banner image</th>
                                            <th>Created at</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $select=App\banner::where('status',1)->get();
                                            $i=1;
                                        @endphp
                                        @foreach ($select as $select)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{str_limit($select->heading)}}</td>
                                                <td>{{$select->subheading}}</td>
                                                <td>{{$select->button_name}}</td>
                                                <td>{{$select->button_url}}</td>
                                                <td><img style="width: 200px; height:120px;" src="{{asset('')}}{{$select->banner_img}}" alt="banner image"></td>
                                                <td>{{date('h:i:s a m/d/Y', strtotime($select->created_at))}}</td>
                                                <td>
                                                    @php $j=$select->status; if($j==1)echo'<span class="label label-success font-weight-100">active</span>';@endphp
                                                    @php $j=$select->status; if($j==0)echo'<span class="label label-danger font-weight-100">not active</span>';@endphp
                                                </td>
                                                <td>
                                                    <a href="" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="view post">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a href="" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a href="" onclick="return confirm('deactive Post!!')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <script type="text/javascript">
                                    document.addEventListener("DOMContentLoaded", function() {
                                        app._loading.show($("#dt-ext-responsive"), {
                                            spinner: true
                                        });
                                        $("#dt-example-responsive").DataTable({
                                            "responsive": false,
                                            "initComplete": function(settings, json) {
                                                setTimeout(function() {
                                                    app._loading.hide($("#dt-ext-responsive"));
                                                }, 1000);
                                            }
                                        });
                                    });

                                </script>
                            </div>
                        </div>
                    </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
