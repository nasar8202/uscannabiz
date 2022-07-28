@extends('admin.layouts.app')
@section('title', 'Order Details')
@section('page_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('section')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                @if($order->order_status != 'completed')
                                <div class="col-md-5 float-right">
                                    <label for="">Order Status</label>
                                    <select name="order_status" id="order_status" class="form-control" data-order_id="{{$order->id}}">
                                        <option value="pending" @if($order->order_status == 'pending') selected @endif>Pending</option>
                                        <option value="shipped" @if($order->order_status == 'shipped') selected @endif>Shipped</option>
                                        <option value="completed" @if($order->order_status == 'completed') selected @endif>Completed</option>
                                        <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>Cancelled</option>
                                    </select>

                                </div>
                                @else
                                    Completed
                                @endif
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-center"><i class="fa fa-shopping-cart"></i> Order Details</h3>
                                        </div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 2%;">
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Date Added"><i class="fa fa-info-circle fa-fw"></i> </button>
                                                </td>
                                                <td>#{{$order->order_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Date Added"><i class="fa fa-calendar fa-fw"></i></button>
                                                </td>
                                                <td>{{date('d-M-Y',strtotime($order->created_at))}}</td>
                                            </tr>
                                            <tr>
                                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Shipping Method"><i class="fa fa-truck fa-fw"></i></button></td>
                                                <td>Flat Shipping Rate</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-center"><i class="fa fa-user"></i> Customer Details</h3>
                                        </div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 1%;">
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Customer"><i class="fa fa-user fa-fw"></i></button>
                                                </td>
                                                <td>
                                                    {{-- @if($order->customer_id == null) --}}
                                                        {{$order->customer_name}}
                                                    {{-- @else
                                                        {{$order->customer->first_name.''.$order->customer->last_name}}
                                                    @endif --}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="E-Mail"><i class="fa fa-envelope-o fa-fw"></i></button></td>
                                                <td>
                                                    {{-- @if($order->customer_id == null) --}}
                                                        <a href="mailto:{{$order->customer_email}}">{{$order->customer_email}}</a>
                                                    {{-- @else
                                                        <a href="mailto:{{$order->customer->user->email}}">{{$order->customer->user->email}}</a>
                                                    @endif --}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Telephone"><i class="fa fa-phone fa-fw"></i></button></td>
                                                <td>
                                                    {{-- @if($order->customer_id == null) --}}
                                                        {{$order->phone_no}}
                                                    {{-- @else
                                                        {{$order->customer->phone_no}}
                                                    @endif --}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td style="width: 50%;font-weight: bold" class="text-left">Payment Address</td>
                                            <td style="width: 50%;;font-weight: bold" class="text-left">Shipping Address</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-left">
                                                <strong>Address</strong> : {{$order->billing_address}}
                                                <br>
                                                <strong>City</strong> : {{$order->billing_city}}
                                                <br>
                                                <strong>State</strong> : {{$order->billing_state}}
                                                <br>
                                                <strong>Country</strong> : {{$order->billing_country}}
                                                <br>
                                            </td>
                                            <td class="text-left">
                                                <strong>Address</strong> : {{$order->address}}
                                                <br>
                                                <strong>City</strong> : {{$order->shipping_city}}
                                                <br>
                                                <strong>State</strong> : {{$order->shipping_state}}
                                                <br>
                                                <strong>Country</strong> : {{$order->shipping_country}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center"> Order Item Details</h3>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Item</th>
                                            <th class="right">Unit Cost</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total</th>
                                            @if(isset($order->broker_price))
                                            <th class="right">Broker Comission</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $counter = 1;
                                            $subTotal = 0;
                                        @endphp
                                        @forelse($order->orderItems as $orderItems)
                                            <tr>
                                                <td class="center">{{$counter++}}</td>
                                                <td class="left strong">
                                                    <a href="{{URL::to('/').'/shop/'.$orderItems->product->slug}}" target="_blank">
                                                        {{$orderItems->product->product_name}}
                                                    </a><br>
                                                   @if($orderItems->orderOptions!==null)
                                                    @forelse($orderItems->orderOptions as $option)
                                                        <p style="margin-bottom: 0 !important;"><b>{{ $option->optionValue['option']['option_name']}}</b> : {{ $option->optionValue['option_value']}}</p>
                                                    @empty
                                                    @endforelse
                                                    @endif
                                                </td>
                                                <td class="right">${{$orderItems->product_per_price}}</td>
                                                <td class="center">{{$orderItems->product_qty}}</td>
                                                
                                                <td class="right">${{$orderItems->product_per_price*$orderItems->product_qty}}</td>
                                                @if(isset($order->broker_price))
                                                <td class="right">${{$order->broker_price}}</td>
                                                @endif
                                            </tr>
                                            @php
                                                $subTotal += $orderItems->product_per_price;
                                            @endphp
                                        @empty

                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5">
                                    </div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>

                                            <tr>
                                                <td class="left">
                                                    <strong>Subtotal</strong>
                                                </td>
                                                <td class="right">${{$order->sub_total}}</td>
                                            </tr>
                                            @if($order->discount > 0)
                                                <tr>
                                                    <td class="left">
                                                        <strong>Discount</strong>
                                                    </td>
                                                    <td class="right">${{$order->discount}}</td>
                                                </tr>
                                            @endif
 

                                            <tr>
                                                <td class="left">
                                                    <strong>Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong>${{$orderItems->product_subtotal_price+$order->broker_price}}</strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('change','#order_status',function(){
            let id = $(this).data('order_id');
            let val = $(this).val();

            $.ajax({
                type:"get",
                url:`{{url('admin/'.request()->segment(2).'/changeOrderStatus')}}/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    val:val
                },
                success: function (data) {
                    if(data==0) {
                        toastr.error('Exception Here !');
                    }else{
                        toastr.success('Record Status Updated Successfully');
                    }
                }
            })
        });
    </script>
@endsection
