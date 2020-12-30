@extends('layouts.app')
@section('header')

@endsection
@section('content')
<a href="/Expenses/create" class="btn btn-primary">Add Expenses</a>
<br><br>


@if(count($expenses)>0)
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <th>Expense</th>
                    <th>Amount</th>
                    <th>Date updated</th>
                    <th>Edit</th>

                    @foreach ($expenses as $categorys)
                    <tr>
                    <td>{{$categorys->Expense}}</td>
                    <td>{{$categorys->amount}}</td>
                    <td>{{$categorys->updated_at}}</td>
                    <td><a href="/Expenses/{{$categorys->id}}/edit" class="btn btn-info">Edit</a></td>
                    <td> {!!Form::open(['action'=>['ExpensesController@destroy',$categorys->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}</td>
                    </tr>

                    @endforeach
                </table>
                <div class="row">
                    <div class="col-12 text-center">
                    {{ $expenses->links() }}
                    </div>
                </div>
                @endif

                <a href="/home" class="btn btn-secondary">Back</a>

@endsection
