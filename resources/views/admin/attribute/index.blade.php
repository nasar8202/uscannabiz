@extends('admin.layouts.app')
@section('title', 'Attributes')
@section('page_css')

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .addBtn {
            float: right;
            /*margin-top: 10px;*/
        }

        td {
            text-align: center;
        }

        .tree li {
            list-style-type: none;
            margin: 0;
            padding: 10px 5px 0 5px;
            position: relative
        }

        .tree li::before,
        .tree li::after {
            content: '';
            left: -20px;
            position: absolute;
            right: auto
        }

        .tree li::before {
            border-left: 1px solid #999;
            bottom: 50px;
            height: 100%;
            top: 0;
            width: 1px
        }

        .tree li::after {
            border-top: 1px solid #999;
            height: 20px;
            top: 25px;
            width: 25px
        }

        .tree li span {
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border: 1px solid #999;
            border-radius: 5px;
            display: inline-block;
            padding: 3px 8px;
            text-decoration: none
        }

        .tree li.parent_li>span {
            cursor: pointer
        }

        .tree>ul>li::before,
        .tree>ul>li::after {
            border: 0
        }

        .tree li:last-child::before {
            height: 30px
        }

        .tree li.parent_li>span:hover,
        .tree li.parent_li>span:hover+ul li span {
            background: #eee;
            border: 1px solid #94a0b4;
            color: #000
        }

    </style>

