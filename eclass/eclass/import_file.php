<?php

include 'DbHandler.php';
$db = new DbHandler();
$course = $_GET['name'];

if (isset($_POST["submit"])) {
            $conn = $db->connect();
            $file = $_FILES["file"]["tmp_name"];
            $file_open = fopen($file, "r");
            while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                $num = $csv[0];
                $studentId = $csv[1];
                $theoryG = $csv[2];
                $labG = $csv[3];
                $sql = "UPDATE studentHasCourse SET theoryGrade = '$theoryG',labGrade='$labG', totalGrade=(SELECT theoryW FROM course WHERE courseID = '$course')*'$theoryG'+(SELECT labW FROM course WHERE courseID = '$course')*'$labG' WHERE StudentID = '$studentId' AND courseID ='$course'";
                if ($conn->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }else{
                    header('Location: index.php?action=gradeCourses');
                }
            }
        }