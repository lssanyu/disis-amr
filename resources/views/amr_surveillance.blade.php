@extends('layouts.app') 
@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">Samples with Growth</div>
        <div class="card-body">
            <div class="card" style="position: relative; display: flex; height: 20rem;">
                <figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
                    <div id="container_growth" class="Highcharts-graph-container" style="height: 17rem;">
                        {{-- graph section appears here --}}
                    </div>
                    
                </figure>
            </div>

<script type="text/javascript">
        Highcharts.chart('container_growth', {
        chart: {
            type: 'bar'
        },
        title: {
            text:'Number of Samples with Growth For <?php echo $facility_growth; ?>'
        },

        xAxis: {
            categories: <?php echo $categories_growth; ?>,
            title: {
                text: "Reporting Period"
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Samples with Growth',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' isolate(s)'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series:<?php echo json_encode($series_growth ?? '', JSON_NUMERIC_CHECK); ?> 
    });

</script>

<script type="text/javascript">
     $('#facility').on('change',function(){   
        var selectedFty = $("#facility option:selected").text();      
            
          $.ajax({
                    url: "{{url('loadDataPerFacility')}}",
                    type: 'GET',
                    data: {'facility': selectedFty},
                    dataType: 'text',

                    success: function (data) {
                         
                        var obj  =  JSON.parse(data); 
    Highcharts.chart('container_growth', {
    chart: {
        type: 'bar'
    },
    title: {
        text:'Number of Samples with Growth For '+selectedFty
    },

    xAxis: {
        categories: obj.categories,
        title: {
            text: "Reporting Period"
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Samples with Growth',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' isolate(s)'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: obj.series
});
}
});
});

</script>
      </div>
    <!--   <div class="card-footer"> 
        <p class="highcharts-description">
                Bar chart showing horizontal columns, on th Y axis.
        </p>
    </div> -->
    </div>
  </div>
</div>
<div class="clear-div"></div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">Glass Priority Pathogens </div>
      <div class="card-body">
        <div class="card" style="position: relative; display: flex; height: 20rem;">
<figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
    <div id="container_isolateschart" class="Highcharts-graph-container" style="height: 17rem;">
        {{-- graph section appears here --}}
    </div>
</figure>
</div>

<script type="text/javascript">
    Highcharts.chart('container_isolateschart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Number of Glass Priority Pathogens Isolated from <?php echo $facility; ?> in the period of <?php echo $period; ?>'
    },

    xAxis: {
        categories: <?php echo $categories_isolates; ?>,
        title: {
            text: "Organisms"
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Isolates',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' isolates'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series:<?php echo json_encode($series_isolates ?? '', JSON_NUMERIC_CHECK); ?> 
});

</script>

<script type="text/javascript">
    $('#rPeriod').on('change',function(){
        var selectedOptionText = $("#rPeriod option:selected").text();
        alert(selectedOptionText);

          $.ajax({
                    url: "{{url('loadDataForSpecificQuarter')}}",
                    type: 'GET',
                    data: {'rPeriod': encodeURIComponent(selectedOptionText)},
                    dataType: 'text',

                    success: function (data) {       

                        alert(data);   
                        var obj  =  JSON.parse(data);   

                        alert(obj); 

                        alert(obj[0].series);             
                 
                    Highcharts.chart('container_isolateschart', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Number of Glass Priority Pathogens Isolated from all Facilities'
                        },

                        xAxis: {
                            categories: obj.categories,
                            title: {
                                text: "Organisms"
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Number of Isolates',
                                align: 'high'
                            },
                            labels: {
                                overflow: 'justify'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' isolates'
                        },
                        plotOptions: {
                            bar: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -40,
                            y: 80,
                            floating: true,
                            borderWidth: 1,
                            backgroundColor:
                                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                            shadow: true
                        },
                        credits: {
                            enabled: false
                        },
                        series: obj.series
                    });

                    }
        });

    });
</script>
      </div>
  <!--     <div class="card-footer">
        <p class="highcharts-description">
            Bar chart showing horizontal columns, on th Y axis.
       </p>
       <p class="highcharts-description">
            
       </p>
    </div> -->
    </div>
  </div>
</div>

@endsection