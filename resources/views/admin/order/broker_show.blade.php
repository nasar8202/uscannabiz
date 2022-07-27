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
                            {{-- <div class="row">

                                <div class="col-md-5 float-right">
                                    <label for="">Order Status</label>
                                    <select name="order_status" id="order_status" class="form-control" data-order_id="{{$order->id}}">
                                        <option value="pending" @if($order->order_status == 'pending') selected @endif>Pending</option>
                                        <option value="shipped" @if($order->order_status == 'shipped') selected @endif>Shipped</option>
                                        <option value="completed" @if($order->order_status == 'completed') selected @endif>Completed</option>
                                        <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>Cancelled</option>
                                    </select>

                                </div>
                            </div> --}}

                        </div>
                        <form method="post" @if(isset($order)) action="{{route('submit-request-update')}}" @else action="{{route('submit-request')}}"  @endif>
                            @csrf
                            @if(isset($order))
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            @endif
                            <input type="hidden" name="customer_id" value="{{$vender_request->customer_id}}">
                            <input type="hidden" name="customer_name" value="{{$vender_request->full_name}}">
                            <input type="hidden" name="phone_no" value="{{$vender_request->phone_num}}">
                            <input type="hidden" name="customer_email" value="{{$vender_request->email}}">
                            <input type="hidden" name="shipping_address" value="{{$vender_request->address}}">

                            <input type="hidden" name="vendor_id" value="{{$vender_request->vendor_id}}">
                            <input type="hidden" name="shipping_city" value="{{$vender_request->city}}">
                            <input type="hidden" name="quantity" value="{{$vender_request->quantity}}">
                            <input type="hidden" name="vendor_req_id" value="{{$vender_request->id}}">

                            <input type="hidden" name="total_amount" value="{{$product->product_current_price}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-12">
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
                                </div> --}}
                                @if(isset($order))
                                <div class="col-md-5 float-right">
                                    <label for="">Order Status</label>
                                    <select name="order_status" id="order_status" class="form-control" data-order_id="{{$order->id}}">
                                        <option value="pending" @if($order->order_status == 'pending') selected @endif>Pending</option>
                                        <option value="shipped" @if($order->order_status == 'shipped') selected @endif>Shipped</option>
                                        <option value="completed" @if($order->order_status == 'completed') selected @endif>Completed</option>
                                        <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>Cancelled</option>
                                    </select>

                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-center"><i class="fa fa-user"></i> Vendor Details</h3>
                                        </div>
                                        <table class="table table-bordered">

                                            <tbody>
                                            <tr>
                                                <td style="width: 1%;">
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Customer"><i class="fa fa-user fa-fw"></i></button>
                                                </td>
                                                <td>
                                                    {{-- @if($order->customer_id == null) --}}
                                                    <input type="hidden" name="vender_name" value="{{$vender_detail->name}}"> {{$vender_detail->name}}
                                                    {{-- @else
                                                        {{$order->customer->first_name.''.$order->customer->last_name}}
                                                    @endif --}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="E-Mail"><i class="fa fa-envelope-o fa-fw"></i></button></td>
                                                <td>
                                                    {{-- @if($order->customer_id == null) --}}
                                                    <input type="hidden" name="vender_email" value="{{$vender_detail->email}}">
                                                        <a href="mailto:{{$vender_detail->email}}">{{$vender_detail->email}}</a>
                                                    {{-- @else
                                                        <a href="mailto:{{$order->customer->user->email}}">{{$order->customer->user->email}}</a>
                                                    @endif --}}

                                                </td>
                                            </tr>

                                            <input type="hidden" name="vendor_request_id" value="{{$vender_request->id}}">

                                            {{-- <tr>
                                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Telephone"><i class="fa fa-phone fa-fw"></i></button></td>
                                                <td>
                                                    @if($order->customer_id == null)
                                                        {{$order->phone_no}}
                                                    @else
                                                        {{$order->customer->phone_no}}
                                                    @endif
                                                </td>
                                            </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-center"><i class="fa fa-shopping-cart"></i> Order Details</h3>
                                    </div>
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
                                                <strong>Address</strong> : {{$vender_request->address}}
                                                <br>
                                                <strong>City</strong> :  {{$vender_request->city}}
                                            </td>
                                            <td class="text-left">
                                                <strong>Address</strong> : {{$vender_request->address}}
                                                <br>
                                                <strong>City</strong>  : {{$vender_request->city}}
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
                                            <th class="center">Image</th>
                                            <th>Item</th>
                                            {{-- <th class="right">Unit Cost</th> --}}
                                            <th class="right">Unit Cost</th>
                                            <th class="right">Quantity</th>
                                            <th class="right">Total</th>
                                            @if(isset($order))
                                            <th class="right">Broker Commission</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $counter = 1;
                                            // $subTotal = 0;
                                        @endphp
                                        {{-- @forelse($order->orderItems as $orderItems) --}}
                                            <tr>
                                                <td class="center">{{$counter++}}</td>
                                                <td class="center">
                                                    <img src="{{asset('uploads/products/'.$product->product_image)}}" width="50" height="50" alt="">
                                                </td>
                                                <td class="left strong">
                                                    <input type="hidden" name="" value="{{$product->product_name}}">
                                                    {{$product->product_name}}
                                                    {{-- <a href="{{URL::to('/').'/shop/'.$orderItems->product->slug}}" target="_blank">
                                                        {{$orderItems->product->product_name}}
                                                    </a><br>
                                                   @if($orderItems->orderOptions!==null)
                                                    @forelse($orderItems->orderOptions as $option)
                                                        <p style="margin-bottom: 0 !important;"><b>{{ $option->optionValue['option']['option_name']}}</b> : {{ $option->optionValue['option_value']}}</p>
                                                    @empty
                                                    @endforelse
                                                    @endif --}}
                                                </td>
                                                <td class="right">${{$product->product_current_price}}</td>
                                                <td class="right">{{$vender_request->quantity}}</td>
                                                @php
                                                $total_price = $vender_request->quantity*$product->product_current_price;
                                                @endphp
                                                <td class="right">${{$total_price}}</td>
                                                @if(isset($order))
                                                <td class="right">${{$order->broker_price}}</td>
                                                @endif
                                            </tr>
                                            {{-- @php
                                                $subTotal += $orderItems->product_per_price;
                                            @endphp
                                        @empty

                                        @endforelse --}}

                                        </tbody>
                                    </table>
                                    @if(isset($order) && $order->order_status == 'pending')
                                    {{-- @dd($order) --}}
                                    <div class="col-md-4">
                                    <label for="category">Broker Commission Price</label>
                                    <input type="text" class="form-control" name="broker_price" id="broker_price" @if(isset($order)) value="{{$order->broker_price}}" @endif placeholder="Amount" required >
                                    </div>
                                    @elseif(!isset($order))
                                    <div class="col-md-4">
                                    <label for="category">Broker Commission Price</label>
                                    <input type="text" class="form-control" name="broker_price" id="broker_price"  value="" placeholder="Amount" required >
                                    </div>
                                    @endif

                                <br>
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
                                                <td class="right">${{$product->product_current_price}}</td>
                                            </tr>
                                            @if($product->discount > 0)
                                                <tr>
                                                    <td class="left">
                                                        <strong>Discount</strong>
                                                    </td>
                                                    <td class="right">${{$product->discount}}</td>
                                                </tr>
                                            @endif

                                            

                                            <tr>
                                                <td class="left">
                                                    <strong>Total</strong>
                                                </td>
                                                <td class="right">${{$total_price}}</td>
                                                {{-- <td class="right">
                                                    <strong>${{$order->total_amount+$order->shipping_cost}}</strong>
                                                </td> --}}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($order) && $order->order_status == 'pending')
                        <button type="submit" class="float-right btn btn-primary">Update Request To Vendor</button>
                        @elseif(!isset($order))
                        <button type="submit" class="float-right btn btn-primary">Add Request To Vendor</button>
                        @endif
                    </form>
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
                    location.reload();
                }
            })
        });

</script>
@endsection
