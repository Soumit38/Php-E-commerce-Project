<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php';?>

<?php
  if(!isset($_GET['catid']) || $_GET['catid']==null){
      echo "<script>window.loction = 'catlist.php'; </script>" ;
  }else{
      $id = $_GET['catid'];
  }
?>

<?php
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $catName   = $_POST['catName'];
        $updateCat = $cat->catUpdate($catName, $id);
    }

?>  
        <div class="jumbotron row formsection">
             <h2>Update category</h2>
              <?php
                   if(isset($updateCat)) {
                       echo $updateCat;
                   }
                ?>
                <?php
                    $getCat = $cat->getCatById($id)   ;
                   if($getCat){
                       while($result = $getCat->fetch_assoc()){
                ?>
          <form action="" method="post">
                <div class="row">              
                  <div class="col-md-offset-1 col-lg-6">
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo $result['catName'];  ?>" name="catName">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="submit" value="save">Sumbit</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
          </form>
          <?php } } ?>
        </div>
        
        
        
        
<?php include 'inc/footer.php'; ?>

    
    
    