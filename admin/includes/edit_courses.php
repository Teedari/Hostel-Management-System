<?php
if(isset($_GET['course_id'])){
   $the_course_id = $_GET['course_id'];
    global $connection;
$query = "SELECT * FROM program WHERE program_id = {$the_course_id}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
    $id = $row['program_id'];
    $program = $row['program'];
}
}
?>
<?php
if(isset($_POST['update'])){
    $course_name = $_POST['course_name'];
    $post_date = date('y-m-d');
    global $connection;
    $query = "UPDATE program SET program = '{$course_name}', posting_date = now() WHERE program_id = $the_course_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    echo "<div class='alert alert-info'>Successfull Updated</div>";

}
?>


<form action="" method="POST" class="form-group" id="my-form">
<div class="form-group">
  <label for="">Course:</label>
 <input type="text" name="course_name" class="form-control" value="<?php echo $program ;?>">
 </div>
</div>
<input type="submit" name="update" class="btn btn-primary">
</form>