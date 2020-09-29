@extends('layouts._admin')

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><img class="d-block img-fluid" src="{{asset('images/slide1.jpg')}}" alt="First slide"></div>
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="{{url('categories/list_cat')}}">List of Categories</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><img class="d-block img-fluid" src="{{asset('images/slide1.jpg')}}" alt="First slide"></div>
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="{{url('pages/list_items')}}">List of Items</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><img class="d-block img-fluid" src="{{asset('images/slide1.jpg')}}" alt="First slide"></div>
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="{{url('categories/list_user')}}">List of Users</a>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
