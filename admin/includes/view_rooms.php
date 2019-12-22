<table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Seater</th>
            <th>Room No.</th>
            <th>Fee(Per std.)</th>
            <th>Posting Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM rooms WHERE status > 0";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $seater = $row['seater'];
        $room_no = $row['room_no'];
        $fees = $row['fees'];
        $posting_date = $row['posting_date'];
       ?> <th><?php echo $id ;?></th>
        <th><?php echo $seater ;?></th>
        <th><?php echo $room_no ;?></th>
        <th><?php echo $fees ;?></th>
        <th><?php echo $posting_date ;?></th>
        <?php echo"<th><a href='rooms_cat.php?source=edit_rooms&rooms_id={$id}'><button type='submit' class='btn btn-primary'>Edit</button></a>";?></th>
        <th><?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='rooms_cat.php?delete={$id}'><button type='button' class='btn btn-danger'>Delete</button></a>";?></th>
        </tr><?php
    } 
?>
         
        </tbody>
</table>
<?php echo"<th><a href='rooms_cat.php?source=other_rooms'><button type='submit' class='btn btn-primary'>Unavailable Rooms</button></a>";?></th>
