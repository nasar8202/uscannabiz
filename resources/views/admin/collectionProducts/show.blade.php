@extends('admin.layouts.app')
@section('title', 'Collection Products Details')
@section('page_css')
    <style>
        th{
            background-color: #f7f7f7;
        }
    </style>
@endsection
@section('section')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Collection Products Detail</li>
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
                                <h3 class="card-title">Collection Products Detail</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 20%">ID</th>
                                        <td colspan="2">{{$collectionProduct->id ??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$collectionProduct->collections->name ??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Products</th>
                                        <td>
                                            @foreach($collectionSelectedProducts as $collectionSelectedProduct)
                                                    <a style="text-transform: capitalize" href="{{url('admin/product').'/'.$collectionSelectedProduct->product_id}}" target="_blank">
                                                        {{$collectionSelectedProduct->products->product_name}}
                                                    </a>
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>

                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
