<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php';?>
	<?php
	   $cat = new Category();
	   if(isset($_GET['delcat'])){
	       $id = $_GET['delcat'];
	       $delcat = $cat->delCatById($id);
	   }
	?>       
        <div class="jumbotron listsection">
        <h2 style="margin-bottom: 50px;">Category List: </h2>
               <?php
                   if(isset($delcat)) {
                       echo $delcat;
                   }
	            ?> 
          <table class="table table-striped" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					   <?php
	                          $getCat = $cat->getAllCat(); 
	                        if($getCat){
	                            $i=0;
	                            while($result = $getCat->fetch_assoc()){
	                            $i++;
	                   ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
	                        <td><?php echo $result['catName']; ?></td>
	                        <td><a href="catedit.php?catid=<?php echo $result['catId']; ?>">Edit</a>
	                                        ||
	                          <a onclick="return confirm('Are you sure to delete?')" href="?delcat=<?php echo $result['catId']; ?>">Delete</a>
	                        </td>
						</tr>
				      <?php } } ?>
					</tbody>
				</table>
        </div>
        
        
        
        
<?php include 'inc/footer.php'; ?>

    
    
    