<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php include_once ($filepath.'/../lib/database.php') ; ?>
<?php include_once ($filepath.'/../helpers/format.php') ; ?>

<?php

class Product{
    public $db;
    public $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function productInsert($data, $file){
        $productName = $this->fm->validation($data['productName']);
        $catId       = $this->fm->validation($data['catId']);
        $brandId     = $this->fm->validation($data['brandId']);
        $body        = $this->fm->validation($data['body']);
        $price       = $this->fm->validation($data['price']);
        $image = $this->fm->validation($data['image']);
        $type = $this->fm->validation($data['type']);
        
        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId       = mysqli_real_escape_string($this->db->link, $catId);
        $brandId     = mysqli_real_escape_string($this->db->link, $brandId);
        $body        = mysqli_real_escape_string($this->db->link, $body);
        $price       = mysqli_real_escape_string($this->db->link, $price);
        $image       = mysqli_real_escape_string($this->db->link, $image);
        $type        = mysqli_real_escape_string($this->db->link, $type);
        
        $permitted = array( 'jpg','jpeg','png', 'gif' );
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
//        if($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" || $image=="" || $type==""|| $file_name==""){
//            $msg = "<span class='error'>Field must not be empty !!</span>";
//            return $msg;
//        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "insert into tbl_product (productName ,	catId ,	brandId ,	body ,	price ,	image , 	type ) values
                                             ('$productName', '$catId', '$brandId', '$body','$price','$uploaded_image', '$type')   ";
            
            $productInsert = $this->db->insert($query);
            if($productInsert){
                $msg = "<span class='success'>Product Inserted successfully !!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Product NOT inserted !!</span>";
                return $msg;
            }
       // }
        

    }
    
    
    
    public function getAllProduct(){
        $query = "select p.*, c.catName, b.brandName
                        from tbl_product p, tbl_category c, tbl_brand b
                        where p.catId = c.catId and p.brandId = b.brandId
                        order by p.productId desc  ";
       /* $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
                         from tbl_product 
                         inner join tbl_category
                            on tbl_product.catId   = tbl_category.catId
                         inner join tbl_brand
                            on tbl_product.brandId = tbl_brand.brandId
                  
                  ";*/
        $result = $this->db->select($query);
        return $result;
    }
    
        
    
        
    public function delProductById($id){
        
            $query = "delete from tbl_product where productId = '$id' ";
            $productDelete = $this->db->delete($query);            
            if($productDelete){
                $msg = "<span class='success'>Product deleted Successfully !! </span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Product NOT deleted !! </span>";
                return $msg;
            }
    }
    
    
    
      public function getProductById($id){
          $query = "select * from tbl_product where productId = '$id' ";
          $result = $this->db->select($query);
          return $result;
        }
    
    
      public function productUpdate($data, $file, $productId){
        $productName = $this->fm->validation($data['productName']);
        $catId   = $this->fm->validation($data['catId']);
        $brandId = $this->fm->validation($data['brandId']);
        $body = $this->fm->validation($data['body']);
        $price = $this->fm->validation($data['price']);
        $image = $this->fm->validation($data['image']);
        $type = $this->fm->validation($data['type']);
        
        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId       = mysqli_real_escape_string($this->db->link, $catId);
        $brandId     = mysqli_real_escape_string($this->db->link, $brandId);
        $body        = mysqli_real_escape_string($this->db->link, $body);
        $price       = mysqli_real_escape_string($this->db->link, $price);
        $image       = mysqli_real_escape_string($this->db->link, $image);
        $type        = mysqli_real_escape_string($this->db->link, $type);
        
        $permitted = array( 'jpg','jpeg','png', 'gif' );
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
//        if($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" || $image=="" || $type==""|| $file_name==""){
//            $msg = "<span class='error'>Field must not be empty !!</span>";
//            return $msg;
//        }else{
            move_uploaded_file($file_temp, $uploaded_image);
                     
            $query = "update tbl_product 
                      set
                      productName =   '$productName',
                      catId       =   '$catId',
                      brandId     =   '$brandId',
                      body        =   '$body',
                      price       =   '$price',
                      image       =   '$uploaded_image',
                      type        =   '$type'
                      
                      where productId = '$productId'                  
                     ";
            
            $productUpdate = $this->db->update($query);
            if($productUpdate){
                $msg = "<span class='success'>Product Updated successfully !!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Product NOT Updated !!</span>";
                return $msg;
            }
       // }
        
      }
    
    
    public function getFeaturedProduct(){
        $query = "SELECT * FROM tbl_product where type='2' order by productId desc limit 4 ";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getNewProduct() {
        $query = "SELECT * FROM tbl_product order by productId desc limit 4 ";
        $result = $this->db->select($query);
        return $result;
    }
    
    
   public function getProducts() {
        $query = "SELECT * FROM tbl_product order by productId desc ";
        $result = $this->db->select($query);
        return $result;
    }
    
    
    public function getSingleProductById($productId){
        $query = "  select p.*, c.catName, b.brandName
                    from tbl_product p, tbl_category c, tbl_brand b
                    where p.catId = c.catId and p.brandId = b.brandId 
                    and p.productId = '$productId'   ";
        
        $result = $this->db->select($query);
        return $result;
    }
    
    
}

?>


