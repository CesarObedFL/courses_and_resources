<DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Interactive Gantt Chart</title>

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>
        <!-- header -->
        <header>
            <!-- menu -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Interactive Gantt Chart</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /. menu -->
        </header>
        <!-- /. header -->


        <!-- /. main -->
        <main>
            <div class="jumbotron">
                <div class="row m-4">
                    <div class="col-lg-12 mb-lg-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                                    <div class="chart">
                                        <canvas id="tools-schedule-chart" class="chart-canvas" height="100px"></canvas>
                                    </div>
                                </div>
                                <h6 class="ms-2 mt-4 mb-0"> Tool's Schedule </h6>
                                <input type="hidden" id="point_a" value="">
                                <input type="hidden" id="point_b" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- /. main -->
    

        <!-- footer -->
        <div class="container">
            <footer class="sticky-bottom text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                <p>Desarrollado por César Obed Figueroa Luna &copy; 2024</p>
            </footer>
        </div>
        <!-- /. footer -->


        <!-- jquery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

        <!-- bootstrap -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- chartjs -->        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-dragdata@latest/dist/chartjs-plugin-dragdata.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1/dist/chartjs-plugin-zoom.min.js"></script>

        <script>
            // setup
            
            function setDate(day, hour) {
                var date = '';
                switch(day) {
                    case '1': date = '2024-09-01T'+hour; break;
                    case '2': date = '2024-09-02T'+hour; break;
                    case '3': date = '2024-09-03T'+hour; break;
                    case '4': date = '2024-09-04T'+hour; break;
                    case '5': date = '2024-09-05T'+hour; break;
                    case '6': date = '2024-09-06T'+hour; break;
                    case '7': date = '2024-09-07T'+hour; break;
                    default: date = '2024-09-01T'+hour; break;
                }
                return date;
            }

            function formatDate(date) {
                let datePart = [
                    date.getFullYear(),
                    date.getMonth() + 1,
                    date.getDate()
                ].map((n, i) => n.toString().padStart(i === 1 ? 2 : 2, "0")).join("-");
                let timePart = [
                    date.getHours(),
                    date.getMinutes(),
                    date.getSeconds()
                ].map((n, i) => n.toString().padStart(2, "0")).join(":");
                return datePart + "T" + timePart;
            }

            function validateDate(data, y, date_a, date_b, day){
                var overlap = false;
                for ( i = 0; i < data.length; i++ ) {
                    if( data[i].y == y && data[i].day == day ) {
                        console.log(data[i], date_a, date_b);
                        if( date_b > data[i].init  ) { 
                            if ( date_a > data[i].end ) {
                                overlap = true;
                            }
                        } else if ( date_b < data[i].init ) { 
                            if (date_a < data[i].end ) {
                                overlap = true;
                            }
                        }
                    }
                }
                return overlap;
            }

            (async () => {

                const responseRaw = await fetch("./webservice/api.php?resource=get_scheduler_data");
                const response = await responseRaw.json();

                var data_response = [];

                $.each(response, function(i, item) {
                    data_response.push(
                        //{ y: item.WS_ID, x: [ item.INICIO.split(':')[0], item.FIN.split(':')[0] ], init: item.INICIO, end: item.FIN, id: item.ID, day: item.DIASEM, type: item.TIPO_RESP, CVE_DEP: item.CVE_DEP, CVE_RESP: item.CVE_RESP }
                        { y: item.WS, x: [ setDate(item.DIASEM, item.INICIO) , setDate(item.DIASEM, item.FIN) ], init: item.INICIO, end: item.FIN, id: item.ID, day: item.DIASEM, type: item.TIPO_RESP, CVE_DEP: item.CVE_DEP, CVE_RESP: item.CVE_RESP }
                    );
                });


                const data = {
                    datasets: [{
                        label: 'Schedule', 
                        data: data_response, 
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderSkipped: false,
                        borderRadius: 10,
                        barPercentage: 0.5,
                    }]
                };

                // config 
                const config = {
                    type: 'bar',    
                    data,
                    options: {
                        responsive: true,
                        indexAxis: 'y',
                        scales: {
                            x: {
                                position: 'top',
                                dragData: true,
                                type: 'time',
                                time: {
                                    unit: 'day',
                                },
                                min: '2024-09-01',
                                max: '2024-09-08',          
                            },
                            y: {
                                dragData: false, // disables datapoint dragging for the entire axis
                            },
                        },
                        plugins: {
                            legend: {
                                display: false,     
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        const dataset = tooltipItem.dataset.data[tooltipItem.dataIndex];
                                        const hour_schedule = 'Schedule;  init:' + dataset.init + ' end:' + dataset.end;
                                        const CVE = (dataset.CVE_DEP != 'undefined' && dataset.CVE_DEP ) ? dataset.CVE_DEP : dataset.CVE_RESP;
                                        const additional_info = '( DIASEM: ' + dataset.day
                                                            + ' TIPO_RESP: ' + dataset.type
                                                            + ' CVE: ' + CVE + ' )';
                                        return hour_schedule + additional_info; 
                                    }
                                },
                            },
                            zoom: {
                                zoom: {                 
                                    wheel: {
                                        enabled: true,
                                    },
                                    pinch: {
                                        enabled: true
                                    },
                                    mode: 'xy',
                                }
                            },
                            dragData: {
                                round: 1,
                                showTooltip: false,
                                onDragStart: function (event, datasetIndex, index, value) {
                                    const { x } = value;
                                    const original_value = x;
                                    $("#point_a").val(original_value[0]);
                                    $("#point_b").val(original_value[1]);
                                },
                                onDrag: function (event, datasetIndex, index, value) {
                                    const original_value_a = $("#point_a").val();
                                    const original_value_b = $("#point_b").val();
                                    var new_value_x = formatDate(new Date(value.x));
                                    if ( new_value_x < original_value_b ) {
                                        if ( new_value_x > original_value_a ) {
                                            value.x = [ original_value_a, new_value_x ];
                                        } else if ( new_value_x < original_value_a ) {
                                            value.x = [ new_value_x, original_value_b ];
                                        }
                                    } else if ( new_value_x > original_value_b ) {
                                        value.x = [ original_value_a, new_value_x ];
                                    } else if ( new_value_x < original_value_a ) {
                                        value.x = [ new_value_x, original_value_b ];
                                    } else {
                                        value.x = [ original_value_a, original_value_b ];
                                    }
                                },
                                onDragEnd: function (event, datasetIndex, index, value) {
                                    const { x, y, id, day } = value;
                                    const d1 = x[0].split('-')[2].split('T')[0];
                                    const d2 = x[1].split('-')[2].split('T')[0];
                                    var new_day = day;
                                    if ( (d1 > day && d2 > day) || (d1 < day && d2 < day)) {
                                        new_day = parseInt(d1);
                                    }
                                    const x1 = x[0].split('T')[1].split(':')[0];
                                    const x2 = x[1].split('T')[1].split(':')[0];
                                    const new_init = (x1 < 10) ? '0'+x1+':00:00' : x1+':00:00';
                                    const new_end  = (x2 < 10) ? '0'+x2+':00:00' : x2+':00:00';
                                    if (validateDate(data_response, y, new_init, new_end, day)) {
                                        var send = { "new_init": new_init, "new_end": new_end, "new_day": new_day, "id": id };
                                        $.ajax({
                                            type: "POST",
                                            url: './webservice/api.php?resource=update_scheduler',
                                            headers: { 'Content-Type': 'application/json' },
                                            data: JSON.stringify(send),
                                            success: function(response) {
                                                console.log(response);
                                            },
                                            error:function(e){
                                                console.log(e.message);
                                            }
                                        }); 
                                        
                                    } else {
                                        alert('No puedes solapar horarios');
                                        location.reload();
                                    }
                                },
                            },
                        },
                    },
                };

                // render init block
                const myChart = new Chart(
                    document.getElementById('tools-schedule-chart'),
                    config
                );

            })()
        </script>

    </body>
</html>
