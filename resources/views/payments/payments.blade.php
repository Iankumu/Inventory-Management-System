@extends('layouts.app')
@section('header')

@endsection
@section('content')
<a href="/Payments/create" class="btn btn-primary">Create Payment Type</a>
<br><br>


@if(count($payment)>0)
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <th>Payment Type</th>
                    <th>Date updated</th>
                    

                    @foreach ($payment as $payments)
                    <tr>
                    <td>{{$payments->Payment}}</td>
                    <td>{{$payments->updated_at}}</td>
                    <td><a href="/Payments/{{$payments->id}}/edit" class="btn btn-info">Edit</a></td>
                    <td> {!!Form::open(['action'=>['PaymentController@destroy',$payments->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}</td>
                    </tr>

                    @endforeach
                </table>
                <div class="row">
                    <div class="col-12 text-center">
                    {{ $payment->links() }}
                    </div>
                </div>
                @endif

                <a href="/home" class="btn btn-secondary">Back</a>

@endsection
