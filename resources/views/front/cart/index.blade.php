@extends('front.layout.app')

@section('content')
    <style>
        input {
            text-align: center;
        }
        .quantity{
            width: 80px;
        }
        .removeItem{
            margin-top: 10px;
        }
        .fa fa-trash{
            color:red !important;
        }
    </style>
        <a href="#">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($cartCollection->count() > 0)

                <h2>{{ $cartCollection->count() }} item(s) in Shopping Cart</h2>

                <div class="cart-table">
                    @foreach (Cart::content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->product_image) }}" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->product_name }}</a></div>
                                    <div class="cart-table-description">
                                        @if(!empty($item->options))
                                        <ul>
                                            @foreach($item->options as $oindex=>$option)
                                                @if($oindex !== 'options_id')
                                                    <li><strong>{{ $oindex }}</strong>: {{$option}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">

                                <div>
{{--                                    <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->product_qty }}">--}}
{{--                                        @for ($i = 1; $i < 5 + 1 ; $i++)--}}
{{--                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>--}}
{{--                                        @endfor--}}
{{--                                    </select>--}}
                                    <input type="number" class="quantity" value="{{$item->qty}}" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->product_qty }}">
                                </div>
                                <div>{{ presentPrice($item->total()) }}</div>
                            </div>
                            <div class="cart-table-actions">
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="removeItem">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="cart-options"><i class="fa fa-trash" style="color:red "></i></button>
                                </form>

                                {{--                                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">--}}
                                {{--                                        {{ csrf_field() }}--}}

                                {{--                                        <button type="submit" class="cart-options">Save for Later</button>--}}
                                {{--                                    </form>--}}
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endforeach

                </div> <!-- end cart-table -->

                <div class="cart-totals">
                    <div class="cart-totals-left">
                        Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                    </div>

                    <div class="cart-totals-right">
                        <div>
                            Subtotal <br>
                            @if (session()->has('coupon'))
                                Code ({{ session()->get('coupon')['name'] }})
                                <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" style="font-size:14px;">Remove</button>
                                </form>x
                                <hr>
                                New Subtotal <br>
                            @endif
                            <span class="cart-totals-total">Total</span>
                        </div>
                        <div class="cart-totals-subtotal">
                            {{ presentPrice(Cart::subtotal()) }} <br>
                            {{ presentPrice(Cart::total()) }}
                        </div>
                    </div>
                </div> <!-- end cart-totals -->

                <div class="cart-buttons">
                    <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" class="button-primary">Proceed to Checkout</a>
                </div>

            @else
                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>
            @endif

        </div>

    </div> <!-- end cart-section -->
@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            $(".quantity").on('change', function (){
                const id = $(this).data('id');
                const productQuantity = $(this).attr('data-productQuantity');
                console.log(productQuantity)
                $.ajax({
                    url: `cart/update/${id}`,
                    type: 'PATCH',
                    data: {
                        quantity: $(this).val(),
                        productQuantity: productQuantity,
                        "_token": $("meta[name='csrf-token']").attr('content')
                    },
                    success: function (){
                        window.location.href = '{{ route('cart.index') }}';
                    },
                    error: function (){
                        window.location.href = '{{ route('cart.index') }}'
                    }
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
