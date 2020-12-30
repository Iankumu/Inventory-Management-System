@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'ExpensesController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{form::label('Expense', 'Expense')}}
        {{form::Text('Expense','',['class' =>'form-control','placeholder'=>'Expense'])}}
    </div>
    <div class="form-group">
                    {{form::label('Amount', 'Amount')}}
                    {{form::number('Amount','',['class' =>'form-control','placeholder'=>'Amount'])}}
    </div>
    {{Form::submit('Add Expense',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}
<br><br>
                <a href="/Expenses" class="btn btn-secondary">Back</a>
@endsection