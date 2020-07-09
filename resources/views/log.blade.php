

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
    <div class="container-fluid card main-container" style="padding-top: 10%;">
<center>
<div class="card align-items-center" style="width: 30rem;   padding: 10px;">
  <div class="card-title row"><div class="col"><img src="assets/img/mou.jpeg" style="width: 4rem;  height: 4rem;"></div></div>
    <form action="{{url('post-login')}}" method="POST" id="msform">
     {{ csrf_field() }}

      @if(Session::has('success'))
        <div class="form-label-group">
          <span class="success">
              {{ session('success') }}
          </span>
        </div>
      @endif

      @if (Session::has('error'))
        <div class="form-label-group">
          <span class="error" style="color: red;">
            {{ session('error') }}
          </span>
        </div>
      @endif
        <div class="row logic"> 
          <input type="text" name="user_name" placeholder="Username" value="{{ old('user_name') }}"  />
          @if ($errors->has('user_name'))
          <span class="error logic">{{ $errors->first('user_name') }}</span>
          @endif 
        </div>
        <div class="row logic" >
          <input type="password" name="password" placeholder="Password" />
          @if ($errors->has('password'))
          <span class="error logic">{{ $errors->first('password') }}</span>
          @endif  
        </div>
        <div class="row logic">
        <input type="submit" name="submit" class="submit action-button" value="Login" />
      </div>
        <!-- <div class="text-center" style="margin:2vh;">
          <a class="small" href="{{url('registration')}}">Register</a>
        </div> -->
    </form>
  </div>
  </center>
</div>
</body>
</html>