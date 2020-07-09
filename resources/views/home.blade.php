
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{ config('app.name') }} ~ Disis</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <link href="../assets/demo/disis.css" rel="stylesheet" />
  <link href="../assets/css/navbar.css" rel="stylesheet" />
  <link href="../assets/css/sidebar.css" rel="stylesheet" />
  <link href="../assets/css/header.css" rel="stylesheet" />
<!-- charts css -->
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="http://code.highcharts.com/highcharts-more.src.js"></script>
  <script type="text/javascript">

window.onload=function() {
 subMenusO = getElementsByClassName(document,'ul','subMenus');
}
//-----------------------------------------------------------

function showSubMenu(elemId) {
 var dispStatus = (document.getElementById(elemId).style.display == 'block')? 'none' : 'block';
 //hide any visible submenus
 for(var i=0; i < subMenusO.length; i=i+1) {
     subMenusO[i].style.display = 'none';
    }
    //show/hide this menu id
    document.getElementById(elemId).style.display = dispStatus;
}
//--------------------------------------------------------------------------

function getElementsByClassName(oElm, strTagName, strClassName){
    var arrElements = (strTagName == "*" && oElm.all)? oElm.all : oElm.getElementsByTagName(strTagName);
    var arrReturnElements = new Array();
    strClassName = strClassName.replace(/\-/g, "\\-");
    var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
    var oElement;
    for(var i=0; i<arrElements.length; i++)
    {
        oElement = arrElements[i];
        if(oRegExp.test(oElement.className))
        {
            arrReturnElements.push(oElement);
        }
    }
    return (arrReturnElements)
}



</script>

