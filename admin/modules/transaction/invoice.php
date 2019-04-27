<?php
function getpdf()
{
	$output = '';
	$connect = mysqli_connect("localhost", "root", "", "tutphp");
	$query = "SELECT * FROM nhanvien ORDER BY NhanvienID DESC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
  {
    $output .= '
      <tr>  
        <td>'.$row["NhanvienID"].'</td>  
        <td>'.$row["Holot"].'</td>  
        <td>'.$row["Ten"].'</td>
        <td>'.$row["Ngaysinh"].'</td>
        <td>'.$row["Ngayvaolam"].'</td>
        <td>'.$row["Bophan"].'</td>
        <td>'.$row["Diachi"].'</td>
        <td>'.$row["Chucvu"].'</td>
      </tr>
    ';
  }
  return $output;
}
if(isset($_POST["exportpdf"]))
{  
  require_once('tcpdf/tcpdf.php');  
  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);
  $fontname = TCPDF_FONTS::addTTFfont('DejaVuSans.ttf', 'TrueTypeUnicode', '', 32);
  $obj_pdf->SetFont('DejaVuSans', '', 10);
  $obj_pdf->AddPage();
  $obj_pdf->setFontSubsetting(true);
  $content = '';  
  $content .= '    
    <table border="1" cellspacing="0" cellpadding="4">
      <tr>  
        <th width="9%">Mã NV</th>
        <th width="12%">Họ lót</th>  
        <th width="12%">Tên</th>
				<th width="16%">Ngày sinh</th>
				<th width="16%">Ngày vào làm</th>
				<th width="12%">Bộ phận</th>
				<th width="12%">Địa chỉ</th>
				<th width="12%">Chức vụ</th>
      </tr>
  ';
  ob_end_clean();
  $content .= getpdf();  
  $content .= '</table>'; 
  $obj_pdf->writeHTML($content);  
  $obj_pdf->Output('file.pdf', 'I');  
}
