<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>

<?php
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandName  = $_POST['brandName'];
        $insertBrand = $brand->brandInsert($brandName);
    }

?>
       
        <div class="jumbotron row formsection">
         <h2>Add New Brand</h2>
         <?php
                   if(isset($insertBrand)) {
                       echo $insertBrand;
                   }
         ?>
          <form action="" method="post">
                <div class="row">              
                  <div class="col-md-offset-1 col-lg-6">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Brand name" name="brandName">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="submit">Add Brand</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
          </form>
        </div>
        
        
        
        
<?php include 'inc/footer.php'; ?>

    
    