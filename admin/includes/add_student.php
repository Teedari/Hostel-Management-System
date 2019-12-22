<?php
if(isset($_POST['register'])){
    $roomno=$_POST['room_no'];
    $seater=$_POST['seater'];
    $feespm=$_POST['feesPerM'];
    $stayfrom=$_POST['stayf'];
    $duration=$_POST['duration'];
    $course=$_POST['course'];
    $regno=$_POST['regno'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $contactno=$_POST['contact'];
    $email=$_POST['email'];
    $econtact=$_POST['econtact'];
    $gurname=$_POST['gname'];
    $gurrelation=$_POST['grelation'];
    $gurcntno=$_POST['gcontact'];
    $caddress=$_POST['address'];
    $ccity=$_POST['city'];
    $postingDate = ('m-d-y');
    
    $error =[
            'seater' => '',
            'regno' => ''
        ];
//        $roomno,$seater,$feespm,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$email,$econtact,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$postingDate
         if(is_seaterEqual($roomno,$seater)){
            $error['seater'] = 'Seater is not equal!!';
        }
         if(!is_indexExit()){
            $error['regno'] = 'Index number already exits!!';
            
        }   
                
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
         registerStudentTable( $roomno,$seater,$feespm,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$email,$econtact,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$postingDate);
        }
    
    

}
?>

<div class="col-lg-6">
<form action="" method="POST" role="form">
<div class="form-group">
<label for="" class="control-label">Room No</label>
<div class="form-group" style="width: 200px;">
<select name="room_no" id="room_no" class="form-control" required> 
<option value="">Select Room no</option>
<?php
    echo roomAvaliable();
?>

</select> </div>
</div>
<div class="form-group">
<label class="control-label">Number of student</label>
<div class="form-group">
<input type="text" name="seater" id="seater"  class="form-control"  >
</div>
<p><?php echo isset($error['seater']) ? $error['seater']: '' ?></p>
</div>

<div class="form-group">
<label class="control-label">Fees Per Month</label>
<div class="form-group">
<input type="text" name="feesPerM" id="fpm"  class="form-control" >
</div>
</div>	

<div class="form-group">
<label class="control-label">Date</label>
<div class="form-group">
<input type="date" name="stayf" id="stayf"  class="form-control" >
</div>
</div>

<div class="form-group">
<label class="control-label">Duration</label>
<div class="form-group">
<input name="duration" type="date" id="duration" class="form-control">
</div>
</div>


<div class="form-group">
<label class="control-label"><h4 style="color: green" align="left">Personal info </h4> </label>
</div>

<div class="form-group">
<label class="control-label">course </label>
<div class="form-group" style="width: 200px;">
<select name="course" id="course" class="form-control" required> 
<option value="">Select Course</option>
<?php
global $connection;
$query = "SELECT * FROM program";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $program = $row['program'];
       echo"<option value='$program'>$program</option>";

    }
?>

</select> </div>
</div>

<div class="form-group">
<label class="control-label">Registration No : </label>
<div class="form-group">
<input type="text" name="regno" id="regno"  class="form-control" required="required" >
</div>
<p><?php echo isset($error['regno']) ? $error['regno']: '' ?></p>
</div>


<div class="form-group">
<label class="control-label">First Name : </label>
<div class="form-group">
<input type="text" name="fname" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="control-label">Middle Name : </label>
<div class="form-group">
<input type="text" name="mname" id="mname"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="control-label">Last Name : </label>
<div class="form-group">
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="control-label">Gender : </label>
<div class="form-group">
<select name="gender" class="form-control" required="required">
<option value="">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label">Contact No : </label>
<div class="form-group">
<input type="number" name="contact" id="contact"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="control-label">Email id : </label>
<div class="form-group">
<input type="email" name="email" id="email"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="control-label">Emergency Contact: </label>
<div class="form-group">
<input type="number" name="econtact" id="econtact"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="control-label">Guardian  Name : </label>
<div class="form-group">
<input type="text" name="gname" id="gname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="control-label">Guardian  Relation : </label>
<div class="form-group">
<input type="text" name="grelation" id="grelation"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="control-label">Guardian Contact no : </label>
<div class="form-group">
<input type="number" name="gcontact" id="gcontact"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class=" control-label"><h4 style="color: green" align="left">Correspondense Address </h4> </label>
</div>


<div class="form-group">
<label class="control-label">Address : </label>
<div class="form-group">
<textarea  rows="5" name="address"  id="address" class="form-control" required="required"></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label">City : </label>
<div class="form-group">
<input type="text" name="city" id="city"  class="form-control" required="required">
</div>
</div>

<input type="submit" name="register" class="btn btn-primary" value="Register">

</form>
</div>

<!-- /col-lg-6 -->

<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Rooms List</div>
            <div class="panel-body">
                <table class="table table-striped table-inverse table-responsive" id="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Number of student</th>
                            <th>Room No.</th>
                            <th>Fee(Per std.)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM rooms";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $seater = $row['seater'];
        $room_no = $row['room_no'];
        $fees = $row['fees'];
        $posting_date = $row['posting_date'];
    ?>
        <th><?php echo $seater ;?></th>
        <th><?php echo $room_no ;?></th>
        <th><?php echo $fees ;?></th>
        </tr><?php
    }; 
?>
                        
                        </tbody>
                </table>
                </div>
            </div>
        </div>
