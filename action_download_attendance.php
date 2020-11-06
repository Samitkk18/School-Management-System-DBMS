<?php

require 'vendor/autoload.php';
require_once "session.php";
require 'includes/dbh.inc.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id = $_GET['id'];
$sql = "SELECT attendance_logs.*, attendance.*,course.*, subject.*, years.*, teachers.* FROM attendance_logs LEFT JOIN attendance ON attendance_logs.l_log_id=attendance.log_id
LEFT JOIN course ON attendance.course_id=course.course_id LEFT JOIN years ON attendance.year=years.year_id
LEFT JOIN subject ON attendance.subject_id=subject.subject_id LEFT JOIN teachers ON attendance.teacher_id=teachers.teacher_id WHERE l_log_id ='$id'";
$result = mysqli_query($conn, $sql)or die('Error');
if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
    $course_name = $row['course_name'];
    $teacher_f_name = $row['t_f_name'];
    $teacher_l_name = $row['t_l_name'];
    $year = $row['year_name'];
    $subject_name = $row['subject_name'];
    $sap_id = $row['student_sapid'];
    $date = $row['log_added_on'];
  }
}
// echo $course_name;
// echo $teacher_f_name;
// echo $year;
// echo $subject_name;

// exit();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->mergeCells('A1:C1');
$sheet->mergeCells('A2:C2');
$sheet->mergeCells('A3:C3');
$sheet->mergeCells('A5:C5');

$sheet->setCellValue('A1', 'ATTENDANCE FOR -'.$date);
$sheet->setCellValue('A2', 'COURSE - '.$course_name);
$sheet->setCellValue('B2', 'YEAR - '.$year);
$sheet->setCellValue('A3', 'TEACHER  - '.$teacher_f_name.' '.$teacher_l_name);
$sheet->setCellValue('A5', ' STUDENT Present');

$i=6;
$count=1;
$sql2 = "SELECT attendance_logs.*, attendance.*,course.*, subject.*, years.*, teachers.* FROM attendance_logs LEFT JOIN attendance ON attendance_logs.l_log_id=attendance.log_id
LEFT JOIN course ON attendance.course_id=course.course_id LEFT JOIN years ON attendance.year=years.year_id
LEFT JOIN subject ON attendance.subject_id=subject.subject_id LEFT JOIN teachers ON attendance.teacher_id=teachers.teacher_id WHERE l_log_id ='$id'";
$result2 = mysqli_query($conn, $sql2)or die('Error');
if(mysqli_num_rows($result2)>0){
  while($data = mysqli_fetch_assoc($result2)){
    $sap_id = $data['student_sapid'];
    $sheet->mergeCells('B'.$i.':C'.$i);
    $sheet->setCellValue('A'.$i, $count);
    $sheet->setCellValue('B'.$i, $sap_id);
    // echo $i;
    $i++;
    $count++;
    // echo $sap_id;
  }
}
// exit();

$writer = new Xlsx($spreadsheet);
$writer->save($date.'-'.$course_name.'-'.$year.'.xlsx');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$date.'-'.$course_name.'-'.$year.'.xlsx"');
$writer->save("php://output");
