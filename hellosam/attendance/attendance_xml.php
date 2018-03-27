<?php
set_include_path( get_include_path().PATH_SEPARATOR."..");
include_once("../excel/xlsxwriter.class.php");
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$filename = "attachment.xlsx";
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$sheet1header = array(
    'sub_id'=>'string',
    'stud_roll'=>'string',
    'date'=>'date',
    'time_from'=>'string',
    'time_to'=>'string',
    'attended'=>'string'
);

function view_excel($t_id){
    $con=mysqli_connect("localhost","root","","hellosam");
    $sql="SELECT * from attend where t_id='.$t_id.'";
    $result=mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}


$excel_data=view_excel($_SESSION['s_email']);


$writer = new XLSXWriter();
$writer->setAuthor('hellosam');
$writer->writeSheetHeader('BasicFormats',$sheet1header,['auto_filter'=>true,'widths'=>[15,15,30,30,30,15],'freeze_rows'=>1,'freeze_columns'=>1]);
    $date = '2018-03-25';
    $time_from = '09:00:00';
    $time_to = '10:00:00';
    $writer->writeSheetRow('BasicFormats',array('S002','15',$date,$time_from,$time_to,'1'));
    $writer->writeSheetRow('BasicFormats',array('S002','14',$date,$time_from,$time_to,'1'));
    $writer->writeSheetRow('BasicFormats',array('S002','12',$date,$time_from,$time_to,'0'));
//$writer->writeToFile('attendance.xlsx');
$writer->writeToStdOut();
//echo $writer->writeToString();

echo '#'.floor((memory_get_peak_usage())/1024/1024)."MB"."\n";
exit(0);

?>