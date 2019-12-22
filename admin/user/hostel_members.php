    

    
<?php include("../includes/admin_header.php"); ?>

    <div id="wrapper">
    
<?php include("../includes/admin_navigation.php"); ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
 <?php include("../includes/user_sidebar.php"); ?>
           
<?php
if($_SESSION['username'] != ""){

$index = $_SESSION['username'];
global $connection;
$query2 = "SELECT * FROM registration WHERE regno = '{$index}'";
$result2 = mysqli_query($connection,$query2);
confirmQuery($result2);
while($row= mysqli_fetch_assoc($result2)){
$_SESSION['roomno'] = $row['roomno'];
}


}

?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome <?php 
                            echo $_SESSION['username']
                            ?>
                            <small>DASHBOARD</small>
                        </h1>
                        <!-- middle content -->
                           <table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Sno.</th>
            <th>Student Name</th>
            <th>Contact</th>
           </tr>
        </thead>
        <tfoot class="thead">
        <tr>
            <th>Sno.</th>
            <th>Student Name</th>
            <th>Contact</th>
        </tr>
        </tfoot>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM registration WHERE roomno = {$_SESSION['roomno']} ";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $regno = $row['regno'];
        $contactno = $row['contactno'];
        $room_no = $row['roomno'];
        $seater = $row['seater'];
        $stayfrom = $row['stayfrom'];
        $duration = $row['duration'];
       ?> <th><?php echo $id ;?></th>
        <th><?php echo $firstName ." ". $lastName ;?></th>
        <th><?php echo $contactno ;?></th></tr>
<?php
    
    } 
?>
         
        </tbody>
</table>
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
