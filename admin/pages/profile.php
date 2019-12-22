<?php include("../section/admin_header.php"); ?>

    <div id="wrapper">
    
<?php include("../section/admin_navigation.php"); ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <?php include("../section/admin_sidebar.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>
        
        
        
<?php
if(isset($_SESSION['email'])){
$email = $_SESSION['email'];
global $connection;
$query = "SELECT * FROM admin WHERE email = '{$email}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){
    $db_id = $row['id'];
     $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    $address = $row['address'];
    $contact = $row['contact'];
}
}

?>
<?php 
if(isset($_POST['submit'])){
        $name =     ($_POST['name']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $address = $_POST['address'];
        $contact = $_POST['contact'];
      
        $error =[
            'name' => '',
            'username' => '',
            'email' => '',
            'address' => '', 
            'contact' => ''
            
        ];
        
        if(empty($name)){
            $error['name'] = 'Name field cannot be empty!!';
        }
        
         if(empty($username)){
            $error['username'] = 'Username field cannot be empty!!';
        }
        

        if(empty($email)){
            $error['email'] = 'Email already exists';
        }
    
        if(empty($address)){
            $error['address'] = 'Field is empty';
        }
        
        if(empty($contact) || strlen($contact) < 10){
            $error['contact'] = 'contact cannot be less than 10';
        }
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
         admin($name,$username,$email,$address,$contact,$db_id);
        }
        
    }
    if(isset($_POST['save_pass'])){
        $oldpassword = trim($_POST['oldpassword']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $error =[
            'password' => '',
            'oldpassword' => '',
            'password2' => ''
            
        ];
        

        if(empty($password)){
            $error['password'] = 'Field is empty';
        }
    
        if(empty($password2)){
            $error['password2'] = 'Field is empty';
        }
        
        if(!validOldPass($oldpassword,$db_id)){
           $error['oldpassword'] = 'old password incorrect'; 
        }
        
        if(strlen($password) < 8){
            $error['password'] = 'password cannot be less than 10';
        }
        
        if(strlen($password2) < 8){
            $error['password2'] = 'password cannot be less than 10';
        }
        
        if($password !== $password2){
            $error['password2'] = 'password does not match';
        }
        
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
        adminPassword($password2,$db_id);
        }
        
    }
    
    
    
//}
?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-university"></i>  <a href="index.html">Profile</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <!-- middle content -->
                         <section id="edit-post">
      <div class="row">
        <div class="col-md-9">
          <div class="card" style="margin-bottom:10px;">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-block">
              <form action="" method="post">
                <div class="form-group">
                  <label for="name" class="form-control-label">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name"
                autocomplete="on" 
                value="<?php echo isset($name) ? $name: '' ?>">
                <p><?php echo isset($error['name']) ? $error['name']: '' ?></p>
                </div>
               <div class="form-group">
                  <label for="username" class="form-control-label">UserName</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter UserName"
                  autocomplete="on" 
                value="<?php echo isset($username) ? $username: '' ?>">
                <p><?php echo isset($error['username']) ? $error['username']: '' ?></p>
                </div>
                <div class="form-group">
                  <label for="email" class="form-control-label">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="username@test.com"
                  autocomplete="on" 
                value="<?php echo isset($email) ? $email: '' ?>">
                <p><?php echo isset($error['email']) ? $error['email']: '' ?></p>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" class="form-control"
                  autocomplete="on" 
                value="<?php echo isset($address) ? $address: '' ?>">
                <p><?php echo isset($error['address']) ? $error['address']: '' ?></p>
                </div>
                 <div class="form-group">
                  <label for="contact">Phone</label>
                  <input type="text" name="contact" class="form-control"
                  autocomplete="on" 
                value="<?php echo isset($contact) ? $contact: '' ?>">
                <p><?php echo isset($error['contact']) ? $error['contact']: '' ?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block md-3">Save</button>
              </form>
            </div>
          </div>
       
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post" role="form" class="form">
                    <div class="form-group">
                        <label for="oldpassword">Old Password</label>
                        <input type="password" name="oldpassword" class="form-control" required>
                        <p><?php echo isset($error['oldpassword']) ? $error['oldpassword']: '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" name="password" class="form-control" required>
                      <p><?php echo isset($error['password']) ? $error['password']: '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" name="password2" class="form-control" required>
                        <p><?php echo isset($error['password2']) ? $error['password2']: '' ?></p>
                    </div>
                    <button type="submit" name="save_pass" class="btn btn-success btn-block md-3">Save</button>
                </form>
            </div>
        </div>
        </div>
         </div>
  </section>

                    <!-- middle content -->
                    
                    <!-- col-lg-12 -->
                </div>
               
                <!-- /.row --> 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapp_patient

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script>$('#myTable').dataTable();</script>
</body>

</html>
