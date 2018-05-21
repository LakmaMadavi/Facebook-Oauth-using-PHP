<?php
require_once "config.php";

//if(isset($_SESSION['access_token'])){
   // header('Location: index.php');
  //  exit();
//}


$redirectURL ="https://localhost/User-Oauth/fb-callback.php";
$permissions =['email','user_birthday','user_location','user_posts','user_likes','user_status','user_photos','user_friends','user_gender'];
$loginURL = $helper->getLoginUrl($redirectURL,$permissions);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> log in </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
</head>
<body class="navbar-expand-lg navbar-dark bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">LOG IN PAGE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" placeholder="Search" type="text">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


</br>
</br>
<div class="card text-white bg-primary mb-3" style="max-width: 30rem; margin:0 auto">
  <div class="card-header">Sign In</div>
  <div class="card-body">
    <h4 class="card-title">Login to Get Services</h4>
    <p class="card-text">Log in with our webpage and get awarded with our valuable services </p>
    <form >
  <fieldset>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com" type="text" style="color:white;">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" style="color:#1a75ff;">Email address</label>
      <input class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" type="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" style="color:#1a75ff;">Password</label>
      <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
    </div>
   
    </fieldset>
    <button type="submit" class="navbar-expand-lg navbar-dark bg-primary" style="color:#1a75ff;">Submit</button>
  
    <input type="button" onclick="window.location ='<?php echo $loginURL ?>';" value="log in to facebook" style="color:#1a75ff/>
  </fieldset>
</form>

  </div>
</div>
<div  style="max-width: 20 rem; margin:0 auto;">
</div>


</body>
</html>