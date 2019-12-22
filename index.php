<?php include("includes/header.php"); ?>
<?php

   if(isset($_POST['signin'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
//    
        global $connection;
    

    $error =[
            'email' => '',
            'password' => ''
        ];
       
        if(!is_emailFound($email) && !is_passwordFound($password)){
            $message = "username and password does not exit";
        }
       
                
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
            login($email,$password);  
        }
   }
?>



    <div class="main">

        <!-- Sign up form -->
 <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="username"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sing in  Form -->
        

    </div>
    <?php include("includes/footer.php"); ?>