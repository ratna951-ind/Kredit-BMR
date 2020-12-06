@extends('layouts.app')

@section('judul')
    Home
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.min.css')}}">
@endpush

@section('isi')
    @if(Auth::user()->peran_id == 1)
    <div class="row">
        <div class="col-xl-4 col-lg-8 col-16">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$kios}}</h3>
                                <h6>Kios</h6>
                            </div>
                            <div>
                                <i class="icon-home success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-8 col-16">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{$user}}</h3>
                                <h6>User</h6>
                            </div>
                            <div>
                                <i class="icon-users info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-8 col-16">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{$peran}}</h3>
                                <h6>Peran</h6>
                            </div>
                            <div>
                                <i class="icon-user info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->peran_id == 2)
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card">
                <div class="card-content">
                    <div class="earning-chart position-relative">
                        <div class="chart-title position-absolute mt-2 ml-2">
                            <h1 class="display-4">{{$total}}</h1>
                            <span class="text-muted">Total Order Tahun {{now()->year}}</span>
                        </div>
                        <canvas id="earning-chart" class="height-450"></canvas>
                        <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <canvas id="column-chart" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-24 col-48">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <center><h4 class="card-title">Rekomendasi Konsumen</h4></center>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                    <th width="1%">No Telp</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsumen as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->telp}}</td>
                                        <td>{{$data->alamatktp}}</td>
                                    </tr>
                                @endforeach
                                @if(count($konsumen)==0)
                                    <tr>
                                        <td colspan="4" align="center">Belum ada!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->peran_id == 3)
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card">
                <div class="card-content">
                    <div class="earning-chart position-relative">
                        <div class="chart-title position-absolute mt-2 ml-2">
                            <h1 class="display-4">{{$total}}</h1>
                            <span class="text-muted">Total Order Kios {{Auth::user()->kios->nama}} Tahun {{now()->year}}</span>
                        </div>
                        <canvas id="earning-chart" class="height-450"></canvas>
                        <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <canvas id="column-stacked" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-24 col-48">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <canvas id="column-chart" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->peran_id == 4)
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$order}}</h3>
                                <h6>Order Hari Ini</h6>
                            </div>
                            <div>
                                <i class="icon-check success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">Rp {{number_format($sisa_saldo,0,",",".")}}</h3>
                                <h6>Sisa Saldo</h6>
                            </div>
                            <div>
                                <i class="icon-wallet info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->peran_id == 5)
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Kios</th>
                                <th>Admin</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kioss as $kios)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td>Kios {{$kios->nama}}</td>
                                    <td>
                                        @foreach ($kios->user as $user)
                                            @if($user->peran_id == 4)
                                                {{$user->nama}}
                                                @break
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>Rp {{count($kios->kas_bank) ? number_format($kios->kas_bank[count($kios->kas_bank)-1]->sisa,0,",",".") : 0}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @elseif(Auth::user()->peran_id == 6)
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card">
                <div class="card-content">
                    <div class="earning-chart position-relative">
                        <div class="chart-title position-absolute mt-2 ml-2">
                            <h1 class="display-4">{{$total}}</h1>
                            <span class="text-muted">Total Order Tahun {{now()->year}}</span>
                        </div>
                        <canvas id="earning-chart" class="height-450"></canvas>
                        <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-24">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <canvas id="column-chart" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('js')
    <script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}"></script>
    <script>
        $(window).on("load", (function() {
            @if(Auth::user()->peran_id == 2 || Auth::user()->peran_id == 3 || Auth::user()->peran_id == 6)
            var l = document.getElementById("earning-chart").getContext("2d");
            new Chart(l, {
                type: "line",
                options: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                    datasetStrokeWidth: 3,
                    pointDotStrokeWidth: 4,
                    tooltipFillColor: "rgba(0,0,0,0.8)",
                    legend: {
                        display: !1,
                        position: "bottom"
                    },
                    hover: {
                        mode: "label"
                    },
                    scales: {
                        xAxes: [{
                            display: !1
                        }],
                        yAxes: [{
                            display: !1,
                            ticks: {
                                min: 0,
                                max: 70
                            }
                        }]
                    },
                    title: {
                        display: !1,
                        fontColor: "#FFF",
                        fullWidth: !1,
                        fontSize: 40,
                        text: "82%"
                    }
                },
                data: {
                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"],
                    datasets: [{
                        label: "Order",
                        data: @json($order),
                        backgroundColor: "rgba(255,117,136,0.12)",
                        borderColor: "#FF4961",
                        borderWidth: 3,
                        strokeColor: "#FF4961",
                        capBezierPoints: !0,
                        pointColor: "#fff",
                        pointBorderColor: "#FF4961",
                        pointBackgroundColor: "#FFF",
                        pointBorderWidth: 3,
                        pointRadius: 5,
                        pointHoverBackgroundColor: "#FFF",
                        pointHoverBorderColor: "#FF4961",
                        pointHoverRadius: 7
                    }]
                }
            });
            @endif
            @if(Auth::user()->peran_id == 2 || Auth::user()->peran_id == 3 || Auth::user()->peran_id == 6)
             //Get the context of the Chart canvas element we want to select
            var ctx = $("#column-chart");

            // Chart Options
            var chartOptions = {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each bar to be 2px wide and green
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration:500,
                legend: {
                    position: 'top',
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: "#f3f3f3",
                            drawTicks: false,
                        },
                        scaleLabel: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: "#f3f3f3",
                            drawTicks: false,
                        },
                        scaleLabel: {
                            display: true,
                        },
                        ticks: {
                            min: 0,
                            stepSize: 1
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Perbandingan Performance'
                }
            };

            // Chart Data
            var chartData = {
                labels: ["Order"],
                datasets: [{
                    label: "Bulan Sebelumnya",
                    data: [{{$order[(now()->month)-2]}}],
                    backgroundColor: "#28D094",
                    hoverBackgroundColor: "rgba(22,211,154,.9)",
                    borderColor: "transparent"
                }, {
                    label: "Bulan Sekarang",
                    data: [{{$order[(now()->month)-1]}}],
                    backgroundColor: "#F98E76",
                    hoverBackgroundColor: "rgba(249,142,118,.9)",
                    borderColor: "transparent"
                }]
            };

            var config = {
                type: 'bar',

                // Chart Options
                options : chartOptions,

                data : chartData
            };

            var lineChart = new Chart(ctx, config);
            @endif
            
            @if(Auth::user()->peran_id == 3)
            // Create the chart
            
            var a = $("#column-stacked");
            new Chart(a, {
                type: "bar",
                options: {
                    title: {
                        display: !1,
                        text: "Chart.js Column Chart - Stacked"
                    },
                    tooltips: {
                        mode: "label"
                    },
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500,
                    scales: {
                        xAxes: [{
                            stacked: !0,
                            display: !0,
                            gridLines: {
                                color: "#f3f3f3",
                                drawTicks: !1
                            },
                            scaleLabel: {
                                display: !0
                            }
                        }],
                        yAxes: [{
                            stacked: !0,
                            display: !0,
                            gridLines: {
                                color: "#f3f3f3",
                                drawTicks: !1
                            },
                            scaleLabel: {
                                display: !0
                            },
                            ticks: {
                                min: 0,
                                stepSize: 1
                            }
                        }]
                    }
                },
                data: {
                    labels: @json($group),
                    datasets: [{
                        label: "Order MCE",
                        data: @json($order_group),
                        backgroundColor: "#FF4961",
                        hoverBackgroundColor: "#FF566D",
                        borderColor: "transparent"
                    }]
                }
            })
            @endif
        }));
    </script>
@endpush