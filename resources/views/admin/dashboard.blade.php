@extends('admin.layouts.app')
@section('section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @if (auth()->user()->role_id == 3)
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        Vender Dashboard
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$data['orders']}}</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('order.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$data['products']}}</h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('product.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$data['customers']}}</h3>
                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('customers.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
            </div>
            {{-- latest orders --}}
            <div class="row mt-4 mb-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i> &nbsp; <span
                                style="font-size:20px; font-weight: bold;">Latest Orders</span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($data['latestOrders'] as $latestOrders)
                                    <tr onclick="window.location='order/{{$latestOrders->id}}'; " style='cursor: pointer;'>
                                        <td> {{$latestOrders->order_no}} </td>
                                        <td> {{$latestOrders->customer->first_name}} </td>
                                        <td> {{ucfirst($latestOrders->order_status)}} </td>
                                        <td> {{date('d-M-Y',strtotime($latestOrders->created_at))}} </td>
                                        <td> ${{$latestOrders->total_amount}} </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"> Not Yet Latest Orders </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            {{-- latest orders end --}}

            {{-- latest Reviews --}}

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="nav-icon fa fa-comments"></i> &nbsp; <span
                                style="font-size:20px; font-weight: bold;">Latest Reviews</span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Ratings</th>
                                        <th>Date Added</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($data['latestReviews'] as $latestReviews)
                                    <tr onclick="window.location='review/{{$latestReviews->id}}'; " style='cursor: pointer;'>
                                        <td>  {{$latestReviews->product->product_name}}</td>
                                        <td> {{$latestReviews->customer->first_name??''}} </td>
                                        <td> {{$latestReviews->rating}} </td>
                                        <td> {{date('d-M-Y',strtotime($latestReviews->created_at))}} </td>

                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"> Not Yet Latest Reviews </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- latest orders end --}}
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    @endif
    <!-- /.content -->
</div>
@endsection
