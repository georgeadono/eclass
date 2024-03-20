<?php

//fetch.php

include('DbHandler.php');

if (isset($_POST["year"])) {
    $query = "
 SELECT * FROM studentHasCourse WHERE EXTRACT(YEAR FROM date) = '" . $_POST["year"] . "' 
 ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        if ($row['totalGrade'] > 5) {
            $output[] = array(
                'passed' => +1,
                'num' => +1
            );
        }else{
            $output[] = array(
                'passed'=>+0,
                'num' => +1
            );
        }
    }
    echo json_encode($output);
}
?>