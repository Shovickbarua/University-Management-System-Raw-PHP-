<?php
include('includes/header.php');
include('includes/menu.php');
if(isset($_GET['id'])){
	$id              = $_GET['id'];
	$sql             = "select * from stugroup where id='$id'";
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
            <h1 class="m-0">Manage Department</h1>
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
                    <label for="name">Department<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="name" placeholder="Subject" name="name" value="<?php if(isset($edit_data)) echo $edit_data['name']; ?>">
                  </div>
                 
                <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-sm" name="dep_btn">
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

