<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                            <div class="nk-block-des text-soft">
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle"><span
                                    class="badge rounded-pill bg-warning text-dark">{{ date_format(date_create(), 'F') }}</span> <span
                                    class="badge rounded-pill bg-warning text-dark">{{ date('L') == 1 ? 366 - date('z') + 1 : 365 - date('z') + 1 }}
                                    Days Left </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="card-header border-bottom text-center">
                                            <h6 class="title">Employees</h6>
                                        </div><br>
                                        <div class="project-details text-center" style="text-size:15px;">
                                            <span>{{ count($employees) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="card-header border-bottom text-center">
                                            <h6 class="title">Leave Days Accumulated</h6>
                                        </div><br>
                                        <div class="project-details text-center" style="text-size:15px;">
                                            <span>{{ round(date('L') == 1 ? (21/366)*(date('z') + 1) : (21/365)*(date('z') + 1),2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="card-header border-bottom text-center">
                                            <h6 class="title">Average Leave Taken</h6>
                                        </div><br>
                                        <div class="project-details text-center" style="text-size:15px;">
                                            <span>{{ count($employees) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <h6 class="title" style="text-size:15px;">Latest Leaves Pending Approval
                                            </h6>
                                        </div>
                                        <div class="project-details">
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <h6 class="title" style="text-size:15px;">Employees With Most Days</h6>
                                        </div>
                                        <div class="project-details">
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <h6 class="title" style="text-size:15px;">Employees With Least Days</h6>
                                        </div>
                                        <div class="project-details">
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Name
                                                    <span>5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <p>Patrol</p>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <p>Attendance</p>
                                    <canvas id="myChart2" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('scripts')
    <script>
        // const entries = Object.entries(checked);
        // let arr = [];
        // let arr1 = [];
        // for (let i = 0; i < entries.length; i++) {
        //     arr.push(entries[i][0]);
        //     arr1.push(entries[i][1])
        // }
        // var weekdays = [];
        // for (let i = 0; i < arr.length; i++) {
        //     weekdays.push(new Date(arr[i]).toString().split(' ').shift());
        // }

        // const labels = weekdays.reverse();

        // var array = [];
        // const events = Object.entries(missed);

        // for (let i = 0; i < events.length; i++) {
        //     array.push(events[i][1]);
        // }

        // const data = {
        //     labels: labels,
        //     datasets: [{
        //             label: 'Checked',
        //             data: arr1.reverse(),
        //             backgroundColor: '#17AC61' // green
        //         },
        //         {
        //             label: 'Missed',
        //             data: array.reverse(),
        //             backgroundColor: '#D0021B' // red
        //         },
        //     ]
        // };

        // const config = {
        //     type: 'bar',
        //     data: data,
        //     options: {
        //         scales: {
        //             xAxes: [{
        //                 stacked: true
        //             }],
        //             yAxes: [{
        //                 stacked: true
        //             }]
        //         }
        //     }

        // };

        // //patrols
        // const myChart = new Chart(
        //     document.getElementById('myChart').getContext('2d'),
        //     config
        // );

        // //

        // var stuff = [];

        // const occurence = Object.entries(attendance);

        // for (let i = 0; i < occurence.length; i++) {
        //     stuff.push(occurence[i][1]);
        // }

        // const data2 = {
        //     labels: labels,
        //     datasets: [{
        //             label: 'Present',
        //             data: stuff.reverse(),
        //             backgroundColor: '#17AC61' // green
        //         },
        //         {
        //             label: 'Absent',
        //             data: [],
        //             backgroundColor: '#D0021B' // red
        //         },
        //     ]
        // };

        // const config2 = {
        //     type: 'bar',
        //     data: data2,
        //     options: {
        //         scales: {
        //             xAxes: [{
        //                 stacked: true
        //             }],
        //             yAxes: [{
        //                 stacked: true
        //             }]
        //         }
        //     }

        // };
        // const myChart2 = new Chart(
        //     document.getElementById('myChart2'),
        //     config2
        // );

        //another graph
    </script>
@endsection


{{-- code for days in month remining --}}
{{-- $days = cal_days_in_month(CAL_GREGORIAN, idate('m'), date('Y'));
$day = date('d');
$d = $days - $day;
if ($d > 1) {
    echo "$d Days Left";
} else {
    echo "$d Day Left";
} --}}
