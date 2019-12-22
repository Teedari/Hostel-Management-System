<?php include("../includes/admin_header.php"); ?>

    <div id="wrapper">
    
<?php include("../includes/admin_navigation.php"); ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
 <?php include("../includes/admin_sidebar.php"); ?>
            <!-- /.navbar-collapse -->

 <?php
if(isset($_SESSION['username'])){
$email = $_SESSION['username'];
global $connection;
$query = "SELECT * FROM admin WHERE email = '{$email}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){
    $doc_id = $row['id'];
    $username = $row['username'];
}
}

?>
<?php
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
        
        if(!validOldPass($oldpassword,$doc_id)){
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
        ValidPassword($password2,$doc_id);
        echo"<script>alert('Password Successfully Updated');</script>";
        }
        
    }
    
    
    
//}
?>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome <?php 
                           echo $_SESSION['username'];
                            ?>
                            <small>DASHBOARD</small>
                        </h1>
                        <!-- middle content -->
                        <div class="card" style="margin-bottom:10px;">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-block">
              <form action="" method="post">
               <div class="form-group">
                  <label for="username" class="form-control-label">UserName</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter UserName"
                  autocomplete="on" 
                value="<?php echo isset($username) ? $username: '' ?>" disabled>
                <p><?php echo isset($error['username']) ? $error['username']: '' ?></p>
                </div>
                <div class="form-group">
                  <label for="email" class="form-control-label">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="username@test.com"
                  autocomplete="on" 
                value="<?php echo isset($email) ? $email: '' ?>" disabled>
                <p><?php echo isset($error['email']) ? $error['email']: '' ?></p>
                </div>
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
                    <!-- end middle content -->
                    </div>
                    <!-- col-lg-12 -->
                </div>
               
                <!-- /.row --> 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
