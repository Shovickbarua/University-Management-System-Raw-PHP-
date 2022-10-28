<?php
include('includes/header.php');
include('includes/menu.php');

?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department List</li>
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
					<h3 class="card-title">All Department</h3>
					<a href="add_department.php" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i> Add Department </a>
				  </div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
						  <thead>
						  <tr>
							<th width="7%">Serial</th>
							<th>Name</th>
							<th width="10%">Action</th>
						  </tr>
						  </thead>
						  <tbody>
						  <?php

							$sql = "select * from stugroup";
							$result = $con->query($sql);
							$index=1;
							if($result->num_rows > 0){
							  while($row = $result->fetch_assoc()){
							?>
							  <tr>
								<td><?php echo $index++; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td>
								<a title="Edit" id ="edit"href="add_department.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						<!--		<a title="delete" id="delete" href="dept_list.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> -->
								</a>
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

