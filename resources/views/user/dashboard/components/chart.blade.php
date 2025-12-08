<div class="min-h-[200px] w-full">
    <div class="grid grid-cols-5 grid-rows-1 gap-4">
        <div class="col-span-3 rounded-sm shadow-sm">
            <div id="chart-square" class="w-full h-64"></div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const labels = {
                        in_progress: 'In progress',
                        all_tasks: 'All tasks',
                        completed: 'Completed',
                        expired: 'Expired'
                    };
                    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                    // Генерируем случайные данные для всех месяцев
                    const fullData = {
                        all_tasks: Array.from({length: 12}, () => Math.floor(Math.random() * 1000) + 100),
                        completed: Array.from({length: 12}, () => Math.floor(Math.random() * 1000) + 100),
                        in_progress: Array.from({length: 12}, () => Math.floor(Math.random() * 1000) + 100),
                        expired: Array.from({length: 12}, () => Math.floor(Math.random() * 1000) + 100),
                    };

                    const chartOptions = {
                        series: [
                            {name: labels.all_tasks, data: fullData.all_tasks},
                            {name: labels.completed, data: fullData.completed},
                            {name: labels.in_progress, data: fullData.in_progress},
                            {name: labels.expired, data: fullData.expired},
                        ],
                        chart: {height: 350, type: 'line', toolbar: {show: false,},},
                        xaxis: {categories: months},
                        stroke: {width: [2, 3, 4, 2], dashArray: [0, 0, 5, 2], curve: 'smooth'}
                    };
                    const chart = new ApexCharts(document.querySelector("#chart-square"), chartOptions);
                    chart.render();
                });
            </script>

        </div>
        <div class="col-span-2 col-start-4 rounded-sm shadow-sm">
            <div id="chart-circle" class="w-full h-64"></div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                        var options = {
                            series: [76, 67, 61, 90],
                            chart: {
                                height: 390,
                                type: 'radialBar',
                            },
                            plotOptions: {
                                radialBar: {
                                    offsetY: 0,
                                    startAngle: 0,
                                    endAngle: 270,
                                    hollow: {margin: 5, size: '30%', background: 'transparent'},
                                    dataLabels: {name: {show: false}, value: {show: false}},
                                    barLabels: {
                                        enabled: true,
                                        useSeriesColors: true,
                                        offsetX: -8,
                                        fontSize: '16px',
                                        formatter: function (seriesName, opts) {
                                            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                                        },
                                    },
                                }
                            },
                            colors: ['#1f6fff', '#f7bd00', '#00b848', '#f21827'],
                            labels: ['All tasks', 'In progress', 'Completed', 'Expired'],
                            responsive: [{
                                breakpoint: 480,
                                options: {legend: {show: false}}
                            }]
                        };
                        var chart = new ApexCharts(document.querySelector("#chart-circle"), options);
                        chart.render();
                    }
                )
                ;
            </script>
        </div>
    </div>
</div>
