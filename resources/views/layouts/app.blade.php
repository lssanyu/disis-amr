
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
  <!------------------------- Upgrade any insecure urls------------------->
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="../assets/css/">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <link href="../assets/demo/disis.css" rel="stylesheet" />
  <link href="../assets/css/navbar.css" rel="stylesheet" />
  <link href="../assets/css/sidebar.css" rel="stylesheet" />
  <!--  -->
  
  <link href="../assets/css/header.css" rel="stylesheet" />
<!-- charts css -->
  <!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
  <script type="text/javascript" src="../assets/js/accessibility.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
  <script type="text/javascript" src="../assets/js/highcharts.js"></script>
  <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
  <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
  <script type="text/javascript" src="../assets/js/exporting.js"></script>
  <!-- <script src="http://code.highcharts.com/highcharts-more.src.js"></script> -->
  <script type="text/javascript" src="../assets/js/highcharts-more.src.js"></script>
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
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  width: 0;
  left: 0;
  overflow-x: hidden;
  transition: 0.5s;
  height: calc(100% - (3.5rem + 1px));
    overflow-y: auto;
    padding-bottom: 0;
     padding-left: 0rem; 
     padding-right: 0rem; 
    padding-top: 0;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/*.sidebar a:hover {
  color: #f1f1f1;
}
*/
.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  cursor: pointer;
  background-color: white;
  color: white;
  padding: 0px 10px;
  border: none;
}

.openbtn:hover {
  background-color: whitesmoke;
}

#main {
  transition: margin-left .5s;
  padding-top: 0px;
  padding-left: 15px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
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
        <div style="width: 100%; " class="nav-div navbar-mainbg " >
          <nav class="navbar navbar-expand-sm  navbar-mainbg_in card">
             <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars text-white"></i>
              </button> -->
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                  <ul class="navbar-top">
                    <li>
                          <a class="nav-link" href="{{ route('home') }}">Introduction</a>
                      </li>
                      <li>
                          <a class="nav-link" href="#">AMR Surveillance Dashboard</a>
                      </li>
                      <li>
                          <a class="nav-link" href="{{ route('amr_surveillance') }}">AMR Surveillance</a>
                      </li>
                      <li>
                          <a class="nav-link" href="{{ route('resistance_pattern') }}">Resistance Patterns</a>
                      </li>
                      <li>
                          <a class="nav-link" href="#">Antimicrobial Use/Consumpation</a>
                      </li>
                  </ul>
              </div>
          </nav>
        </div>
        <!-- end navbar -->
        <div style="float: left; left: 15px;" class="main-sidebars sidebar" id="mySidebar">
          <a style="float: right; z-index: 1;"  href="javascript:void(0)" id="closer" class="closebtn" onclick="closeNav()">×</a>
          <div id="sidebar-wrapper"style="border-radius: 4px;">
              
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
              <a href="{{route('samples_cultured')}}#">
                <!-- <i class="now-ui-icons education_atom"></i> -->
                Number of samples Cultured
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
                Resistance Organisms
              </a>
            </li>           
            <li>
              <a href="{{ route('ah_isolateschart') }}#">
                <!-- <i class="now-ui-icons location_map-big"></i> -->
              AH Isolated Organisms
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
        <div id="main" style="width: auto; line-height: 2.5;">
        
          <div class="main-panel" id="main-panel">
          <button id="opener" class="openbtn" onclick="openNav()"><i class="fa fa-bars" style="font-size:24px; color: black;"></i></button> 
           @yield('content')
          
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
<!-- siderbar toggle=collapse -->
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "350px";
  document.getElementById("main").style.marginLeft = "350px";
  document.getElementById("mySidebar").style.Left = "5px";
  document.getElementById("opener").style.display = "none";
  document.getElementById("closer").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("opener").style.display = "block";
}
</script>
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
                // ---------Responsive-navbar-active-animation-----------
        // function test(){
        //   var tabsNewAnim = $('#navbarSupportedContent');
        //   var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
        //   var activeItemNewAnim = tabsNewAnim.find('.active');
        //   var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
        //   var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
        //   var itemPosNewAnimTop = activeItemNewAnim.position();
        //   var itemPosNewAnimLeft = activeItemNewAnim.position();
        //   $(".hori-selector").css({
        //     "top":itemPosNewAnimTop.top + "px", 
        //     "left":itemPosNewAnimLeft.left + "px",
        //     "height": activeWidthNewAnimHeight + "px",
        //     "width": activeWidthNewAnimWidth + "px"
        //   });
        //   $("#navbarSupportedContent").on("click","li",function(e){
        //     $('#navbarSupportedContent ul li').removeClass("active");
        //     $(this).addClass('active');
        //     var activeWidthNewAnimHeight = $(this).innerHeight();
        //     var activeWidthNewAnimWidth = $(this).innerWidth();
        //     var itemPosNewAnimTop = $(this).position();
        //     var itemPosNewAnimLeft = $(this).position();
        //     $(".hori-selector").css({
        //       "top":itemPosNewAnimTop.top + "px", 
        //       "left":itemPosNewAnimLeft.left + "px",
        //       "height": activeWidthNewAnimHeight + "px",
        //       "width": activeWidthNewAnimWidth + "px"
        //     });
        //   });
        // }
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