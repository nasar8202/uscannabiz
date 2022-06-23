@extends('admin.layouts.app')
@section('title', 'Payment Gateways')
@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payment Gateways Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payment Gateways</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Payment Gateways</h3>
                            </div>
                            <form class="category-form" method="post"  action="{{route('paymentgatway')}}" enctype="multipart/form-data">
                                @csrf
                             <div class="card-body">
                                <div class="row">
                                   <div class="col-md-12">                                    
                                        <div class="form-group">
                                        {{-- start  --}}
                                            {{-- <label for="name">Payment Options</label> --}}
                                        <div id="accordion">
                                            <div class="card">
                                              <div class="card-header bg-dark" id="headingOne">
                                                <h5 class="mb-0">
                                                  <div class="btn btn-link text-white text-left" style="width:100%;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Paypal
                                                  </div>
                                                </h5>
                                              </div>
                                          
                                              <div id="collapseOne" class="collapse border border-dark" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3"> 
                                                            Select Environment:
                                                        </div>
                                                        <div class="col-md-9"> 
                                                             <input type="radio" name="paypal_env" required id="paypal_env_live"  @if($content->paypal_env == "Live") checked @endif value="Live"> Live &nbsp;
                                                            <input type="radio" name="paypal_env" required id="paypal_env_testing"  @if($content->paypal_env == "Testing") checked @endif value="Testing"> Testing
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3"> 
                                                            Client ID:
                                                        </div>
                                                        <div class="col-md-9"><input type="text" name="paypal_client_id" id="paypal_client_id" required class="form-control" value="{{$content->paypal_client_id??''}}"></div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-3"> 
                                                            Secret Key:
                                                        </div>
                                                        <div class="col-md-9"><input type="text" name="paypal_secret_key" id="paypal_secret_key" required  class="form-control" value="{{$content->paypal_secret_key??''}}" ></div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card">
                                              <div class="card-header bg-dark" id="headingTwo">
                                                <h5 class="mb-0">
                                                  <div class="btn btn-link collapsed text-white text-left" style="width:100%;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Stripe 
                                                  </div>
                                                </h5>
                                              </div>
                                              <div id="collapseTwo" class="collapse border border-dark" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3"> 
                                                            Select Environment:
                                                        </div>
                                                        <div class="col-md-9"> 
                                                             <input type="radio" name="stripe_env" @if($content->stripe_env == "Live") checked @endif required id="stripe_env_live" value="Live"> Live &nbsp;
                                                            <input type="radio" name="stripe_env" @if($content->stripe_env == "Testing") checked @endif required id="stripe_env_testing" value="Testing"> Testing
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3"> 
                                                            Publishable Key:
                                                        </div>
                                                        <div class="col-md-9"><input type="text" name="stripe_publishable_key"  id="stripe_publishable_key" required class="form-control" value="{{$content->stripe_publishable_key??''}}"></div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-3"> 
                                                            Secret Key:
                                                        </div>
                                                        <div class="col-md-9"><input type="text" name="stripe_secret_key" id="stripe_secret_key" required  class="form-control" value="{{$content->stripe_secret_key??''}}"></div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                       {{-- third item --}}
                                       <div class="card">
                                        <div class="card-header bg-dark" id="headingThree">
                                          <h5 class="mb-0">
                                            <div class="btn btn-link collapsed text-white text-left" style="width:100%;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              Authorize.net 
                                            </div>
                                          </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse border border-dark" aria-labelledby="headingThree" data-parent="#accordion">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-md-3"> 
                                                      Select Environment:
                                                  </div>
                                                  <div class="col-md-9"> 
                                                       <input type="radio" name="authorize_env" @if($content->authorize_env == "Live") checked @endif required id="authorize_env_live" value="Live"> Live &nbsp;
                                                      <input type="radio" name="authorize_env" @if($content->authorize_env == "Testing") checked @endif required id="authorize_env_testing" value="Testing"> Testing
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                  <div class="col-md-3"> 
                                                     Merchant Login ID:
                                                  </div>
                                                  <div class="col-md-9"><input type="text" name="authorize_merchant_login_id"  id="authorize_merchant_login_id" required class="form-control" value="{{$content->authorize_merchant_login_id??''}}"></div>
                                              </div>
                                              <br/>
                                              <div class="row">
                                                  <div class="col-md-3"> 
                                                    Merchant Transaction Key:
                                                  </div>
                                                  <div class="col-md-9"><input type="text" name="authorize_merchant_transaction_key" id="authorize_merchant_transaction_key" required  class="form-control" value="{{$content->authorize_merchant_transaction_key??''}}"></div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                 
                                          </div>
                                        {{-- end --}}
                                        {{-- <div class="input-group-btn">
                                                    <div class="file-btn mt-4">
                                                        <span style="font-weight: bold;margin-right: 10px;">Paypal</span><input type="checkbox" id="paypal" @if($content->paypal_check == "yes") checked @endif name="paypal_check" value="yes">
                                                    </div>
                                                    <div class="file-btn mt-4">
                                                        <span style="font-weight: bold;margin-right: 10px;">Stripe</span><input type="checkbox" id="stipe" @if($content->stripe_check == "yes") checked @endif name="stripe_check" value="yes">
                                                    </div>
                                        </div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Address</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                   value="{{$content->address??''}}" placeholder="address"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Facebook</label>
                                            <input type="url" class="form-control" name="facebook" id="facebook"
                                                   value="{{$content->facebook??''}}" placeholder="facebook"
                                                   >
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Twitter</label>
                                            <input type="text" class="form-control" name="tweeter" id="tweeter"
                                                   value="{{$content->tweeter??''}}" placeholder="Tweeter"
                                                   >
                                        </div>

                                        <div class="form-group">
                                            <label for="name">LinkedIn</label>
                                            <input type="text" class="form-control" name="LinkedIn" id="LinkedIn"
                                                   value="{{$content->linkedIn??''}}" placeholder="LinkedIn"
                                                   >
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" id="instagram"
                                                   value="{{$content->instagram??''}}" placeholder="instagram"
                                                   >
                                        </div>

                                            <div class="form-group">
                                                <label for="name">Logo</label>
                                                 <div class="input-group-btn">
                                                    <div class="image-upload">
                                                        <img src="{{asset(!empty($content->logo) && file_exists('uploads/settings/'.$content->logo) ? 'uploads/settings/'.$content->logo:'admin/dist/img/placeholder.png')}}" class="img-responsive" width="100px" height="100px">
                                                            <div class="file-btn mt-4">
                                                                <input type="file" id="logo" name="logo" accept=".jpg,.png">
                                                                <input type="text" id="logo" name="logo" value="{{ !empty($content->logo) ? $content->logo : '' }}" hidden="">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>

                                    
                              
                                     <!-- /.card-body -->
                                        
                                    </div> --}}
                                </div>

                                </div>

                             </div>

                             <div class="card-footer float-right">
                                <button type="submit" onclick="validateInputs()" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{URL::asset('admin/custom_js/custom.js')}}"></script>
