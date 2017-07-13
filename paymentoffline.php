<?php include 'inc/header.php'; ?>

<?php 
  $login = Session::get('cuslogin');
  if($login==false){
      header('Location: login.php');
  }
?>

<?php
  if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
      $cmrId = Session::get('cmrId');
      $insertOrder = $ct->orderProduct($cmrId);
      $delData  = $ct->delCustomerCart();
      header('Location: success.php');
  }
?>

<div class="row">

<div class="col-md-6">
   <div class="leftside">
    <table class="tblone table-striped table-hover tblplus">
                   
        <tr>
          <h3 class='text-center'>Products and payment details :</h3><br>
        </tr>
                   
                    <tr class="tablehead">
                        <th >No</th>
                        <th >Product</th>
                        <th >Price</th>
                        <th >Quantity</th>
                        <th >Total </th>                        
                    </tr>
                    
            <?php
            $getPro = $ct->getCartProduct();
            if($getPro){
                $i = 0;
                $sum = 0;
                $qty = 0;
                while($result = $getPro->fetch_assoc()){
                    $i++;
            ?>
                    <tr>
                        <td width="10%"><?php echo $i; ?></td>
                        <td width="15%"><?php echo $result['productName']; ?></td>
                        
                        <td width="15%"><?php echo $result['price']; ?></td>
                        
                        <td width="10%"><?php echo $result['quantity']; ?></td>
       
                        <td width="15%"><?php $total =  $result['price']*$result['quantity'] ;
                            echo $total; ?></td>
                        
                    </tr>

                    
                    <?php
                      $qty = $qty + $result['quantity'];
                      $sum = $sum + $total;
                      $sum = number_format($sum ,2,'.','');
                      Session::set("qty", $qty);
                      Session::set("sum", $sum);
                    ?>
            <?php } } ?>
                </table>
                <?php
                 $getData = $ct->checkCartTable();
                 if($getData){
                ?>
  <div class="row">
      						<table class="tblplustwo table-striped table-hover" style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo number_format($sum*0.1 ,2,'.',''); ?>) </td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<?php 
                                  $vat = $sum * 0.1;
                                  $grandTotal = $sum + $vat;
                               $grandTotal = number_format($grandTotal,2,'.','');
                                ?>
								
								<td>TK. <?php echo $grandTotal; ?> </td>
							</tr>
					   </table>
  </div>
					   
					   <?php } ?>
</div>
</div>

   <div class="col-md-6">
   <div class="rightside">
    <table class="table table-striped">
    <tbody>
    <?php
      $id = Session::get('cmrId')    ;
      $getData = $cmr->getCustomerData($id);
      if($getData){
          while($result = $getData->fetch_assoc()){            
       
    ?>   
        <tr>
          <h3 class='text-center'>Customer details :</h3><br>
        </tr>
         <tr>
          <th>Name:</th>
           <td><?php echo $result['name']; ?></td>
        </tr>         
          <tr>
          <th>Phone:</th>
           <td><?php echo $result['phone']; ?></td>
        </tr>
          <tr>
          <th>Email:</th>
           <td><?php echo $result['email']; ?></td>
        </tr>
          <tr>
          <th>Address:</th>
           <td><?php echo $result['address']; ?></td>
        </tr>
          <tr>
          <th>City:</th>
           <td><?php echo $result['city']; ?></td>
        </tr>
          <tr>
          <th>Zipcode:</th>
           <td><?php echo $result['zip']; ?></td>
        </tr>
          <tr>
          <th>Country:</th>
           <td><?php echo $result['country']; ?></td>
        </tr>

<!--saving order to xml file-->
<?php
        $xml = new DOMDocument( "1.0", "ISO-8859-15" );

        // Create some elements.
        $xml_customer = $xml->createElement( "Customer" );
        $xml_name = $xml->createElement( "Name", $result['name'] );
        $xml_phone = $xml->createElement( "Phone", $result['phone'] );
        $xml_email = $xml->createElement( "Email", $result['email'] );
        $xml_address = $xml->createElement( "Address", $result['address'] );
        $xml_city = $xml->createElement( "City", $result['city'] );
        $xml_zip = $xml->createElement( "Zip", $result['zip'] );
        $xml_country = $xml->createElement( "Country", $result['country'] );


        $xml_customer->appendChild( $xml_name );
        $xml_customer->appendChild( $xml_phone );
        $xml_customer->appendChild( $xml_email );
        $xml_customer->appendChild( $xml_address );
        $xml_customer->appendChild( $xml_city );
        $xml_customer->appendChild( $xml_zip );
        $xml_customer->appendChild( $xml_country );

        $xml->appendChild( $xml_customer );

        $xml->save("myorders/".'order'.md5(date('Y-m-d H:i:s:u')).'.xml');

?>


    <?php
           }
         }
        ?>
    </tbody>
</table>
</div>
<div class="row text-center">
            <a href="editprofile.php" class="btn btn-info" role="button">Update Details</a>
</div>

</div>
</div>

<div class="row">
    <div class="ordernow">
        <a href="?orderid=order" class="btn btn-primary btn-success"><i class="fa fa-truck" aria-hidden="true"></i>
 Order</a>
    </div>
</div>



<?php include 'inc/footer.php'; ?>