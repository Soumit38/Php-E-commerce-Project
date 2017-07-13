<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php include_once ($filepath.'/../lib/database.php') ; ?>
<?php include_once ($filepath.'/../helpers/format.php') ; ?>


<?php
      class Cart{
          private $db;
          private $fm;

          public function __construct(){
              $this->db = new Database();
              $this->fm = new Format();
          }
          
          
          public function addToCart($quantity, $id){
              $quantity = $this->fm->validation($quantity);
              $quantity = mysqli_real_escape_string($this->db->link, $quantity);
              $productId = mysqli_real_escape_string($this->db->link, $id);
              $sId = session_id();
              
              $query = "select * from tbl_product where productId = '$productId' ";
              $result = $this->db->select($query)->fetch_assoc();
         
              
              
              $productName = $result['productName'];
              $image       = $result['image'];
              $price       = $result['price'];
              
              $chquery = "select * from tbl_cart where productid='$productId' and  sId='$sId' ";
              $getPro = $this->db->select($chquery);
              if($getPro){
                  $msg = "Product already added !";
                  return $msg;
              }else{
                    
              $query = "insert into tbl_cart (sId,  productId,   productName,   price,     quantity,  image) values
                                             ('$sId', '$productId', '$productName','$price', '$quantity', '$image') "; 
              
              $inserted_row = $this->db->insert($query);
              if($inserted_row){
                  header('Location: cart.php');
                }else{
                    $msg = "<span class='error'>Product NOT inserted !!</span>";
                    return $msg;
                }   
              }
                       
          }
          
          
          public function getCartProduct(){
              $sId = session_id();
              $query = "select * from tbl_cart where sId = '$sId' ";
              $result = $this->db->select($query);
              return $result;
          }
          
          
          
          public function updateCartQuantity($cartId, $quantity){
              $cartId = mysqli_real_escape_string($this->db->link,  $cartId);
              $quantity = mysqli_real_escape_string($this->db->link, $quantity);
              
              $query = "update tbl_cart
                       set quantity = '$quantity' where cartId = '$cartId' ";
              
              $updated_row = $this->db->update($query);
               if($updated_row){
                  header('Location:cart.php');
            }else{
                $msg = "<span class='error'>Quantity NOT updated !!</span>";
                return $msg;
             }           
              
          }
          
          
          
          public function delProductByCart($delId){
              $delId = mysqli_real_escape_string($this->db->link, $delId);
              $query = "delete from tbl_cart where cartId = '$delId' ";
              $deldata = $this->db->delete($query);
              if($deldata){
                  echo "<script>window.location = 'cart.php'; </script>";
              }else{
                  $msg = "<span class='error'>Product not deleted</span>";
                  return $msg;                  
              }              
          }
          
          
          
          public function checkCartTable(){
              $sId = session_id();
              $query = "select * from tbl_cart where sId = '$sId' ";
              $result = $this->db->select($query);
              return $result;
          }
          
          
          public function delCustomerCart(){
              $sId = session_id();
              $query = "delete from tbl_cart where sId = '$sId' ";
              $this->db->delete($query);
          }
          
          
          
          public function orderProduct($cmrId){
              $sId = session_id();
              $query = "select * from tbl_cart where sId = '$sId'  ";
              $getPro = $this->db->select($query);
              if($getPro){
                  while($result = $getPro->fetch_assoc()){
                      $productId   = $result['productId'];
                      $productName = $result['productName'];
                      $quantity    = $result['quantity'];
                      $price       = $result['price'] * $quantity ;
                      $image       = $result['image'];
                      
              $query = "insert into tbl_order(cmrId, productId, productName, quantity, price, image) values 
              ( '$cmrId','$productId','$productName','$quantity','$price','$image')   ";
                      
                      
              $inserted_row = $this->db->insert($query);
                      
                  }
              }
          }
          
          
          
          
          
          
         public function payableAmount($cmrId){
             $query = "select price from tbl_order where cmrId = '$cmrId' and date = now() ";
             $result = $this->db->select($query);
             return $result;
         } 
      
          
      
      }
                      
     ?>                 
                      
                      