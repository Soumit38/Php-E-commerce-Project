<?php include 'inc/header.php'; ?>

<?php 
   $login = Session::get('cuslogin');
   if($login == false){
       header('Location: login.php');
   }
?>

<?php
   $cmrId = Session::get('cmrId');
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
       $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
   }

?>

<div class="row">
  <div class="form-group">
   <div class="col-md-offset-3 col-md-6 col-md-offset-3">
   
   
    <table class="table table-striped">
    <tbody>
    <?php
      $id = Session::get('cmrId')    ;
      $getData = $cmr->getCustomerData($id);
      if($getData){
          while($result = $getData->fetch_assoc()){            
       
    ?>
       
   <form action="" method="post">
   
    <?php 
      if(isset($updateCmr))    {
    ?>   
        <tr>
          <h3 class='text-center'><?php echo $updateCmr; ?></h3>
        </tr>
     <?php } ?>  
         <tr>
          <h3 class='text-center'>Edit Profile details :</h3><br>
        </tr>
         <tr>
          <th>Name:</th>
           <td><input class="form-control" type="text" name="name" value="<?php echo $result['name']; ?>"></td>
        </tr>         
          <tr>
          <th>Phone:</th>
           <td><input class="form-control" type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
        </tr>
          <tr>
          <th>Email:</th>
           <td><input class="form-control" type="text" name="email" value="<?php echo $result['email']; ?>"></td>
        </tr>
          <tr>
          <th>Address:</th>
           <td><input class="form-control" type="text" name="address" value="<?php echo $result['address']; ?>"></td>
        </tr>
          <tr>
          <th>City:</th>
          <td><input class="form-control" type="text" name="city" value="<?php echo $result['city']; ?>"></td>
        </tr>
          <tr>
          <th>Zipcode:</th>
           <td><input class="form-control" type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
        </tr>
          <tr>
          <th>Country:</th>
           <td><input class="form-control" type="text" name="country" value="<?php echo $result['country']; ?>"></td>
        </tr>
            
         
       <?php
           }
         }
        ?> 
    </tbody>
</table>

</div>
</div>
</div>
        <div class="row text-center">
           <input type="submit" name='submit' value='Save'</input>
        </div>
</form>

<?php include 'inc/footer.php'; ?>