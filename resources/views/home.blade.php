@extends('layouts.app')
@section('header')
    <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/stocktools/gui.css">
    <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/annotations/popup.css">
    <style>
        #container {
            max-height: 800px;
            height: 75vh;
        }
        html {
                background-image: url("/black1.jpg");
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center;
            
            }

        .highcharts-bindings-wrapper * {
            box-sizing: content-box;
        }
    </style>




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


    <!-- Icon Cards-->
    <div class="row">

     
    <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Available stock</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/Product">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">Daily sales</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/Sales">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
    
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">Purchases</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/Purchases">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">Expenses</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/Expenses">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>


    </div>
       @if(count($product)>0)
    <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Chart </div>
        <div class="card-body">
            <div id="barchart" style="width: 900px; height: 500px">
            </div>

        </div>


    </div>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            <a class="link-item" href="/Product">Stock</a> </div>
        <div class="card-body">
            <div class="table-responsive">

           
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
                    </tr>

                    @endforeach
                    
                </table>
                @endif
            </div>
        </div>
        <div class="row">
                    <div class="col-12 text-center">
                    {{ $product->links() }}
                    </div>
                </div>

    </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>



    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
