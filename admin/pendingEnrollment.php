<?php

  include('admin_session.php');
  $alertMessage = "";


  if(isset( $_GET['alert'] )){

     if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-11'><div class='alert alert-success'>
                              <strong>Successfully Updated Information <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'changepassword_success' ){
        $alertMessage = "<div class='row'><div class='col-md-11'><div class='alert alert-success'>
                              <strong> PASSWORD CHANGED! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } 

  }


  require('includes/connection.php');
  include('includes/header.php');
  include('../admin/navigation_admin2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">
                <?php echo $alertMessage; ?>
                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/administration.php">Administration</a></li>
                          <li><a href="../admin/view_pending_choose_branch.php">Choose Branch</a></li>
                          <li><a href="../admin/pendingEnrollment.php">Pending Enrollment : Caloocan</a></li>
                        
                      </ol>
                    </div>
                </div>
     
                    <div class="col-md-12">
                            <div class="row">
                               <div class="col-sm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>
                                          <th class="text-center">
                                            Student Number
                                          </th>
                                          <th class="text-center">
                                            Student Name
                                          </th>
                                          <th class="text-center">
                                            Student Course
                                          </th>
                                          <th class="text-center">
                                            Student Year
                                          </th>
                                          <th class="text-center">
                                            Status
                                          </th>

                                          <th class="text-center">
                                            View
                                          </th>
                                        </tr>
                                        <tr>

                                        <?php include('admin_nav2.php'); ?>
                       
                                          <!--profile content here-->
                                          <div class="container-fluid">

                                            <?php 

                                                $pending = "pending";
                                                $query = "SELECT studInfo.studentNo, 
                                                          studInfo.first_name , 
                                                          studInfo.last_name, 
                                                          studInfo.course_id, 
                                                          studInfo.year_level,
                                                          studInfo.semester_num , 
                                                          studInfo.status 
                                                          FROM tbl_studentinfo studInfo 
                                                          WHERE studInfo.status = '$pending'
                                                          AND studInfo.new_old != 'new'";

                                            // $query = "SELECT * FROM tbl_studentinfo WHERE tbl_studentinfo.status = '$pending'";


                                                $result = mysqli_query($conn,$query);

                                                if( !$result ){
                                                        $student_number = "NO DATA";
                                                        $student_fname = "NO DATA";
                                                        $student_lastName = "NO DATA";
                                                        $student_course = "NO DATA";
                                                        $student_yrLevel = "NO DATA";
                                                        $student_semNumber = "NO DATA";
                                                        $student_status = "NO DATA";
                                                } 
                                                
                                                while( $row = mysqli_fetch_assoc($result) ){

                                                        $student_number = $row['studentNo'];
                                                        $student_fname = $row['first_name'];
                                                        $student_lastName = $row['last_name'];
                                                        $student_course = $row['course_id'];
                                                        $student_yrLevel = $row['year_level'];
                                                        $student_semNumber = $row['semester_num'];
                                                        $student_status = $row['status'];
                                             ?>
                                         
                                          <td class="text-center">
                                          <?php echo $student_number; ?>
                                          </td>
                                         
                                          <td class="text-center">
                                           <?php {echo $student_fname ,' ', $student_lastName;} ?>
                                          </td>
                                         
                                          <td class="text-center">
                                          <?php echo $student_course; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                            <?php {echo $student_yrLevel , '-' , $student_semNumber;} ?>
                                          </td>
                                          
                                          <td class="text-center">
                                            <?php echo $student_status; ?>
                                          </td>
                                         
                                          <td class="text-center">
                                           <a href="../admin/view_pending.php?view=<?php {echo $student_number;}?>" role="button"><i class="fa fa-pencil-square"></i></a> 
                                          </td>
                                          
                                        </tr>

                                        <?php } ?>

                                  </table>
                               </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 