@extends('layouts/_admin')

   @section('content') 
       <!-- Page Content -->
<div class="container">

         <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">FashionNova</h1>
                <div class="list-group">
                    <a  href="{{ route('users.edit') }}" class="list-group-item">My Profile</a>
                    <a href="{{ route('orders.index') }}" class="list-group-item">My Orders</a>
                    
                </div>

            </div>
            
            <div class="col-lg-9">
            <div class=" text-center">
            <h1> Welcome {{Auth::user()->name }}</h1>
         
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Orders') }}</div>

                <div class="card-body">
                   orders go here
                </div>
            </div>
        </div>
    </div>
            
            </div>
            </div>

                
                
                

            

            </div>  

         </div>
</div>
<!-- /.container -->
@endsection

