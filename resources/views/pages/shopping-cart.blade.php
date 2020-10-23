@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">
            {{Session::get('success')}}
        </div>
    </div>
</div>
@if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <span class="badge">{{$product['quantity']}}</span>
                        <strong>{{$product['article']['title']}}</strong>
                        <span class="label label-success">{{$product['price']}}</span>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" type="button">Action<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('product.reduceByOne', ['id'=>$product['article']['id']])}}">Reduce by 1</a></li>
                                <li><a href="{{route('product.remove', ['id'=>$product['article']['id']])}}">Reduce All</a></li>
                            </ul>
                        
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="row">
    <button></button>
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <strong>Total:{{$totalPrice}}</strong>
    </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <a  href="{{route('checkout')}}" type="button" class="btn btn-success"> Checkout</a>
    </div>
    </div>
     @else
    <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       <h2>No Items in Cart</h2>
    </div>
    </div>

@endif
@endsection