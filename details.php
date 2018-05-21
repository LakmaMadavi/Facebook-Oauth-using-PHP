<?php
    session_start();
    //echo $_SESSION['access_token'];
    //var_dump($_SESSION['userData']);
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
</head>
<body background="bg.png" style="background-position: right top;background-size:cover;">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">User Profile</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    
    </ul>
  </div>
</nav>
</br>
</br>
<div class="card text-white bg-primary mb-3" style="max-width: 33rem;float:left;display: inline-block;">
  <div class="card-header">User Information</div>
  <div class="card-body">
    <h4 class="card-title">This is the Basic Information of the User</h4>
    <p class="card-text">This is the personal information you have shared basically on facebook</p>
    
    <table class="table table-hover text-primary">
      <thead>
        <tr>
          <th scope="col">Factor</th>
          <th scope="col">Shared Information</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-success">
          <th scope="row">Name</th>
          <td><img src="<?php echo $_SESSION['userData']['picture']['url'];?> "/> <?php echo $_SESSION['userData']['name'];?> </td>
        </tr>
        <tr class="table-danger">
          <th scope="row">Email</th>
          <td><?php echo $_SESSION['userData']['email'];?></td>
        </tr>
        <tr class="table-warning">
          <th scope="row">ID</th>
          <td><?php echo $_SESSION['userData']['id'];?></td>
        </tr>
        <tr class="table-info">
          <th scope="row">Gender</th>
          <td><?php echo  ucfirst($_SESSION['userData']['gender']);?></td>
        </tr>
        <tr class="table-light">
          <th scope="row">Location</th>
          <td><?php echo $_SESSION['userData']['location']['name'];?></td>
        </tr>
        <tr class="table-success">
          <th scope="row">Total Friends</th>
          <td><?php echo alignfriends();?></td>
        </tr>
      </tbody>
    </table> 
  </div>
</div>
<div class="card text-white bg-warning mb-3" style="max-width:33rem;float:left;display: inline-block;">
  <div class="card-header">Likes</div>
  <div class="card-body">
    <h4 class="card-title">Top 20 Likes Most Recent</h4>
    <p class="card-text"><?php echo alignLikes();?></p>
  </div>
</div>
<div class="card text-white bg-info mb-3" style="max-width: 33rem;float:left;display: inline-block;">
  <div class="card-header">Posts You Shared Recently</div>
  <div class="card-body">
    <h4 class="card-title">Top Posts</h4>
    <p class="card-text"><?php echo alignPosts();?></p>
  </div>
</div>
<?php
  function get_user_likes($access_token){
    $parameters = array('fields'=>'id');
    $buildParam = http_build_query($parameters);
    $requestContent = array('method'=>'GET','header'=>'Authorization:Bearer '.$access_token,'content'=>$buildParam);
    $reqcontex = stream_context_create(array('http'=>$requestContent));
    $result = file_get_contents('https://graph.facebook.com/v3.0/'.$_SESSION['userData']['id'].'?fields=likes',false,$reqcontex);
    return $result;
  }

  function alignLikes(){
    error_reporting(0);
    @ini_set('display_errors', 0);
    $vali = get_user_likes($_SESSION['access_token']);
    $json = json_decode($vali);
    //echo $vali;
    for($i=0; $i<=20; $i++)
    {
        if(isset($json->likes->data[$i]->name))
        {
            echo '<p class="alert alert-dismissible alert-primary">';
            echo $json->likes->data[$i]->name; 
            echo "<br/>";
            echo "Time Created : ".$json->likes->data[$i]->created_time;
            echo "</p>";
            echo "<br/>";
        }
          
      }
  }

  function get_user_friends($access_token){
    $parameters = array('fields'=>'id');
    $buildParam = http_build_query($parameters);
    $requestContent = array('method'=>'GET','header'=>'Authorization:Bearer '.$access_token,'content'=>$buildParam);
    $reqcontex = stream_context_create(array('http'=>$requestContent));
    $result = file_get_contents('https://graph.facebook.com/v3.0/'.$_SESSION['userData']['id'].'?fields=friends',false,$reqcontex);
    return $result;
  }

  function alignfriends(){
    error_reporting(0);
    @ini_set('display_errors', 0);
    $vali = get_user_friends($_SESSION['access_token']);
    $json = json_decode($vali);
    //echo $vali;
    return $json->friends->summary->total_count;
    /*for($i=0; $i<=20; $i++)
    {
        if(isset($json->likes->data[$i]->name))
        {
            echo '<p class="alert alert-dismissible alert-primary">';
            echo $json->likes->data[$i]->name; 
            echo "<br/>";
            echo "Time Created : ".$json->likes->data[$i]->created_time;
            echo "</p>";
            echo "<br/>";
        }
          
      }*/
  }

  function get_user_post($access_token){
    $parameters = array('fields'=>'id');
    $buildParam = http_build_query($parameters);
    $requestContent = array('method'=>'GET','header'=>'Authorization:Bearer '.$access_token,'content'=>$buildParam);
    $reqcontex = stream_context_create(array('http'=>$requestContent));
    $result = file_get_contents('https://graph.facebook.com/v3.0/'.$_SESSION['userData']['id'].'?fields=posts',false,$reqcontex);
    return $result;
  }

  function alignPosts(){
    error_reporting(0);
    @ini_set('display_errors', 0);
    $vali = get_user_post($_SESSION['access_token']);
    $json = json_decode($vali);
    //echo $vali;
    for($i=0; $i<=10; $i++)
    {
        if(isset($json->posts->data[$i]->message))
        {
            echo '<p class="alert alert-dismissible alert-primary">';
            echo $json->posts->data[$i]->message; 
            echo "<br/>";
            echo "Time Created : ".$json->posts->data[$i]->created_time;
            echo "</p>";
            echo "<br/>";
        }
        
    }
}
?>