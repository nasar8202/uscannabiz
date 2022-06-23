@extends('front.layout.app')

@section('title', $product->name)


@section('content')
<style>
        .btn_choose_sent_check_b{
            background: #EF2D56;
            color: #fff;
            box-shadow: 0 10px 20px rgba(125, 147, 178, .3);
            border: none;
            border-radius: 3px;
            font-size: 16px;
            line-height: 10px;
            padding:  16px 20px 16px 46px;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            margin-right: 30px;
            transition: all .3s;
            height: auto;
            cursor: pointer;
            position: relative;
            outline: none;
        }

        .descBox {
            padding: 4% 0;
            background-color: #ededee;
        }
        .userMain {
            margin: 3em 0 0.5em;
        }
        .userReview {
            display: flex;
            margin-bottom: 30px;
        }
        .reviewContent {
            padding-left: 15px;
        }
        .reviewForm {
            padding: 30px 0 0;
        }
        .star {
            color: #f7941d !important;
        }

        .reviewForm>div>span>i.hover{
            color: rgb(255, 192, 87) !important;
        }
        .userReview img {
            height: 70px;
            width: 70px;
            border-radius: 50px;
        }
        .reviewContent h5 {
            color: #747474;
            margin-bottom: 8px;
            font-size: 0.9333em;
            font-weight: 600;
        }
        .reviewContent h5 {
            color: #747474;
            margin-bottom: 8px;
            font-size: 0.9333em;
            font-weight: 600;
        }
        .userMain h2 {
            font-size: 1.6em;
            font-weight: 500;
            letter-spacing: 0.04em;
            color: #372644;
        }
        .reviewContent i {
            font-size: 14px;
        }
    </style>

        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><a href="{{ route('shop.index') }}">Shop</a></span>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{ $product->name }}</span>

    <div class="container">
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
    </div>

    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="{{ productImage($product->product_image) }}" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                @forelse($product->product_images as $product_image)
                    <div class="product-section-thumbnail selected">
                        <img src="{{ productImage(@$product_image->product_images) }}" alt="product">
                    </div>
                @empty
                    <div class="product-section-thumbnail selected">
                        <img src="{{ productImage(@$product->product_image->product_images) }}" alt="product" class="active" id="currentImage">
                    </div>
                @endforelse
            </div>
        </div>
        <form action="{{ url('cart/store', $product->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="product-section-information">
                <h1 class="product-section-title">{{ $product->product_name }}</h1>
                <div class="product-section-subtitle">{{ $product->details }}</div>
                <div>{!! $stockLevel !!}</div>
                <div class="product-section-price">$<span class="" id="price">{{ $product->product_current_price }}</span></div>
                <p>
                    @forelse($product->products_attributes as $products_attribute)
                        {{$products_attribute->attribute->attribute_name}} - {{$products_attribute->value}} @if(!$loop->last)|@endif
                    @empty
                    @endforelse
                </p>
    {{--            <label for="">Qty</label>--}}
    {{--            <input type="number" class="form-control" value="0" style="width: 50%"><br>--}}
                @forelse($options as $products_option)
                    <label for="">{{$products_option['name']}}</label>
                    <select name="option[]" id="option" class="form-control option" style="width: 50%" required>
                        <option value="">Select Option</option>
                        @foreach($products_option['options'] as $options_val)
                            <option value="{{$options_val->id}}" >{{$options_val->option_value}}</option>
                        @endforeach
                    </select>
                @empty
                @endforelse
                <p>
                    {!! $product->description !!}
                </p>
                @if ($product->product_qty > 0)
                        <input type="hidden" name="cart_price" id="cart_price" value="0">
                        <button type="submit" class="button button-plain">Add to Cart</button>

                @endif
            </div>
        </form>
    </div> <!-- end product-section -->
    @if(!empty($mightAlsoLike) && count($mightAlsoLike) > 0)
        @include('front.partials.might-like')
    @endif
    <section class="descBox">
        <div class="container">
                <div class="col-md-12">
                    <div class="adtnlBox">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="userMain">
                                    <h2>@if(count($productReviews) > 0) {{count($productReviews)}} @else No @endif review(s) for this Product</h2>
                                    @if(count($productReviews) > 0)
                                        @foreach($productReviews as $review)
                                        <div class="userReview">
                                            <img src="../images/userimg.png" class="img-fluid" alt="img">
                                            <div class="reviewContent">
                                                @php
                                                    $date = date_create($review->created_at);
                                                @endphp
                                                <h5 class="text-uppercase">{{$review->author ?? ''}} – {{date_format($date, 'F d, Y')}}</h5>

                                                <span>
                                                    @for($i=1; $i<=$review->rating; $i++)
                                                        <i class="fas fa-star star"></i>
                                                    @endfor
                                                    @for($j=1; $j<=(5-$review->rating); $j++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </span>
                                                <p>{{$review->description ?? ''}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="userMain">
                                    <h2>Add a review</h2>
                                    <p>Required fields are marked *</p>
                                    <form id="form-review">
                                        <div id="reviewAlert"></div>
                                        @csrf
                                        <div class="reviewForm col-sm-10">
                                            <div class="formsetrvew form-group">
                                                <label>Name *</label>
                                                <input class="form-control" type="text" name="name">
                                            </div>
                                            <div class="formsetrvew form-group">
                                                <label class="yreviw">Your review *</label>
                                                <textarea class="form-control" name="text"></textarea>
                                            </div>
                                            <div class="formsetrvew form-group">
                                                <label>Your rating *</label>
                                                <span>
                                                <i data-value="1" class="fas fa-star"></i>
                                                <i data-value="2" class="fas fa-star"></i>
                                                <i data-value="3" class="fas fa-star"></i>
                                                <i data-value="4" class="fas fa-star"></i>
                                                <i data-value="5" class="fas fa-star"></i>
                                            </span>
                                            </div>
                                            <input type="hidden" name="rating" id="rating" value="">
                                            <a id="button-review" class="btn btn-secondary">Submit</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>




@endsection

@section('extra-js')
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');
            images.forEach((element) => element.addEventListener('click', thumbnailClick));
            function thumbnailClick(e) {
                currentImage.classList.remove('active');
                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })
                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }
        })();

        $('doccment').ready(function (){
            $('.option').on('change',function () {
                let id = $(this).val();
              //  alert(id);
                if(id !== ""){
                    $.ajax({
                        url:"{{ url('checkProductPrice') }}",
                        type:"Get",
                        data: {
                            product_option_id: id,
                            product_id:{{$product->id}}
                        },
                        success:function (data) {
                            // console.log(data);
                            if(data > 0){
                                let price = $('#price').html();
                                $('#price').html(data);
                                $('#cart_price').val(data);
                            }else{
                                $('#price').html(data);
                            }

                        }
                    })
                }

            });

        })

        $(document).ready(function (){
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('.reviewForm span i').on('mouseover', function(){ console.log('asdf')
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('i').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function(){
                $(this).parent().children('i').each(function(e){
                    $(this).removeClass('hover');
                });
            });


            $('.reviewForm span i').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                //console.log(onStar)
                var stars = $(this).parent().children('i');
                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('star');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('star');
                    $('#rating').val(parseInt(onStar));
                }
            });
        })
        $('#button-review').on('click', function() {
            //console.log("assss");return false;
            $.ajax({
                url: '{{url("/product/review/$product->id")}}',
                type: 'post',
                dataType: 'json',
                data: $("#form-review").serialize(),
                beforeSend: function() {
                    $('#button-review').button('loading');
                },
                complete: function() {
                    $('#button-review').button('reset');
                },
                success: function(json) {
                    $('.alert-dismissible').remove();

                    if (json['error']) {
                        $('#reviewAlert').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
                    }

                    if (json['success']) {
                        $('#reviewAlert').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

                        $('input[name=\'name\']').val('');
                        $('textarea[name=\'text\']').val('');
                        $('input[name=\'rating\']:checked').prop('checked', false);
                        $('span .fas').removeClass('star');
                    }
                }
            });
        });
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    {{--    <script src="{{ asset('js/algolia.js') }}"></script>--}}

@endsection
