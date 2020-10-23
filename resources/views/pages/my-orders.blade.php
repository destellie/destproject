@extends('layouts/admin')

@section('content') 
    <div class="row">

         <div class="col-lg-9 col-md-offset-2">
                
                <hr>
                <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->articles as $article)
                                <li class="list-group-item">
                                    <span class="badge">{{$article['price']}}</span>
                                    {{$article['article']['title']}} |{{$article['quantity']}}Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                     
                    <div class="panel-footer"> <strong>Total Price: ${{ $order->cart->totalPrice }} </strong></div>
                
                </div>
                
            @endforeach
        </div>
    </div>

@endsection

