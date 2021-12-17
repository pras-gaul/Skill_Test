<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }

  include 'koneksi.php';
   $name = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name']; // Ambil nama dari Akun Google
    $email = $_SESSION['user_email_address'];
    $foto = $_SESSION['user_image'];
    $ex = explode('@', $email); // Pisahkan berdasarkan "@"
    $username = $ex[0];

    $sql = $pdo->prepare("SELECT id, username, nama FROM user WHERE email=:a");
    $sql->bindParam(':a', $email);
    $sql->execute(); // Eksekusi querynya

  $user = $sql->fetch(); // Ambil datanya dari hasil query tadi

  if(empty($user)){ // Jika User dengan email tersebut belum ada
    header("location: index1.php");// Ambil username dari kata sebelum simbol @ pada email
 }
}
}
//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <div class="panel panel-default">
   <?php 
   if(isset($_SESSION['user_email_address'])){
   $name = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name']; // Ambil nama dari Akun Google
    $email = $_SESSION['user_email_address'];
    $foto = $_SESSION['user_image'];
    $ex = explode('@', $email); // Pisahkan berdasarkan "@"
    $username = $ex[0];
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$foto.'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Username :</b> '.$username.'</h3>';
    echo '<h3><b>Name :</b> '.$name.'</h3>';
    echo '<h3><b>Email :</b> '.$email.'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
   }
   else
   {
    echo '<button align="center">'.$login_button. '</button>';
   }
   }
   else{
     echo '
     <form method="post" action="login.php">
            <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-lg btn-success btn-block">LOGIN</button>
            <div class="text-center" style="margin-top: 10px;margin-bottom: 10px;">
              atau login dengan
            </div>
            <div class="text-center">
              <a href="'.$google_client->createAuthUrl().'" class="btn btn-danger"><i class="fa fa-google"></i> &nbsp;GOOGLE</a>
            </div>
          </form>';
   }
   ?>
   </div>
  </div>
 </body>
</html>