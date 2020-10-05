@extends('layouts.admin')
@section('content')

<center><form method="post" action="{{url('pages/update_items',$item->id) }}">

@method('patch')
@csrf
<h1>Update ITEM</h1>
<div class="form-group row">
   <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

     <div class="col-md-6">
     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('$item->name') }}" required autocomplete="name" autofocus>

    @error('name')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
  
    <div class="form-group row">
   <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

     <div class="col-md-6">
     <input id="slug" type="text" class="form-control @error('name') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="name" autofocus>

    @error('slug')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
    <div class="form-group row">
   <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

     <div class="col-md-6">
     <input id="content" type="text" class="form-control @error('name') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="name" autofocus>

    @error('content')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
  
    <div class="form-group row">
   <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

     <div class="col-md-6">
     <input id="price" type="text" class="form-control @error('name') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="name" autofocus>

    @error('price')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>

  
    <div class="form-group row custom-control custom-switch">
   <label for="published" class="col-md-4 col-custom-control-label text-md-right">{{ __('Published') }}</label>

     <div class="col-md-6">
     <input id="published" type="checkbox" class="custom-control-input" name="published" value="{{ old('published') }}" required autocomplete="name" autofocus>

    @error('name')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>

   
   
  <div class="form-group row">
   <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Uplaod Image') }}</label>

     <div class="col-md-6">
     <input id="image" type="file" class="form-control-file" name="image" value="{{ old('image') }}" required autocomplete="name" autofocus>

    @error('image')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
  
    <div class="form-group row">
   <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('user_id') }}</label>

     <div class="col-md-6">
        <select class="custom-select mr-sm-2" id="user_id">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    @error('user_id')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
    <div class="form-group row">
   <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('category_id') }}</label>

     <div class="col-md-6">
        <select class="custom-select mr-sm-2" id="category_id">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    @error('category_id')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
  

    <div class="form-group row">
   <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Created_at') }}</label>

     <div class="col-md-6">
     <input id="created_at" type="date" class="form-control @error('name') is-invalid @enderror" name="created_at" value="{{ old('created_at') }}" required autocomplete="name" autofocus>

    @error('created_at')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>

    <div class="form-group row">
   <label for="updated_at" class="col-md-4 col-form-label text-md-right">{{ __('Updated_at') }}</label>

     <div class="col-md-6">
     <input id="updated_at" type="date" class="form-control @error('name') is-invalid @enderror" name="updated_at" value="{{ old('updated_at') }}" required autocomplete="name" autofocus>

    @error('udpated_at')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
  
    <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">
    {{ __('Update Item') }}
     </button>
     </div>
     </div>
</div>
</form></center>
@endsection