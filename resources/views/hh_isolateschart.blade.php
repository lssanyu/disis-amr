@extends('layouts.app') 
@section('content')
            <div class="card text-center"  >
               
            </div>
            <div class="card" style="width: 100%; padding: 0.21rem; margin-bottom: 0.3rem; display: inline-block;">
                <div  class="nav nav-pills" style="float: left;">
                            <select style="max-width: 10rem; margin:0px; padding: 0px;" name="period" class="form-control-sm" id="rPeriod">
                                <option  value="">Select Period</option>
                                <option  value="">All</option>
                                @foreach ($periods as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        
                            <select style="max-width: 10rem;" name="facility" class="form-control-sm" id="facility">
                                <option  value="">Select Facility</option>
                                 <option  value="">All</option>
                                @foreach ($facilities as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        
                            <input style="max-width: 10rem;" class="btn btn-sm"  type="submit" name="search" value="Search" id = "search">
                      </div>
                      <div class="nav nav-tabs pro" style="float: right"> 
                         <a class="nav-item nav-link form-control-sm graph" href="#">Graph</a>
                         <a class="nav-item nav-link form-control-sm piechart" href="#">Pie Chart</a>
                    </div>              
            
            </div>
<!-- graph -->
<div id="graph_org" class="card" style="position: relative; display: flex;">
    <div class="pop" id="1" style="display: block">
    <div class="mem">
        <figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
    <div id="container_graph" class="Highcharts-graph-container">
        {{-- graph section appears here --}}
    </div>
   <!--  <p class="highcharts-description">
        Bar chart showing horizontal columns, on th Y axis.
    </p> -->
</figure>
</div>
    </div>
</div>
<div class="pop" id="2" style="display: none;">
    <div class="mem">
        <!-- partchart -->
<div id="piechart" class="card" style="position: relative; display: none;">
<figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
    <div id="container_piechart" class="Highcharts-graph-container">
        {{-- graph section appears here --}}
    </div>
   <!--  <p class="highcharts-description">
        Bar chart showing horizontal columns, on th Y axis.
    </p> -->
</figure>
</div>
    </div>
</div>

<script type="text/javascript">
    Highcharts.chart('container_graph', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Number of Glass Priority Pathogens Isolated from All Facilities'
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
        column: {
            dataLabels: {
                enabled: true
            },
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
     legend: {    
        align: 'center',
        horizontalAlign: 'left',
        layout: 'horizontal'
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
        var UrlStr;
        
            if(selectedFacility=='All' && selectedPeriod=='All'){
                UrlStr = "{{url('allData')}}";
                selectedFacility = 'All Facilities';
                selectedPeriod = 'All Periods';

            }else{
                UrlStr = "{{url('loadDataForSpecificQuarter')}}";
            }

          $.ajax({
                    url: UrlStr,
                    type: 'GET',
                    data: {'rPeriod': encodeURIComponent(selectedPeriod),'facility':selectedFacility},
                    dataType: 'text',

                    success: function (data) {
                         
                        var obj  =  JSON.parse(data);                               
                 
                    Highcharts.chart('container_graph', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Number of Glass Priority Pathogens Isolated from '+selectedFacility+' for '+selectedPeriod + ',  Disaggregated by Specimen Type'
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
                            column: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                         legend: {    
                            align: 'center',
                            horizontalAlign: 'left',
                            layout: 'horizontal'
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
<script type="text/javascript">
    $(document).ready(function () {
        $('.pro a').click(function (event) {
            event.preventDefault();
            $('.pop').hide().eq($(this).index()).fadeIn(function () {
                $(this).css({
                    'display': 'block'
                }, 550);
            });
        });

        $('.graph').on('click',function(){
            $('#graph_org').css('display','block');
            $('#piechart').css('display','none');
        })
        $('.piechart').on('click',function(){
            $('#piechart').css('display','block').load("{{ url('/getAllPieChartData')}}");
            $('#graph_org').css('display','none');
        })


});
</script>
@endsection
 