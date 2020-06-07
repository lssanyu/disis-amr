@extends('layouts.app') 
@section('content')

<div class="card " style="max-width: 10.3rem; padding: 0.21rem; margin-bottom: 0.3rem;">
      <table>
        <tr>
            <td>
                <!-- <label class="form-control-sm" for="period">Select Facility:</label> -->
                <select name="facility" class="form-control-sm" id="facility">
                    <option  value="">--- Select Facility---</option>
                    @foreach ($facilities as $key => $value)
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
        text:'Number of Samples with Growth For <?php echo $facility; ?>'
    },

    xAxis: {
        categories: <?php echo $categories; ?>,
        title: {
            text: "Reporting Period"
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Samples with Growth'
           
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
    series:<?php echo json_encode($series ?? '', JSON_NUMERIC_CHECK); ?> 
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
    Highcharts.chart('container', {
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

@endsection