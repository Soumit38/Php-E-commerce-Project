<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php include_once '../helpers/format.php'; ?>

<?php
  $pd = new Product();
  $fm = new Format();
?>

<?php

   if(isset($_GET['delproduct'])){
       $id = $_GET['delproduct'];
       $delproduct = $pd->delProductById($id);
   }
?>
        <h2 style="margin-left: 700px">Product List</h2>
        <div class="jumbotron listsection">
         <?php
             if(isset($delproduct)) {
                 echo $delproduct;
             }
          ?>
          <table class="table table-striped" id="example">
					<thead>
						<tr>
							<th>SL</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
        	 <?php
                $getProduct = $pd->getAllProduct()  ;
                if($getProduct){
                    $i=0;
                    while($result = $getProduct->fetch_assoc()){
                    $i++;
              ?>
						<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php echo $result['time']; ?></td>
					<td><?php 
//                        $temp = $fm->validation($result['body']);
//                        echo   $fm->textShorten($temp, 50) ;
                        echo $fm->textShorten($result['body'], 50);
                        ?>
                    </td>
					<td><?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" alt="image" height="40px" width="60px"></td>
					<td><?php echo ($result['type']==0)?"Featured":"General" ; ?></td>
					
					<td><a href="productedit.php?productid=<?php echo $result['productId']; ?>">Edit</a> ||
					    <a href="?delproduct=<?php echo $result['productId']; ?>">Delete</a></td>
				</tr>
				<?php } } ?>	
				  </tbody>
				</table>
        </div>
        
        
        
        
<?php include 'inc/footer.php'; ?>

    
    
    