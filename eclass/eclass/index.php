
<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!$_SESSION['loggedin']) {
    //echo 'pisoooo';
    header('Location: signUpLogIn.php');
    exit;
}

include 'DbHandler.php';
$db = new DbHandler();
//$db->connect();

include 'PageMaker.php';
include 'FormMaker.php';
$fm = new FormMaker();
$pm = new PageMaker();
$pm->headMatter();


if ($_SESSION['roleId'] == 1) {
    $pm->adminsNavBar();
} elseif ($_SESSION['roleId'] == 2) {
    $posit = $db->checkIfCompletePr();
    if ($posit === null) {
        $fm->addPositForm();
        if (isset($_POST['position'])) {
            $db->addPos();
        }
    }else{
        $pm->professorNavBar();
    }
} elseif ($_SESSION['roleId'] == 3) {
    $year = $db->checkIfCompleteSt();
    if ($year === null) {
        $fm->addYearForm();
        if (isset($_POST['entryYear'])) {
            $db->addYear();
        }
    }else{
        $pm->studentNavBar();
    }
}


switch (@$_REQUEST['action']) {
    case '':
        if (($_SESSION['roleId'])==='2' && $posit !== null){
            $pm->startPageProf();
        }elseif (($_SESSION['roleId'])==='3' && $year !== null){
            $pm->startPageStud();
        }
        break;
    case 'studentValidate':
        if (!isset($_POST['validateThis'])) {
            $fm->studentsForValidation();
        } elseif (isset($_POST['validateThis'])) {
            $searchedUser = $db->getUserToValidate();
            $fm->validateUserForm($searchedUser);
        }
        if (isset($_POST['validate'])) {

            $db->editRole();
        } elseif (isset($_POST['decline'])) {
            $db->deleteUser();
        }
        ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <?php

        break;
    case 'professorValidate':
        if (!isset($_POST['validateThis'])) {
            $fm->proffesorsForValidation();
        } elseif (isset($_POST['validateThis'])) {
            $searchedUser = $db->getUserToValidate();
            $fm->validateUserForm($searchedUser);
        }
        if (isset($_POST['validate'])) {

            $db->editRole();
        } elseif (isset($_POST['decline'])) {
            $db->deleteUser();
        }
        ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <?php

        break;
    case 'profileEdit':
        $errors = $db->updateUser($_SESSION['username']);
        if ($erros !== '') {
            $fm->getEditProfileForm($errors);
        }
        break;
    case 'newCourses':
        $fm->newCourseForm();
        $db->addNewCourse();
        break;
    case 'printCourses':
        $courses = $db->getCourses();
        $pm->displayCourseList($courses);
        break;
    case 'printStudents':
        $students = $db->getStudents();
        $pm->displayStudentList($students);
        break;
    case 'printProfessors':
        $profs = $db->getProfs();
        $pm->displayProfessorList($profs);
        break;
    case 'showCourseDetails':
        $pm->diplayCourseDetails($_SESSION['roleId']);
        break;
    case 'showStudentsDetails':
        $pm->diplayStudentsDetails();
        break;
    case 'showProfessorsDetails':
        $pm->diplayProfessorsDetails();
        break;
    case 'searchCourses':
        $fm->adminCourseSearch();
        if (isset($_POST['getCourses'])) {
            $searchedCourse = $db->getCourseToAssign();
            $pm->displayCourseList($searchedCourse);
        }
        ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <?php

        break;
    case 'assignCourses':
        $fm->getAssignCourseForm();
        if (isset($_POST['assignToTeacher'])) {
            $db->assignCourseToTeacher();
        }
        break;
    case 'deleteCourse':
        if (($_SESSION['roleId']) !== '1') {
            break;
        }
        if (!isset($_POST['courseToDelete']) && (!isset($_GET['num']))) {
            $fm->deleteCourseForm();
        } elseif ((isset($_POST['courseToDelete'])) || (isset($_GET['num']))) {
            $db->deleteCourse();
        }
        ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <?php

        break;
    case 'editCourses':
        if ((($_SESSION['roleId']) !== '2') && (($_SESSION['roleId']) !== '1')) {
            break;
        }
        if (!isset($_POST['showCourses']) && (!isset($_GET['num']))) {
            $fm->getProfsCoursesForm();
        } elseif (isset($_POST['showCourses']) || (isset($_GET['num']))) {
            $searchedCourse = $db->getCourseToAssign();
            $fm->editCourseForm($searchedCourse);
        }
        if (isset($_POST['submitChangedCourse'])) {

            $db->editCourse();
        }
        ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <?php

        break;
    case 'gradeCourses':
        if (!isset($_POST['showCourses'])) {
            $fm->getProfsCoursesForm();
        } elseif (isset($_POST['showCourses'])) {
            $students = $db->getStudentsThatHaveCourse();
            $fm->getGradeForm($students, $_POST['courseID']);
        }if (isset($_POST['submit'])) {
            $db->assignGradesToStudents($_POST['id'], $_POST['theor'], $_POST['lab'], $_POST['courseID']);
        }elseif (isset($_POST['close']) || isset($_POST['open'])){
            $db->changeGradingAvailStatus();
            $db->finalizeStudentsGrade();
        }

        break;

    case 'takeCourses':
        $courses = $db->getCourses();
        $pm->coursesForStudents($courses);
        if (isset($_POST['submit'])) {
            $db->courseStatement($_POST['lang']);
        }
        break;
    case 'mySemesterCourses':
        $courses = $db->getStudentSemesterCourses($_SESSION['username']);
        $pm->displaySemesterCourses($courses);
        break;
    case 'myGradedCourses':
        $courses = $db->getStudentGradedCourses();
        $pm->displaySemesterCourses($courses);
        break;
    case 'export':
        if (!isset($_POST['showCourses'])) {
            $fm->getProfsCoursesForm();
        } elseif (isset($_POST['showCourses'])) {
            $students = $db->getStudentsThatHaveCourse();
            $pm->displayForExport($students, $_POST['courseID']);
        }
        break;
    case 'import':
        $fm->getProfsCoursesForm();
        if (isset($_POST['courseID'])){
            $fm->importCoursesForm($_POST['courseID']);
        }

        break;
    case 'printStudentStatistics':
        $pm->studentStartPieChart();
        $pm->graph($_POST['year'],$_POST['sem']);
        break;
    case 'profsStatistics':
        $pm->profsGraph();
        $pm->courseSuccessRate($_POST['year'],$_POST['courseID']);
        break;
    case 'studentExport':
        $courses = $db->getStudentPasedCourses($_SESSION['username']);
        $pm->displayStudentsPassedCoursesForExport($courses);    
        break;
}
$pm->endMatter();
?>
