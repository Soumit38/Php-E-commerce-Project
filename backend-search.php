<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "db_shop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM tbl_product WHERE productName LIKE '" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
        ?> 
        <div class="media">
            <div class="media-left">
                <a href="details.php?productid=<?php echo $row['productId']; ?>">
                    <img class="media-object" src="admin/<?php echo $row['image']; ?>" alt="image" height="40px" width="50px">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $row['productName']; ?></h4>
               Tk <?php echo $row['price'];  ?>
            </div>
        </div>  
           
            <?php    
                //echo "<p>" . $row['productName'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
?>