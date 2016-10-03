

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
            google.load("visualization", "1.1", {packages: ["bar"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Total Quantity', 'Available Quantity', 'Damaged Quantity'],
<?php
foreach ($chart_data as $data) {
    echo '[' . $data->totalquantity. ',' . $data->availablequantity . ',' . $data->damagedquantity.'],';
}
?>
                ]);

                var options = {
                    chart: {
                        title: '<?php echo $name?>',
                        subtitle:'luke',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>        
        <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
    </body>
</html>