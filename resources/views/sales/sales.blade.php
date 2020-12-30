@extends('layouts.app')
@section('header')

@endsection
@section('content')
<a href="/Sales/create"><input type="button" value="Record Sale" class="btn btn-primary"> </a>
<br>
<br>
@if(count($sales)>0)
        <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
            <th>Sale Name</th>
            <th>Quantity</th>
            <th>Sale Type</th>
            <th>Selling Price</th>
            <th>Buying Price</th> 
            <th>Profit</th>
            <th>Updated at</th>
            

            @foreach($sales as $sale)
            <tr>
                <td>{{$product[$sale->product_id]}}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$payment[$sale->Payment]}}</td>
                <td>{{$sale->sprice}}</td>
                <td>{{$sale->bprice}}</td>
                <td>{{$sale->Profit}}</td>
                <td>{{$sale->updated_at}}</td>
            </tr>
            @endforeach
        </table>
        <div class="row">
                    <div class="col-12 text-center">
                    {{ $sales->links() }}
                    </div>
                </div>
    @endif
<a href="/home" class="btn btn-default"><input type="button" value="Back" class="btn btn-primary"></a>

@endsection
