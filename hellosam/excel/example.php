<?php
set_include_path( get_include_path().PATH_SEPARATOR."..");
include_once("xlsxwriter.class.php");
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
    'time_to'=>'string'
);
$sub_id = 'SE';
$stud_roll = '123';
$date = '2018-12-31';
$date2 = '2018-12-30';
$time_from = '23:59:59';
$time_to = '23:59:59';

$writer = new XLSXWriter();
$writer->setAuthor('hellosam');
$writer->writeSheetHeader('BasicFormats',$sheet1header,['auto_filter'=>true,'widths'=>[15,15,30,30,30],'freeze_rows'=>1,'freeze_columns'=>1]);
$writer->writeSheetRow('BasicFormats',array($sub_id,$stud_roll,$date,$time_from,$time_to));
$writer->writeSheetRow('BasicFormats',array($sub_id,$stud_roll,$date2,$time_from,$time_to));
$writer->writeSheetRow('BasicFormats',array($sub_id,$stud_roll,$date2,$time_from,$time_to));
$writer->writeSheetRow('BasicFormats',array($sub_id,$stud_roll,$date,$time_from,$time_to));
$writer->writeSheetRow('BasicFormats',array($sub_id,$stud_roll,$date,$time_from,$time_to));
//$writer->writeToFile('attendance.xlsx');
$writer->writeToStdOut();
//echo $writer->writeToString();

echo '#'.floor((memory_get_peak_usage())/1024/1024)."MB"."\n";
exit(0);

?>