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
                            echo $_SESSION['username'];
                            ?>
                            <small>DASHBOARD</small>
                        </h1>
                        <!-- middle content -->
                    <?php include("../includes/admin_dashboard.php"); ?>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
