@extends('layouts.app', ['activePage' => 'reporte', 'titlePage' => __('Reportes')])
@section('content')
<div class="content">
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header card-header-primary">
               <h4 class="card-title ">{{ __('Caracterización') }}</h4>
               <p class="card-category"> {{ __('Reporte') }}</p>
            </div>
            <div class="card-body">
            @can('create', App\Model\Caracterizacion\Caracterizacion::class)
              @include('reporte.busqueda-grafico')
            @endcan
               <div class="row">
                  <div class="container">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <canvas id="myChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: [
                <?php
                    foreach($viabilidades as $via)
                    {
                        echo '"' . $via->viabilidad_caracterizacion . '",';
                    }
                ?>
            ],
            datasets: [
                {
                    label: "# of Votes",
                    data: [
                        <?php
                            foreach($viabilidades as $via)
                            {
                                echo '"' . $via->viabilidad . '",';
                            }
                        ?>
                    ],
                    backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(255, 159, 64, 0.2)"],
                    borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)", "rgba(153, 102, 255, 1)", "rgba(255, 159, 64, 1)"],
                    borderWidth: 1,
                },
            ],
        },
        
    });
</script>
@endsection