</head>
    <body> 
    <div class="container-fluid card main-container " id="">
    <!-- header -->
      <div class="header-banner">
            <div class="header-banner-inner">
                <div id="header-muk"><img class="pull-right" src="assets/img/mou.jpeg" alt="MOU logo" /></div>
                <div id="header-text">
                    <h3>DATA INTEGRATION AND SHARING INFORMATION SYSTEM</h3>
                    <h3>Uganda National AMR Programme</h3>
                </div>
                <div id="header-idi"><img class="pull-right" src="assets/img//IDILogo.png" alt="IDI logo" /></div>
            </div>
            <div class="header-banner-inner-res">
                <div id="header-banner-inner-res">
                    <div id="header-muk-res"><img class="pull-right" src="assets/img/mou.jpeg" alt="mou logo" /></div>
                    <div id="header-idi-res"><img class="pull-right" src="assets/img/IDILogo.png" alt="IDI logo" /></div>
                </div>
                <div id="header-text-res">
                    <h3>UGANDA NATIONAL AMR PROGRAMME</h3>
                    <h3>DISIS</h3>
                </div>
                
            </div>
        </div>
    <!-- end header -->
        <!-- Navbar -->
          <!-- <nav class="navbar navbar-expand-lg navbar-transparent  b g-primary navbar-absolute container"> -->
            
      <div class="container">
        <!-- end navbar -->
        <div style="width: 25.5%; float: left;" class="main-sidebars" >
          <div class="sidebar" id="sidebar-wrapper" data-color="blue" style="border-radius: 4px;">
              <!--
              Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
              -->
          <div class="logo card" style="margin-top: -2px;">
            <p class=" side-title"></p>
            <div class="card login-sidebar">
              {{-- <a href="{{ route('login') }}#" class="login-a" style="float: none; color: blue; width: 3rem"> {{ Auth::user()->user_name }} </a> --}}

              <!--  -->
              <center>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">

                                <button  style="float: none; border: 1px; color: black; min-width: 5rem; background-color: #fff;" id="navbarDropdown" onclick="myFunction()" class="dropbtn " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
                                </button>
                                <div class="dropdown-content dropdown-menu-right" style="float: right" id="myDropdown" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                               
                            </li>

                    </ul>
                     </center>
              <!--  -->
            </div>
          </div>

          <!-- <div class="sidebar-wrapper" style="height: 86.6%;" > -->
            {{-- side bar contents --}}
        <ul class="sidebar-wrapper">
            <li class="active">
              <button style="border-bottom: solid 1px whitesmoke;" href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-btn">Indicators<i class="fa fa-caret-down"></i></button>
        <ul class="dropdown-container">
          <li>
              <a href="#">
                <!-- <i class="now-ui-icons education_atom"></i> -->
                Number of samples Culture
              </a>
            </li>
           <li>
              <a href="{{ route('sample_with_growth') }}#">
                <!-- <i class="now-ui-icons education_atom"></i> -->
                Number of samples with bacterial growth
              </a>
            </li>
            <li>
              <a href="{{ route('hh_isolateschart')}}">
                <!-- <i class="now-ui-icons design_app"></i> -->
                Number of Organisms Isolated
              </a>
            </li> 
            <li>
              <a href="{{ route('hh_resistance') }}#">
                <!-- <i class="now-ui-icons users_single-02"></i> -->
                Number of resistance organisms to particular antibiotics
              </a>
            </li>           
            <li>
              <a href="{{ route('ah_isolateschart') }}#">
                <!-- <i class="now-ui-icons location_map-big"></i> -->
              AH Isolates
              </a>
            </li>
            <li>
              <a href="{{ route('ah_resistance') }}#">
                <!-- <i class="now-ui-icons users_single-02"></i> -->
                AH Resitance
              </a>
            </li>
            
          </ul>

        </li>
      </ul>
            <!-- end -->
           
          </div>
        <!-- end sidebar -->
        </div>
        <div style="width: 74.0%; float: right; line-height: 2.5;">
          <div class="main-panel" id="main-panel" style=" margin-left: 2rem;">
          
           <div class="container">
                  <div>
                    <img class="amr-site-map" src="assets/img/AMR SITES.png" align="left">
                    <p>
                      The objective of the Data Integration and Sharing Center (DISC) is to aggregate One Health (OH) Antimicrobial Resistance (AMR) and Antimicrobial Use/Consumption (AMU/C) surveillance data to provide timely information for informed decision making. This is enabled by the Data Integration and Sharing Information System (DISIS) currently being piloted with support from the UK Fleming Fund Project through the Infectious Diseases Institute. <br />
                    This dashboard is an interactive tool for visualization of Antimicrobial Resistance data. It facilitates understanding and communication of important trends in Antimicrobial Resistance as well as   performance of the National One Health Antimicrobial Resistance and Antimicrobial Use surveillance Programmes. 
                    </p>

                  </div>
                    <div>
                      <h5><u> WHAT YOU CAN DO WITH DISIS:</u></h5>
                        <dl>
                          <dt>View AMR data on the following select indictors.
                            
                              <dd><span>&bull; </span>Number of microbiology samples collected for culture and antimicrobial sensitivity testing (AST)</dd>
                              <dd><span>&bull; </span>Number of microbiology samples yielding pathogenic bacteria of clinical significance</dd>
                              <dd><span>&bull; </span>Percentage of patients with resistant organisms to specific antibiotics.</dd>
                            
                          </dt>
                          <dt>Print reports in PDF and PNG formats.</dt>
                          <dt>Look out for additional options in graphs.</dt>
                          <dt>Map Showing Surveillance Sites.</dt>
                        </dl>
                    </div>
                <!-- <div class="col-md-6">
                  
                </div> -->
            </div>
          
        </div>
        </div>
      </div>
  <div class="clearfooter"></div>
    <div class="div-footer">
      <footer class="footer card-footer">
        <center>
          <div class="footer_color" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>
            <a href="#">DISIS Dashboard.</a>
          </div>
        </center>
      </footer>
    </div>
</div>
  <script type="text/javascript">

    // partial login section
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}


    // navbar js
  $(function () {
    setNavigation();
});

function setNavigation() {
    var path = $(location).attr('href');
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);

    $(".navbar-top a").each(function () {
        var href = $(this).attr('href');
        if (path.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
        }
    });
}
// end js
</script>
 
          <script type="text/javascript">
         
        $(document).ready(function(){
          setTimeout(function(){ test(); });
        });
        $(window).on('resize', function(){
          setTimeout(function(){ test(); }, 500);
        });
        $(".navbar-toggler").click(function(){
          setTimeout(function(){ test(); });
        });




        //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                  dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                      dropdownContent.style.display = "none";
                    } else {
                      dropdownContent.style.display = "block";
                      dropdownContent.style.left = "0";
                      dropdownContent.style.display = "block";
                      dropdownContent.style.display = "block";
                    }
                  });
                }

// ajax for dynamic page render

$('.item-nav').click(function (event) {
    // Avoid the link click from loading a new page
    event.preventDefault();

    // Load the content from the link's href attribute
    $('.content').load($(this).attr('href'));
});
 </script>
  </body>
</html>