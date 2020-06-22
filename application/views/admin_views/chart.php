<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Monthly Sales Data"
                },
                axisX: {
                    valueFormatString: "MMM"
                },
                axisY: {
                    prefix: "$",
                    labelFormatter: addSymbols
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                },
                data: [{
                        type: "column",
                        name: "Tinggi Badan",
                        showInLegend: true,
                        xValueFormatString: "MMMM YYYY",
                        yValueFormatString: "$#,##0",
                        dataPoints: [{
                                x: new Date(2016, 0),
                                y: 20000
                            },
                            {
                                x: new Date(2016, 1),
                                y: 30000
                            },
                            {
                                x: new Date(2016, 2),
                                y: 25000
                            },
                            {
                                x: new Date(2016, 3),
                                y: 70000,
                                indexLabel: "High Renewals"
                            },
                            {
                                x: new Date(2016, 4),
                                y: 50000
                            },
                            {
                                x: new Date(2016, 5),
                                y: 35000
                            },
                            {
                                x: new Date(2016, 6),
                                y: 30000
                            },
                            {
                                x: new Date(2016, 7),
                                y: 43000
                            },
                            {
                                x: new Date(2016, 8),
                                y: 35000
                            },
                            {
                                x: new Date(2016, 9),
                                y: 30000
                            },
                            {
                                x: new Date(2016, 10),
                                y: 40000
                            },
                            {
                                x: new Date(2016, 11),
                                y: 50000
                            }
                        ]
                    },
                    {
                        type: "line",
                        name: "Berat Badan",
                        showInLegend: true,
                        yValueFormatString: "$#,##0",
                        dataPoints: [{
                                x: new Date(2016, 0),
                                y: 40000
                            },
                            {
                                x: new Date(2016, 1),
                                y: 42000
                            },
                            {
                                x: new Date(2016, 2),
                                y: 45000
                            },
                            {
                                x: new Date(2016, 3),
                                y: 45000
                            },
                            {
                                x: new Date(2016, 4),
                                y: 47000
                            },
                            {
                                x: new Date(2016, 5),
                                y: 43000
                            },
                            {
                                x: new Date(2016, 6),
                                y: 42000
                            },
                            {
                                x: new Date(2016, 7),
                                y: 43000
                            },
                            {
                                x: new Date(2016, 8),
                                y: 41000
                            },
                            {
                                x: new Date(2016, 9),
                                y: 45000
                            },
                            {
                                x: new Date(2016, 10),
                                y: 42000
                            },
                            {
                                x: new Date(2016, 11),
                                y: 50000
                            }
                        ]
                    },
                    {
                        type: "area",
                        name: "Tensi",
                        markerBorderColor: "white",
                        markerBorderThickness: 2,
                        showInLegend: true,
                        yValueFormatString: "$#,##0",
                        dataPoints: [{
                                x: new Date(2016, 0),
                                y: 5000
                            },
                            {
                                x: new Date(2016, 1),
                                y: 7000
                            },
                            {
                                x: new Date(2016, 2),
                                y: 6000
                            },
                            {
                                x: new Date(2016, 3),
                                y: 30000
                            },
                            {
                                x: new Date(2016, 4),
                                y: 20000
                            },
                            {
                                x: new Date(2016, 5),
                                y: 15000
                            },
                            {
                                x: new Date(2016, 6),
                                y: 13000
                            },
                            {
                                x: new Date(2016, 7),
                                y: 20000
                            },
                            {
                                x: new Date(2016, 8),
                                y: 15000
                            },
                            {
                                x: new Date(2016, 9),
                                y: 10000
                            },
                            {
                                x: new Date(2016, 10),
                                y: 19000
                            },
                            {
                                x: new Date(2016, 11),
                                y: 22000
                            }
                        ]
                    }
                ]
            });
            chart.render();

            function addSymbols(e) {
                var suffixes = ["", "K", "M", "B"];
                var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

                if (order > suffixes.length - 1)
                    order = suffixes.length - 1;

                var suffix = suffixes[order];
                return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
            }

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                e.chart.render();
            }

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>