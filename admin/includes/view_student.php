<table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Sno.</th>
            <th>Student Name</th>
            <th>Reg no</th>
            <th>Contact</th>
            <th>Room No</th>
            <th>Number of students</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot class="thead">
        <tr>
            <th>Sno.</th>
            <th>Student Name</th>
            <th>Reg no</th>
            <th>Contact</th>
            <th>Room No</th>
            <th>Number of students</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Delete</th>
        </tr>
        </tfoot>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM registration";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $firstName = $row['firstName'];
        $middleName = $row['middleName'];
        $lastName = $row['lastName'];
        $regno = $row['regno'];
        $contactno = $row['contactno'];
        $room_no = $row['roomno'];
        $seater = $row['seater'];
        $stayfrom = $row['stayfrom'];
        $duration = $row['duration'];
       ?> <th><?php echo $id ;?></th>
        <th><?php echo $firstName ." ". $middleName ." ". $lastName ;?></th>
        <th><?php echo $regno ;?></th>
        <th><?php echo $contactno ;?></th>
        <th><?php echo $room_no ;?></th>
        <th><?php echo $seater ;?></th>
        <th><?php echo $stayfrom ;?></th>
        <th><?php echo $duration ;?></th>
        <th><?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='student_cat.php?delete={$id}'><button type='button' class='btn btn-danger'>Delete</button></a>";?></th>
        </tr><?php
    } 
?>
         
        </tbody>
</table>