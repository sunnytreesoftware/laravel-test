@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <!-- <canvas id="TrafficChart"></canvas>   -->
                            <canvas id="salesChart" height="100px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var myChart = new Chart( document.getElementById("salesChart"), {
        type: 'line',
        data: {
            labels: [
                @foreach($days as $day)
                    "{{ $day }}",
                @endforeach
            ],
            datasets: [
                {
                    label: "Paid Order",
                    borderColor: "rgb(92, 184, 92)",
                    borderWidth: "1",
                    // backgroundColor: "rgb(92, 184, 92)",
                    data: [
                        @foreach($days_paid as $data)
                            "{{ $data }}",
                        @endforeach
                    ]
                },
                {
                    label: "Un Paid Order",
                    borderColor: "rgb(217, 83, 79)",
                    borderWidth: "1",
                    // backgroundColor: "rgb(217, 83, 79)",
                    data: [
                        @foreach($days_unpaid as $data)
                            "{{ $data }}",
                        @endforeach
                    ]
                }
            ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }

        }
    });
</script>
@endsection
