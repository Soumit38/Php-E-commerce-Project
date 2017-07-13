<?php error_reporting(0); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php

    $pd = new Product();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    	//$productName = $_POST['productName'];
    	$insertProduct = $pd->productInsert($_POST, $_FILES);
    }


?>
        
        <div class="jumbotron row ">
         <h2>Add New Product</h2>
          <div class="productform">
          <?php
           if(isset($insertProduct))    {
               echo $insertProduct;
           }
          ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                      <?php
							$cat = new Category();
							$getCat = $cat->getAllCat();
							
							if($getCat){
								while ($result = $getCat->fetch_assoc()) { 

						?>
                         <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                           
                        <?php } } ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                    <?php
                         $brand = new Brand()  ;
                         $getAllBrand = $brand->getAllBrand();

                         if($getAllBrand){
                         	while ($result = $getAllBrand->fetch_assoc()) {
     
					?>
                        <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                           
                    <?php } } ?> 
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body" id="mytextarea"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
          </div>
        </div>
        
 <?php include 'inc/footer.php'; ?>
