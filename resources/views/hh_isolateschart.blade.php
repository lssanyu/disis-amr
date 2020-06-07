@extends('layouts.app') 
@section('content')

            <div class="card text-center"  >
                <h5 class="card-title">Welcome to the DISIS Dashboard</h5>
            </div>
            <div class="card" style="max-width: 30rem; padding: 0.21rem; margin-bottom: 0.3rem; display: inline-block;">
                            <select style="max-width: 10rem; margin:0px; padding: 0px;" name="period" class="form-control-sm" id="rPeriod">
                                <option  value="">Select Period</option>
                                @foreach ($periods as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        
                            <select style="max-width: 10rem;" name="facility" class="form-control-sm" id="facility">
                                <option  value="">Select Facility</option>
                                @foreach ($facilities as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        
                            <input style="max-width: 10rem;" class="btn btn-sm"  type="submit" name="search" value="Search" id = "search">
                        
            
            </div>
<div class="card" style="position: relative; display: flex;">
<figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
    <div id="container" class="Highcharts-graph-container">
        {{-- graph section appears here --}}
    </div>
   <!--  <p class="highcharts-description">
        Bar chart showing horizontal columns, on th Y axis.
    </p> -->
</figure>
</div>

<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Number of Glass Priority Pathogens Isolated from <?php echo $facility; ?> in the period of <?php echo $period; ?>'
    },

    xAxis: {
        categories: <?php echo $categories; ?>,
        title: {
            text: "Organisms"
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Isolates'
           
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
    series:<?php echo json_encode($series ?? '', JSON_NUMERIC_CHECK); ?> 
});

</script>

<script type="text/javascript">
      $(document).on('click','#search',function(){   
        var selectedPeriod = $("#rPeriod option:selected").text();
        var selectedFacility = $("#facility option:selected").text();  

          $.ajax({
                    url: "{{url('loadDataForSpecificQuarter')}}",
                    type: 'GET',
                    data: {'rPeriod': encodeURIComponent(selectedPeriod),'facility':selectedFacility},
                    dataType: 'text',

                    success: function (data) {
                         
                        var obj  =  JSON.parse(data);                               
                 
                    Highcharts.chart('container', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Number of Glass Priority Pathogens Isolated from '+selectedFacility+' in the Period of '+selectedPeriod
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

@endsection
{{-- </div> --}}
 