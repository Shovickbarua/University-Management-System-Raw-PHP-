<?php

include('includes/header.php');
include('includes/menu.php');


     $sql = "select *,add_student.name as student,add_student.image,class.name as semester,year.name as yearName,stugroup.name as department from add_student 
     join stugroup on add_student.group_id = stugroup.id 
     join class on add_student.class_id = class.id
     join year on add_student.year_id = year.id
     where id_no=".$_GET['id_no'];

     $result = $con->query($sql);
     $row = mysqli_fetch_assoc($result);
     //  print_r($row);die();
                                                       
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Marksheet Generate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Marksheet</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
			<div class="col-lg-12">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">Student Marksheet</h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
					  <button type="button" onclick="printDiv()">Print</button>
                         <div style="border:2px solid; padding:7px;" id="marksheet">
                              <div class="row">
                                   <div style="float: right" class="col-md-2 text-center">
                                   <img src="<?php echo $row['image']; ?>" style="width:100px;height:110px;border:1px solid #000;">
                                   </div>
                                   <div class="col-md-2"></div>
                                   <div class="col-md-4 text-center" style="float: left;">
                                        <h4><strong>East Delta University</strong></h4>
                                        <h6><strong>Chittagong</strong></h6>
                                        <h5><strong><u><i>Academic Transcript</i></u></strong></h5>
                                   </div>
                              </div><!-- /.row-->
                              <div class="col-md-12">
                                   <hr style="border:solid 1px; width:100%;color:#ddd;margin-bottom:0px;">
                                   <p style="text-align:right"><u><i><?php  date_default_timezone_set('Asia/Dhaka'); echo "Print Date:-".date('d M Y');?></i></u></p>
                              </div>
                              <div class="row">
                                   <div class="col-md-6">
                                        <table border="1" width="100%" cellpadding="9" cellspacing="2">
                                             <tr>
                                                  <td width="50%">Student ID</td>
                                                  
                                                  <td width="50%">    
                                                  <?php echo $row['id_no']; ?>
                                                  </td>
                                             </tr>
                                             
                                     
                                             <tr>
                                                  <td width="50%">Name</td>
                                                  <td width="50%"><?php echo $row['student']; ?></td>
                                             </tr>
                                             <tr>
                                                  <td width="50%">Department</td>
                                                  <td width="50%"><?php echo $row['department']; ?></td>
                                             </tr>
                                             <tr>
                                                  <td width="50%">Semester</td>
                                                  <td width="50%"><?php echo $row['semester']; ?></td>
                                             </tr>
                                             <tr>
                                                  <td width="50%">Joining Year</td>
                                                  <td width="50%"><?php echo $row['yearName']; ?></td>
                                             </tr>
                                             <tr>
                                                  <td width="50%">Date of Birth</td>
                                                  <td width="50%"><?php echo $row['dob']; ?></td>
                                             </tr>
                                             
                                        </table>
                                   </div>
                                   <div class="col-md-6">
                                        <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
                                            <thead>
                                                  <tr>
                                                       <th>Letter Grade</th>
                                                       <th>Letter Interval</th>
                                                       <th>Grade Point</th>
                                                  </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>A</td>
                                                    <td>93-100</td>
                                                    <td>4.00</td>
                                                </tr>
                                                <tr>
                                                    <td>A-</td>
                                                    <td>90-92</td>
                                                    <td>3.70</td></td>
                                                  </tr>
                                                <tr>
                                                    <td>B+</td>
                                                    <td>87-89</td>
                                                    <td>3.30</td>
                                                  </tr>
                                                <tr>
                                                    <td>B</td>
                                                    <td>83-86</td>
                                                    <td>3.00</td>
                                                </tr>
                                                <tr>
                                                    <td>B-</td>
                                                    <td>80-82</td>
                                                    <td>2.70</td>
                                                </tr>
                                                <tr>
                                                    <td>C+</td>
                                                    <td>77-79</td>
                                                    <td>2.30</td>
                                                </tr>
                                                <tr>
                                                    <td>C</td>
                                                    <td>73-76</td>
                                                    <td>2.00</td>
                                                </tr>
                                                <tr>
                                                    <td>C-</td>
                                                    <td>70-72</td>
                                                    <td>1.70</td>
                                                </tr>
                                                <tr>
                                                       <td>D+</td>
                                                       <td>67-69</td>
                                                       <td>1.30</td>
                                                 </tr>
                                                 <tr>
                                                       <td>D</td>
                                                       <td>60-66</td>
                                                       <td>1.00</td>
                                                 </tr>
                                                  <tr>
                                                       <td>F</td>
                                                       <td>0-59</td>
                                                       <td>0.00</td>
                                                  </tr>
									</tbody>
                                        </table>
                                   </div>
                              </div><br><!--/row-->
                              <div class="row">
                                   <div class="col-md-12">
                                        <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
                                             <thead>
                                                  <tr>
                                                       <th class="text-center">Serial</th>
                                                       <th class="text-center">Course</th>
                                                       <th class="text-center">Full Marks</th>
                                                       <th class="text-center">Get Marks</th>
                                                       <th class="text-center">Letter Grade</th>
                                                       <th class="text-center">Grade Point</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             <?php
                                             if(isset($_GET['class_id'])){
                                             $class_id      = $_GET['class_id'];
                                             $id_no         = $_GET['id_no'];
                                             $countFail = "select * from student_marks where class_id ={$class_id} and id_no = {$id_no} and marks < 33";

                                             $resultfail=mysqli_query($con,$countFail);
                                             $countFail=mysqli_num_rows($resultfail);

                                             $allMraksSql = "select * from student_marks where class_id ={$class_id} and id_no = {$id_no} limit 1";
											 //echo $allMraksSql;die();
                                             $singleResult = $con->query($allMraksSql);
                                             if($singleResult->num_rows > 0){
                                                  $allMraksSql2 = "select student_marks.*,subject.name,assign_subjects.full_mark from student_marks 
                                                  join subject on student_marks.assign_subject_id = subject.id 
                                                  join assign_subjects on student_marks.assign_subject_id = assign_subjects.subject_id
                                                  where assign_subjects.class_id ={$class_id} and id_no = '{$id_no}'";
                                                 // echo $allMraksSql2;die();
                                             $allMarks = $con->query($allMraksSql2);
                                             $index=1;
                                             /*All Grade */
                                             $allGrade = "select * from marks_grades";
                                             $grade_result = $con->query($allGrade);
                                             $grade = $grade_result->fetch_assoc();
											 
                                             $total_marks = 0;
											  $total_point = 0;
                                             while( $sin_stu_res_data = $allMarks->fetch_assoc()){
												
                                            
                                             $get_mark = $sin_stu_res_data['marks'];
                                             $total_marks += (float)$get_mark;

                                             $total_subject_sql = "select * from student_marks where class_id ={$class_id} and id_no = {$id_no}";

                                             $result4=mysqli_query($con,$total_subject_sql);
                                             $total_subject=mysqli_num_rows($result4);

                                             $grade_marks = "select * from marks_grades where start_marks <= {$sin_stu_res_data['marks']} and end_marks >= {$sin_stu_res_data['marks']} limit 1";
                                             //echo $grade_marks;die();

                                             $grade_result = $con->query($grade_marks);
                                             $grade_marks = $grade_result->fetch_assoc();
                                             $grade_name = $grade_marks['grade_name'];
                                             $grade_point = number_format((float)$grade_marks['grade_point'],2);
                                             $total_point = (float)$total_point+(float)$grade_marks['grade_point'];
                                             ?>
                                             <tr>
                                                  <td><?php echo $index++; ?></td>
                                                  <td><?php echo $sin_stu_res_data['name']; ?></td>
                                                  <td><?php echo $sin_stu_res_data['full_mark']; ?></td>
                                                  <td><?php echo  $get_mark; ?></td>
                                                  <td><?php echo  $grade_name; ?></td>
                                                  <td><?php echo  $grade_point; ?></td>
                                             </tr>
                                             <?php
                                                  }
                                             ?>
                                              <tr>
                                                  <td colspan="3"><strong>Total Marks</strong></td>
                                                  <td colspan="3"><strong><?php echo  $total_marks; ?></strong></td>
                                             </tr>
                                             <?php     
                                             }
                                        }

                                             ?>     
                                             </tbody>
                                        </table>
                                   </div>
                              </div></br>
                              <div class="row">
                                   <div class="col-md-12">
                                        <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
                                             <?php
                                             $total_grade = 0;
                                             $point_for_letter_grade = (float)$total_point/(float)$total_subject;
                                             $total_grade = "select * from marks_grades where start_point <= {$point_for_letter_grade} and end_point >= {$point_for_letter_grade}";
											
                                             $result4 = $con->query($total_grade);
                                             $total_grade = $result4->fetch_assoc();
                                             $grade_point_avg = (float)$total_point/(float)$total_subject;
                                             
                                             ?>
                                             <tbody>
                                                  <tr>
                                                       <td width="50%"><strong>Grade Point Average</strong></td>
                                                       <td width="50%">
                                                            <?php
                                                            if($countFail > 0){
                                                                 echo 0.00;
                                                            }else{
                                                                 echo number_format((float)$grade_point_avg,2);
                                                            }
                                                            ?>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td width="50%"><strong>Letter Grade</strong></td>
                                                       <td width="50%">
                                                            <?php
                                                            if($countFail > 0){
                                                                 echo "F";
                                                            }else{
                                                                 echo $total_grade['grade_name'];
                                                            }
                                                            ?>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td width="50%"><strong>Total Marks With Fraction</strong></td>
                                                       <td width="50%"><?php echo $total_marks; ?></td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </div>
                              </div><br>
                              <div class="row">
                                   <div class="col-md-12">
                                        <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
                                             <tbody>
                                                  <tr>
                                                       <td width="50%"><strong>Grade Point Average</strong></td>
                                                       <td width="50%">
                                                            <?php
                                                            if($countFail > 0){
                                                                 echo "Fail";
                                                            }else{
                                                                 echo $total_grade['remarks'];
                                                            }
                                                            ?>
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </div>
                              </div></br>
                              <div class="row">
                                   <div class="col-md-4">
                                        <hr style="border:1px solid;width:60%;color:#000;margin-bottom:0px;">
                                        <p class="text-center">Faculty</p>
                                   </div>
                                   <div class="col-md-4">
                                        <hr style="border:1px solid;width:60%;color:#000;margin-bottom:0px;">
                                        <p class="text-center">Student</p>
                                   </div>
                                   <div class="col-md-4">
                                        <hr style="border:1px solid;width:60%;color:#000;margin-bottom:0px;">
                                        <p class="text-center">Proctor</p>
                                   </div>
                              </div>
                         </div><!-- /.Border Div -->
                      </div><!-- /.card Body-->
				</div><!-- /.card -->
			</div>
		</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
<script>


function printDiv(){
        var printContents = document.getElementById('marksheet').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
</script>