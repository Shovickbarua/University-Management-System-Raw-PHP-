<?php
include('includes/header.php');
include('includes/menu.php');
if(isset($_GET['id'])){
	$id              = $_GET['id'];
	$sql             = "select * from subject where id='$id'";
	$class_editquery = $con->query($sql);
	$edit_data       = $class_editquery->fetch_assoc();
}

?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
				<?php
					if(isset($_GET['id'])){
						echo 'Edit Course';
					}else{
						echo 'Add Course';
					}
				?>
			  </li>
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
			<form id="myForm" method="POST" id="myForm" action="functions.php">
			<input type="hidden" name="id" value="<?php if(isset($edit_data)) echo $edit_data['id']; ?>">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="name">Course<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php if(isset($edit_data)) echo $edit_data['name']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="group_id">Select Department</label>
                    <select class="form-control" id="group_id" name="group_id">
                      <option value="">--Select Department --</option>
                      <?php
                      $sql = "select * from stugroup";
                      $result = $con->query($sql);
                      if($result->num_rows > 0){
                        while($group = $result->fetch_assoc()){
                      ?>
                        <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                      <?php  
                        }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="code">Course Code<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="code" placeholder="Course Code" name="code" value="<?php if(isset($edit_data)) echo $edit_data['code']; ?>">
                  </div>
                 
                <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-sm" name="sub_btn">
                <?php
                if(isset($_GET['id'])){
                  echo 'Update';
                }else{
                  echo 'Submit';
                }
                ?>
              </button>               
              </div>
              </div>
      </form>
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

