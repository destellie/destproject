@extends('layouts/admin')
@section('content')
<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-3 col-sm-offset-3">
        <h1>Checkout</h1>
        <h4>Your Total: {{$total}}</h4>
        <div class="alert alert-danger {{!Session::has('error') ? 'hidden' : ''}}" id="charger-error">
            {{Session::get('error')}}
        </div>
        <form action="{{route('checkout')}}" method="post" id="checkout-form">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name"  name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control"  name="address" required>
                    </div>
                </div>
                
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Card-name">Card Holder Name</label>
                        <input type="text" id="card-name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Card-number">Credit Card Number</label>
                        <input type="text" id="card-number" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Card-expiry-month">Expiration Month</label>
                        <input type="text" id="card-expiry-month" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Card-expiry-year">Expiration Year</label>
                        <input type="text" id="card-expiry-year" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Card-cvc">CVC</label>
                        <input type="text" id="card-cvc" class="form-control" required>
                    </div>
                </div>
            </div>
            {{csrf_field() }}
            <button type="submit" class="btn btn-success">Buy now</button>
        </form>
    </div>
</div>

@endsection
@section('scripts')

<script src="{{asset('js/stripe.js')}}"></script>
<script src="{{asset('js/checkout.js')}}"></script>
@endsection