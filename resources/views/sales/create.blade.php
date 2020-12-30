<!--This create blade is for recording the actual sale made-->
@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'SalesController@store', 'method'=>'POST']) !!}



    <div class="form-group">
        <!--This is for the category of products being sold-->
        {{form::label('Product Name', 'Product Name')}}
        {{form::select('product_id',$product,null,['class' =>'form-control','placeholder'=>'Pick a product...'])}}
    </div>


    <div class="form-group">
        <!--This is for the number of products being sold-->
        {{form::label('Quantity','Quantity')}}
        {{form::Number('quantity','',['class' =>'form-control','placeholder'=>'Quantity'])}}
    </div>


    <div class="form-group">
        <!--This is for the type of sale in question. Whether cash or credit-->

            {{form::label('Sales Type', 'Sales Type')}}
            {{form::select('payment',$payment,null,['class'=>'form-control','placeholder'=>'Pick a sale type'])}}

    </div>

    <div class="form-group">
        
        {{form::label('Buying Price','Buying Price')}}
        {{form::Number('bprice','',['class' =>'form-control','placeholder'=>'Buying Price'])}}
    </div>

    <div class="form-group">
        {{form::label('Selling Price','Selling Price')}}
        {{form::Number('sprice','',['class' =>'form-control','placeholder'=>'Selling Price'])}}
    </div>
{{Form::submit('Create Sale',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}
<br><br>
<a href="/Sales" class="btn btn-secondary">Back</a>
@endsection
