@extends('layouts.app') 
@section('navbar')
 <!-- <nav class="navbar navbar-expand-lg navbar-transparent  b g-primary navbar-absolute container"> -->
        <div class="card-body">
        <nav class="navbar navbar-expand-sm navbar-mainbg ">
          <!-- <a class="navbar-brand navbar-logo" href="#">Navbar</a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars text-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                  <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                  <li class="nav-item active">
                      <a class="nav-link" href="#"></i>AMR Surveillance Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"></i>Introduction</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"></i>AMR Surveillance</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('resistance-pattern')}}#"></i>Resistance Patterns</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"></i>Antimicrobial Use/Consumpation</a>
                  </li>
              </ul>
          </div>
      </nav>
@endsection