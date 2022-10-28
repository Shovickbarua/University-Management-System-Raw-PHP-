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
            <h1 class="m-0">Add Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Student</li>
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
    <form id="myForm" method="POST" id="myForm" action="functions.php" enctype="multipart/form-data">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="name">Student Name<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fName">Fathers Name<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="fName" placeholder="Father's Name" name="fName">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mName">Mothers Name<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="mName" placeholder="Mother's Name" name="mName">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pNum">Mobile<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="mobile" name="mobile">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="adress">Address<font style="color:red">*</font></label>
                    <textarea class="form-control" id="adress" name="address" rows="2"></textarea>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Select Gender<font style="color:red">*</font></label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">--Select Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="religion">Religion<font style="color:red">*</font></label>
                    <select name="religion" id="religion" class="form-control">
                        <option value="">--Select Religion--</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Cristian">Cristian</option>
                        <option value="Buddhist">Buddhist</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dob">Date Of Birth<font style="color:red">*</font></label>
                    <input type="date" class="form-control singledatepicker" id="dob" name="dob" autocomplete="off">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="discount">Scholarship<font style="color:red">*</font></label>
                    <input type="text" class="form-control" id="discount" name="discount" autocomplete="off">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="year_id">Select Year<font style="color:red">*</font></label>
                    <select class="form-control" id="year_id" name="year_id">
                      <option value="">--Select Year --</option>
                      <?php
                      $sql = "select * from year";
                      $result = $con->query($sql);
                      if($result->num_rows > 0){
                        while($year = $result->fetch_assoc()){
                      ?>
                        <option value="<?php echo $year['id']; ?>"><?php echo $year['name']; ?></option>
                      <?php  
                        }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="class_id">Select Semester<font style="color:red">*</font></label>
                    <select class="form-control" id="class_id" name="class_id">
                      <option value="">--Select Semester --</option>
                      <?php
                      $sql = "select * from class";
                      $result = $con->query($sql);
                      if($result->num_rows > 0){
                        while($class = $result->fetch_assoc()){
                      ?>
                        <option value="<?php echo $class['id']; ?>" ><?php echo $class['name']; ?></option>
                      <?php  
                        }
                        }
                      ?>
                    </select>
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
                    <label for="shift_id">Select Program</label>
                    <select class="form-control" id="shift_id" name="shift_id">
                      <option value="">--Select Program --</option>
                      <?php
                      $sql = "select * from shift";
                      $result = $con->query($sql);
                      if($result->num_rows > 0){
                        while($shift = $result->fetch_assoc()){
                      ?>
                        <option value="<?php echo $shift['id']; ?>"><?php echo $shift['name']; ?></option>
                      <?php  
                        }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="image">Image Upload</label>
                      <input type="file" class="form-control" id="image" name="image">
                  </div>
                  <div class="form-group col-md-2">
                        <img id="showImage" src="<?php if(isset($edit_data['image'])) ?>" style="width:100px;height:110px;border:1px solid #000;">
                  </div>
                <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-sm" name="add_student">Save</button>
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
?>
<!--Form Validation Code -->
<script>
$(function () {
  $('#myForm').validate({
    rules: {
      name: {
        required: true,
      },
      fName: {
        required: true,
      },
      mName: {
        required: true,
      },
      mobile: {
        required: true,
      },
      address: {
        required: true,
      },
      gender: {
        required: true,
      },
      religion: {
        required: true,
      },
      dob: {
        required: true,
      },
      discount: {
        required: true,
      },
      year_id: {
        required: true,
      },
      class_id: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Please select user name",
      },
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


