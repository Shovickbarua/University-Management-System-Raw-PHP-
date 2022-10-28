<?php 
require_once('db/connection.php'); 
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
            <h1 class="m-0">Manage Marks Entry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Marks Entry</li>
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
                  <label for="year_id">Year<font style="color:red">*</font></label>
                  <select class="form-control" id="year_id" name="year_id">
                    <option value="">--Select Year --</option>
                    <?php
                    $sql = "select * from year order by id desc";
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
                <div class="form-group col-md-3">
                  <label for="class_id">semester<font style="color:red">*</font></label>
                  <select class="form-control" id="class_id" name="class_id">
                    <option value="">--Select semester --</option>
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
                <div class="form-group col-md-3">
                  <label>Course<font style="color:red">*</font></label>
                  <select class="form-control" id="assign_subject_id" name="assign_subject_id">
                    <option value="">--Select course --</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="exam_type_id">Exam<font style="color:red">*</font></label>
                  <select class="form-control" id="exam_type_id" name="exam_type_id">
                    <option value="">--Select Exam --</option>
                    <?php
                    $sql = "select * from exam order by id asc";
                    $result = $con->query($sql);
                    if($result->num_rows > 0){
                      while($exam = $result->fetch_assoc()){
                    ?>
                      <option value="<?php echo $exam['id']; ?>"><?php echo $exam['name']; ?></option>
                    <?php  
                      }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-4" style="padding-top:32px">
                    <a id="search" name="search" class="btn btn-primary btn-sm">Search</a>
                </div>
              </div><br>
              <div class="row d-none" id="marks-entry">
                  <div class="col-md-12">
                      <table class="table table-bordered table-striped dt-responsive" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>ID No</th>
                            <th>Students Name</th>
                            <th>Fathers Name</th>
                            <th>Gender</th>
                            <th>Marks</th>
                          </tr>
                        </thead>
                        <tbody id="marks-entry-tr">
                        </tbody>
                      </table>
                      <button type="submit" class="btn btn-success btn-sm" name="marks_entry">Submit</button>
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


<?php include('includes/sidebar.php'); ?>
<?php include('includes/footer.php'); ?>
<?php include('includes/scripts.php'); ?>
<script>

$(document).ready(function(){
  $(document).on('click','#search',function(){
    var year_id           = $('#year_id').val();
    var class_id          = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id      = $('#exam_type_id').val();
    $('.notifyjs-corner').html();
    if(year_id == ''){
      $.notify("Year is Required",{globalPosition:'top right',className:'error'});
      return false;
    }
    if(class_id == ''){
      $.notify("Class is Required",{globalPosition:'top right',className:'error'});
      return false;
    }
    if(assign_subject_id == ''){
      $.notify("Subject is Required",{globalPosition:'top right',className:'error'});
      return false;
    }
    if(exam_type_id == ''){
      $.notify("Exam is Required",{globalPosition:'top right',className:'error'});
      return false;
    }
    $.ajax({
      url:'functions.php',
      method:'GET',
      data:{'year_id':year_id,'class_id':class_id,'assign_subject_id':assign_subject_id,'exam_type_id':exam_type_id,marks_search:'marks_search'},
      dataType: "json",
      success:function(data){
        console.log(data);
        $('#marks-entry').removeClass('d-none');
        var html ='';
        $.each(data,function(key,v){
          html += 
          '<tr>'+
          '<td>'+v.id_no+'<input type="hidden" name="id[]" value="'+v.id+'"><input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.id_no+'"></td>'+
          '<td>'+v.name+'</td>'+
          '<td>'+v.fName+'</td>'+
          '<td>'+v.gender+'</td>'+
          '<td><input type="text" class="form-control" name="marks[]" value="'+(v.marks===null? "" : v.marks)+'"></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      },
      error: function(data){
      console.log(data);
      }
    });
  });
  /*Below code used to Select Subject Based On Class Selection */
  $(document).on('change','#class_id',function(){
    var class_id          = $('#class_id').val();
    $.ajax({
      url:'functions.php',
      method:'GET',
      data:{'class_id':class_id,subject_search:'subject_search'},
      dataType: "json",
      success:function(data){
        //console.log(data);
        var html = '<option value="">--Select Subject --</option>';
        $.each(data,function(key,v){
          html += '<option value="'+v.subject_id+'">'+v.name+'</option>';
        });
        html = $('#assign_subject_id').html(html);
      },
      error: function(data){
      console.log(data);
      }
    });
  });
});
</script>