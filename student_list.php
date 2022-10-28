<?php
include('includes/header.php');
include('includes/menu.php');

/*Showing Default Year and Class Information order by year desc and class by asc for student list*/
$year_query = "select id from year order by id desc limit 1";
$year_query_run = $con->query($year_query);
$year = $year_query_run->fetch_assoc();
$year_id = $year['id'];

$class_query = "select id from class order by id asc limit 1";
$class_query_run = $con->query($class_query);
$class = $class_query_run->fetch_assoc();
$class_id = $class['id'];

$group_query = "select id from stugroup order by id asc limit 1";
$group_query_run = $con->query($group_query);
$group = $group_query_run->fetch_assoc();

$group_id = $group['id'];

?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
     
          
		<!-- Content Goes Here For All Page-->
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">All Students</h3>
					<a href="add_student.php" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Student</a>
				  </div>
					<!-- /.card-header -->
					<div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
						  <thead>
						  <tr>
                <th width="7%">Serial</th>
                <th>Name</th>
                <th>ID No</th>
                <th>Year</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Image</th>
                <th width="17%">Action</th>
						  </tr>
						  </thead>
						  <tbody>
              <?php
                $sql = "select *,class.name as semester,add_student.name,add_student.id as stId,add_student.id_no,add_student.image ,year.name as yearName,stugroup.name as groupName from add_student
                join stugroup on add_student.group_id = stugroup.id 
                join class on add_student.class_id = class.id
                join year on add_student.year_id = year.id"; 
                
                //$sql = "select * from add_student";
              // echo $sql;die();
               //echo $sql;die();
                $result = $con->query($sql);
                $index=1;
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                ?>
                  <tr>
                    <td><?php echo $index++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['id_no']; ?></td>
                    <td><?php echo $row['yearName']; ?></td>
                    <td><?php echo $row['groupName']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" style="width:100px;height:110px;border:1px solid #000;"></td>
                    <td>
                    <a title="PDF" href="view_student.php?id=<?php echo $row['stId']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf"></i></a>
                  <!--  <a title="delete" id="delete" href="student_list.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                    </a> -->
                    </td>
                  </tr>
                <?php
                  }
                }
              ?>  
						  </tbody>
						</table>
					</div>	 
				</div>
			</div>
		</div>
        <!-- /.row -->
		<!-- /End Content-->
          
        
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
<script>
$(function () {
  $('#myForm').validate({
    rules: {
      name: {
        required: true,
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

