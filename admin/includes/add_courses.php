<?php
if(isset($_POST['submit'])){
  $course_name = $_POST['course_name'];
  $post_date = date('y-m-d');
if(empty($course_name)){
      echo "<div class='alert alert-info'>Field is empty</div>";
}else{

  global $connection;
$query = "INSERT INTO program(program_id, program ,posting_date) VALUES (NULL ,'$course_name',now()) ";
$result = mysqli_query($connection,$query);
confirmQuery($result);
  echo "<div class='alert alert-info'>Successfull Added</div>";
}
}
?>



<form action="" method="POST" class="form-group" id="my-form">
<div class="form-group">
  <label for="">Course:</label>
 <input type="text" name="course_name" class="form-control">
</div>
<input type="submit" class="btn btn-primary" name="submit">
</form>
