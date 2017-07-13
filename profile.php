<?php include 'inc/header.php'; ?>

<?php 
   $login = Session::get('cuslogin');
   if($login == false){
       header('Location: login.php');
   }
?>

<div class="row">
   <div class="col-md-offset-3 col-md-6 col-md-offset-3">
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
            
         
       <?php
           }
         }
        ?> 
    </tbody>
</table>
</div>
</div>

        <div class="row text-center">
            <a href="editprofile.php" class="btn btn-info" role="button">Update Details</a>
        </div>






<?php include 'inc/footer.php'; ?>