@extends('layouts.app') 
@extends('layouts.tilesbar') 
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totalIsolates; ?></h3>

                <p>Isolated Organisms</p>
              </div>
              <div class="icon">
                <i class="ion ion-bug"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalFacilities; ?></h3>

                <p>Facilities</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="#"  id="showFacilitiesForm" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalTypes; ?></h3>

                <p>Specimen Types</p>
              </div>
              <div class="icon">
               <i class="ion ion-erlenmeyer-flask"></i>
              </div>
              <a href="#" id="showSpecimenTypes" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalPeriods; ?></h3>
                <p>Reporting Periods</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="#" id = "showPeriods" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>

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
            type: 'column'
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
        type: 'column'
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
        type: 'column'
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
              <!--Faciliities Form-->



<!--========= Facilities  Modal=========== -->

<div id="facilityModal" class="modal">

  <!-- Modal content -->
      <div class="modal-content">
                <span class="close">&times;</span>

                <p><b>Facilities</b></p>              

            <table id="addForm" border = "1">               
                <tr>
                    <td><b>No.<b></td>    
                    <td><b>Name<b></td>                   
                </tr>
                <?php $number = 1; ?>
                   @foreach ($facilityNames as $facility)
                        <tr>
                         <td> {{ $number}} </td>    
                        <td>{{ $facility }}</td>                       
                        </tr>
                       <?php $number++ ?>  
                    @endforeach          
                   
            </table>        

      </div>

</div>
<!-- ========End Form =======-->


<!--========= Specimen Types =========== -->

<div id="specimenModal" class="modal">
  
      <div class="modal-content">
                <span class="close">&times;</span>

                <p><b>Specimen Types</b></p>              

            <table id="addForm" border = "1">               
                <tr>
                    <td><b>No.<b></td>    
                    <td><b>Name<b></td>                   
                </tr>
                <?php $number = 1; ?>
                   @foreach ($specimenNames as $type)
                        <tr>
                         <td> {{ $number}} </td>    
                        <td>{{ $type }}</td>                       
                        </tr>
                       <?php $number++ ?>  
                    @endforeach          
                   
            </table>        

      </div>

</div>

<!-- ========End Form =======-->

<!--========= Specimen Types =========== -->

<div id="periodsModal" class="modal">
  
      <div class="modal-content">
                <span class="close">&times;</span>

                <p><b>Periods Considered</b></p>              

            <table id="addForm" border = "1">               
                <tr>
                    <td><b>No.<b></td>    
                    <td><b>Period<b></td>                   
                </tr>
                <?php $number = 1; ?>
                   @foreach ($periods as $period)
                        <tr>
                         <td> {{ $number}} </td>    
                        <td>{{ $period }}</td>                       
                        </tr>
                       <?php $number++ ?>  
                    @endforeach          
                   
            </table>        

      </div>

</div>

<!-- ========End Form =======-->



<script>
        // Get the modal
        var modal1 = document.getElementById("facilityModal");
        var modal2 = document.getElementById("specimenModal");        
        var modal3 = document.getElementById("periodsModal");
        // Get the button that opens the modal
        var btn1 = document.getElementById("showFacilitiesForm");
        var btn2 = document.getElementById("showSpecimenTypes");
        var btn3 = document.getElementById("showPeriods");


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        //var span2 = document.getElementsById("specimenClose")[0];


        // When the user clicks the button, open the modal 
        btn1.onclick = function() {
          modal1.style.display = "block";
        }

        btn2.onclick = function() {
          modal2.style.display = "block";
        }

        btn3.onclick = function() {
          modal3.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
         span.onclick = function() {
          modal1.style.display = "none";
          modal2.style.display = "none";
        } 

        //   span2.onclick = function() {          
        //   modal2.style.display = "none";
        // }       

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal1.style.display = "none";
          }
        }
</script>

<style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
        }

        /* The Close Button */
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
</style>  



      </div>

    </div>
  </div>
</div>


@endsection


