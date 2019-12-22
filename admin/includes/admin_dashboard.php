       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-md fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class="huge">
<?php 
global $connection;
$query = "SELECT * FROM userregistration";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo $row;                    
?>
                  </div>
                        <div>Users</div>
                    </div>
                </div>
            </div>
            <a href="student_cat.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
<?php 
global $connection;
$query = "SELECT * FROM program";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo $row;                    
?>
                     </div>
                      <div>Courses</div>
                    </div>
                </div>
            </div>
            <a href="courses_cat.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-building-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>
<?php 
global $connection;
$query = "SELECT * FROM rooms";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo $row;                    
?>
                    </div>
                        <div> Rooms</div>
                    </div>
                </div>
            </div>
            <a href="Rooms_cat.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
<?php 
global $connection;
$query = "SELECT * FROM registration";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo $row;                    
?>
                        </div>
                         <div>Student</div>
                    </div>
                </div>
            </div>
            <a href="student_cat.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>   
</div>
                <!-- /.row -->