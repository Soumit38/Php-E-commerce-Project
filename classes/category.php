<?php

   $filepath = realpath(dirname(__FILE__));
   include_once $filepath.'/../lib/database.php' ;
   include_once $filepath.'/../helpers/format.php' ;
?>


<?php

class Category{
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    
    
    public function catInsert($catName){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if(empty($catName)){
            $msg = "<span class='error'>Category field must not be empty</span>";
            return $msg;
        }else{
            $query = "insert into tbl_category(catName) values ('$catName') ";
            $catInsert = $this->db->insert($query);
            if($catInsert){
                $msg = "<span class='success'>Category Inserted successfully !!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Category NOT inserted !!</span>";
                return $msg;
            }
        }
    }
    
    
    public function catUpdate($catName, $id){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if(empty($catName)){
            $msg = "<span class='error'>Category field must not be empty</span>";
            return $msg;
        }else{
            $query = "update tbl_category set catName = '$catName' where catId = '$id'  ";
            $catUpdate = $this->db->update($query);
            if($catUpdate){
               $msg = "<span class='success'>Category Updated successfully !!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Category NOT updated !!</span>";
                return $msg;
           }
        }
    }
    
    
    
    public function delCatById($id){
            $query = "delete from tbl_category where catId = '$id' ";
            $catDelete = $this->db->delete($query);
            if($catDelete){
                $msg = "<span class='success'>Category field deleted Successfully !! </span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Category NOT deleted !! </span>";
                return $msg;
            }
    }  
        
    
    

  public  function  getAllCat(){
    $query = "SELECT * FROM tbl_category order by catId desc ";
    $result = $this->db->select($query);
    return $result;
  }
    
    
  public function getCatById($id){
      $query = "select * from tbl_category where catId = '$id' ";
      $result = $this->db->select($query);
      return $result;
  }

}

?>



        
