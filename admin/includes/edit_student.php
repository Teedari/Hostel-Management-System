<?php
if(isset($_GET['rooms_id'])){
   $the_rooms_id = $_GET['rooms_id'];
   global $connection;
$query = "SELECT * FROM rooms WHERE id = {$the_rooms_id}";
   $result = mysqli_query($connection,$query);
   confirmQuery($result);
   while($row = mysqli_fetch_assoc($result)){
       $id = $row['id'];
       $db_room_no = $row['room_no'];
       $db_fees = $row['fees']; 
}
}
?>
<?php
if(isset($_POST['update'])){
    $seater = $_POST['seater'];
    $room_no  = $_POST['room_no'];
    $fee = $_POST['fee'];
    $id = $_POST['id'];
    $post_date = date('y-m-d');
    global $connection;
    $query = "UPDATE rooms SET seater = '{$seater}', room_no = {$room_no}, fees = {$fee}, posting_date = now() WHERE id = {$id}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    echo "<div class='alert alert-info'>Successfull Updated</div>";


}
?>


<form action="" method="POST" role="form">
    <div class="form-group">
    <label class="col-sm-2 control-label">Number of student  </label>
    </div>
    <div class="form-group">
    <Select name="seater" class="form-control" required>
    <option value="">Select</option>
    <option value="1">Single</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
    <option value="5">Five</option>
    </Select>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Room No</label>
    <input type="text" class="form-control" name="room_no" id="room_no" value="" required="required" value="<?php echo $db_room_no; ?>">
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Fees</label>
    <div class="form-group">
    <input type="text" class="form-control" name="fee" id="fee" value="" required="required" value="<?php echo $db_fees;?>">
    </div>
    <label class="col-sm-2 control-label">Id</label>
    <div class="form-group">
    <input type="text" name="id" class="form-control" value="<?php echo $id;?>">
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update" value="Update Room " >
    </div>
</form>