@endsection
@section('section')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attributes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Attributes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary pull-right addBtn" href="javascript:void(0)">Add Attribute Group</a>
                            </div>
                            <div class="card-body" id="reload">
                                <div class="tree ">
                                    <ul>
                                        @forelse($attributes as $data)
                                            <li>
                                                @if ($data)
                                                    <span>
                                                        {{-- <img src="/uploads/images/categories/{{$data->photo}}" height="50" width="50" /> --}}
                                                        {{ $data->attribute_group ?? '' }}
                                                    </span>

                                                    <a title="Add Attribute" class="btn btn-sm btn-primary btnAddSub" href="javascript:void(0)"
                                                        data-id="{{ $data->id ?? '' }}">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a title="Edit Attribute Group" class="btn btn-sm btn-warning btnEdit" href="javascript:void(0)"
                                                        data-id="{{ $data->id ?? '' }}" data-type="parent" data-name="{{ $data->attribute_group ?? '' }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a title="Delete Attribute Group" class="btn btn-sm btn-danger btnDelete" href="javascript:void(0)"
                                                        id="{{ $data->id }}" data-type="parent">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                                <ul>
                                                    @if ($data->attributes)
                                                        @foreach ($data->attributes as $child)
                                                            <li>
                                                                <span>
                                                                    {{-- <img src="/uploads/images/categories/{{$child->photo}}" height="50" width="50" /> --}}
                                                                    {{ $child->attribute_name ?? '' }}
                                                                </span>
                                                                <a title="Edit Attribute" class="btn btn-sm btn-warning btnEdit2"
                                                                    href="javascript:(void)"
                                                                    data-id="{{ $child->id ?? '' }}" data-type="child" data-name="{{ $child->attribute_name ?? '' }}" data-parentid="{{ $child->attribute_group_id ?? '' }}" data-parentname="{{ $data->attribute_group ?? '' }}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a title="Delete Attribute" class="btn btn-sm btn-danger btnDelete" href="javascript:void(0)"
                                                                    id="{{ $child->id }}" data-type="child">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endif

                                                </ul>
                                            </li>
                                        @empty
                                            <li>Record Not Found</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #343a40;
                    color: #fff;">
                        <h2 class="modal-title">Confirmation</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin: 0;">Are you sure you want to delete this ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="ok_delete" name="ok_delete" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Attribute Group Add Modal --}}
        <div id="addModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #343a40;
                    color: #fff;">
                        <h2 class="modal-title">Attribute Group</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="attribute-group-form" method="post" action="{{ route('attribute.addAttributeGroup') }}"
                        enctype="multipart/form-data">
                        <div class="modal-body">

                            @csrf
                            <div class="card-body">
                                @if (Session::has('msg'))
                                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                                @endif
                                <label for="name">Attribute Group</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name[]" id="name" value=""
                                                placeholder="Attribute Group Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">

                            </div>
                        </div>
                        <div class="modal-footer"><button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{-- Attribute Group Edit Modal --}}
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #343a40;
                    color: #fff;">
                        <h2 class="modal-title">Edit Attribute Group</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="attribute-group-form" method="" action="#">
                        <div class="modal-body">

                            @csrf
                            <div class="card-body">
                                @if (Session::has('msg'))
                                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                                @endif
                                <label for="name">Attribute Group</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name[]" id="parentName" value=""
                                                placeholder="Attribute Group Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col ml-2">
                                        <label for="" class="mr-4">Status</label>
                                        <label class="switch">
                                            <input type="checkbox" name="status" id="parentStatus" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">

                            </div>
                        </div>
                        <div class="modal-footer"><button id="editParent" type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{-- Attribute Add Modal --}}
        <div id="addModal2" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #343a40;
                    color: #fff;">
                        <h2 class="modal-title">Add Attribute</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="attribute-group-form" method="" action="#">
                        <div class="modal-body">

                            @csrf
                            <div class="card-body">
                                @if (Session::has('msg'))
                                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                                @endif
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Attribute Name</label>
                                            <input type="text" class="form-control" name="name[]" id="addChildName" value=""
                                                placeholder="Attribute Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">

                            </div>
                        </div>
                        <div class="modal-footer"><button id="addChild" type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{-- Attribute Edit Modal --}}
        <div id="editModal2" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #343a40;
                    color: #fff;">
                        <h2 class="modal-title">Edit Attribute</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="attribute-group-form" method="" action="#">
                        <div class="modal-body">

                            @csrf
                            <div class="card-body">
                                @if (Session::has('msg'))
                                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                                @endif
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name">Select Attribute Group</label>
                                        <select id="attr_group" name="attr-group" class="form-control" required>
                                            <option id="childParentOption" value="" selected></option>
                                            @forelse($attributes as $data)
                                                <option value="{{$data->id}}">{{$data->attribute_group}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Attribute Name</label>
                                            <input type="text" class="form-control" name="name[]" id="childName" value=""
                                                placeholder="Attribute Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col ml-2">
                                        <label for="" class="mr-4">Status</label>
                                        <label class="switch">
                                            <input type="checkbox" name="status" id="childStatus" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">

                            </div>
                        </div>
                        <div class="modal-footer"><button id="editChild" type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        var delete_id;
        var delete_type;
        var parentName;
        var parentId;
        var parentType;
        var childParentId;
        var childParentName;
        var childName;
        var childId;
        var childType;

        $(function() {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function(e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign')
                        .removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign')
                        .removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
        });

        $(document, this).on('click', '.addBtn', function() {
            $('#addModal').modal('show');
        });

        $(document, this).on('click', '.btnAddSub', function() {
            parentId = $(this).data('id');
            $('#addModal2').modal('show');
        });

        $(document, this).on('click', '.btnEdit', function() {
            parentName = $(this).data('name');
            parentId = $(this).data('id');
            parentType = $(this).data('type');
            $('#editModal').modal('show');
            $('#parentName').val(parentName);
        });

        $(document, this).on('click', '.btnEdit2', function() {
            childName = $(this).data('name');
            childId = $(this).data('id');
            childType = $(this).data('type');
            childParentId = $(this).data('parentid');
            childParentName = $(this).data('parentname');
            $('#editModal2').modal('show');
            $('#childName').val(childName);
            $('#childParentOption').val(childParentId);
            $('#childParentOption').text(childParentName);
        });

        $(document).on('click', '#editParent', function() {
            var editGroupAttrName = $('#parentName').val();
            var editGroupAttrStatus = $('#parentStatus:checked').val();

            if(editGroupAttrStatus == null){
                editGroupAttrStatus = 0;
            }else{
                editGroupAttrStatus = 1;
            }

            $.ajax({
                url: "{{ url('admin/catalog/edit-attributes') }}/" + parentType +"/"+ parentId,
                type: 'post',
                data: {
                    id: parentId,
                    type: parentType,
                    name: editGroupAttrName,
                    status: editGroupAttrStatus
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#editModal').modal('hide');
                    toastr.success('Attribute Group Edited Successfully');
                }
            })
        });

        $(document).on('click', '#addChild', function() {
            var addAttrName = $('#addChildName').val();

            $.ajax({
                url: "{{ url('admin/catalog/addAttributes') }}",
                type: 'post',
                data: {
                    id: parentId,
                    name: addAttrName
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#addModal2').modal('hide');
                    toastr.success('Attribute Added Successfully');
                }
            })
        });

        $(document).on('click', '#editChild', function() {
            var editAttrName = $('#childName').val();
            var editAttrStatus = $('#childStatus:checked').val();
            var editAttrParentId = $('#attr_group').val();
            var editAttrParentName = $('#attr_group :selected').text();

            if(editAttrStatus == null){
                editAttrStatus = 0;
            }else{
                editAttrStatus = 1;
            }

            $.ajax({
                url: "{{ url('admin/catalog/edit-attributes') }}/" + childType +"/"+ childId,
                type: 'post',
                data: {
                    id: childId,
                    type: childType,
                    name: editAttrName,
                    parentId: editAttrParentId,
                    parentName: editAttrParentName,
                    status: editAttrStatus
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#editModal2').modal('hide');
                    toastr.success('Attribute Edited Successfully');
                }
            })
        });

        $(document, this).on('click', '.btnDelete', function() {
            delete_id = $(this).attr('id');
            delete_type = $(this).data('type');
            $('#confirmModal').modal('show');
        });

        $(document).on('click', '#ok_delete', function() {
            $.ajax({
                url: "{{ url('admin/catalog/destroy-attributes') }}/" + delete_type +"/"+ delete_id,
                type: 'delete',
                data: {
                    id: delete_id,
                    type: delete_type
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $('#ok_delete').text('Deleting...');
                    $('#ok_delete').attr("disabled", true);
                },
                success: function(data) {
                    $('#ok_delete').text('Delete');
                    $('#ok_delete').attr("disabled", false);
                    $('#confirmModal').modal('hide');
                    //   js_success(data);
                    if (data == 1) {
                        toastr.success('Record Deleted Successfully');
                        $("#reload").load(window.location.href + " #reload");
                    } else {
                        toastr.error('Exception Here! Something went wrong');
                    }
                }
            })
        });

        
    </script>


@endsection
