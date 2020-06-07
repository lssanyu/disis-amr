@extends('layouts.app') 
@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">Human Health Resistance Patterns</div>
        <div class="card-body">
            <div class="card" style="position: relative; display: flex; height: 20rem;">
                <figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
                    <div id="container_hh" class="Highcharts-graph-container" style="height: 17rem;">
                        {{-- graph section appears here --}}
                    </div>
                    
                </figure>
            </div>

        <script type="text/javascript">
    Highcharts.chart('container_hh', {
    chart: {
        type: 'xy'
    },
    title: {
        text: '<?php echo $organism_hh;?> - <?php echo $specimen;?> (n = (<?php echo $numberOfIsolates; ?>)'
    },

    xAxis: {
        categories: <?php echo $categories_hh; ?>,
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

    tooltip: {
        shared: true
    },
    series:[{
            name: 'Non Susceptible Isolates',
             type: 'column',
            data: <?php echo json_encode($series_hh ?? '', JSON_NUMERIC_CHECK); ?>,
             tooltip: {
                        pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}% </b>'
            }

        },{
            name: 'Resistance Error',
            type: 'errorbar',             
            data: <?php echo json_encode($errorData_hh ?? '', JSON_NUMERIC_CHECK); ?>,
            tooltip: {
              pointFormat: ' (error range: {point.low}-{point.high} %)<br/>'
         }
  }]         


});

</script>
      </div>
      <div class="card-footer"> 
        <p class="highcharts-description">
          * = GLASS priority antibiotics.
        </p>
      </div>
  </div>
  </div>
</div>

<div class="clear-div"></div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">Animal Health Resistance Patterns</div>
        <div class="card-body">
            <div class="card" style="position: relative; display: flex; height: 20rem;">
                <figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
                    <div id="container_ah" class="Highcharts-graph-container" style="height: 17rem;">
                        {{-- graph section appears here --}}
                    </div>
                    
                </figure>
            </div>

              <script type="text/javascript">
                  Highcharts.chart('container_ah', {
                  chart: {
                      type: 'xy'
                  },
                  title: {
                    
                      text: '<?php echo $organism_ah;?> ( n = 90)'
                  },

                  xAxis: {
                      categories: <?php echo $categories_ah; ?>,
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

                  tooltip: {
                      shared: true
                  },
                  series:[{
                          name: 'Non Susceptible Isolates',
                           type: 'column',
                          data: <?php echo json_encode($series_ah ?? '', JSON_NUMERIC_CHECK); ?>,
                           tooltip: {
                                      pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}% </b>'
                          }

                      },{
                          name: 'Resistance Error',
                          type: 'errorbar',             
                          data: <?php echo json_encode($errorData_ah ?? '', JSON_NUMERIC_CHECK); ?>,
                          tooltip: {
                            pointFormat: ' (error range: {point.low}-{point.high} %)<br/>'
                       }
                }]         


              });

              </script>
</div>
      <div class="card-footer"> 
        <p class="highcharts-description">
          This graph represents the percentage of resistance of Ecoli to a range of Antibiotics.
        </p>
        </div>
    </div>
  </div>
</div>


@endsection
