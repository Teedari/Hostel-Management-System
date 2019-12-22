<?php
if(isset($_POST['submit'])){
  $seater = $_POST['seater'];
  $room_no  = $_POST['room_no'];
  $fee = $_POST['fee'];
  $status = $seater;
  $post_date = date('y-m-d');
    
        $error =[
            'room_no' => ''
            
        ];


        
        if(is_roomExit($room_no)){
            $error['room_no'] = 'Room Already exit';
        }
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
        
  global $connection;
$query = "INSERT INTO rooms(id, seater, room_no, fees , status ,posting_date) VALUES (NULL, '$seater', $room_no, $fee,  $status, now()) ";
$result = mysqli_query($connection,$query);
confirmQuery($result);

$query2 = "INSERT INTO room_status(id, seater, room_no, status) VALUES (NULL, '$seater', $room_no, $status) ";
$result2 = mysqli_query($connection,$query2);
confirmQuery($result2);
  echo "<div class='alert alert-info'>Successfully Added</div>";
        }
        

}
?>
<form action="" method="POST" role="form">
    <div class="form-group">
    <label class="col-sm-2 control-label">Number of People</label>
    </div>
    <div class="form-group">
    <Select name="seater" class="form-control" required>
    <option value="">Select </option>
    <option value="1">Single </option>
    <option value="2">Two </option>
    <option value="3">Three </option>
    <option value="4">Four </option>
    <option value="5">Five </option>
    </Select>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Room No.</label>
    <select class="form-control" name="room_no" id="room_no" value="" required="required">
      <?php
                              $start_no = 0;
                            while($start_no < 200){
                             
                                echo"<option value='$start_no'>$start_no</option>";
                                $start_no+=1;
                            }
                        
                            
                                
        ?>
    </select>
    <p class="h4"><?php echo isset($error['room_no']) ? $error['room_no']: '' ?></p>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Fee(Per Student)</label>
    <div class="form-group">
    <input type="text" class="form-control" name="fee" id="fee" value="" required="required">
    
    </div>

    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="submit" value="Create Room ">
    </div>
</form>
