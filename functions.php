<?php
session_start();
require_once('db/connection.php');

/* DEPARTMENT */
if(isset($_POST['dep_btn'])){
	$name = $_POST['name'];
	$id   = $_POST['id'];
	if($id){
		$sql = "update stugroup set name='$name' where id='$id'";
		if($con->query($sql) === TRUE){
			$_SESSION['status'] ="Department Updated Successfully";
			$_SESSION['status_code'] ="success";
			HEADER("LOCATION:dept_list.php");
		}else{
			$_SESSION['status'] ="Data Not Updated";
			$_SESSION['status_code'] ="error";
			HEADER("LOCATION:add_department.php");
			exit();
		}
	}else{
		$sql = "insert into stugroup (name) values('$name')";
		if($con->query($sql) === TRUE){
			$_SESSION['status'] ="Department Added Successfully";
			$_SESSION['status_code'] ="success";
			HEADER("LOCATION:dept_list.php");
		}else{
			$_SESSION['status'] ="Data Not Saved";
			$_SESSION['status_code'] ="error";
			HEADER("LOCATION:add_department.php");
			exit();
		}
	}
	
}

/* Course */
if(isset($_POST['sub_btn'])){
	$name = $_POST['name'];
	$group_id = $_POST['group_id'];
	$code = $_POST['code'];
	$id   = $_POST['id'];
	if($id){
		$sql = "update subject set name='$name',group_id='$group_id',code='$code' where id='$id'";
		if($con->query($sql) === TRUE){
			$_SESSION['status'] ="Course Updated Successfully";
			$_SESSION['status_code'] ="success";
			HEADER("LOCATION:sub_list.php");
		}else{
			$_SESSION['status'] ="Data Not Updated";
			$_SESSION['status_code'] ="error";
			HEADER("LOCATION:add_sub.php");
			exit();
		}
	}
	else{
		$sql = "insert into subject (name,group_id,code) values('$name','$group_id','$code')";
		if($con->query($sql) === TRUE){
			$_SESSION['status'] ="Course Added Successfully";
			$_SESSION['status_code'] ="success";
			HEADER("LOCATION:sub_list.php");
		}else{
			$_SESSION['status'] ="Data Not Saved";
			$_SESSION['status_code'] ="error";
			HEADER("LOCATION:add_sub.php");
			exit();
		}
	}
	
}




if(isset($_POST['add_student'])){

	$year_id = $_POST['year_id'];
  	$year_query = "select name from year where id='$year_id'";
  	$year_query_run = $con->query($year_query);
  	$year = $year_query_run->fetch_assoc();
	$checkYear = $year['name'];
	
	$stuData = "select id from add_student where usertype='student' order by id desc limit 1";
	$stuData_query_run = $con->query($stuData);
	$stuDataResult = $stuData_query_run->fetch_assoc();
   
	$student = $stuDataResult['id'];

	if($student == null){
		$firstReg = 0;
		$studentId = $firstReg+1;
		if($studentId<10){
		  $id_no = '000'.$studentId;
		}else if($studentId<100){
		  $id_no = '00'.$studentId;
		}
		else if($studentId<1000){
		  $id_no = '0'.$studentId;
		}
	  }else{
		$studentId = $student+1;
		if($studentId<10){
		  $id_no = '000'.$studentId;
		}else if($studentId<100){
		  $id_no = '00'.$studentId;
		}
		else if($studentId<1000){
		  $id_no = '0'.$studentId;
		}
	}
	
	$final_id_no = $checkYear.$id_no;
	
	$usertype  = 'student';
	$name  = $_POST['name'];
	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$religion = $_POST['religion'];
	$discount = $_POST['discount'];
	$dob = date('Y-m-d',strtotime($_POST['dob']));
	$year_id = $_POST['year_id'];
	$class_id = $_POST['class_id'];
	$group_id = $_POST['group_id'];
	$shift_id = $_POST['shift_id'];

	$id_no     = $final_id_no; 

	 $imageName = $_FILES['image']['name'];
	 $imageTmp = $_FILES['image']['tmp_name'];
	 $directory = "stu_images/";
	 $imgUrl = $directory.$imageName;
	 move_uploaded_file($imageTmp,$imgUrl);
	 $usersql = "insert into add_student (usertype,name,fName,mName,mobile,address,gender,image,religion,discount,id_no,dob,year_id,class_id,group_id,shift_id) values ('$usertype','$name','$fName','$mName','$mobile','$address','$gender','$imgUrl','$religion','$discount','$id_no','$dob','$year_id','$class_id','$group_id','$shift_id')";
	
	 if($con->query($usersql) === TRUE){
		$_SESSION['status'] ="Student Info Added Successfully";
		$_SESSION['status_code'] ="success";
		HEADER("LOCATION:student_list.php");
	 }else{
		$_SESSION['status'] ="Data Not Saved";
		$_SESSION['status_code'] ="error";
		HEADER("LOCATION:add_student.php");
	 }

} 

