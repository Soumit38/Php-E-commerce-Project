<?php

$connect = mysqli_connect("localhost", "root", "", "db_shop");
$output  = '';

$search = mysqli_real_escape_string($connect, $_POST['txt']);

$sql  =  "select * from tbl_product where productName LIKE 
          '%".$search."%'  ";

$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
    
    $output .= '<h4 align="center">Search Result</h4>';
    $output .= '<div class="table-responsive">
                  <table class="table table bordered">
                     <tr>
                         <th>Product Name</th>
                         <th>Price</th>
                         <th>Description</th>
                     </tr>';
              
    
    while($row = mysqli_fetch_array($result)){
        $output .= '
         
            <tr>
                <td>'.$row['productName'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['body'].'</td>
            </tr>
           ';
    }
//                  </table>
//                </div>'
     echo $output ;
    
  }else{
    echo 'Data not found';
  }

?>