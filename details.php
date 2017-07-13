<?php include 'inc/header.php'; ?>

<?php
    
    if(!isset($_GET['productid']) || $_GET['productid']==null){
        header("Location: 404.php");
    }else{
        $id = $_GET['productid'];
    }

if($_SERVER['REQUEST_METHOD']=='POST'){
    $quantity = $_POST['quantity'];
    $addCart  = $ct->addToCart($quantity, $id);
}

?>
   
   <div class="detailscontent row">
       <div class="col-md-8 productdd">
           
       <?php
            $getProduct = $pd->getSingleProductById($id);
            if($getProduct){
                while($value = $getProduct->fetch_assoc()){
        ?>
           <div class="producthead row">
               <div class="col-md-6">
                   <img src="admin/<?php echo $value['image']; ?>" alt="preview-img" class="img-thumbnail" width="280px" height="260px">
               </div>
               <div class="col-md-6">
                    <h2><?php echo $value['productName']; ?></h2>
                    <h3>Price:  <span id="younger">Tk <?php echo $value['price']; ?></span></h3>  
                    <h3>Category: <span id="younger"><?php echo $value['catName']; ?></span></h3>  
                    <h3>Brand: <span id="younger"><?php echo $value['brandName']; ?></span></h3>  
                    <form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
               </div>
              <span style="color:red;font-size:18px;margin-left:10px;">
                  <?php
                    if(isset($addCart)){
                        echo $addCart; 
                    }
                  ?>
              </span>
               
           </div>
           <div class="productbody row ">
               <div class="row headdet">
                   <h2>Product Details</h2>
               </div>
               <div class="row bodydet">
                  <?php echo $value['body']; ?>
               </div>
           </div>
           <?php } } ?>
       </div>
       <div class="col-md-4 rightbar">
           
            <div class="list-group mylist">
              <a href="#" class="list-group-item active text-center">
                Categories
              </a>
              <a href="#" class="list-group-item">Mobile Phones</a>
              <a href="#" class="list-group-item">Desktop</a>
              <a href="#" class="list-group-item">Laptop</a>
              <a href="#" class="list-group-item">Accessories</a>
              <a href="#" class="list-group-item">Software</a>
              <a href="#" class="list-group-item">Jewellery</a>
              <a href="#" class="list-group-item">Clothing</a>
              <a href="#" class="list-group-item">Sports & Fitness</a>
              
            </div>
           
       </div>
   </div>
   

<?php include 'inc/footer.php'; ?>