<?php ob_start();?>
<?php session_start();?>

<?php
    function confirmQuery($result){
      global $connection;
        if(!$result){
            die("QUERY FAILED: " . mysqli_error($connection));
        }
    }
    function redirect($location){
        header("Location: " . $location);
    }

    
function dep_show_id() {
    global $connection;
    $query = "SELECT * FROM Department";
    $id_query = mysqli_query($connection,$query);
    
    if(!$id_query){
        
        die(mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($id_query)){
        $Department_id = $row[Department_id];
        echo"<option value='$Department_id'>$Department_id</option>";
    }
}

function registerStudentTable( $roomno,$seater,$feespm,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$email,$econtact,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$postingDate){
    
    $date = date('d-m-y');
    global $connection;
    $query="INSERT INTO registration(`roomno`, `seater`, `feespm`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `postingDate`) ";
    $query.="VALUES($roomno,$seater,$feespm,'$stayfrom','$duration','$course','$regno','$fname','$mname','$lname','$gender',$contactno,'$email',$econtact,'$gurname','$gurrelation',$gurcntno,'$caddress','$ccity',now())";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    echo "<div class='alert alert-info'>Successfully Added</div>";

    $query1="INSERT INTO  admin(username,email,password,reg_date,user_role) VALUES('$lname','$regno','$contactno',now(),'User')";
    $result1 = mysqli_query($connection,$query1);
    confirmQuery($result1);
    echo"<script>alert('Student Successfully register');</script>";
    is_roomStats($roomno);
    

}



/*---------End patient------*/


/*-----Admin--------*/

function validOldPass($oldpassword,$db_id){
    global $connection;
    $query = "SELECT * FROM admin WHERE id = $db_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $db_password = $row['password'];
        if($db_password == $oldpassword){
            return true;
        }else{
            return false;
        }
    }
}

function validUserOldPass($oldpassword,$db_id){
    $db_id = $_SESSION['admin_id'];
    global $connection;
    $query = "SELECT * FROM admin WHERE id = $db_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $db_password = $row['password'];
        if($db_password == $oldpassword){
            return true;
        }else{
            return false;
        }
    }
}
function ValidPassword($password2,$id){
    global $connection;
   $password2 = mysqli_real_escape_string($connection,$password2);
   $query = "UPDATE admin SET password = '{$password2}' WHERE id = {$id}";
   $result = mysqli_query($connection,$query);
   confirmQuery($result);
}
function adminPassword($password2){
             global $connection;
            $password2 = mysqli_real_escape_string($connection,$password2);
            $query = "UPDATE admin SET password = '{$password2}' WHERE id = 1 ";
            $result = mysqli_query($connection,$query);
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
           
}



/*---------------LOGIN SESSION------------*/
function adminLogin($email,$password){
    global $connection;
    $query = "SELECT * FROM admin WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $db_username = $row['username'];
        $db_email = $row['email'];
        $db_password = $row['password'];
    }
    if($email !== $db_email && $password !== $db_password){
        header("Location: index.php");
        echo"<p class='alert alert-warning>Username and password incorrect</p>";
    }else if($email == $db_email && $password == $db_password){
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_email;
        $_SESSION['password'] = $db_password;
        header("Location: ../admin");
        
    }else{
          header("Location: index.php");
         echo"<p class='alert alert-warning>Username and password incorrect</p>";
    }
}

function doctorLogin($email,$password){
    global $connection;
    $query = "SELECT * FROM doctor WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        
        $db_username = $row['name'];
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_user_role = $row['user_role'];
        $db_id = $row['doctor_id'];
        
    }
    if($db_user_role == 'Doctor'){
        
    if($email !== $db_email && $password !== $db_password){
        header("Location: index.php");
    }else if($email == $db_email && $password == $db_password){
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_email;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['id'] = $db_id;
        header("Location: ../admin/doctor");
        
    }else{
        header("Location: index.php");
         echo"<p class='alert alert-warning>Username and password incorrect</p>";
    }
    }else{
                header("Location: index.php");
         echo"<p class='alert alert-warning>Username and password incorrect</p>";
    }
}

