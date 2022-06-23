@extends('front.layout.app')
@section('title', 'Checkout')
@section('content')
    <style>
        .check-out-section {
            padding: 50px 0px;
            border-top: 1px solid #ebebeb
        }

        .check-out-form {
            text-align: center;
        }

        .check-out-form .primary-heading {
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: 500;
            color: #323232;
        }

        .check-out-form p {
            line-height: 16px;
            font-size: 16px;
            margin-bottom: 15px;
            font-weight: 500;
            color: #2d2e37;
        }

        .chkot-pag .check-out-form form {
            padding: 30px 0px;
        }

        .check-out-form form {
            margin-top: 0;
            text-align: left;
        }

        .check-out-form form label {
            color: #2d2e37;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
        }

        .check-out-form .order-summery {
            padding: 50px 0px;
        }

        .order-summery {
            text-align: left;
        }

        .bb-1 {
            border-bottom: 1px solid #f8f8f8;
            padding: 10px 0px;
            margin-bottom: 10px;
        }

        .order-summery .d-btn {
            padding: 14px 88px;
        }

        .d-btn {
            border-radius: 5px;
            background-color: #35a48d;
            font-size: 20px;
            color: #ffffff;
            display: inline-block;
            padding: 16px 88px;
            text-transform: uppercase;
            transition: 0.7s;
        }

        .order-summery input.form-control {
            margin-bottom: 10px;
            box-shadow: none;
        }

        .check-out-form .form-control {
            min-height: 60px;
            margin-bottom: 20px;
            /*box-shadow: 7px 6px 15px 0px #d2d2d2;*/
            border: 1px solid #ebebeb;
        }

        .check-out-form .checkout-subheading a {
            /*color: #0061ad;*/
            font-weight: 600;
        }

        .container {
            max-width: 1140px;
        }

        .invalid-feedback {
            margin-top: -20px;
        }

        input.invalid {
            /*background-color: #ffe5e5;*/
            border-color: red !important;
        }

        select.invalid {
            /*background-color: #ffe5e5;*/
            border-color: red !important;
        }

        textarea.invalid {
            /*background-color: #ffe5e5;*/
            border-color: red !important;
        }

        .paymentBtn {
            /* background-color: #0d0d18; */
            border-radius: 28px;
            border-style: none
        }

    </style>

    <div class="check-out-section chkot-pag">
        <div class="container">
            <div class="check-out-form">
                <h2 class="primary-heading">Billing Address</h2>
                <p>
                    Fill the form below to complete your purchase
                </p>
                @if (!Auth::user())
                    <p class="checkout-subheading">
                        <a href="{{ url('register') }}">Already Registered?</a> Click here to <a
                            href="{{ url('login') }}" class="text-uppercase">Login now</a>
                    </p>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <label for="">FIRST NAME</label>
                        @if (auth()->user())
                            <input type="text" name="first_name" id="first_name"
                                class="form-control requiredField @error('first_name') is-invalid @enderror"
                                value="{{ auth()->user()->customers ? auth()->user()->customers->first_name : '' }}"
                                maxlength="15">
                        @else
                            <input type="text" name="first_name" id="first_name"
                                class="form-control requiredField @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" required maxlength="15">
                        @endif
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">LAST NAME</label>
                        @if (auth()->user())
                            <input type="text" name="last_name" id="last_name"
                                class=" requiredField @error('last_name') is-invalid @enderror"
                                value="{{ auth()->user()->customers ? auth()->user()->customers->last_name : ' ' }}"
                                maxlength="15">
                        @else
                            <input type="text" name="last_name" id="last_name"
                                class=" requiredField @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}" required maxlength="15">
                        @endif
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">EMAIL ADDRESS</label>
                        @if (auth()->user())
                            <input type="email" name="email" id="email"
                                class="form-control form-control requiredField @error('email') is-invalid @enderror"
                                value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" name="email" id="email"
                                class="form-control form-control requiredField @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required maxlength="30">
                        @endif
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">PHONE</label>
                        <input type="text" name="phone" id="phone"
                            class="form-control requiredField @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}" required maxlength="15">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-12">
                        <label for="">ADDRESS</label>
                        @if (auth()->user())
                            <textarea name="address" id="address" cols="30" rows="6"
                                class="form-control requiredField @error('address') is-invalid @enderror"
                                maxlength="150" required>
                        @if (!empty($billingAddress))
                        {{ $billingAddress->address }}
                        @endif
                        </textarea>
                        @else
                            <textarea name="address" id="address" cols="30" rows="6"
                                class="form-control requiredField @error('address') is-invalid @enderror" required
                                maxlength="150">{{ old('address') }}</textarea>
                        @endif
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">COUNTRY</label>
                        @if (auth()->user())
                            <input type="text" name="country" id="country"
                                class="form-control requiredField @error('country') is-invalid @enderror"
                                value="@if (!empty($billingAddress)) {{ $billingAddress->country }} @endif" required
                                maxlength="20">
                        @else
                            <input type="text" name="country" id="country"
                                class="form-control requiredField @error('country') is-invalid @enderror"
                                value="{{ old('country') }}" required maxlength="20">
                        @endif
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">CITY</label>
                        @if (auth()->user())
                            <input type="text" name="city" id="city"
                                class="form-control requiredField @error('city') is-invalid @enderror"
                                value="@if (!empty($billingAddress)) {{ $billingAddress->city }} @endif"
                                maxlength="20">
                        @else
                            <input type="text" name="city" id="city"
                                class="form-control requiredField @error('city') is-invalid @enderror"
                                value="{{ old('city') }}" required maxlength="20">
                        @endif
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">ZIP/POSTAL CODE</label>
                        @if (auth()->user())
                            <input type="text" name="zip_code" id="zip_code"
                                class="form-control requiredField @error('zip_code') is-invalid @enderror"
                                value="@if (!empty($billingAddress)) {{ $billingAddress->zip_code }} @endif"
                                maxlength="5">
                        @else
                            <input type="text" name="zip_code" id="zip_code"
                                class="form-control requiredField @error('zip_code') is-invalid @enderror"
                                value="{{ old('zip_code') }}" required maxlength="5">
                        @endif
                        @error('zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">STATE/PROVINCE</label>
                        @if (auth()->user())
                            <input type="text" name="state" id="state"
                                class="form-control requiredField @error('state') is-invalid @enderror"
                                value="@if (!empty($billingAddress)) {{ $billingAddress->state }} @endif"
                                maxlength="20">
                        @else
                            <input type="text" name="state" id="state"
                                class="form-control requiredField @error('state') is-invalid @enderror"
                                value="{{ old('state') }}" required maxlength="20">
                        @endif
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-12 checkbox">
                        <input type="checkbox" id="ship_address" value="1">
                        <label for="ship_address">Ship to the same address mentioned above </label>
                    </div>
                </div>
                <div class="row" style="display: flex" id="shipping_address">
                    <div class="col-md-12">
                        <label for="">ADDRESS</label>
                        @if (auth()->user())
                            <textarea name="s_address" id="s_address" cols="10" rows="6"
                                class="form-control requiredField @error('s_address') is-invalid @enderror"
                                maxlength="150">
@if (!empty($shippingAddress))
{{ $shippingAddress->address }}
@endif
</textarea>
                        @else
                            <textarea name="s_address" id="s_address" cols="10" rows="6"
                                class="form-control requiredField @error('s_address') is-invalid @enderror"
                                maxlength="150">{{ old('s_address') }}</textarea>
                        @endif
                        @error('s_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">COUNTRY</label>
                        @if (auth()->user())
                            <input type="text" name="s_country" id="s_country"
                                class="form-control requiredField @error('s_country') is-invalid @enderror"
                                value="@if (!empty($shippingAddress)) {{ $shippingAddress->country }} @endif"
                                required maxlength="20">
                        @else
                            <input type="text" name="s_country" id="s_country"
                                class="form-control requiredField @error('s_country') is-invalid @enderror"
                                value="{{ old('s_country') }}" required maxlength="20">
                        @endif
                        @error('s_country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">CITY</label>
                        @if (auth()->user())
                            <input type="text" name="s_city" id="s_city"
                                class="form-control requiredField @error('s_city') is-invalid @enderror"
                                value="@if (!empty($shippingAddress)) {{ $shippingAddress->city }} @endif"
                                maxlength="20">
                        @else
                            <input type="text" name="s_city" id="s_city"
                                class="form-control requiredField @error('s_city') is-invalid @enderror"
                                value="{{ old('s_city') }}" required maxlength="20">
                        @endif
                        @error('s_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">ZIP/POSTAL CODE</label>
                        @if (auth()->user())
                            <input type="text" name="s_zip_code" id="s_zip_code"
                                class="form-control requiredField @error('s_zip_code') is-invalid @enderror"
                                value="@if (!empty($shippingAddress)) {{ $shippingAddress->zip_code }} @endif"
                                maxlength="5">
                        @else
                            <input type="text" name="s_zip_code" id="s_zip_code"
                                class="form-control requiredField @error('s_zip_code') is-invalid @enderror"
                                value="{{ old('s_zip_code') }}" maxlength="5">
                        @endif
                        @error('s_zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">STATE/PROVINCE</label>
                        @if (auth()->user())
                            <input type="text" name="s_state" id="s_state"
                                class="form-control requiredField @error('s_state') is-invalid @enderror"
                                value="@if (!empty($shippingAddress)) {{ $shippingAddress->state }} @endif"
                                maxlength="20">
                        @else
                            <input type="text" name="s_state" id="s_state"
                                class="form-control requiredField @error('s_state') is-invalid @enderror"
                                value="{{ old('s_state') }}" maxlength="20">
                        @endif
                        @error('s_state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                </div>
                <hr>
                <div class="order-summery">
                    <h2 class="primary-heading text-center">Order Summary</h2>
                    @forelse($products as $product)
                        <div class="row bb-1">
                            <div class="col-md-6">
                                {{ $product['name'] }} for ({{ $product['quantity'] }} items)<br>
                                @if (count($product['options']) > 0)
                                    <ul>
                                        @foreach ($product['options'] as $oindex => $option)
                                            @if ($oindex !== 'options_id')
                                                <li><strong>{{ $oindex }}</strong>: {{ $option }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-6 text-right">
                                <span>Subtotal (${{ sprintf('%.2f', $product['subtotal']) }}) </span>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <div class="row bb-1">
                        <div class="col-md-6">
                            <span>Shipping Cost </span>
                        </div>
                        <div class="col-md-6 text-right">
                            $<span id="shipping_cost">
                                {{ $shipping_cost }}
                            </span>
                        </div>
                    </div>
                    <div class="row bb-1" id="couponRow">
                        <div class="col-md-9">
                            <input type="text" name="coupon" id="coupon" class="form-control"
                                placeholder="Enter Voucher Code">

                        </div>
                        <div class="col-md-3">
                            <button id="couponBtn" class="btn d-btn w-100 button button-plain">Apply</button>
                        </div>
                    </div>
                    <div class="row bb-1">
                        <div class="col-md-6">
                            <span>Total</span>
                        </div>
                        <div class="col-md-6 text-right" id="totalamount">
                            ${{ sprintf('%.2f', $totalAmount + $shipping_cost) }}
                            <input type="hidden" id="total_amount" name="total_amount"
                                value="{{ sprintf('%.2f', $totalAmount + $shipping_cost) }}">
                        </div>
                    </div>
                    <div class="row text-center">

                        @if ($settings->stripe_publishable_key !== null || $settings->stripe_secret_key !== null)
                            <div class="col-md-3">
                                <br>
                                <button class="button-primary paymentBtn btn-block" type="button" id="strip_btn"
                                    style="background-color:#635bff;">
                                    Pay with Stripe
                                    {{-- <i class="fab fa-cc-stripe"></i> --}}
                                </button>
                            </div>
                        @endif
                        @if ($settings->paypal_client_id !== null)
                            <div class="col-md-3">
                                <br>
                                <section>
                                    <div class="bt-drop-in-wrapper">
                                        <div id="bt-dropin"></div>
                                    </div>
                                </section>
                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                <button class="button-primary paymentBtn btn-block" type="button" id="paypalBtn"
                                    style="background-color:#03408f;">
                                    <span>Pay with Paypal</span>
                                    {{-- <i class="fab fa-paypal"></i> --}}
                                </button>
                            </div>
                        @endif
                        @if ($settings->authorize_merchant_login_id !== null || $settings->authorize_merchant_transaction_key !== null)
                            <div class="col-md-3">
                                <br>
                                <section>
                                    <div class="bt-drop-in-wrapper">
                                        <div id="bt-dropin"></div>
                                    </div>
                                </section>
                                <button id="authorize_btn" class=" btn-block button-primary paymentBtn" type="button"
                                    style="background-color: #2b6afd;"> <span>Pay With Authorize.net</span></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for payment -->
    <div id="myModal-payment" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="payment-form">
                    <div class="modal-header">
                        <h4 class="modal-title">Pay with credit card</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="cardNumber">
                                            CARD NUMBER</label>
                                        <div class="input-group">
                                            <input type="hidden" value="" id="hidden-section">
                                            <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                                placeholder="Valid Card Number" required autofocus />
                                            <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-lock"></span></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="expiryMonth">EXPIRY MONTH</label>
                                                <input type="text" class="form-control" id="expiryMonth"
                                                    name="expiryMonth" placeholder="MM" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="expiryMonth">EXPIRY YEAR</label>
                                                <input type="text" class="form-control" id="expiryYear" name="expiryYear"
                                                    placeholder="YYYY" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 pull-right">
                                            <div class="form-group">
                                                <label for="cvCode">
                                                    CV CODE</label>
                                                <input type="password" class="form-control" id="cvCode" name="cvCode"
                                                    placeholder="CV" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-12"> --}}
                            {{-- <ul class="nav nav-pills nav-stacked"> --}}
                            {{-- <li class="active"> --}}
                            {{--  --}}
                            {{-- </li> --}}
                            {{-- </ul> --}}
                            {{-- </div> --}}
                            {{-- <div class=''>
                                <div class='col-md-12'>
                                    <div class='form-control total btn btn-info'>
                                        <a href="javascript:void(0)" style="color: #fff;">
                                            <span class="badge pull-right">
                                                <input type="hidden" id="final-amount1" value="">
                                                <span id="final-amount" class="glyphicon glyphicon-usd"></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 text-center">
                            <span id="msg_span" class="text-center"></span>
                        </div>
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="proceed"> Pay&nbsp;
                            <a href="javascript:void(0)" style="color: #fff;">
                                <input type="hidden" id="final-amount1" value="">
                                <span id="final-amount" class="glyphicon glyphicon-usd"></span>
                            </a>
                        </button>
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade paypalModal" id="payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Pay with Paypal
                </div>
                <div id="paypal-button-container"></div>
                <!-- <button class="btn btn-primary btn-lg btn-block" type="submit" style="background-color:#1a1b1d;padding: 18px;">Pay with Credit Card</button> -->
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <!-- Modal for payment Authorize.net -->
    <div id="myModal-payment-authorize" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="paymentForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Pay With Credit Card</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="cardNumber">
                                            CARD NUMBER</label>
                                        <div class="input-group">
                                            <input type="hidden" value="" id="hidden-section">
                                            <input type="text" class="form-control" id="aCardNumber" name="cardNumber"
                                                placeholder="Valid Card Number" required autofocus />
                                            <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-lock"></span></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="expMonth">EXPIRY MONTH</label>
                                                <input type="text" class="form-control" id="expMonth" name="expMonth"
                                                    placeholder="MM" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="expYear">EXPIRY YEAR</label>
                                                <input type="text" class="form-control" id="expYear" name="expYear"
                                                    placeholder="YYYY" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 pull-right">
                                            <div class="form-group">
                                                <label for="cardCode">
                                                    CV CODE</label>
                                                <input type="password" class="form-control" id="cardCode" name="cardCode"
                                                    placeholder="CV" required />
                                                <input type="hidden" name="dataValue" id="dataValue" />
                                                <input type="hidden" name="dataDescriptor" id="dataDescriptor" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row"> --}}
                        {{-- <div class="col-md-12"> --}}
                        {{-- <ul class="nav nav-pills nav-stacked"> --}}
                        {{-- <li class="active"> --}}
                        {{--  --}}
                        {{-- </li> --}}
                        {{-- </ul> --}}
                        {{-- </div> --}}
                        {{-- <div class=''> --}}
                        {{-- <div class='col-md-12'> --}}
                        {{-- <div class='form-control total btn btn-info'> --}}
                        {{-- <a href="javascript:void(0)" style="color: #fff;"> --}}
                        {{-- <span class="badge pull-right"> --}}
                        {{-- <input type="hidden" id="final-amount1" value=""> --}}
                        {{-- <span id="final_amount" class="glyphicon glyphicon-usd"></span> --}}
                        {{-- </span> Final Payment --}}
                        {{-- </a> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 text-center">
                            <span id="msg_span" class="text-center"></span>
                        </div>
                        {{-- onclick="sendPaymentDataToAnet()" --}}
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="proceedAuthorize">Pay
                            &nbsp;
                            <a href="javascript:void(0)" style="color: #fff;">
                                <input type="hidden" id="final-amount1" value="">
                                <span id="final-amount" class="glyphicon glyphicon-usd"></span>
                            </a>
                        </button>
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
@section('extra-js')
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ab07wXOvubd8fXj2hRAbOXsA2F1d1zd7VQP2RRlaYkjCOhC6q6CVzrruGuvPX3VpvvkAZTm-UsJHmisU&currency=USD&disable-funding=credit,card"
        data-sdk-integration-source="button-factory"></script>
    @if (env('APP_ENV') == 'local')
        <script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>
        {{-- <script type="text/javascript" src="https://jstest.authorize.net/v3/AcceptUI.js" charset="utf-8"></script> --}}
    @else
        <script type="text/javascript" src="https://js.authorize.net/v1/Accept.js" charset="utf-8"></script>
        {{-- <script type="text/javascript" src="https://js.authorize.net/v3/AcceptUI.js" charset="utf-8"></script> --}}
    @endif
    <script>
        $(document).ready(function() {
            $('#couponBtn').on('click', function() {
                var $this = $(this);
                var coupon = $("#coupon").val();
                var totalAmount = $("#total_amount").val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'checkout/apply-coupon',
                    type: 'get',
                    data: {
                        'coupon_code': coupon
                    },
                    success: function(json) {
                        $("#couponRow").find('p').remove();
                        if (json['status'] === true) {
                            $this.prop('disabled', true);
                            var discount = 0;
                            var value = json['data'].value;
                            var type = json['data'].type;
                            if (type === 'value') {
                                discount = value;
                                totalAmount = totalAmount - value;
                            }
                            if (type === 'percentage') {
                                discount = (totalAmount / 100) * value;
                                totalAmount = totalAmount - discount;
                            }
                            console.log(totalAmount);
                            var html =
                                '<div class="row bb-1"><div class="col-md-6"><span>Discount</span>\n' +
                                '</div><div class="col-md-6 text-right" id="discountValue">$' +
                                discount.toFixed(2) + '</div></div>';
                            $(html).insertAfter($("#couponRow"));
                            $("#totalamount").empty().append('$' + totalAmount.toFixed(2));
                            $("#totalamount").append(
                                `<input type="hidden" id="total_amount" name="total_amount" value="${totalAmount.toFixed(2)}">`
                            );

                            $("#total_amount").val(totalAmount.toFixed(2));
                        } else {
                            $('<p style="color: red">' + json['error'] + '</p>').insertAfter($(
                                "#coupon"));
                        }
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {

            $('#payment').on('hidden.bs.modal', function() {
                $(".paypal-buttons").remove();
            })
            // $('.page-item .active').css('color','green');

            $('#strip_btn').on('click', function() {

            })

            $("#ship_address").change(function() {
                if (this.checked) {
                    //Do stuff
                    $('#shipping_address').css('display', 'none');

                    $('#shipping_address').find(':input').removeClass('requiredField');
                    // console.log($('#shipping_address').find(':input'));
                } else {
                    $('#shipping_address').css('display', 'flex');

                    $('#shipping_address').find(':input').addClass('requiredField');

                }
            });
            //Stripe Payment
            $("#payment-form").submit(function(e) {
                e.preventDefault();
                $('#msg_span').text("Processing..");
                $('#proceed').prop('disabled', true);
                let amount = $('#total_amount').val();
                let card_no = $('#cardNumber').val();
                let exp_mon = $('#expiryMonth').val();
                let exp_year = $('#expiryYear').val();
                let cvv = $('#cvCode').val();

                let first_name = $('#first_name').val();
                let last_name = $('#last_name').val();
                let email = $('#email').val();
                let phone = $('#phone').val();

                //billing
                let address = $('#address').val();
                let country = $('#country').val();
                let city = $('#city').val();
                let state = $('#state').val();
                let zip_code = $('#zip_code').val();
                //Shipping
                let s_address = $('#s_address').val();
                let s_country = $('#s_country').val();
                let s_state = $('#s_state').val();
                let s_city = $('#s_city').val();
                let s_zip_code = $('#s_zip_code').val();

                let shipping_cost = $('#shipping_cost').text();
                let ship_address_check = $('#ship_address').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `{{ url('stripeCharge') }}`,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        amount: amount,
                        card_no: card_no,
                        exp_mon: exp_mon,
                        exp_year: exp_year,
                        cvv: cvv,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        phone: phone,
                        address: address,
                        country: country,
                        city: city,
                        zip_code: zip_code,
                        state: state,
                        s_address: s_address,
                        s_country: s_country,
                        s_state: s_state,
                        s_city: s_city,
                        s_zip_code: s_zip_code,
                        shipping_cost: shipping_cost,
                        ship_address_check: ship_address_check,
                    },
                    success: function(data) {
                        //console.log(data);
                        //Clearing all errors
                        $('.errorField').css('display', 'none');
                        if (!data.status) {
                            $('#myModal-payment').modal('hide');
                            $('#msg_span').css('display', 'none');
                            $('#proceed').prop("disabled", false);
                            if (Object.keys(data.errors).length > 0) {

                                if (typeof data.errors.first_name != 'undefined') {
                                    $("#first_name").parent().find('.errorField').text(data
                                        .errors.first_name[0]);
                                    $("#first_name").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.last_name != 'undefined') {
                                    $("#last_name").parent().find('.errorField').text(data
                                        .errors.last_name[0]);
                                    $("#last_name").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.email != 'undefined') {
                                    $("#email").parent().find('.errorField').text(data.errors
                                        .email[0]);
                                    $("#email").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.phone != 'undefined') {
                                    $("#phone").parent().find('.errorField').text(data.errors
                                        .phone[0]);
                                    $("#phone").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.address != 'undefined') {
                                    $("#address").parent().find('.errorField').text(data.errors
                                        .address[0]);
                                    $("#address").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.country != 'undefined') {
                                    $("#country").parent().find('.errorField').text(data.errors
                                        .country[0]);
                                    $("#country").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.city != 'undefined') {
                                    $("#city").parent().find('.errorField').text(data.errors
                                        .city[0]);
                                    $("#city").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.zip_code != 'undefined') {
                                    $("#zip_code").parent().find('.errorField').text(data.errors
                                        .zip_code[0]);
                                    $("#zip_code").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.state != 'undefined') {
                                    $("#state").parent().find('.errorField').text(data.errors
                                        .state[0]);
                                    $("#state").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.s_address != 'undefined') {
                                    $("#s_address").parent().find('.errorField').text(data
                                        .errors.s_address[0]);
                                    $("#s_address").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.s_country != 'undefined') {
                                    $("#s_country").parent().find('.errorField').text(data
                                        .errors.s_country[0]);
                                    $("#s_country").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.s_city != 'undefined') {
                                    $("#s_city").parent().find('.errorField').text(data.errors
                                        .s_city[0]);
                                    $("#s_city").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.s_zip_code != 'undefined') {
                                    $("#s_zip_code").parent().find('.errorField').text(data
                                        .errors.s_zip_code[0]);
                                    $("#s_zip_code").parent().find('.errorField').css('display',
                                        'block')
                                }
                                if (typeof data.errors.s_state != 'undefined') {
                                    $("#s_state").parent().find('.errorField').text(data.errors
                                        .s_state[0]);
                                    $("#s_state").parent().find('.errorField').css('display',
                                        'block')
                                }
                            }
                        } else {
                            // $(".e_alSuccess").show();
                            // $(".updateEvent").find('i').hide();
                            // $(".updateEvent").attr('disabled', false);
                            $('#cust_token').val(data.customer);
                            $('#msg_span').text("");
                            $('#myModal-payment').modal('hide');
                            window.location = "{{ url('checkout/success') }}";
                        }

                        // postJob();

                    },
                    error: function(xhr) {
                        //  console.log(xhr.responseJSON.message);
                        $('#msg_span').text(xhr.responseJSON.message);
                        $('#proceed').prop('disabled', false);
                    }
                });
            });
            //Strip btn Validation
            $('#strip_btn').on('click', function() {
                let y = document.getElementsByClassName("requiredField");
                valid = true;
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " is-invalid";
                        // console.log('not valid'+y[i]);
                        // and set the current valid status to false
                        valid = false;
                    }
                }
                if (valid) {
                    $('#final-amount').text($('#totalamount').text());
                    $('#myModal-payment').modal('show');
                }
            });

            //Paypal btn Validation
            $('#paypalBtn').on('click', function() {
                let y = document.getElementsByClassName("requiredField");
                valid = true;
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " is-invalid";
                        // console.log('not valid'+y[i]);
                        // and set the current valid status to false
                        valid = false;
                    }
                }
                if (valid) {
                    $('.paypalModal').modal('show');
                    initPayPalButton();
                }
            });
        });
        //Paypal Payment

        function initPayPalButton() {
            let amount = $('#total_amount').val();
            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'paypal',
                },

                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            "amount": {
                                "currency_code": "USD",
                                "value": amount
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    console.log('capture');
                    return actions.order.capture().then(function(details) {
                        let amount = $('#total_amount').val();
                        let first_name = $('#first_name').val();
                        let last_name = $('#last_name').val();
                        let email = $('#email').val();
                        let phone = $('#phone').val();

                        //billing
                        let address = $('#address').val();
                        let country = $('#country').val();
                        let city = $('#city').val();
                        let state = $('#state').val();
                        let zip_code = $('#zip_code').val();
                        //Shipping
                        let s_address = $('#s_address').val();
                        let s_country = $('#s_country').val();
                        let s_state = $('#s_state').val();
                        let s_city = $('#s_city').val();
                        let s_zip_code = $('#s_zip_code').val();

                        let shipping_cost = $('#shipping_cost').text();
                        let ship_address_check = $('#ship_address').val();
                        $.ajax({
                            url: "{{ url('paypalCharge') }}",
                            data: {
                                amount: amount,
                                first_name: first_name,
                                last_name: last_name,
                                email: email,
                                phone: phone,
                                address: address,
                                country: country,
                                city: city,
                                zip_code: zip_code,
                                state: state,
                                s_address: s_address,
                                s_country: s_country,
                                s_state: s_state,
                                s_city: s_city,
                                s_zip_code: s_zip_code,
                                shipping_cost: shipping_cost,
                                ship_address_check: ship_address_check,
                            },
                            method: 'POST',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                // console.log(res);
                                window.location = "{{ url('checkout/success') }}"
                            }
                        })
                    });
                },

                onError: function(err) {
                    console.log(err);

                }
            }).render('#paypal-button-container');
        }
        // authorize payment

        $("#paymentForm").submit(function(e) {
            e.preventDefault();
            $('#msg_span').text("Processing..");
            $('#proceed').prop('disabled', true);
            let amount = $('#total_amount').val();
            let card_no = $('#aCardNumber').val();
            let exp_mon = $('#expMonth').val();
            let exp_year = $('#expYear').val();
            let cvv = $('#cardCode').val();

            let first_name = $('#first_name').val();
            let last_name = $('#last_name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();

            //billing
            let address = $('#address').val();
            let country = $('#country').val();
            let city = $('#city').val();
            let state = $('#state').val();
            let zip_code = $('#zip_code').val();
            //Shipping
            let s_address = $('#s_address').val();
            let s_country = $('#s_country').val();
            let s_state = $('#s_state').val();
            let s_city = $('#s_city').val();
            let s_zip_code = $('#s_zip_code').val();

            let shipping_cost = $('#shipping_cost').text();
            let ship_address_check = $('#ship_address').val();
            let coupon = $('#coupon').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{ url('authorizeCharge') }}`,
                type: 'post',
                dataType: 'json',
                data: {
                    amount: amount,
                    card_no: card_no,
                    exp_mon: exp_mon,
                    exp_year: exp_year,
                    cvv: cvv,
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    phone: phone,
                    address: address,
                    country: country,
                    city: city,
                    zip_code: zip_code,
                    state: state,
                    s_address: s_address,
                    s_country: s_country,
                    s_state: s_state,
                    s_city: s_city,
                    s_zip_code: s_zip_code,
                    shipping_cost: shipping_cost,
                    ship_address_check: ship_address_check,
                    coupon_code: coupon,
                },
                success: function(data) {
                    //console.log(data);
                    //Clearing all errors
                    $('.errorField').css('display', 'none');
                    if (!data.status) {
                        $('#myModal-payment').modal('hide');
                        $('#msg_span').css('display', 'none');
                        $('#proceed').prop("disabled", false);
                        if (Object.keys(data.errors).length > 0) {

                            if (typeof data.errors.first_name != 'undefined') {
                                $("#first_name").parent().find('.errorField').text(data.errors
                                    .first_name[0]);
                                $("#first_name").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.last_name != 'undefined') {
                                $("#last_name").parent().find('.errorField').text(data.errors.last_name[
                                    0]);
                                $("#last_name").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.email != 'undefined') {
                                $("#email").parent().find('.errorField').text(data.errors.email[0]);
                                $("#email").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.phone != 'undefined') {
                                $("#phone").parent().find('.errorField').text(data.errors.phone[0]);
                                $("#phone").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.address != 'undefined') {
                                $("#address").parent().find('.errorField').text(data.errors.address[0]);
                                $("#address").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.country != 'undefined') {
                                $("#country").parent().find('.errorField').text(data.errors.country[0]);
                                $("#country").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.city != 'undefined') {
                                $("#city").parent().find('.errorField').text(data.errors.city[0]);
                                $("#city").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.zip_code != 'undefined') {
                                $("#zip_code").parent().find('.errorField').text(data.errors.zip_code[
                                    0]);
                                $("#zip_code").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.state != 'undefined') {
                                $("#state").parent().find('.errorField').text(data.errors.state[0]);
                                $("#state").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.s_address != 'undefined') {
                                $("#s_address").parent().find('.errorField').text(data.errors.s_address[
                                    0]);
                                $("#s_address").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.s_country != 'undefined') {
                                $("#s_country").parent().find('.errorField').text(data.errors.s_country[
                                    0]);
                                $("#s_country").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.s_city != 'undefined') {
                                $("#s_city").parent().find('.errorField').text(data.errors.s_city[0]);
                                $("#s_city").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.s_zip_code != 'undefined') {
                                $("#s_zip_code").parent().find('.errorField').text(data.errors
                                    .s_zip_code[0]);
                                $("#s_zip_code").parent().find('.errorField').css('display', 'block')
                            }
                            if (typeof data.errors.s_state != 'undefined') {
                                $("#s_state").parent().find('.errorField').text(data.errors.s_state[0]);
                                $("#s_state").parent().find('.errorField').css('display', 'block')
                            }
                        }
                    } else {
                        // $(".e_alSuccess").show();
                        // $(".updateEvent").find('i').hide();
                        // $(".updateEvent").attr('disabled', false);
                        $('#cust_token').val(data.customer);
                        $('#msg_span').text("");
                        $('#myModal-payment').modal('hide');
                        window.location = "{{ url('checkout/success') }}";
                    }

                    // postJob();

                },
                error: function(xhr) {
                    //  console.log(xhr.responseJSON.message);
                    $('#msg_span').text(xhr.responseJSON.message);
                    $('#proceed').prop('disabled', false);
                }
            });
        });
        $('#authorize_btn').on('click', function() {
            let y = document.getElementsByClassName("requiredField");
            valid = true;
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " is-invalid";
                    // console.log('not valid'+y[i]);
                    // and set the current valid status to false
                    valid = false;
                    $('html, body').animate({
                        scrollTop: $(".is-invalid").parent().offset().top
                    }, 50);
                }
            }
            if (valid) {
                $('#proceedAuthorize').text('Pay ' + $('#totalamount').text());
                $('#myModal-payment-authorize').modal('show');
            }
        });
    </script>
@endsection
