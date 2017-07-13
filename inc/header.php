<?php ob_start(); ?>
   <?php
    include 'lib/session.php';
    Session::init();
    include 'lib/database.php';
    include 'helpers/format.php';

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });

    $db = new Database();
    $fm = new Format();
    $pd = new Product();
    $ct = new Cart();
    $cmr = new Customer();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="images/bestbuy.ico">
    <title>BestBuy.com</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

    
  </head>  <!-- head section end -->

  <body>

  <div class="container">
    <div class="headsection ">
        <div class="row sitename">
            <div class="col-md-3 ">             
              <h2><a href="index.php" style="text-decoration:none">BestBuy.com</a></h2>
            </div>   <!-- first -->
<!--        <form action="fetch.php" method="post">-->
            <div class="col-md-4">
               
        <div class="search-box form-group">

            <input type="text" class="form-control" autocomplete="off" placeholder="Search product..." />

            <div class="result"></div>

        </div>
                
            </div>
<!--            </form>-->
              <div class="col-md-4 cartlog">
               <div class="cart">
<!--                 <a href="#">-->
                     <i class="fa fa-shopping-cart cartimg" aria-hidden="true"></i>
                     <p>cart <span>
                         <?php 
                         $getData = $ct->checkCartTable();
                         if($getData){
                             $qty = Session::get("qty");
                             echo 'tk.'.Session::get("sum").'  Qty: '.$qty;
                         }else{
                             echo " (empty) ";
                         }                       
                            
                         ?>
                          </span></p>
<!--                 </a>-->
               </div>
  
<!--   for customer logout    -->
      <?php
        if(isset($_GET['cid'])){
            $delData = $ct->delCustomerCart();
            setcookie("userid",    $adminUser ,time()- 5000);
            setcookie("passd"  ,   $adminPass ,time()- 5000);
            Session::destroy();
        }
      ?>  
        
         <div class="login">
              <form action="#">
                   <div class="samp">                                      
                   <?php 
                       $login = Session::get('cuslogin');
                       if($login==false){
                   ?>
                   
                   <a href="login.php" class="btn btn-primary btn-md" role="button">Sign in</a>
                   
                  <?php } else{ ?>
                                    
                   <a href="?cid=<?php Session::get('cmrId'); ?>" class="btn btn-primary btn-md" role="button">Sign out</a>
                   
                  <?php } ?>
                   
                </div>
               </form>
         </div>
             
              </div>
        </div><!-- /.row -->        
     </div> <!-- headsection end -->

   
   
    <div class="menusection">
         <nav class="navbar navbar-default mynav">
        <div class="menu">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse ext" id="bs-example-navbar-collapse-1">      
           
            <ul class="nav navbar-nav navbar-left colornav">
              <li><a style="border: none;" href="index.php">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="products.php">Top Brands</a></li>
              
          <?php 
             $chkCart = $ct->checkCartTable();
             if($chkCart){
          ?>
              <li><a href="cart.php">Cart</a></li>
              <li><a href="payment.php">Payment</a></li>
          <?php } ?>
          
          <?php
            $login = Session::get('cuslogin');
            if($login == true){            
          ?> 
              <li><a href="profile.php">Profile</a></li>profile
          <?php } ?>
              
              <li><a href="contact.php">Contact</a></li>        
            </ul>   <!-- navbar left end -->

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>   <!-- navbar section end -->
    </div>   <!-- menu section end -->
    
