 <?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<?php
  include '../lib/session.php';
  Session::checkSession();
?>

    <!DOCTYPE html>
    <html lang="en">

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
        <!-- drawer.js -->
        <script src="drawer/js/drawer.min.js"></script>
        <script src="tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>


    </head>

    <body>


        <div class="wrap container-fluid">
            <div class="headsection">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                            <a class="navbar-brand mynav text-center" href="../dashboard.php">BesyBuy.com Admin Panel</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <?php
   if(isset($_GET['action']) && $_GET['action']=="logout"){
       
     if(isset($_COOKIE['uid']) && isset($_COOKIE['pswr'])){
        $temp=$_COOKIE['uid'] ;
        $temp1=$_COOKIE['pswr'];
        setcookie("uid",    $adminUser ,time()- 5000);
        setcookie("pswr",   $adminPass ,time()- 5000);
        Session::destroy();
     }
     else{
         Session::destroy();
     }
       
   }

   ?> <!--   logout and session destroy-->

                            <ul class="nav navbar-nav navbar-right">
                                <li><span id="name">Welcome! <?php echo Session::get('adminName'); ?></span></li>                                
                                <li class="logout"><a href="?action=logout">Logout</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
            <!--       headsection end-->