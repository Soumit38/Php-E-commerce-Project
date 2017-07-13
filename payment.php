<?php include 'inc/header.php'; ?>

<?php
  $login = Session::get('cuslogin');
  if($login == false){
      header('Location: login.php');
  }
?>


 <div class="row">
<div class="payment">
         <h3 id="payment" class="text-center">Choose Payment Option</h3><br>
         
         <div class="col-md-offset-2 col-md-4">
             <a href="paymentoffline.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-usd"></span> Offline payment</a>
         </div>
         
         <div class="col-md-4">
             <a href="paymentonline.php" class="btn btn-block btn-lg btn-success">Online payment <span class="glyphicon glyphicon-send"></span></a>
         </div>
    </div>
</div>



<div class="blank">
    
</div>

<div class="row">
<div class="col-md-offset-4 col-md-4">
    <a href="cart.php" class="btn btn-block btn-lg btn-info custom"><span class="glyphicon glyphicon-backward"></span> Previous</a>
</div>
</div>

<?php include 'inc/footer.php'; ?>