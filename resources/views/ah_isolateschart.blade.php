@extends('layouts.app') 
@section('content')

        <div class="card " style="max-width: 13rem; padding: 0.21rem; margin-bottom: 0.3rem;">
              <table>
                <tr>
                    <td>
                        <!-- <label class="form-control-sm" for="period">Select District:</label> -->
                        <select name="district" class="form-control-sm" id="district">
                            <option  value="">- Select Surveillance Site -</option>
                             <option  value="">All</option>
                            @foreach ($districts as $key => $value)
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
       <!-- This graph represents the number of Isolates found in each organism for each district. -->
    </p>
</figure>
</div>

<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Animal Health Orgnisms Isolated for all the Surveillance Sites '
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
    series:[{
            name: 'Total Isolates Per Surveillance Site',
            data: <?php echo json_encode($series ?? '', JSON_NUMERIC_CHECK); ?>
        }]

});

</script>
<script type="text/javascript">
     $('#district').on('change',function(){   
        var selectedDist = $("#district option:selected").text();

          var UrlStr;  
                
            if(selectedDist =='All'){

                UrlStr = "{{url('allAhIsolates')}}";
                selectedDist= 'All Surveillance Sites'; 
            }else{
                UrlStr = "{{url('loadDataPerDistrict')}}";
            }
         
          $.ajax({
                    url: UrlStr,
                    type: 'GET',
                    data: {'district': selectedDist},
                    dataType: 'text',

                    success: function (data) {                         
                    var obj  =  JSON.parse(data);

    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Animal Health Orgnisms Isolated for '+selectedDist 
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
    series:[{
            name: 'Total Isolates Per Surveillance Site',
            data: obj.series
        }]

});
}
});
});

</script>
@endsection