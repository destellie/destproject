@extends('layouts._admin')
@section('content')

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
<center><form method="post" action="{{url('pages/add_item') }}" enctype="multipart/form-data">
<h1>ADD ITEM</h1>
@method('post')
@csrf
<div class="form-group row">
   <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

     <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
     </div>
</div>
  
 <div class="form-group row">
   <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>

     <div class="col-md-6">
     <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="name" autofocus>

    @error('slug')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
    <div class="form-group row">
   <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

     <div class="col-md-6">
     <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="name" autofocus>

    @error('content')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
  
    <div class="form-group row">
   <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

     <div class="col-md-6">
     <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="name" autofocus>

    @error('price')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
       
       
      <div class="custom-control custom-switch">
        <input type="checkbox" class=" custom-control-input " id="customSwitch1" name="published">
        <label for="customSwitch1" class=" custom-control-label text-md-right" >Published</label>

        @error('price')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
    </div>

   
  
  
    
  
    <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">Create Item</button>
     </div>
     </div>

</form></center>
@stop