@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'CategoryController@store','method'=>'POST']) !!}
<div class="form-group">
        {{form::label('Categoryname', 'Categoryname')}}
        {{form::Text('Categoryname','',['class' =>'form-control','placeholder'=>'Categoryname'])}}
    </div>
    
        {{Form::submit('Add Category',['class'=>'btn btn-primary'])}}
            
{!! Form::close() !!}

<!-- <a href="/Categories" class="btn btn-primary">Back</a> -->
@endsection
