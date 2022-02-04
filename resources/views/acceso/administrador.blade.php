@extends('layouts.template')


@section('title', 'Administrador: ' . auth()->user()->usuario->u_nom)


@section('content')

    <div class="pagetitle">
        <h1>Entorno de Trabajo de {{ auth()->user()->usuario->u_nom }} {{ auth()->user()->usuario->u_app }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"> </div>
                    <div class="card-body">
                        <h5 class="card-title">Ganancias del mes</h5>
                        <p class="card-text">
                            Ganancias del mes: {{ $reportes['ganancia_mensual'] . " $" }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">

                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"> </div>
                    <div class="card-body">
                        <h5 class="card-title">Ganancias del año </h5>
                        <p class="card-text">
                            Ganancias del año : {{ $reportes['ganancia_mensual'] . " $" }}
                        </p>
                    </div>
                </div>

            </div>

            <div class="col">

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header"> </div>
                    <div class="card-body">
                        <h5 class="card-title">Total de clientes</h5>
                        <p class="card-text">
                            Total de clientes: {{ $reportes['total_clientes'] }}
                        </p>
                    </div>
                </div>

            </div>

            <div class="col">

                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header"> </div>
                    <div class="card-body">
                        <h5 class="card-title">Producto mas vendido</h5>
                        <p class="card-text">
                            Producto mas vendido:
                            {{ $reportes['producto_mas_vendido']->p_nom . ' (' . $reportes['producto_mas_vendido']->sum . ')' }}
                        </p>
                    </div>
                </div>

            </div>

            <div class="col">

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"> </div>
                    <div class="card-body">
                        <h5 class="card-title">Producto con mayor ganancia</h5>
                        <p class="card-text">Producto con mayor ganancia:
                            {{ $reportes['producto_mayor_ganancia']->p_nom . ' (' . $reportes['producto_mayor_ganancia']->sum . " $)" }}
                        </p>
                    </div>
                </div>

            </div>


        </div>

        <div class="row">



            <section class="section">
                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ventas por producto</h5>

                                <!-- Pie Chart -->
                                <div id="pieChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    function httpGet(theUrl) {
                                        var xmlHttp = new XMLHttpRequest();
                                        xmlHttp.open("GET", theUrl, false); // false for synchronous request
                                        xmlHttp.send(null);
                                        return xmlHttp.responseText;
                                    }

                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#pieChart")).setOption({
                                            title: {
                                                text: 'Ventas por producto',
                                                subtext: 'Reporte',
                                                left: 'center'
                                            },
                                            tooltip: {
                                                trigger: 'item'
                                            },
                                            legend: {
                                                orient: 'vertical',
                                                left: 'left'
                                            },
                                            series: [{
                                                name: 'Torta',
                                                type: 'pie',
                                                radius: '50%',
                                                data: JSON.parse(httpGet("{{ route('charts') }}"),),
                                                emphasis: {
                                                    itemStyle: {
                                                        shadowBlur: 10,
                                                        shadowOffsetX: 0,
                                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                    }
                                                }
                                            }]
                                        });
                                    });
                                </script>
                                <!-- End Pie Chart -->

                            </div>
                        </div>
                    </div>

                </div>
            </section>


        </div>
    </div><!-- End Page Title -->


@endsection
