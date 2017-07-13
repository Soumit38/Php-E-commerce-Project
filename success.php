<?php include 'inc/header.php'; ?>
<?php
  global $sum;
?>
<div class="jumbotron">
    <div class="row">
        <h3 class="success paytm">Success</h3>
        <?php
          $cmrId = Session::get('cmrId');
          $amount = $ct->payableAmount($cmrId);
        if($amount){
            $sum = 0;
            $price = 0;
            while($result = $amount->fetch_assoc()){
                $price = $result['price'];
                $sum   = $sum + $price;
                
            }
        }
        
        ?>
        
        <p>Total Payable Amount(Including Vat): Tk 
            <?php
              
              $vat = $sum*0.1;
              $total = $sum + $vat;
              $total = number_format($total, 2,'.','');
              echo $total;
            ?> 
        </p>
        <p>Thanks for shopping with us. Product(s) ordered successfully. We will contact with you ASAP with delivery details. For customer support.... <a href="contact.php">Visit here...</a></p>
    </div>
</div>


<?php include 'inc/footer.php'; ?>