@endsection

<script>

    function validateInputs(){
         //paypal
     var  paypal_env_live=document.getElementById("paypal_env_live").value;
     var  paypal_env_testing=document.getElementById("paypal_env_live").value;
     var paypal_client_id=document.getElementById("paypal_client_id").value;
     var paypal_secret_key=document.getElementById("paypal_secret_key").value;
     var paypal_collapseOne=document.getElementById("collapseOne");
         //stripe
     var  stripe_env_live=document.getElementById("paypal_env_live").value;
     var  stripe_env_testing=document.getElementById("paypal_env_live").value;
     var stripe_publishable_key=document.getElementById("stripe_publishable_key").value;
     var stripe_secret_key=document.getElementById("stripe_secret_key").value;     
     var stripe_collapseTwo=document.getElementById("collapseTwo");
         //authorize.net
     var  authorize_env_live=document.getElementById("authorize_env_live").value;
     var  authorize_env_testing=document.getElementById("authorize_env_testing").value;
     var authorize_merchant_login_id=document.getElementById("authorize_merchant_login_id").value;
     var authorize_merchant_transaction_key=document.getElementById("authorize_merchant_transaction_key").value;     
     var authorize_collapseThree=document.getElementById("collapseThree");


        if(paypal_env_live!="checked" || paypal_env_testing!="checked"){ 
                if(paypal_client_id=="" ||  paypal_secret_key==""){
                    paypal_collapseOne.setAttribute("class", "show");
                }
        }
        if(stripe_env_live!="checked" || stripe_env_testing!="checked"){ 
               if(stripe_publishable_key=="" || stripe_secret_key==""){
                    stripe_collapseTwo.setAttribute("class", "show");
                }
            }
        if(authorize_env_live!="checked" || authorize_env_testing!="checked"){ 
               if(authorize_merchant_login_id=="" || authorize_merchant_transaction_key==""){
                authorize_collapseThree.setAttribute("class", "show");
                }
            }


}//end validateInputs

</script>