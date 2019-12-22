<table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Course Name</th>
            <th>Posting Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM program";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['program_id'];
        $program = $row['program'];
        $posting_date = $row['posting_date'];
       ?> <th><?php echo $id ;?></th>
        <th><?php echo $program ;?></th>
        <th><?php echo $posting_date ;?></th>
        <?php echo"<th><a href='courses_cat.php?source=edit_courses&course_id={$id}'><button type='submit' class='btn btn-primary'>Edit</button></a>";?></th>
        <th><?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='courses_cat.php?delete={$id}'><button type='button' class='btn btn-danger'>Delete</button></a>";?></th>
        </tr><?php
    } 
?>
         
        </tbody>
</table>