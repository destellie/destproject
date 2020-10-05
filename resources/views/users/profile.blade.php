@extends('layouts.admin')

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><img src="{{asset(Auth::user()->image)}}" style="height:45px; width:60px; border-radius:50%; margin-right:15px;" alt=""> My Profile</div>
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            </div>
                            @endif
                            @if(\Session::has('success'))
                            <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                            </div>
                            @endif

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

                                <div class="col-md-6">
                                <strong>{{$user->name}}</strong>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{__('Email')}}</label>

                                <div class="col-md-6">
                                
                                <strong>{{$user->email}}</strong>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                </div>

                             
                            </form>
                </div>
            </div>
        </div>

@endsection