function patientLogin($email,$password){
    global $connection;
    $query = "SELECT * FROM patient WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $db_username = $row['patient_name'];
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_user_role = $row['user_role'];
        $db_id = $row['id'];
        
    }
    if($db_user_role == 'Patient'){
        
    if($email !== $db_email && $password !== $db_password){
        header("Location: index.php");
    }else if($email == $db_email && $password == $db_password){
        
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_email;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['id'] = $db_id;
        
            header("Location: ../admin/patient");
        
    }else{
            header("Location: index.php");
         echo"<p class='alert alert-warning>Username and password incorrect</p>";
    }
    }else{
            header("Location: index.php");
         echo"<p class='alert alert-warning>Username and password incorrect</p>";
    }
}

/*-----Rooms AVAliable----*/

function roomAvaliable(){
    global $connection;
$query = "SELECT * FROM rooms WHERE status > 0";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $room_no = $row['room_no'];
       echo"<option value='$room_no'>$room_no</option>";

       
    }
}

/*-----Rooms NOT AVAliable----*/
function roomNotAvaliable(){
    global $connection;
$query = "SELECT * FROM rooms WHERE status = 0";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $room_no = $row['room_no'];
       echo"<option value='$room_no'>$room_no</option>";

       
    }
}



/*------Exits Functions-----*/
function is_roomExit($room_no){
    global $connection;
    $query = "SELECT room_no FROM rooms WHERE room_no = '{$room_no}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function is_roomStats($room_no){
    global $connection;
    $query = "SELECT status FROM rooms WHERE room_no = $room_no";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
       echo $status = $row['status'];
    if($status > 0){
        $newStatus = $status - 1;
        $query = "UPDATE rooms  SET status = $newStatus WHERE room_no = $room_no";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        return true;
    }else{
        return false;
    }
    }
}

function is_seaterEqual($room_no,$seater){
    global $connection;
    $query = "SELECT seater FROM rooms WHERE room_no = '{$room_no}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
        while($row = mysqli_fetch_assoc($result)){
       $db_seater = $row['seater'];
    if($seater != $db_seater){
        return true;
    }else{
        return false;
    }
    }

}
//create exit fxn for index exit
function is_indexExit(){
    global $connection;
    $query = "SELECT regno FROM registration";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}
//Login page 
function login($email,$password){
    global $connection;
    if(!empty($email) && !empty($password)){

    if(is_userRole($email) == 'Admin'){
        $query = "SELECT * FROM admin WHERE email = '{$email}'";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_array($result)){
        $db_username = $row['email'];
        $db_user_role = $row['user_role'];
        $db_password = $row['password'];
        $db_name = $row['username'];
        $db_id = $row['id'];
        }
    if($email == $db_username && $password == $db_password){
        
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['name'] = $db_name;
        $_SESSION['admin_id'] = $db_id;
        header("Location: admin/redirect.php");
    }
    else{echo "<div class='alert alert-danger'><strong>Input the right</strong> Username and password.</div>";}
        
    }//if admin
    
    if(is_userRole($email) == 'User'){
        $query = "SELECT * FROM admin WHERE email = '{$email}'";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_array($result)){
        $db_username = $row['email'];
        $db_user_role = $row['user_role'];
        $db_password = $row['password'];
        $db_name = $row['username'];
        $db_id = $row['id'];
        $db_name =$row['username'];
        }
    if($email == $db_username && $password == $db_password){
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['admin_id'] = $db_id;
        $_SESSION['name'] = $db_name;
        header("Location: admin/redirect.php");
    }
    else{
        echo "<div class='alert alert-danger'><strong>Input the right</strong> Username and password.</div>";
    }
        
    }
    }else{
         echo "<div class='alert alert-danger'><strong>Please enter username and password</strong></div>";
    }
    
}


//email found
function is_emailFound($email){
    global $connection;
    $query = "SELECT email FROM admin WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

//password found
function is_passwordFound($password){
    global $connection;
    $query = "SELECT password FROM admin WHERE password = '{$password}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

//user_role
function is_userRole($email){
    $user_role="";
    global $connection;
    $query = "SELECT * FROM admin WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $user_role = $row['user_role'];
        $password = $row['password'];
    }
    return $user_role;
}
