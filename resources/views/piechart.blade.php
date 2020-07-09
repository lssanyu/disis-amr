
 <figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
        <div id="container" class="Highcharts-graph-container">
            {{-- graph section appears here --}}
        </div>
       
  </figure>


<script type="text/javascript">
  /*-----------------------Pie Chart for default data------*/
  
       Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Number of Organisms Isolated for all Facilities'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                size:'100%',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },      
        series: [{
            name: 'Organisms Isolated',
            colorByPoint: true,
            data: <?php echo $series; ?>
        }]
    });


/*-----------------------Pie Chart Graph for a specific facility and Period------*/
 $(document).on('click','#search',function(){   

        var selectedFacility = $("#facility option:selected").text();
        var selectedPeriod = $("#rPeriod option:selected").text();
        var UrlStr;

            if(selectedFacility =='All' && selectedPeriod =='All'){

                UrlStr = "{{url('getAllPieChartData')}}";     

            }else{
                UrlStr = "{{url('getSpecificPieData')}}";
            }
        

          $.ajax({
                    url: UrlStr,
                    type: 'GET',
                    data: {'facility': selectedFacility,'rPeriod':selectedPeriod},
                    dataType: 'text',

                    success: function (data) {
                         
                        var obj  =  JSON.parse(data);  


                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Number of Organisms Isolated for '+ selectedFacility +' in the period of '+ selectedPeriod
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        series: [{
                            name: 'Organisms Isolated',
                            colorByPoint: true,
                            data:obj.series
                           }]
                        });
        }
    });
});

</script>





	
