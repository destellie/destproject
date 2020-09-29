@extends('errors::layout')



@section('title','Error page')

@section('message','Page does not exist')
<a href="{{url('/ ')}}" class="btn btn-success">Index</a>
