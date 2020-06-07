
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{ config('app.name') }} ~ Disis</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/demo/disis.css" rel="stylesheet" />
  

</head>
    <body> 
    <div class="container-fluid card main-container " id="">

<center style="padding-top: 4%;">
<div class="card align-items-center" style="width: 30rem;  top: 3rem; padding: 10px;">

    <form id="msform" action="{{url('/post-registration')}}" method="post">
      {{ csrf_field() }}
      <div class="card-title row"><div class="col"><img src="assets/img/mou.jpeg" style="width: 3rem;  height: 3rem;"></div><div class="col"><h3>REGISTRATION</h3></div><div class="col"><img style="width: 3rem;  height: 3rem;" src="assets/img/IDILogo.png"></div></div>
        <h5 class="fs-title">Account Credentials</h5>
      <!--  <h3 class="fs-subtitle">Access details</h3> -->
      <div class="row logic"> 
        <input type="text" name="user_name" placeholder="Username" value="{{ old('user_name') }}" />
          @if ($errors->has('username'))
              <span class="error logic">{{ $errors->first('username') }}</span>
          @endif  
        </div>
        <div class="row logic"> 
        <input type="password" name="password" placeholder="Password" id="password"/>
        @if ($errors->has('password'))
              <span class="error logic">{{ $errors->first('password') }}</span>
          @endif
          </div>
          <div class="row logic">  
        <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
        @if ($errors->has('password_confirmation'))
              <span class="error logic">{{ $errors->first('password_confirmation') }}</span>
          @endif 
        </div>
        <h5 class="fs-title">Personal Details</h5>
        <div class="row logic"> 
        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}"/>
        @if ($errors->has('firstname'))
              <span class="error logic">{{ $errors->first('first_name') }}</span>
          @endif 
        </div>
        <div class="row logic"> 
        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"/>
        @if ($errors->has('last_name'))
              <span class="error logic">{{ $errors->first('last_name') }}</span>
          @endif 
        </div>
        <div class="row logic"> 
        <input type="text" name="email" placeholder="Email Address" value="{{ old('email') }}"/>
        @if ($errors->has('email'))
              <span class="error logic">{{ $errors->first('email') }}</span>
          @endif 
        </div>
        <!--<input type="text" name="phone" placeholder="Phone" /> -->
        <!--<textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" /> -->
        <div class="row logic"> 
        <input type="submit" name="submit" class="submit action-button" value="Register"/>
      </div> 
         <div class="text-center">
            <a class="small" href="{{ route('login') }}">Login</a>
          </div>
    </form>
  </div> 
  </center>
</div>
</body>
</html>