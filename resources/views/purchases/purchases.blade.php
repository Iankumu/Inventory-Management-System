@extends('layouts.app')
@section('header')

@endsection
@section('content')
    {{--This button should be updated after the create sale page has been finished--}}
    <a href="/Purchases/create"><input type="button" value="Make Purchase" class="btn btn-primary"> </a>
    <br><br>
    @if(count($purchases)>0)
        <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
            <th>Purchase Name</th>
            <th>Quantity</th>
            <th>Date Purchased</th>
            <th>Date Updated</th>
           

            @foreach($purchases as $purchase)
                <tr>
                
                    <td>{{$product[$purchase->product_id]}}</td>                  
                    <td>{{$purchase->quantity}}</td>
                    <td>{{$purchase->created_at}}</td>
                    <td>{{$purchase->updated_at}}</td>
                    {{--Be careful at this point. Pick up from here--}}
                </tr>
            @endforeach
        </table>
        <div class="row">
                    <div class="col-12 text-center">
                    {{ $purchases->links() }}
                    </div>
                </div>
    @endif
    <br><br>
    <a href="/home" class="btn btn-default"><input type="button" value="Back" class="btn btn-primary"></a>

@endsection
