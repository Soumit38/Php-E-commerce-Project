<?php
    $filepath = realpath(dirname(__FILE__));
    include $filepath.'/../lib/session.php';
    Session::checkLogin();
   
   include_once $filepath.'/../lib/database.php' ;
   include_once $filepath.'/../helpers/format.php' ;
?>

<?php

class Adminlogin{
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function adminLogin($adminUser, $adminPass){
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
        
        if(empty($adminUser) || empty($adminPass)){
            $loginmsg = "Username or Password must not be empty";
            return $loginmsg;
        }else{
            $query = "select * from tbl_admin where adminUser='$adminUser' and adminPass= '$adminPass' ";
            $result = $this->db->select($query);
            if($result){
                $value = $result->fetch_assoc();
                Session::set("adminLogin", true);
                Session::set("adminId", $value['adminId']);
                Session::set("adminUser", $value['adminUser']);
                Session::set("adminName", $value['adminName']);
                
//                cookie settings
         if(isset($_POST['rememberme'])){
            if(isset($_POST["submit"])){
                setcookie("uid",$adminUser ,time()+ 120);
                setcookie("pswr",$adminPass,time()+ 120);
            }
         }      
                header("Location: dashboard.php");
            }else{
                $loginmsg = "Username and Password didn't match !!";
                return $loginmsg;
            }
        }
    }
}

?>