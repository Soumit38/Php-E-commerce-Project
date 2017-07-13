<?php include 'inc/header.php'; ?>

   <div class="new_products row container">
      
      <div class="row feature_header">
         <h2 class="text-center">All Products</h2>
      </div>

     <div class="row">
         <?php
                $getNpd = $pd->getProducts()   ;
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
   </div> <!-- new products end -->
<style>
    .feature{margin-bottom: 10px;}       
</style>

<?php include 'inc/footer.php'; ?>