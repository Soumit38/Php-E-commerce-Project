<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>

<?php
  if(!isset($_GET['brandid']) || $_GET['brandid']==null){
      echo "<script>window.loction = 'brandlist.php'; </script>" ;
  }else{
      $id = $_GET['brandid'];
  }
?>
      
<?php
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandName   = $_POST['brandName'];
        $updateBrand = $brand->brandUpdate($brandName, $id);
    }

?>
       
        <div class="jumbotron row formsection">
         <h2>Update Brand</h2>
         <?php
                   if(isset($updateBrand)) {
                       echo $updateBrand;
                   }
         ?>
         <?php
              $getBrand = $brand->getBrandById($id)   ;
               if($getBrand){
                   while($result = $getBrand->fetch_assoc()){
         ?>
          <form action="" method="post">
                <div class="row">              
                  <div class="col-md-offset-1 col-lg-6">
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo $result['brandName'];  ?>" name="brandName">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="submit" value="save">Submit</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
          </form>
          <?php } } ?>
        </div>
        
        
        
        
<?php include 'inc/footer.php'; ?>

    
    