/*Search Query For Student Id Query in Result*/
if(isset($_GET['student_result_search'])){
	$class_id =$_GET['class_id'];
	$group_id =$_GET['group_id'];
	$sql = "select * from add_student where class_id='$class_id' and group_id='$group_id'";
	//echo $sql;die();
	
	/*$sql = "select*, class.name as semester,add_student.name,add_student.id as stId,add_student.id_no,add_student.image ,year.name as yearName from add_student
                join stugroup on add_student.group_id = stugroup.id 
                join class on add_student.class_id = class.id
                join year on add_student.year_id = year.id
                where group_id='$group_id' and  year_id='$year_id' and class_id='$class_id'"; */
	$result = $con->query($sql);
	$jsonData = array();
	while ($array = $result->fetch_assoc()) {
	  $jsonData[] = $array;
	}
	//json_encode()
	echo json_encode($jsonData);
  }
  /*Ajax Search Query For Subject Query in marks Entry*/
if(isset($_GET['subject_search'])){
	$class_id =$_GET['class_id'];
	$sql = "select subject.name,assign_subjects.subject_id from assign_subjects 
	join subject on assign_subjects.subject_id=subject.id
	join class on assign_subjects.class_id=class.id
	where class_id='$class_id'";
	$result = $con->query($sql);
	$jsonData = array();
	while ($array = $result->fetch_assoc()) {
	  $jsonData[] = $array;
	}
	//json_encode()
	echo json_encode($jsonData);
  }
  /*Ajax Search Query For MarksEntry */
if(isset($_GET['marks_search'])){
	$year_id  =$_GET['year_id'];
	$class_id =$_GET['class_id'];
	$assign_subject_id  =$_GET['assign_subject_id'];
	$exam_type_id =$_GET['exam_type_id'];
	$sql="select student_marks.id,add_student.name,add_student.fName,add_student.gender, add_student.id_no, add_student.id,add_student.class_id, student_marks.marks 
from  add_student

	LEFT OUTER  join student_marks on add_student.id=student_marks.student_id AND add_student.class_id=student_marks.class_id and student_marks.exam_type_id=1
    where add_student.year_id=2  and add_student.class_id=1";
	/*$sql = "select student_marks.id,add_student.name,add_student.fName,add_student.gender, add_student.id_no, assign_students.student_id,assign_students.class_id, assign_students.roll, student_marks.marks from  add_student
	INNER join users on assign_students.student_id=users.id
	LEFT OUTER  join student_marks on assign_students.student_id=student_marks.student_id AND assign_students.class_id=student_marks.class_id and student_marks.exam_type_id=$exam_type_id AND student_marks.assign_subject_id=$assign_subject_id where assign_students.year_id=$year_id and assign_students.class_id=$class_id OR(student_marks.exam_type_id=$exam_type_id AND student_marks.assign_subject_id=$assign_subject_id and assign_students.class_id=$class_id )";*/
	//echo $sql;die();
	$result = $con->query($sql);
	$jsonData = array();
	while ($array = $result->fetch_assoc()) {
	  $jsonData[] = $array;
	}
	//json_encode()
	echo json_encode($jsonData);
  }

  if(isset($_POST['marks_entry'])){
	$count = count($_POST['student_id']);
	if($_POST['student_id'] != null){
	  for($i=0;$i<$count;$i++){

		  $sql  = "insert into student_marks (year_id,class_id,exam_type_id,id_no,marks) values(";
		  $sql .=$_POST['year_id'].",";
		  $sql .=$_POST['class_id'].",";
		  $sql .=$_POST['exam_type_id'].",";
		  $sql .=$_POST['id_no'][$i].",";
		  $sql .=$_POST['marks'][$i].") ";
		 if($con->query($sql) === TRUE){
		  HEADER("LOCATION:add_marks.php");
		  $_SESSION['status'] ="Marks Inserted Successfully";
		  $_SESSION['status_code'] ="success";
		 }else{
		  
		   HEADER("LOCATION:add_marks.php");
		   $_SESSION['status'] ="Data Not Saved";
		   $_SESSION['status_code'] ="error";
		 }
		}
	
	}else{
		HEADER("LOCATION:add_marks.php");
		$_SESSION['status'] ="Marks Can not be Blank";
		$_SESSION['status_code'] ="error";
	}
  }
?>