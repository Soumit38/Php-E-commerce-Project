<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php';?>
<?php
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $catName   = $_POST['catName'];
        $insertCat = $cat->catInsert($catName);
    }

?>    
        <div class="jumbotron row formsection">
              <?php
                   if(isset($insertCat)) {
                       echo $insertCat;
                   }
                ?>
          <form action="catadd.php" method="post">
                <div class="row">              
                  <div class="col-md-offset-1 col-lg-6">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Category name" name="catName">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="submit" value="save">Add Category</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
          </form>
        </div>
        
        
        
        
<?php include 'inc/footer.php'; ?>

    
    
    