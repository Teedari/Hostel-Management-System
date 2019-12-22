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

case 'add_rooms';
include("../includes/add_rooms.php");
break;

case 'view_rooms';
include("../includes/view_rooms.php");
break;

case 'edit_rooms';
include("../includes/edit_rooms.php");
break;

case 'add_rooms';
include("../includes/add_rooms.php");
break;
        
case 'other_rooms';
include("../includes/other_rooms.php");
break;

default:
include("../includes/view_rooms.php");
break;        
}           
?>
                        </div>
                        </div>
			            </div>
                     
<?php
if(isset($_GET['delete'])){
    $rooms_id = $_GET['delete'];
    global $connection;
    $query = "DELETE FROM rooms WHERE id = {$rooms_id} ";
    $deleteQuery = mysqli_query($connection,$query);
    confirmQuery($deleteQuery);
     redirect("./rooms_cat.php");
    
} 

?>
                    <!-- end middle content -->
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
        $('#table2').dataTable();
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
