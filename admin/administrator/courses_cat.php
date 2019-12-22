<?php include("../includes/admin_header.php"); ?>

    <div id="wrapper">
    
<?php include("../includes/admin_navigation.php"); ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
 <?php include("../includes/admin_sidebar.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome <?php 
//                            echo $_SESSION['username'];
                            ?>
                            <small>DASHBOARD</small>
                        </h1>
                        <!-- middle content -->
                      <?php 

if(isset($_GET['source'])){
$source = $_GET['source'];
}else{
$source = '';
}
switch($source) {

case 'add_courses';
include("../includes/add_courses.php");
break;

case 'view_courses';
include("../includes/view_courses.php");
break;

case 'edit_courses';
include("../includes/edit_courses.php");
break;

case 'add_courses';
include("../includes/add_courses.php");
break;

default:
include("../includes/view_courses.php");
break;        
}           
?>
<?php
if(isset($_GET['delete'])){
    $courses_id = $_GET['delete'];
    global $connection;
    $query = "DELETE FROM program WHERE program_id = {$courses_id} ";
    $deleteQuery = mysqli_query($connection,$query);
    confirmQuery($deleteQuery);
    redirect("./courses_cat.php");
    
} 

?>
                    <!-- end middle content -->
                    </div>
                    <!-- col-lg-12 -->
                </div>
               
                <!-- /.row --> 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script>
        $('#table').dataTable();
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
