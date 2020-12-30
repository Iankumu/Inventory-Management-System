@extends('layouts.app')
@section('header')

@endsection
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var visitor = <?php echo $visitor; ?>;
    console.log(visitor);
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable(visitor);
        var options = {
            title: 'Bar Graph Showing the stock available ',
            height: 400,
            width: 800,
            bar: {groupWidth: "95%"},
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
        chart.draw(data, options);
    }
</script>



    <a href="/Product/create"> <input type="button" value="Add Stock" class="btn btn-primary"></a>
<br><br>
@if(count($product)>0)
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date updated</th>
                    @foreach ($product as $products)
                    <tr>
                    <td>{{$products->Productname}}</td>
                    <td>{{$products->Description}}</td>
                    <td>{{$categories[$products->category_id]}}</td>
                    <td>{{$products->Price}}</td>
                    <td>{{$products->Quantity}}</td>
                     <td>{{$products->updated_at}}</td>
                        <td><a href="/Product/{{$products->id}}/edit" class="btn btn-info">Edit</a></td>
                       <td>{!!Form::open(['action'=>['ProductController@destroy',$products->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                           {!!Form::close()!!}</td>
                    </tr>

                    @endforeach
                </table>
                <div class="row">
                    <div class="col-12 text-center">
                    {{ $product->links() }}
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                     Bar Chart Showing Quantities of various Products </div>
                    <div class="card-body">
                        <div id="barchart" style="width: 900px; height: 500px">
                        </div>

                    </div>


                </div>
                
                
@endif
   
              

                <a href="/home" class="btn btn-default"><input type="button" value="Back" class="btn btn-primary"></a>

@endsection
