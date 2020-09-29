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

<div class="form-group row">
   <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

     <div class="col-md-6">
     <strong>{{$categories->name}}</strong>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
     </div>
</div>
  
 <div class="form-group row">
   <label for="slug" class="col-md-4 col-form-label text-md-right">{{__('Slug')}}</label>

     <div class="col-md-6">
     
    <strong>{{$categories->slug}}</strong>
    @error('slug')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
    </span>
    @enderror
     </div>
    </div>
    

</form></center>
@stop