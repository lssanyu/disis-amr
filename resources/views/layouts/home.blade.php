@extends('layouts.app') 
@extends('layouts.tilesbar') 
@section('content')
<link rel="stylesheet" type="text/css" href="../assets/modal.css">
      
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
              <a href="#" id="showOrganismsForm" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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

        <div id="main" style="width: auto; float: right; line-height: 2.5;">
          
          <div class="main-panel" id="main-panel" style="margin-right: 1rem">
          
           <div class="container" style="border: 1px solid rgba(0,0,0,.125)">
                  <div style="margin: 2rem">
                   
                    <p>
                      The objective of the Data Integration and Sharing Center (DISC) is to aggregate One Health (OH) Antimicrobial Resistance (AMR) and Antimicrobial Use/Consumption (AMU/C) surveillance data to provide timely information for informed decision making. This is enabled by the Data Integration and Sharing Information System (DISIS) currently being piloted with support from the UK Fleming Fund Project through the Infectious Diseases Institute. <br />
                    This dashboard is an interactive tool for visualization of Antimicrobial Resistance data. It facilitates understanding and communication of important trends in Antimicrobial Resistance as well as   performance of the National One Health Antimicrobial Resistance and Antimicrobial Use surveillance Programmes. 
                    </p>

                  </div>
                  <div class="row" style="margin-left: 15rem; margin-top: 3rem;">
                  <div align="left"  class="col-md">
                     <img class="amr-site-map" src="assets/img/AMR SITES.png" align="center">
                  </div>
                    <div class="col-md">
                      <h6><u><b> WHAT YOU CAN DO WITH DISIS:</b></u></h6>
                        <dl>
                          <dt>View AMR data on the following select indictors.<a href="{{ route('ah_resistance') }}">
                            
                              <dd><span>&bull; </span><u> <a href="{{ route('samples_cultured') }}">Number of microbiology samples collected for culture and antimicrobial sensitivity testing (AST)</a></u></dd>
                              <dd><span>&bull; </span><u><a href="{{ route('sample_with_growth') }}">Number of microbiology samples yielding pathogenic bacteria of clinical significance</a></u></dd>
                              <dd><span>&bull; </span><u><a href="{{ route('hh_resistance') }}#">Percentage of patients with resistant organisms to specific antibiotics.</a></u></dd>
                            
                          </dt>
                          <dt>Print reports in PDF and PNG formats.</dt>
                          <dt>Look out for additional options in graphs.</dt>
                          <dt>Map Showing Surveillance Sites.</dt>
                        </dl>
                    </div>




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

<!--========= Organisms  Modal=========== -->

<div id="organismsModal" class="modal">

  <!-- Modal content -->
      <div class="modal-content">
                <span class="close">&times;</span>

                <p><b>Isolated Organisms</b></p>              

            <table id="addForm" border = "1">               
                <tr>
                    <td><b>No.<b></td>    
                    <td><b>Name<b></td>                   
                </tr>
                <?php $number = 1; ?>
                   @foreach ($allOrganisms as $organism)
                        <tr>
                         <td> {{ $number}} </td>    
                        <td>{{ $organism }}</td>                       
                        </tr>
                       <?php $number++ ?>  
                    @endforeach          
                   
            </table>        

      </div>

</div>
<!-- ========End Form =======-->


<script>
        /*----------------------------Get Modal Elements-------------------------------*/
        var modal1 = document.getElementById("facilityModal");
        var modal2 = document.getElementById("specimenModal");        
        var modal3 = document.getElementById("periodsModal");
        var modal4 = document.getElementById("organismsModal");
        // Get the button that opens the modal
        var btn1 = document.getElementById("showFacilitiesForm");
        var btn2 = document.getElementById("showSpecimenTypes");
        var btn3 = document.getElementById("showPeriods");
        var btn4 = document.getElementById("showOrganismsForm");


        // Get the <span> element that closes the modal
        var span1 = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close")[1];
        var span3 = document.getElementsByClassName("close")[2];
        var span4 = document.getElementsByClassName("close")[3];

  /*----------------------------end-----------------------------------------------*/  
      
 /*------------Open Modal Events---------*/
        btn1.onclick = function() {
          modal1.style.display = "block";
        }

        btn2.onclick = function() {
          modal2.style.display = "block";
        }

        btn3.onclick = function() {
          modal3.style.display = "block";
        }

        btn4.onclick = function(){
          modal4.style.display = "block";
        }
/*---------------end---------------------*/   

   /*------------Close Buttons---------*/
         span1.onclick = function() {
          modal1.style.display = "none";         
        } 
          span2.onclick = function() {          
            modal2.style.display = "none";
        }   

          span3.onclick = function() {          
          modal3.style.display = "none";
        }

        span4.onclick = function(){
          modal4.style.display = "none";
        }
  /*---------------end---------------------*/   


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal1||event.target == modal2||event.target == modal3|| event.target == modal4) {
            modal1.style.display = "none";
            modal2.style.display="none";
            modal3.style.display="none";
            modal4.style.display="none";
          }
        }

</script>

              <!-- </div>-->
                
            </div>          
        </div>
  </div>

@endsection