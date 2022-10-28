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
            <h1 class="m-0">Manage Markseet Generate</h1>
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
					<h3 class="card-title">Search Criteria</h3>
				  </div>
					<!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="functions.php" id="myForm">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="class_id">Semester<font style="color:red">*</font></label>
                  <select class="form-control" id="class_id" name="class_id">
                    <option value="">--Select Semester --</option>
                    <?php
                    $sql = "select * from class order by id asc";
                    $result = $con->query($sql);
                    if($result->num_rows > 0){
                      while($class = $result->fetch_assoc()){
                    ?>
                      <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
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
                      $sql = "select * from stugroup order by id asc";
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
                <div class="form-group col-md-3">
                  <label>ID No<font style="color:red">*</font></label>
                  <select class="form-control" id="id_no" name="id_no">
                    <option value="">--Select ID No--</option>
                  </select>
                </div>
                <div class="form-group col-md-4" style="padding-top:32px">
                    <button type="submit" name="search" class="btn btn-primary btn-sm">View Result</button>
                </div>
              </div>
            </form>
          </div> 
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
$(document).ready(function(){
  $('#myForm').submit(function(e){
    e.preventDefault(); 
    var class_id = $('#class_id option:selected').val();
    var id_no = $('#id_no option:selected').val();
    if(class_id!="" && id_no!=""){
		var url = "http://localhost/student_management/student_management/view_result_student_wise.php?class_id="+class_id+"&id_no="+id_no; 
		window.open(url, '_blank');
    }
  })
});
  /*Below code used to Select Student Based On Class Selection */
  $(document).on('change','#group_id',function(){
    var class_id          = $('#class_id').val();
    var group_id          = $('#group_id').val();
    console.log(group_id);
    $.ajax({
      url:'functions.php',
      method:'GET',
      data:{'class_id':class_id,'group_id':group_id,student_result_search:'student_result_search'},
      dataType: "json",
      success:function(data){
        //console.log(data);
        var html = '<option value="">--Select Id No --</option>';
        $.each(data,function(key,v){
          html += '<option value="'+v.id_no+'">'+v.id_no+'</option>';
        });
        html = $('#id_no').html(html);
      },
      error: function(data){
      console.log(data);
      }
    });
  });
</script>