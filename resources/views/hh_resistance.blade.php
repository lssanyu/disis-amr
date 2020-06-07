@extends('layouts.app') 
@section('content')

<div class="card " style="max-width: 25rem; padding: 0.21rem; margin-bottom: 0.3rem;">
     
    <div class="card" style="max-width: 30rem; padding: 0.21rem; margin-bottom: 0.3rem; display: inline-block;">
                
          
        <select style="max-width: 10rem; margin:0px; padding: 0px;" name="organism" class="form-control-sm" id="organism">
                    <option  value="">--- Select Organism ---</option>
                    @foreach ($organisms as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
        </select>       
                
       
        <select style="max-width: 10rem; margin:0px; padding: 0px;" name="specimen" class="form-control-sm" id="specimen">

                    <option  value="">--- Select ---</option>
                    @foreach ($specimenData as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
         </select>

        <input style="max-width: 10rem;" class="btn btn-sm"  type="submit" name="search" value="Search" id = "search">

    </div>
            
        
      
 </div>

      

<div class="card" style="position: relative; display: flex;">
    <figure class="highcharts-figure" style=" margin: 20px; padding:5px; display: flex; flex-wrap: wrap; align-items: center;">
            <div id="container" class="Highcharts-graph-container">
                {{-- graph section appears here --}}
            </div>
             <p class="highcharts-description">
                 * = GLASS priority antibiotics
             </p>
    </figure>
</div>

<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'xy'
    },
    title: {
        text: '<?php echo $organism;?> - <?php echo $specimen;?> (n = (<?php echo $numberOfIsolates; ?>)'
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
    $(document).on('click','#search',function(){   
        var selectedOrganism = $("#organism option:selected").text();
        var selectedSpecimen = $("#specimen option:selected").text();  
          $.ajax({
                    url: "{{url('loadHumanResData')}}",
                    type: 'GET',
                    data: {'organism': selectedOrganism,'specimen':selectedSpecimen},
                    dataType: 'text',

                    success: function (data) {
                         
                        var obj  =  JSON.parse(data);  
    Highcharts.chart('container', {
    chart: {
        type: 'xy'
    },
    title: {
        text: selectedOrganism +' - '+ selectedSpecimen+' (n = '+obj.numberOfIsolates+' )'
    },

    xAxis: {
        categories: obj.categories,
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
            data: obj.series,
             tooltip: {
                        pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}% </b>'
            }

        },{
            name: 'Resistance Error',
            type: 'errorbar',             
            data:obj.errorData,
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