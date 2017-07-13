<?php include 'inc/header.php'; ?>
<?php
  $login = Session::get("cuslogin");
  if($login==false){
     header('Location: login.php');
 }

?>
<section class="main">
    <div class="row">
        <div class="order">
            <h2>Order Page</h2>
        </div>
    </div>
</section>


<?php include 'inc/footer.php'; ?>