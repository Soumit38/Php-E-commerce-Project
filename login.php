<?php include 'inc/header.php';?>
<?php
$login = Session::get("cuslogin");
if($login==true){
    header('Location: order.php') ;
}
?>
     
<!--  cookie for userlogin     -->
 <?php
   if(isset($_COOKIE['userid']) && isset($_COOKIE['passd'])){
    
       $temp = $_COOKIE['userid'];
       $temp1 = $_COOKIE['passd'];
       $query = "select * from tbl_customer where email='$temp' and password='$temp1' ";
        $result = $this->db->select($query);
        if($result){
            $value = $result->fetch_assoc();
            Session::set('cuslogin', true);
            Session::set('cmrId', $value['id']);
            Session::set('cmrName', $value['name']);
        }
       header('Location: index.php');
       exit();
   }
 
 ?>
     
      <?php
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']))  {
          $custLogin = $cmr->customerLogin($_POST);
      }
      ?>

<div class="row login_form">
    <div class="col-md-6">
     <?php
        if(isset($custLogin))  {
            echo $custLogin;
        }
      ?>
     
       <h1 class="text-center"><small  id="formheading" > Sign In</small></h1>

       
        <form class="form-horizontal bg_custom pad1" action="" method="post" onSubmit="return validate_form(this)">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" name="email" id="inputbox" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
      <input type="password" name="pass" class="form-control" id="inputbox" placeholder="Password">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" name="login" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
    </div>
    
<?php
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register']))    {
      $customerReg = $cmr->customerRegistration($_POST);
  }
?>

<section class="register_form">
    <div class="col-md-6">
   <?php 
      if(isset($customerReg)){
          echo $customerReg;
      }
    ?>
    <h1 class="text-center"><small id="formheading">New to BestBuy? Join today!</small></h1>
    <form action="" method="post" class="form-horizontal bg_custom pad2"  onSubmit="return validate_form_one(this)">
        <div class="form-group">
            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Address" name="address">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="City" name="city">
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Country</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Country" name="country">
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Zip</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Zip" name="zip">
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Phone" name="phone">
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Email" name="email">
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputbox" placeholder="Password" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" name="register" class="btn btn-default">Sign in</button>
            </div>
        </div>
    </form>
</div>
</section>
</div>

<script>
        function validate_required(field,alerttxt) {
        with (field)
          {
          if (value==null||value=="")
            {
            alert(alerttxt);return false;
            }
          else
            {
            return true;
            }
          }
        }

        function validate_form(thisform) {
        with (thisform)
          {
          if (validate_required(email,"Email must be filled out!")==false)
          {  email.focus(); return false;}
          else if (validate_required(pass,"Password must be filled out!")==false)
          {  pass.focus(); return false;}
          
          }
        }
    
        function validate_form_one(thisform){
            with(thisform)
                {
            if (validate_required(name,"Name must be filled out!")==false)
          {  name.focus(); return false;}
             else if (validate_required(address,"Address must be filled out!")==false)
          {  address.focus(); return false;}
             else if (validate_required(city,"City must be filled out!")==false)
          {  city.focus(); return false;}
             else if (validate_required(country,"Country must be filled out!")==false)
          {  country.focus(); return false;}
             else if (validate_required(zip,"Zip must be filled out!")==false)
          {  zip.focus(); return false;}
             else if (validate_required(phone,"Phone must be filled out!")==false)
          {  phone.focus(); return false;}
              else if (validate_required(email,"Email must be filled out!")==false)
          {  email.focus(); return false;}
              else if (validate_required(password,"Password must be filled out!")==false)
          {  password.focus(); return false;}
                }
        }
    
     </script>

<?php include 'inc/footer.php'; ?>