<?php

function fetch_data()
{
     require_once('db/connection.php');
     $output = '';
     if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = "select *,class.name as semester,add_student.name,add_student.id as stId,add_student.id_no,add_student.image ,year.name as yearName,stugroup.name as department  from add_student
                join stugroup on add_student.group_id = stugroup.id 
                join class on add_student.class_id = class.id
                join year on add_student.year_id = year.id
                where  add_student.id='$id'";
                //echo $sql;die();

          $stu_editquery = $con->query($sql);
          $view_data = $stu_editquery->fetch_assoc();
          $output .=               '<tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Date of Birth</th>
                                        
                                        
                                   </tr>';

          $output .=               '<tr>  
                                        <td>' . $view_data["id_no"] . '</td>  
                                        <td>' . $view_data["name"] . '</td>                           
                                        <td>' . $view_data["department"] . '</td>
                                        <td>' . $view_data["dob"] . '</td>    

                                   </tr> ';

          $output .=               '<tr>
                                        <th class="text-center">Fathers Name</th>
                                        <th class="text-center">Mothers Name</th>
                                        <th class="text-center">Religion</th>
                                        <th class="text-center">Image</th>
                                   </tr>';

          $output .=               '<tr>  
                                   <td>' . $view_data["fName"] . '</td>  
                                   <td>' . $view_data["mName"] . '</td>                           
                                   <td>' . $view_data["religion"] . '</td>    
                                   <td><img src="' . $view_data["image"] . '" width="200px" height="180px"></td>                
                                   </tr>  ';
                                   
          $output .=               '<tr>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Semester</th>
                                        
                                   </tr>';

          $output .=               '<tr>  
                                   <td>' . $view_data["mobile"] . '</td>  
                                   <td>' . $view_data["address"] . '</td>                           
                                   <td>' . $view_data["semester"] . '</td>                     
                                   </tr>  ';


          return $output;
     }
}
if (isset($_POST["create_pdf"])) {
     require_once('tcpdf/tcpdf.php');
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $obj_pdf->SetCreator(PDF_CREATOR);
     $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
     $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
     $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
     $obj_pdf->SetDefaultMonospacedFont('helvetica');
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
     $obj_pdf->setPrintHeader(false);
     $obj_pdf->setPrintFooter(false);
     $obj_pdf->SetAutoPageBreak(TRUE, 10);
     $obj_pdf->SetFont('helvetica', '', 12);
     $obj_pdf->AddPage();
     $content = '';
     $content .= '  
      <h3 align="center">Student Information</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
       
      ';
     $content .= fetch_data();
     $content .= '</table>';
     $obj_pdf->writeHTML($content);
     $obj_pdf->Output('sample.pdf', 'I');
}
?>
<!DOCTYPE html>
<html>

<head>
     <title>PDF</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
     <div class="container" style="width:700px;">
          <h3 align="center">Student Information</h3><br />
          <div class="table-responsive">
               <table class="table table-bordered">


                    <?php
                    echo fetch_data();
                    ?>
               </table>
               <br />
               <form method="post">
                    <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
               </form>
          </div>
     </div>

</body>

</html>