@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Dashboard</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12">
        <livewire:dashboard.lead />
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
@endpush

@push('custom-scripts')
<script>
$(function() {

    $(document).ready(function() {
        $('.init-chart').click();
    })

    const initDashboardPageCharts = function(chart_data_main) {
        gradientChartOptionsConfigurationWithTooltipBlue = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.0)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#2380f7",
                    },
                }, ],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#2380f7",
                    },
                }, ],
            },
        };

        gradientChartOptionsConfigurationWithTooltipPurple = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.0)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#9a9a9a",
                    },
                }, ],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(225,78,202,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9a9a9a",
                    },
                }, ],
            },
        };

        gradientChartOptionsConfigurationWithTooltipOrange = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.0)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 110,
                        padding: 20,
                        fontColor: "#ff8a76",
                    },
                }, ],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(220,53,69,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#ff8a76",
                    },
                }, ],
            },
        };

        gradientChartOptionsConfigurationWithTooltipGreen = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.0)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#9e9e9e",
                    },
                }, ],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(0,242,195,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9e9e9e",
                    },
                }, ],
            },
        };

        gradientBarChartConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 120,
                        padding: 20,
                        fontColor: "#9e9e9e",
                    },
                }, ],

                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9e9e9e",
                    },
                }, ],
            },
        };

        var chart_labels = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];
        var ctx = document.getElementById("overview").getContext("2d");

        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, "rgba(72,72,176,0.1)");
        gradientStroke.addColorStop(0.4, "rgba(72,72,176,0.0)");
        gradientStroke.addColorStop(0, "rgba(119,52,169,0)"); //purple colors
        var config = {
            type: "line",
            data: {
                labels: chart_labels,
                datasets: [{
                    label: "Total",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: "#d346b1",
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: "#d346b1",
                    pointBorderColor: "rgba(255,255,255,0)",
                    pointHoverBackgroundColor: "#d346b1",
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: chart_data_main,
                }, ],
            },
            options: gradientChartOptionsConfigurationWithTooltipPurple,
        };
        var myChartData = new Chart(ctx, config);
    };

    document.addEventListener('initChart', function(data) {
        initDashboardPageCharts(data.detail.count)
    })
});
</script>
@endpush