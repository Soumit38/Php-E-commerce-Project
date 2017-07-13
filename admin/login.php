 <?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<?php include_once '../classes/adminlogin.php'; ?>


<?php

 if(isset($_COOKIE['uid']) && isset($_COOKIE['pswr'])){
     $temp=$_COOKIE['uid'] ;
     $temp1=$_COOKIE['pswr'];
     Session::set("adminLogin", true);
     header('Location: dashboard.php');
//     echo "<script>window.location.href=dashboard.php</script>";
     exit();
 }

?>

<?php

    if(!isset($_COOKIE['uid'])){
        $temp="";
        $temp1="";
    }
//    else{
//        $temp=$_COOKIE['uid'] ;
//        $temp1=$_COOKIE['pswr'];	
//    }

  $al = new Adminlogin();

  if($_SERVER['REQUEST_METHOD']== 'POST'){
      $adminUser = $_POST['adminUser'];
      $adminPass = ($_POST['adminPass']) ;
      
      $loginCheck = $al->adminLogin($adminUser, $adminPass);
  }

?>


<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" href="../design/images/bestbuy.ico">
        <title>BestBuy.com Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- drawer.css -->
        <link rel="stylesheet" href="drawer/css/drawer.min.css">
        <!-- jquery & iScroll -->
        <script src="drawer/js/iscroll.js"></script>
        
     <script>
        function validate_required(field,alerttxt) {
        with (field)
          {
          if (value==null||value=="")
            {
            alert(alerttxt);return false;
            }
          else
            {
            return true;
            }
          }
        }

        function validate_form(thisform) {
        with (thisform)
          {
          if (validate_required(adminUser,"Username must be filled out!")==false)
          {  adminUser.focus(); return false;}
          else if (validate_required(adminPass,"Password must be filled out!")==false)
          {  adminPass.focus(); return false;}
          }
        }
     </script>
        
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post" onSubmit="return validate_form(this)">
			<h1 class="login">Admin Login</h1>
			<span style="color:red;font-size:18px">
			    <?php
                    if(isset($loginCheck)){
                        echo $loginCheck;
                    }
                ?>
			</span> 
		
                <div class="col-md-offset-3 col-md-5">
                    <label for="fname">Username: </label>
                <input type="text" id="fname" name="adminUser" placeholder="Enter username.." value="<?php echo $temp; ?>">

                <label for="lname">Password: </label>
                <input type="password" id="lname" name="adminPass" placeholder="Enter password.." value="<?php echo $temp1; ?>">

                <input type="checkbox" name="rememberme" value="" >Remember Me<br>
                
                <input type="submit" name="submit" value="Log in">
                </div>
			
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

