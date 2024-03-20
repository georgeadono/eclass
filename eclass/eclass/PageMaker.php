<?php

class PageMaker {

    public function headMatter() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Antonis Chouvardas</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <link rel="stylesheet" type="text/css" href="antons.css" >
                <style>
                    * {
                        box-sizing: border-box;
                    }

                    input[type=text], select, textarea {
                        width: 100%;
                        padding: 12px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        resize: vertical;
                    }

                    label {
                        padding: 12px 12px 12px 0;
                        display: inline-block;
                    }

                    input[type=submit] {
                        background-color: #4CAF50;
                        color: white;
                        padding: 12px 20px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        float: right;
                    }

                    input[type=submit]:hover {
                        background-color: #45a049;
                    }
                    .container {
                        border-radius: 5px;
                        padding: 20px;
                    }

                    .col-25 {
                        float: left;
                        width: 25%;
                        margin-top: 6px;
                    }

                    .col-75 {
                        float: left;
                        width: 75%;
                        margin-top: 6px;
                    }

                    /* Clear floats after the columns */
                    .row:after {
                        content: "";
                        display: table;
                        clear: both;
                    }
                    .logo-image{
                        width: 46px;
                        height: 46px;
                        border-radius: 80%;
                        overflow: hidden;
                    }

                    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
                    @media screen and (max-width: 600px) {
                        .col-25, .col-75, input[type=submit] {
                            width: 100%;
                            margin-top: 0;
                        }
                    }
                </style>
            </head>
            <body class="letcolor">
                <?php
            }

            public function endMatter() {
                ?>

            </body>
        </html>
        <?php
    }

    public function startPageProf() {
        ?>
        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-4">
                    <img src="s.JPG" style="width: 50%">
                    <br>
                    <h2>Important Info</h2>
                    <p>The Import is working only by importing .csv file. When professor closes the grading from a course, further editing on course grades
                    is not applicable. When a course is assigned to a professor a notification will appear on the navbar.</p>
                    
                </div>
                <div class="col-sm-8">
                    <h2>Professors Actions</h2>
                    <p>A professor can Search Courses, Edit Courses, Grade Courses, Export Grades For a Specific Course
                    or Import Grades For a Course in .csv. Additionally a professor can also check Statistics about how many courses
                    are assigned to him by year or even Statistics about the overall success rate of one of his courses in a specific year. All this action can be found 
                    in the menu by clicking in Courses</p>
                    <h3>Some Search Links</h3>
                    <p>These are the main searches of a professor</p>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=printCourses">Search Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=printStudents">Search Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=printProfessors">Search Professors</a>
                        </li>
                    </ul>
                    <hr class="d-sm-none">
                </div>
            </div>
        </div>
        <?php
    }
    
    public function startPageStud() {
        ?>
        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-4">
                    <img src="s.JPG" style="width: 50%">
                    <br>
                    <h2>Important Info</h2>
                    <p>A student can take course for the semester in the option Take Courses. When students
                    pick courses if there are not finalized they can change the course they have the semester by 
                    just checking some other courses. Every time the student will try to edit his semester courses, the ones
                     that he picked previous time will be already checked. According to which year of studying the student is
                     they will have different number of courses that they can pick.</p>
                    
                </div>
                <div class="col-sm-8">
                    <h2>Students Actions</h2>
                    <p>A student can Search Courses, see the Semester Courses they picked, see their Grades,Take Courses 
                    for the semester and see his success rates in charts through the option Statistics</p>
                    <h3>Some Important Links</h3>
                    <p>Some important actions of students. The Export Passed Courses is the solution for the 10% bonus question 
                    requirement no2 page 9 in the project description.</p>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=mySemesterCourses">My Semester Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=myGradedCourses">My Grades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=takeCourses">Take Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=studentExport">Export Passed Courses</a>
                        </li>
                      
                    </ul>
                    <hr class="d-sm-none">
                </div>
            </div>
        </div>
        <?php
    }

    public function adminsNavBar() {
        $db = new DbHandler();
        ?>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
            <a class="navbar-brand" href="index.php">
                <div class="logo-image">
                    <img src="c.jpg" class="img-fluid">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <a><?php echo $_SESSION['username'] ?></a>
                </ul>
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Courses 
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="index.php?action=printCourses">Search Courses</a>
                            <a class="dropdown-item" href="index.php?action=newCourses">Add Courses</a> 
                            <a class="dropdown-item" href="index.php?action=assignCourses">Assign Courses</a>
                            <a class="dropdown-item" href="index.php?action=gradeCourses">Grade Courses</a>
                        </div>
                    </li>


                    <li class="nav-item dropdown ">

                        <a class="nav-link dropdown-toggle " href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Students <?php if ($db->countNumberOfStudentAppl() > 0) { ?><span class="badge badge-danger"><?php
                                    echo $num = $db->countNumberOfStudentAppl();
                                }
                                ?></span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=studentValidate">Profile Validation</a>   
                            <a class="dropdown-item" href="index.php?">Profile Edit</a>
                            <a class="dropdown-item" href="index.php?">Profile Deletion</a>
                            <a class="dropdown-item" href="index.php?action=printStudents">Search Student</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Professors <?php if ($db->countNumberOfProfessorsAppl() > 0) { ?><span class="badge badge-danger"><?php
                                    echo $num = $db->countNumberOfProfessorsAppl();
                                }
                                ?></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=professorValidate">Profile Validation</a>    
                            <a class="dropdown-item" href="index.php?">Profile Edit</a>
                            <a class="dropdown-item" href="index.php?">Profile Deletion</a>
                            <a class="dropdown-item" href="index.php?action=printProfessors">Search Professor</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logOut.php">Log Out</a>
                    </li>
                </ul>
            </div>  
        </nav>
        <?php
    }

    public function studentNavBar() {
        ?>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php">
                <div class="logo-image">
                    <img src="c.jpg" class="img-fluid">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <a><?php echo $_SESSION['username'] ?></a>
                </ul>
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Courses
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="index.php?action=printCourses">Search Courses</a>
                            <a class="dropdown-item" href="index.php?action=mySemesterCourses">My Semester Courses</a>
                            <a class="dropdown-item" href="index.php?action=myGradedCourses">My Grades</a>
                            <a class="dropdown-item" href="index.php?action=takeCourses">Take Courses</a>
                            <a class="dropdown-item" href="index.php?action=printStudentStatistics">My Statistics</a>
                            <a class="dropdown-item" href="index.php?action=studentExport">Export Passed Courses</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Students
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=printStudents">Search Student</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Professors
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=printProfessors">Search Professor</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logOut.php">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=profileEdit">Edit My Profile</a>
                    </li>
                </ul>
            </div>  
        </nav>
        <?php
    }

    public function professorNavBar() {
        $db = new DbHandler();
        ?>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php">
                <div class="logo-image">
                    <img src="c.jpg" class="img-fluid">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <a><?php echo $_SESSION['username'] ?></a>
                </ul>
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Courses <?php if ($db->getNumOfCoursesForProfessor() > 0) { ?><span class="badge badge-danger"><?php
                                    echo $num = $db->getNumOfCoursesForProfessor();
                                }
                                ?></span>
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="index.php?action=printCourses">Search Courses </a>
                            <a class="dropdown-item" href="index.php?action=editCourses">Edit Courses <?php if ($db->getNumOfCoursesForProfessor() > 0) { ?><span class="badge badge-danger"><?php
                                        echo $num = $db->getNumOfCoursesForProfessor();
                                    }
                                    ?></span></a>
                            <a class="dropdown-item" href="index.php?action=gradeCourses">Grade Courses</a>
                            <a class="dropdown-item" href="index.php?action=finalizeGrading">Finalize Grading</a>
                            <a class="dropdown-item" href="index.php?action=export">Export Grades For Course</a>
                            <a class="dropdown-item" href="index.php?action=import">Import Grades For Course</a>
                            <a class="dropdown-item" href="index.php?action=profsStatistics">Statistics</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Students
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=printStudents">Search Student</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Professors
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=printProfessors">Search Professor</a>   
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logOut.php">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=profileEdit">Edit My Profile</a>
                    </li>
                </ul>
            </div>  
        </nav>
        <?php
    }

    public function displayCourseList($courses) {
        ?>

        <div class="table-responsive-sm container mt-3">
            <h2>Search for </h2>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th></th>
                        <th>Course ID</th>
                        <th>Course name</th>
                        <th>Course Year</th>
                        <th>Course Semester</th>
                    </tr>
                </thead>
                <tbody class="text-white" id="courses">                            
                    <?php
                    $i = 1;
                    while ($row = $courses->fetch_assoc()) {
                        if ($_SESSION['username'] !== null) {
                            echo '<tr class ="table-row" style="cursor:pointer;" data-href="index.php?action=showCourseDetails&course=' . $row['courseID'] . '">';
                        } else {
                            echo '<tr class ="table-row" style="cursor:pointer;" data-href="signUpLogIn.php?action=showCourseDetails&course=' . $row['courseID'] . '">';
                        }
                        echo'<td>' . $i . '</td>';
                        echo'<td>' . $row['courseID'] . '</td>';
                        echo '<td>' . $row['courseName'] . '</td>';
                        echo '<td>' . $row['year'] . '</td>';
                        echo '<td>' . $row['semester'] . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#courses tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            $(document).ready(function ($) {
                $(".table-row").click(function () {
                    window.document.location = $(this).data("href");
                });
            });
        </script>
        <?php
    }

    public function displayStudentList($students) {
        ?>

        <div class="table-responsive-sm container mt-3">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th></th>
                        <th>Student ID</th>
                        <th>Student name</th>
                        <th>Student Surname</th>
                        <th>Entry Year</th>
                    </tr>
                </thead>
                <tbody class="text-white" id="courses">                            
                    <?php
                    $i = 1;
                    while ($row = $students->fetch_assoc()) {
                        if ($_SESSION['username'] !== null) {
                            echo '<tr class ="table-row" style="cursor:pointer;" data-href="index.php?action=showStudentsDetails&student=' . $row['StudentID'] . '">';
                        } else {
                            echo '<tr class ="table-row" style="cursor:pointer;" data-href="signUpLogIn.php?action=showStudentsDetails&student=' . $row['StudentID'] . '">';
                        }
                        echo'<td>' . $i . '</td>';
                        echo'<td>' . $row['StudentID'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['SurName'] . '</td>';
                        echo '<td>' . $row['EntryYear'] . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#courses tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            $(document).ready(function ($) {
                $(".table-row").click(function () {
                    window.document.location = $(this).data("href");
                });
            });
        </script>
        <?php
    }

    public function displayProfessorList($profs) {
        ?>

        <div class="table-responsive-sm container mt-3">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th></th>
                        <th>Professor ID</th>
                        <th>Professor name</th>
                        <th>Professor Surname</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody class="text-white" id="courses">                            
                    <?php
                    $i = 1;
                    while ($row = $profs->fetch_assoc()) {
                        if ($_SESSION['username'] !== null) {
                            echo '<tr class ="table-row" style="cursor:pointer;" data-href="index.php?action=showProfessorsDetails&prof=' . $row['profID'] . '">';
                        } else {
                            echo '<tr class ="table-row" style="cursor:pointer;" data-href="signUpLogIn.php?action=showProfessorsDetails&prof=' . $row['profID'] . '">';
                        }
                        echo'<td>' . $i . '</td>';
                        echo'<td>' . $row['profID'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['SurName'] . '</td>';
                        echo '<td>' . $row['Position'] . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#courses tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            $(document).ready(function ($) {
                $(".table-row").click(function () {
                    window.document.location = $(this).data("href");
                });
            });
        </script>
        <?php
    }

    public function diplayCourseDetails($rId) {

        $db = new DbHandler();
        $course = $_GET['course'];
        ?>
        <input type="hidden" class="form-control" name = "num" value= "<?php echo $course ?>" readonly>
        <div class="container">
            <h2><?php echo $course ?></h2>
            <h4><i><?php
                    $result = $db->getCourseInfo($course);
                    $row = $result->fetch_assoc();
                    $num = $row['num'];
                    echo $row['courseName'];
                    ?></i></h4>
            <br>
            Professor :
            <?php
            $result1 = $db->getCoursesProfessor($course);
            $row1 = $result1->fetch_assoc();
            echo $row1['Name'] . ' ';
            echo $row1['SurName'] . ' ';
            echo '(' . $row1['Position'] . ')';
            ?>
            <br>
            <bold>Year of teaching :</bold> <?php echo $row['year'] ?>
            <br>
            Semester of teaching : <?php echo $row['semester'] ?>
            <br>
            Grading Info : <?php echo 'Theory Grade*' . $row['theoryW'] * 100 . '% + Lab Grade*' . $row['labW'] * 100 . '% > 5'; ?>
            <br>
            Required Courses: <?php $db->printCoursesReqs($course); ?>
            <br>
            <h4>Description</h4>
            <p class="text-justify"> <?php echo $row['description']; ?></p>
            <br>
            <?php
            if ($rId === '1') {

                echo '<div class="row">
                    <div <div class="col-25">
                    <button type="submit" class ="btn btn-primary table-row" data-href="index.php?action=editCourses&num=' . $row['num'] . '">Edit Course</button>
                        </div>
                        <br>
                        <br>
                    <div class="col-75">
                    <button onclick="myFunction()" type="submit" class ="btn btn-primary" name="' . $row['num'] . '">Delete Course</button>
                        </div>
                </div>';
            }
            ?>
        </div>
        <script>
            function myFunction() {
                var r = confirm("Press a button!");
                if (r === true) {
                    window.location.assign("http://jhouv.eu/eclass/index.php?action=deleteCourse&num=<?php echo $num ?>");
                }
            }
            $(document).ready(function ($) {
                $(".table-row").click(function () {
                    window.document.location = $(this).data("href");
                });
            });
        </script>
        <?php
    }

    public function diplayStudentsDetails() {
        $db = new DbHandler();
        $student = $_GET['student'];
        ?>
        <div class="container">
            <h2><?php echo $student ?></h2>
            <i><?php
                $result = $db->getStudentInfo($student);
                $row = $result->fetch_assoc();
                echo $row['Name'] . ' ' . $row['SurName'];
                ?></i>
            <br>
            Εntry Year : <?php echo $row['EntryYear'] ?>

        </div>

        <script>
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });
        </script>
        <?php
    }

    public function diplayProfessorsDetails() {
        $db = new DbHandler();
        $prof = $_GET['prof'];
        ?>
        <div class="container">
            <h2><?php echo $prof ?></h2>
            <i><?php
                $result = $db->getProfessorInfo($prof);
                $row = $result->fetch_assoc();
                echo $row['Name'] . ' ' . $row['SurName'];
                ?></i>
            <br>
            Position: <?php echo $row['Position'] ?>
            <br>
            Courses: <?php
            $result1 = $db->getProfsCourses($prof);
            while ($row1 = $result1->fetch_assoc()) {
                echo $row1['courseID'] . ' ';
            }
            ?>
        </div>

        <script>
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });
        </script>
        <?php
    }

    public function displaySemesterCourses($courses) {
        ?>

        <div class="table-responsive-sm">
            <table class="table">
                <thead class="text-white">
                    <tr>
                        <th></th>
                        <th>Course ID</th>
                        <th>Theory Grade</th>
                        <th>Lab Grade</th>
                        <th>Total Grade</th>
                    </tr>
                </thead>
                <tbody class="text-white">                            
                    <?php
                    $i = 1;
                    while ($row = $courses->fetch_assoc()) {
                        echo '<tr>';
                        echo'<td>' . $i . '</td>';
                        echo'<td>' . $row['courseID'] . '</td>';
                        echo '<td>' . $row['theoryGrade'] . '</td>';
                        echo '<td>' . $row['labGrade'] . '</td>';
                        echo '<td>' . $row['totalGrade'] . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
    }

    public function startNavbar() {
        ?>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="signUpLogIn.php">
                <div class="logo-image">
                    <img src="c.jpg" class="img-fluid">
                </div>
            </a>
            <a></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <a>ICSD</a>
                </ul>
                <ul class="navbar-nav ml-auto">                            
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Sign Up & Log In
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="signUpLogIn.php?action=signUp">Sign Up</a>   
                            <a class="dropdown-item" href="signUpLogIn.php?action=logIn">Log In</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Courses
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="signUpLogIn.php?action=printCourses">Search Courses</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Students
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="signUpLogIn.php?action=printStudents">Search Student</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?" id="navbardrop" data-toggle="dropdown">
                            Professors
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="signUpLogIn.php?action=printProfessors">Search Professor</a>
                        </div>
                    </li>                             
                </ul>
            </div>  
        </nav>
        <?php
    }

    public function coursesForStudents($courses) {
        $db = new DbHandler();
        $curYear = date("Y");
        $curMonth = 9;


        $year = $db->getEntryYear($_SESSION['username']);
        $stuYear = $curYear - $year;
        if ($stuYear < 3) {
            $allowed = 6;
        } else if ($stuYear == 4) {
            $allowed = 9;
        } else {
            $allowed = 12;
        }
        echo 'You are allowed to register in ' . $allowed . ' courses';

        $result = $db->getStudentSemesterCourses($_SESSION['username']);
        $semCourses = array();
        while ($r = $result->fetch_assoc()) {
            $semCourses[] = $r['courseID'];
        }

        $result = $db->getStudentPasedCourses($_SESSION['username']);
        $pased = array();
        while ($r = $result->fetch_assoc()) {
            $pased[] = $r['courseID'];
        }

        $courses1 = array();
        $courses2 = array();
        $courses3 = array();
        $courses4 = array();
        $courses5 = array();
        $courses6 = array();
        $courses7 = array();
        $courses8 = array();
        $courses9 = array();
        $courses10 = array();
        while ($row = $courses->fetch_assoc()) {
            if ($row['semester'] == 1) {
                $courses1[] = $row;
            } else if ($row['semester'] == 2) {
                $courses2[] = $row;
            } else if ($row['semester'] == 3) {
                $courses3[] = $row;
            } else if ($row['semester'] == 4) {
                $courses4[] = $row;
            } else if ($row['semester'] == 5) {
                $courses5[] = $row;
            } else if ($row['semester'] == 6) {
                $courses6[] = $row;
            } else if ($row['semester'] == 7) {
                $courses7[] = $row;
            } else if ($row['semester'] == 8) {
                $courses8[] = $row;
            } else if ($row['semester'] == 9) {
                $courses9[] = $row;
            } else if ($row['semester'] == 10) {
                $courses10[] = $row;
            }
        }
        $i = 1;
        ?>
        <form  method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
        <?php if ($curMonth > 8 || $curMonth === 1) { ?>
                <div class="container mt-3">
                    <h2>1st Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem1">Show 1st Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem1">

                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses1 as &$value) {
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (in_array($value['courseID'], $semCourses)) {
                                        echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                    } else {
                                        echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                    }
                                    echo '</tr>';
                                    $i++;
                                }
                                //free_result($courses);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container mt-3">
                    <h2>2nd Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem3">Show 3rd Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem3">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses3 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
                <div class="container mt-3">
                    <h2>3rd Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem5">Show 5th Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem5">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses5 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
                <div class="container mt-3">
                    <h2>4rth Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem7">Show 7th Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem7">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses7 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
                <div class="container mt-3">
                    <h2>5th Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem9">Show 9th Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem9">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses9 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
        <?php } else { ?>
                <div class="container mt-3">
                    <h2>1st Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem2">Show 2nd Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem2">

                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses2 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                //free_result($courses);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container mt-3">
                    <h2>2nd Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem4">Show 4rth Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem4">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses4 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
                <div class="container mt-3">
                    <h2>3rd Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem6">Show 6th Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem6">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses6 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
                <div class="container mt-3">
                    <h2>4rth Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem8">Show 8th Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem8">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses8 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
                <div class="container mt-3">
                    <h2>5th Year</h2>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#sem10">Show 10nth Semester</button>
                    <div class="table-responsive-sm">
                        <br>
                        <table class="table collapse"  id="sem10">
                            <thead class="text-white"> 
                                <tr>
                                    <th></th>
                                    <th>Course ID</th>
                                    <th>Course name</th>
                                    <th>Select Course</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">                            
                                <?php
                                foreach ($courses10 as &$value) {
                                    $result = $db->getCoursesReqs($value['courseID']);
                                    $reqs = array();
                                    while ($r = $result->fetch_assoc()) {
                                        $reqs[] = $r['reqcourseID'];
                                    }
                                    echo '<tr>';
                                    echo'<td>' . $i . '</td>';
                                    echo'<td>' . $value['courseID'] . '</td>';
                                    echo '<td>' . $value['courseName'] . '</td>';
                                    if (empty(array_diff($reqs, $pased))) {
                                        if (in_array($value['courseID'], $semCourses)) {
                                            echo'<td><div class="form-check">
                                            <label class="form-check-label" for="check' . $i . '">
                                              <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '" checked>check
                                            </label>
                                          </div></td>';
                                        } else {
                                            echo'<td><div class="form-check">
                                        <label class="form-check-label" for="check' . $i . '">
                                          <input type="checkbox" class="form-check-input" id="check' . $i . '" name="lang[]" value="' . $value['courseID'] . '">check
                                        </label>
                                      </div></td>';
                                        }
                                        echo '</tr>';
                                    } else {
                                        echo'<td>You have to Pass ';
                                        foreach (array_diff($reqs, $pased) as $value) {
                                            echo $value . ' ';
                                        }
                                        echo'</td>';
                                        echo '</tr>';
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
        <?php } ?>
            <div class="container mt-3">
                <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <script>
                var num = <?php echo json_encode($allowed) ?>;
                $('input[type=checkbox]').on('change', function (e) {
                    if ($('input[type=checkbox]:checked').length > num) {
                        $(this).prop('checked', false);
                    }
                });</script>
        </form>

        <?php
    }

    public function studentStartPieChart() {

        $db = new DbHandler();
        $result = $db->getStudentInfo($_SESSION['username']);
        $stud = $result->fetch_assoc();
        $studYear = $stud['EntryYear'];
        $result = $db->getStudentPasedCourses($_SESSION['username']);
        $pased = array();
        while ($r = $result->fetch_assoc()) {
            $pased[] = $r['courseID'];
        }
        $pasedLength = count($pased);

        $result = $db->getStudentGradedCourses();
        $graded = array();
        while ($r = $result->fetch_assoc()) {
            $graded[] = $r['courseID'];
        }
        $gradeLength = count($graded);
        $failed = $gradeLength - $pasedLength;
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart3);
                function drawChart3() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'My Courses'],
                        ['Passed', <?php echo $pasedLength ?>],
                        ['Failed', <?php echo $failed ?>],
                    ]);

                    var options = {backgroundColor: 'transparent',
                        titleTextStyle: {color: '#FFF'},
                        title: 'My Overall Success Rate',
                        is3D: true,
                        hAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        vAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        legend: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }

                $(window).resize(function () {
                    drawChart3();
                });

                
        </script>
        <form method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
            <div class="row" style="margin:0 !important; background-color: black">
                <div class="col-md-6">
                    <h2>Overall Success Rate</h2><br>
                    <div id="piechart_3d" style="width: 100%; min-height: 450px;"></div>
                </div>
                <div class="col-md-6">
                    <h2>Select Year and Semester</h2><br>
                    <div class="form-group row"> 
                        <div class="col-25">
                            <label for="year">Year:</label>  
                        </div>
                        <div class="col-75">
                            <select class="form-control" id="year" name="year">             
                                <?php
                                $curYear = date("Y");
                                while ($studYear <= $curYear) {

                                    echo"<option value= " . $studYear . " >" . $studYear . "</option>";
                                    $studYear++;
                                }
                                ?>
                            </select>   
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <div class="col-25">
                            <label for="sem">Semester:</label>  
                        </div>
                        <div class="col-75">
                            <select class="form-control" id="sem" name="sem">             
                                <?php
                                echo"<option value= " . 1 . " >" . 'Winter Semester' . "</option>";
                                echo"<option value= " . 8 . " >" . 'Spring Semester' . "</option>";
                                ?>
                            </select>   
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    }

    public function graph($year, $sem) {
        $db = new DbHandler();
        $result = $db->getSpecificSemesterCourses($year, $sem, $_SESSION['username']);
        $passed = 0;
        $courses = 0;
        while ($r = $result->fetch_assoc()) {
            $courses++;
            if ($r[totalGrade] > 5) {
                $passed++;
            }
        }
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart4);
                function drawChart4() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'My Courses'],
                        ['Passed', <?php echo $passed ?>],
                        ['Failed', <?php echo $courses - $passed ?>],
                    ]);

                    var options = {backgroundColor: 'transparent',
                        titleTextStyle: {color: '#FFF'},
                        title: 'My Success Rate',
                        is3D: true,
                        hAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        vAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        legend: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3da'));
                    chart.draw(data, options);
                }

                $(window).resize(function () {
                    drawChart4();
                });

                
        </script>
        <div class="row container mt-3" style="margin:0 !important; text-align:center; background-color: black">
            <div class="col-md-12">
                <h2>Semester Success Rate</h2><br>
                <div id="piechart_3da" style="width: 100%; min-height: 450px;"></div>
            </div>



        </div>



        <?php
    }

    public function profsGraph() {
        $fm = new FormMaker();
        $db = new DbHandler();
        $result = $db->getProfsCourses($_SESSION['username']);
        $courseSemCount = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        while ($r = $result->fetch_assoc()) {

            if ($r['semester'] === '1') {
                $courseSemCount[0] ++;
            } elseif ($r['semester'] === '2') {
                $courseSemCount[1] ++;
            } elseif ($r['semester'] === '3') {
                $courseSemCount[2] ++;
            } elseif ($r['semester'] === '4') {
                $courseSemCount[3] ++;
            } elseif ($r['semester'] === '5') {
                $courseSemCount[4] ++;
            } elseif ($r['semester'] === '6') {
                $courseSemCount[5] ++;
            } elseif ($r['semester'] === '7') {
                $courseSemCount[6] ++;
            } elseif ($r['semester'] === '8') {
                $courseSemCount[7] ++;
            } elseif ($r['semester'] === '9') {
                $courseSemCount[8] ++;
            } elseif ($r['semester'] === '10') {
                $courseSemCount[9] ++;
            }
        }
        ?>
        <div class="row" style="margin:0 !important;">
            <div class="col-md-6">
                <h2>Course Assigned by year and semester</h2>
                <div id="chart_div1" style="width: 100%; min-height: 450px;"></div>
            </div>
            <div class="col-md-6">
                <h2>Pick a Course</h2>
                <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                    <div class="form-group row"> 
                        <div class="col-25">
                            <label for="year">Year:</label>  
                        </div>
                        <div class="col-75">
                            <input type="text" class="form-control" placeholder="Enter year" name = "year" required> 
                        </div>
                    </div>

        <?php $fm->selectProffsCourse(); ?>
                    <button type="submit" class="btn btn-primary" name="profGraphYear">submit</button>         
                </form>                
            </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
                google.load("visualization", "1", {packages: ["corechart"]});
                google.setOnLoadCallback(drawChart1);
                function drawChart1() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Winter', 'Spring'],
                        ['1st', <?php echo $courseSemCount[0] ?>, <?php echo $courseSemCount[1] ?>],
                        ['2nd', <?php echo $courseSemCount[2] ?>, <?php echo $courseSemCount[3] ?>],
                        ['3rd', <?php echo $courseSemCount[4] ?>, <?php echo $courseSemCount[5] ?>],
                        ['4rth', <?php echo $courseSemCount[6] ?>, <?php echo $courseSemCount[7] ?>],
                        ['5th', <?php echo $courseSemCount[8] ?>, <?php echo $courseSemCount[9] ?>]
                    ]);

                    var options = {backgroundColor: 'transparent',
                        title: 'Assigned Courses',
                        hAxis: {title: 'Year', titleTextStyle: {color: 'white'}, textStyle: {
                                color: '#ffffff'
                            }
                        },
                        vAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        legend: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        }

                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
                    chart.draw(data, options);
                }

                $(window).resize(function () {
                    drawChart1();
                });


        </script>
        <?php
    }

    public function courseSuccessRate($year, $courseID) {
        $db = new DbHandler();
        $result = $db->getStudentsGradesInCourseByYear($year, $courseID);
        $counts = $result->fetch_assoc();
        $passed = $counts['Passed'];
        $failed = $counts['Failed'];
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart4);
                function drawChart4() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'My Courses'],
                        ['Passed', <?php echo $passed ?>],
                        ['Failed', <?php echo $failed ?>],
                    ]);

                    var options = {backgroundColor: 'transparent',
                        titleTextStyle: {color: '#FFF'},
                        title: 'Course Success Rate',
                        is3D: true,
                        hAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        vAxis: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                        legend: {
                            textStyle: {
                                color: '#ffffff'
                            }
                        }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3da'));
                    chart.draw(data, options);
                }

                $(window).resize(function () {
                    drawChart4();
                });

                
        </script>
        <div class="row container mt-3" style="margin:0 !important; text-align:center; background-color: black">
            <div class="col-md-12">
                <h2><?php echo $courseID ?> Success Rate In <?php echo $year ?></h2><br>
                <div id="piechart_3da" style="width: 100%; min-height: 450px;"></div>
            </div>



        </div>



        <?php
    }

    public function displayForExport($students, $course) {
        ?>
        <script>
            function exportTableToExcel(tableID, filename = '') {
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
                filename = filename ? filename + '.xls' : 'excel_data.xls';
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                    downloadLink.download = filename;
                    downloadLink.click();
            }
            }
        </script>
        <div class="container mt-3">

            <h1>Grades of All Students That Have Course <?php echo $course ?></h1>
            <div class="table-responsive-sm">
                <table class="table" id="exportT">
                    <thead class="text-white">
                        <tr>
                            <th></th>
                            <th>Student ID</th>
                            <th>Theory Grade</th>
                            <th>Lab Grade</th>
                            <th>Total Grade</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">                            
                        <?php
                        $i = 1;
                        while ($row = $students->fetch_assoc()) {
                            echo '<tr>';
                            echo'<td>' . $i . '</td>';
                            echo'<td>' . $row['StudentID'] . '</td>';
                            echo '<td>' . $row['theoryGrade'] . '</td>';
                            echo '<td>' . $row['labGrade'] . '</td>';
                            echo '<td>' . $row['totalGrade'] . '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="container mt-3">
                <button class="btn btn-primary" onclick="exportTableToExcel('exportT', 'grades')">Export</button>
            </div>


        </div>


        <?php
    }
    public function displayStudentsPassedCoursesForExport($courses){
           ?>
        <script>
            function exportTableToExcel(tableID, filename = '') {
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
                filename = filename ? filename + '.xls' : 'excel_data.xls';
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                    downloadLink.download = filename;
                    downloadLink.click();
            }
            }
        </script>
        <div class="table-responsive-sm">
            <table class="table" id="exportT">
                <thead class="text-white">
                    <tr>
                        <th></th>
                        <th>Course ID</th>
                        <th>Total Grade</th>
                        <th>Average Grade</th>
                    </tr>
                </thead>
                <tbody class="text-white">                            
                    <?php
                    $i = 1;
                    $sum = 0;
                    while ($row = $courses->fetch_assoc()) {
                        $sum = $sum + $row['totalGrade'];
                        echo '<tr>';
                        echo'<td>' . $i . '</td>';
                        echo'<td>' . $row['courseID'] . '</td>';
                        echo '<td>' . $row['totalGrade'] . '</td>';
                        echo '<td>' . round($sum/$i,2) . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div>
                <button class="btn btn-primary" onclick="exportTableToExcel('exportT', 'grades')">Export</button>
            </div>

        <?php
    }

}
