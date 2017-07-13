<?php

   $filepath = realpath(dirname(__FILE__));
   include_once $filepath.'/../lib/database.php' ;
   include_once $filepath.'/../helpers/format.php' ;
?>
<?php

class Brand{
    public $db;
    public $fm;
    
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }


        public function brandInsert($brandName){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if(empty($brandName)){
            $msg = "<span class='error'>Brand field must not be empty</span>";
            return $msg;
        }else{
            $query = "insert into tbl_brand(brandName) values ('$brandName') ";
            $catInsert = $this->db->insert($query);
            if($catInsert){
                $msg = "<span class='success'>Brand Inserted successfully !!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Brand NOT inserted !!</span>";
                return $msg;
            }
        }
    }

    
    public function brandUpdate($brandName, $id){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if(empty($brandName)){
            $msg = "<span class='error'>Brand field must not be empty</span>";
            return $msg;
        }else{
            $query = "update tbl_brand set brandName = '$brandName' where brandId = '$id'  ";
            $catUpdate = $this->db->update($query);
            if($catUpdate){
               $msg = "<span class='success'>Brand Updated successfully !!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Brand NOT updated !!</span>";
                return $msg;
         }
        }
    }
    
    
    
    public function delBrandById($id){
            $query = "delete from tbl_brand where brandId = '$id' ";
            $catDelete = $this->db->delete($query);
            if($catDelete){
                $msg = "<span class='success'>Brand field deleted Successfully !! </span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Brand NOT deleted !! </span>";
                return $msg;
            }
    }


    public function getAllBrand(){
    	$query = "select * from tbl_brand order by brandId desc";
    	$result = $this->db->select($query);
    	return $result;
    }

     public function getBrandById($id){
      $query = "select * from tbl_brand where brandId = '$id' ";
      $result = $this->db->select($query);
      return $result;
  }
}

?>