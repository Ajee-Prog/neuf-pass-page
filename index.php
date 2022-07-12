<?php
session_start();

if(isset($_POST['submit_pass']) && $_POST['pass'])
{
 $pass=$_POST['pass'];
 if($pass=="neuf")
 {
  $_SESSION['password']=$pass;
 }
 else
 {
  $error="Incorrect Password";
 }
}

if(isset($_POST['page_logout']))
{
 unset($_SESSION['password']);
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="stylle.css">
</head>
<body>
<div class="cover">

<?php
if($_SESSION['password']=="neuf")
{
  ?>
   <?php
}
else
{
 ?>
 <form method="post" action="shop.html" id="login_form">
 <h3 class="label">Welcome to Neufworldwide</h3>
  <input type="password" name="pass" placeholder="Enter Password">
  <input type="submit" name="submit_pass" value="Login">
  <p> <font style="color:red;"><?php echo $error;?></font></p>
 </form>
 <?php	
}
?>

</div>
</body>
</html>