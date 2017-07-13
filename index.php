<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>


   <div class="feature_products row container">
      
      <div class="row feature_header">
         <h2>Featured Products</h2>
      </div>

     <div class="row">
         <?php
                $getFpd = $pd->getFeaturedProduct()   ;
                if($getFpd){
                    while($result = $getFpd->fetch_assoc()){
           ?>   
         <div class="col-md-3 feature text-center">
            <div class="feature_img">
              <a href="details.php?productid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
            </div>
            <div class="feature_txt">
              <h3><?php echo $result['productName']; ?></h3>
              <p><?php echo $fm->textShorten($result['body'], 50) ; ?></p>
              <h4><?php echo $result['price']; ?> TK</h4>
            </div>
            <div class="feature_button">             
             <a href="details.php?productid=<?php echo $result['productId']; ?>" class="btn btn-primary btn-md" role="button">Details</a>
            </div>
         </div>
         <?php } } ?>
            
     </div>   
   </div> <!-- feature products end -->
   
   <div class="row">
      <div class="col-md-offset-5 col-md-4">
       <a href="products.php" class="myButton">View All</a>
   </div>     
   </div>     

   <div class="new_products row container">
      
      <div class="row feature_header">
         <h2>New Products</h2>
      </div>

     <div class="row">
         <?php
                $getNpd = $pd->getNewProduct()   ;
                if($getNpd){
                    while($result = $getNpd->fetch_assoc()){
           ?>
         <div class="col-md-3 feature text-center">
            <div class="feature_img">
              <a href="details.php?productid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
            </div>
            <div class="feature_txt">
              <h3><?php echo $result['productName']; ?></h3>
              <p><?php echo $fm->textShorten($result['body'], 50) ; ?></p>
              <h4><span class="price"><?php echo $result['price']; ?> TK</h4>
            </div>
            <div class="feature_button">
              <a href="details.php?productid=<?php echo $result['productId']; ?>" class="btn btn-primary btn-md" role="button">Details</a>
            </div>
         </div>
        
         <?php } } ?>
         
     </div>
  <div class="row">
      <div class="col-md-offset-5 col-md-4">
       <a href="products.php" class="myButton">View All</a>
   </div>     
   </div>  
   </div> <!-- new products end -->
   

<?php include 'inc/footer.php'; ?>