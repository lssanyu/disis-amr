@extends('layouts.app') 
@section('content')

<div class="card " style="max-width: 11.65rem; padding: 0.21rem; margin-bottom: 0.3rem;">
      <table>
        <tr>
            <td>
                <!-- <label class="form-control-sm" for="period">Select Organism:</label> -->
                <select name="organism" class="form-control-sm" id="organism">
                    <option  value="">--- Select Organism ---</option>
                    @foreach ($organisms as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </td>
        
        </tr>
      </table>
    
 </div>

<div class="card" style="position: relative; display: flex;">
<figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
    <div id="container" class="Highcharts-graph-container">
        {{-- graph section appears here --}}
    </div>
    <p class="highcharts-description">
       <!-- This graph represents the percentage of resistance of Ecoli to a range of Antibiotics. -->
    </p>
</figure>
</div>

<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'xy'
    },
    title: {
        text: '<?php echo $organism; ?> ( n = 90)'
    },

    xAxis: {
        categories: <?php echo $categories; ?>,
        title: {
            text: "Antibiotics"
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Percentage of Non Susceptible Isolates'           
        },
        labels: {
            overflow: 'justify'
        }
    }, 
    plotOptions: {
        column: {
            dataLabels: {
                enabled: false
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

    tooltip: {
        shared: true
    },
    series:[{
            name: 'Non Susceptible Isolates',
             type: 'column',
            data: <?php echo json_encode($series ?? '', JSON_NUMERIC_CHECK); ?>,
             tooltip: {
                        pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}% </b>'
            }

        },{
            name: 'Resistance Error',
            type: 'errorbar',             
            data: <?php echo json_encode($errorData ?? '', JSON_NUMERIC_CHECK); ?>,
            tooltip: {
              pointFormat: ' (error range: {point.low}-{point.high} %)<br/>'
         }
  }]         


});

</script>

<script type="text/javascript">
    $('#organism').on('change', function(){   
        var selectedOrg = $("#organism option:selected").text();  
              
          $.ajax({
                    url: "{{url('loadDataForSpecificOrganism')}}",
                    type: 'GET',
                    data: {'organism': encodeURIComponent(selectedOrg)},
                    dataType: 'text',

                    success: function (data) {                       
                         
                    var obj  =  JSON.parse(data);


            Highcharts.chart('container', {
            chart: {
                type: 'xy'
            },
            title: {
                text: selectedOrg +' (n = 90)'
            },

            xAxis: {
                categories: obj.categories ,
                title: {
                    text: "Antibiotics"
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Percentage of Non Susceptible Isolates'           
                },
                labels: {
                    overflow: 'justify'
                }
            }, 
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: false
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

            tooltip: {
                shared: true
            },
            series:[{
                    name: 'Non Susceptible Isolates',
                     type: 'column',
                    data:obj.series,
                     tooltip: {
                                pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}% </b>'
                    }

                },{
                    name: 'Resistance Error',
                    type: 'errorbar',             
                    data: obj.errorData,
                    tooltip: {
                      pointFormat: ' (error range: {point.low}-{point.high} %)<br/>'
                 }
          }]         
        });
        }
        });
     });

</script>


@endsection