@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>['ExpensesController@update',$expenses->id],'method'=>'PUT']) !!}
    <div class="form-group">
        {{form::label('Expense', 'Expense')}}
        {{form::Text('Expense',$expenses->Expense,['class' =>'form-control','placeholder'=>'Expense'])}}
    </div>
    <div class="form-group">
        {{form::label('Amount', 'Amount')}}
        {{form::Text('Amount',$expenses->amount,['class' =>'form-control','placeholder'=>'Amount'])}}
    </div>
    {{Form::submit('Update Expense',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}
<br><br>
                <a href="/Expenses" class="btn btn-secondary">Back</a>
@endsection