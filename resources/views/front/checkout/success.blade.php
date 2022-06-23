@extends('front.layout.app')
@section('title', 'Checkout Success')
@section('content')
    <div class="thank-you-section">
        <br>
        <h1>Thank you for <br> Your Order!</h1>
        <p>A confirmation email was sent</p>
        <div class="spacer"></div>
        <div>
            @if(Session::has('success'))
                {{Session::get('success')}}
            @endif
                <br>
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
                <br>
            <a href="{{ url('/') }}" class="button">Home Page</a>
        </div>
    </div><br>
@endsection

