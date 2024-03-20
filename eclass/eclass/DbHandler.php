<?php

class DbHandler {

    public function connect() {
        $servername = "localhost:3306";
        $username = "icsd17217";
        $password = "GEO_6945511294";
        $dbname = "antDB";

        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function newSignUp() {
        $conn = $this->connect();
        $username = "";
        $email = "";
        $name = "";
        $surname = "";
        $appRole = "";
        $errors = [];
        // SIGN UP USER
        if (isset($_POST['submitCredentials'])) {
            // validate form values
            /** @var type $_POST */
            $errors = $this->validateUser($_POST, ['submitCredentials']);
            // receive all input values from the form. No need to escape... bind_param takes care of escaping
            $username = $_POST['icsd'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $appRole = $_POST['appliedRole'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt the password before saving in the database
            $created_at = date('Y-m-d H:i:s');
            // if no errors, proceed with signup
            if (count($errors) === 0) {
                $query = "INSERT INTO users SET username=?, email=?,name=?,surname=?, password=?,appliedRole=?, created_at=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('sssssss', $username, $email, $name, $surname, $password, $appRole, $created_at);
                $result = $stmt->execute();
                if ($result) {
                    $userId = $stmt->insert_id;
                    $stmt->close();
                } else {
                    $_SESSION['error_msg'] = "Database error: Could not register user";
                }
            } else {
                return $errors;
            }
        }
    }

    public function addStudent() {
        $conn = $this->connect();
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $id = htmlspecialchars($_POST['username']);
        $sql = "INSERT INTO Student (StudentID,Name,SurName) VALUES ('$id','$name','$surname')";
        if (isset($id) && $id != '') {
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    public function checkIfCompleteSt() {
        $conn = $this->connect();
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM Student WHERE StudentId='$username'";
        $result = mysqli_query($conn, $sql);

        // Associative array
        $row = mysqli_fetch_assoc($result);
        $conn->close();
        return $row['EntryYear'];
    }

    public function checkIfCompletePr() {
        $conn = $this->connect();
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM Professor WHERE profID='$username'";
        $result = mysqli_query($conn, $sql);

        // Associative array
        $row = mysqli_fetch_assoc($result);
        $conn->close();
        return $row['Position'];
    }

    public function addYear() {
        $conn = $this->connect();
        $year = htmlspecialchars($_POST['year']);
        $id = htmlspecialchars($_POST['id']);
        $sql = "UPDATE Student SET EntryYear = '$year' WHERE StudentID='$id'";
        if (isset($year) && $year != '') {
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    public function addPos() {
        $conn = $this->connect();
        $pos = htmlspecialchars($_POST['posit']);
        $id = htmlspecialchars($_POST['id']);
        $sql = "UPDATE Professor SET Position = '$pos' WHERE profID='$id'";
        if (isset($pos) && $pos != '') {
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    public function addProfessor() {
        $conn = $this->connect();
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $id = htmlspecialchars($_POST['username']);
        $sql = "INSERT INTO Professor (profID,Name,SurName) VALUES ('$id','$name','$surname')";
        if (isset($id) && $id != '') {
            if ($conn->query($sql) === TRUE) {
                echo "<meta http-equiv='refresh' content='0'>";
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    public function addNewCourse() {
        $conn = $this->connect();
        $courseID = htmlspecialchars($_POST['courseID']);

        $courseName = htmlspecialchars($_POST['courseName']);
        $year = htmlspecialchars($_POST['year']);
        $semester = htmlspecialchars($_POST['semester']);
        $sql = "INSERT INTO course (courseID,courseName,year,semester) VALUES ('$courseID',' $courseName','$year','$semester')";
        if (isset($courseID) && $courseID != '') {
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }

    public function editCourse() {

        $conn = $this->connect();
        $courseID = htmlspecialchars($_POST['courseID']);
        $num = ($_POST['num']);
        $courseName = htmlspecialchars($_POST['courseName']);
        $year = htmlspecialchars($_POST['year']);
        $semester = htmlspecialchars($_POST['semester']);
        $theoryW = htmlspecialchars($_POST['theoryW']);
        $labW = htmlspecialchars($_POST['labW']);
        $yearTheory = htmlspecialchars($_POST['yearTheory']);
        $yearLab = htmlspecialchars($_POST['yearLab']);
        $descript = htmlspecialchars($_POST['area']);
        $sql = "UPDATE course SET courseID = '$courseID',courseName = '$courseName',description ='$descript',year='$year',semester='$semester',theoryW='$theoryW',labW='$labW',yearTheory='$yearTheory',yearLab='$yearLab' WHERE num = '$num'";
        //if (($num !== '')) {
        if ($conn->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        if ($_POST['reqs'] !== null) {
            $this->deleteCourseReqs($num);
            foreach ($_POST['reqs'] as $req) {
                $sql = "INSERT INTO courseHasRequirements (courseID,reqcourseID) VALUES ('$courseID','$req')";
                if ($conn->query($sql) === TRUE) {
                    echo "<meta http-equiv='refresh' content='0'>";
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
    }

    public function deleteCourseReqs($num) {
        $conn = $this->connect();
        $sql = "DELETE FROM courseHasRequirements WHERE courseID = (SELECT courseID FROM course WHERE num = '$num')";

        if ($conn->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
            echo "A course was deleted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function editRole() {
        $conn = $this->connect();
        $id = htmlspecialchars($_POST['id']);
        $role = htmlspecialchars($_POST['appliedRole']);
        $db = new DbHandler;
        if ($role == 3) {
            $db->addStudent();
        }
        if ($role == 2) {
            $db->addProfessor();
        }
        $sql = "UPDATE users SET roleId = '$role' WHERE userId = '$id'";
//        if (($courseID == '')) {
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
//        }
    }

    public function printCoursesReqs($courseID) {
        $conn = $this->connect();
        $sql = "SELECT reqcourseID FROM courseHasRequirements WHERE courseID='$courseID'";
        $num = $conn->query($sql);
        while ($row = $num->fetch_assoc()) {
            echo $row['reqcourseID'] . ' ';
        }
        $conn->close();
        //return $num;
    }
    public function getCoursesReqs($courseID) {
        $conn = $this->connect();
        $sql = "SELECT reqcourseID FROM courseHasRequirements WHERE courseID='$courseID'";
        $reqs = $conn->query($sql);
        $conn->close();
        return $reqs;
    }

    public function getNumberOfStudentAppl() {
        $conn = $this->connect();
        $sql = "SELECT userId,username,email FROM users WHERE roleId IS NULL AND appliedRole=3";
        $num = $conn->query($sql);
        $conn->close();
        return $num;
    }

    public function getNumberOfProffesorsAppl() {
        $conn = $this->connect();
        $sql = "SELECT userId,username,email FROM users WHERE roleId IS NULL AND appliedRole=2";
        $num = $conn->query($sql);
        $conn->close();
        return $num;
    }

    public function countNumberOfStudentAppl() {
        $conn = $this->connect();
        $sql = "SELECT * FROM users WHERE roleId IS NULL AND appliedRole=3";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        $conn->close();
        return $row;
    }

    public function countNumberOfProfessorsAppl() {
        $conn = $this->connect();
        $sql = "SELECT * FROM users WHERE roleId IS NULL AND appliedRole=2";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        $conn->close();
        return $row;
    }

    public function getCourseInfo($course) {
        $conn = $this->connect();
        $sql = "SELECT * FROM course WHERE courseID='$course'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function getStudentInfo($student) {
        $conn = $this->connect();
        $sql = "SELECT * FROM Student WHERE StudentID='$student'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function getProfessorInfo($prof) {
        $conn = $this->connect();
        $sql = "SELECT * FROM Professor WHERE profID='$prof'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function getCoursesProfessor($course) {
        $conn = $this->connect();
        $sql = "SELECT * FROM Professor WHERE profID=(SELECT profID FROM teacherHasCourse WHERE courseID='$course')";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function getNumOfCoursesForProfessor() {
        $conn = $this->connect();
        $profID = $_SESSION['username'];
        $sql = "SELECT * FROM teacherHasCourse WHERE profID = '$profID' AND courseID IN (SELECT courseID FROM course WHERE theoryW IS NULL)";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        $conn->close();
        return $row;
    }

    public function getProfsCourses($profID) {
        $conn = $this->connect();
        $sql = "SELECT * FROM course WHERE courseID IN (SELECT courseID FROM teacherHasCourse WHERE profID = '$profID')";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }
    public function getStudentsGradesInCourseByYear($year,$courseID){
        $conn = $this->connect();
        $sql = "SELECT
        COUNT(totalGrade) AS Total,
        SUM(CASE WHEN totalGrade > 5 THEN 1 ELSE 0 END) AS Passed,
        SUM(CASE WHEN totalGrade < 5 THEN 1 ELSE 0 END) AS Failed
        FROM studentHasCourse WHERE courseID = '$courseID' AND YEAR(date)='$year'";
        $counts = $conn->query($sql);
        $conn->close();
        return $counts;
    }
    public function getStudentsThatHaveCourse() {
        $conn = $this->connect();
        $courseId = $_POST['courseID'];
        $sql = "SELECT * FROM studentHasCourse WHERE courseID IN (SELECT courseID FROM teacherHasCourse WHERE courseID = '$courseId') AND previousYear='0'";
        $students = $conn->query($sql);
        $conn->close();
        return $students;
    }


    public function getCourses() {
        $conn = $this->connect();
        $sql = "SELECT courseID,courseName,description,year,semester,theoryW,labW,yearTheory,yearLab FROM course WHERE theoryW>0 ORDER BY semester";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }

    public function getStudents() {
        $conn = $this->connect();
        $sql = "SELECT * FROM Student WHERE EntryYear IS NOT NULL";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }

    public function getUnassignedCourses() {
        $conn = $this->connect();

        $sql = "SELECT * FROM course WHERE courseID NOT IN (SELECT courseID FROM teacherHasCourse)";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }

    public function getRoles() {
        $conn = $this->connect();
        $sql = "SELECT roleId,name,description FROM roles";
        $roles = $conn->query($sql);
        $conn->close();
        return $roles;
    }

    public function getProfs() {
        $conn = $this->connect();
        $sql = "SELECT * FROM Professor WHERE Position IS NOT NULL";
        $profs = $conn->query($sql);
        $conn->close();
        return $profs;
    }

    public function getCourseToAssign() {
        $conn = $this->connect();
        $c = $_GET['num'];
        $courseId = $_POST['courseID'];
        $sql = "SELECT * FROM `course` WHERE courseID =  '$courseId' OR num = '$c'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            echo 'fail';
        }
    }

    public function getUserForUpdate($username) {
        $conn = $this->connect();
        $sql = "SELECT * FROM users WHERE username =  '$username'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            return $result;
        } else {
            echo 'fail';
        }
    }

    public function getUserToValidate() {
        $conn = $this->connect();
        $userId = $_POST['userId'];
        $sql = "SELECT * FROM users WHERE userId =  '$userId'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            return $result;
        } else {
            echo 'fail';
        }
    }

    public function getEntryYear($username) {
        $conn = $this->connect();
        $sql = "SELECT EntryYear FROM Student WHERE StudentID =  '$username'";

        $result = $conn->query($sql);
        $year = $result->fetch_assoc();
        if ($result->num_rows > 0) {

            return $year['EntryYear'];
        } else {
            echo 'fail';
        }
    }

    public function assignCourseToTeacher() {
        $conn = $this->connect();
        $courseId = $_POST['courseID'];
        $profId = $_POST['profID'];

        if (isset($courseId) && $courseId != '' && isset($profId) && $profId != '') {
            $sql = "INSERT INTO teacherHasCourse (courseID,profID) VALUES ('$courseId','$profId')";
            if ($conn->query($sql) === TRUE) {
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
    }

    public function assignGradesToStudents($ids, $theor, $lab, $course) {
        $conn = $this->connect();
        foreach ($ids as $index => $id) {
            //echo  $id . '-' . $theor[$index] . '-'. $lab[$index].$course;
            $sql = "UPDATE studentHasCourse SET theoryGrade = '$theor[$index]',labGrade='$lab[$index]', totalGrade=(SELECT theoryW FROM course WHERE courseID = '$course')*'$theor[$index]'+(SELECT labW FROM course WHERE courseID = '$course')*'$lab[$index]' WHERE StudentID = '$id' AND courseID ='$course' AND previousYear = '0'";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    public function getGradingAvailability($course){
        $conn = $this->connect();
        $sql = "SELECT grading FROM teacherHasCourse WHERE courseID='$course'";
        $avail = $conn->query($sql);
        $conn->close();
        return $avail;
    }
    public function changeGradingAvailStatus(){
        $conn = $this->connect();
        $avail = $_POST['avail'];
        $course = $_POST['courseID'];
        echo '->'.$avail;
        if ($avail==='1'){
            $sql = "UPDATE teacherHasCourse SET grading = '0' WHERE courseID='$course'";
        }else{
            $sql = "UPDATE teacherHasCourse SET grading = '1' WHERE courseID='$course'";
            
        }
        if ($conn->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    public function finalizeStudentsGrade(){
        $date = date('Y-m-d');
        echo $date;
        echo  $course = $_POST['courseID'];
        $conn = $this->connect();
        $sql = "UPDATE studentHasCourse SET previousYear = '1',date = '$date' WHERE courseID='$course' AND previousYear = '0'";
        if ($conn->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
        }
        
    }
    public function getStudentSemesterCourses($stId) {
        $conn = $this->connect();
        $sql = "SELECT courseID,theoryGrade,labGrade,totalGrade FROM studentHasCourse WHERE StudentID ='$stId' AND theoryGrade IS NULL AND labGrade IS NULL";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }

    public function getStudentGradedCourses() {
        $conn = $this->connect();
        $stId = $_SESSION['username'];
        $sql = "SELECT courseID,theoryGrade,labGrade,totalGrade,date FROM studentHasCourse WHERE StudentID ='$stId' AND theoryGrade IS NOT NULL AND labGrade IS NOT NULL";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }
    public function getSpecificSemesterCourses($year,$sem,$username){

        $conn = $this->connect();
        if ($sem==='1'){
            $sql = "SELECT * FROM studentHasCourse WHERE EXTRACT(YEAR FROM date) = '$year' AND EXTRACT(MONTH FROM date) <= 04 AND StudentID='$username'";
        }else{
            $sql = "SELECT * FROM studentHasCourse WHERE EXTRACT(YEAR FROM date) = '$year' AND EXTRACT(MONTH FROM date) >= 06 AND StudentID='$username'";
        }
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }
    public function getStudentPasedCourses($stId) {
        $conn = $this->connect();
        $sql = "SELECT courseID,totalGrade FROM studentHasCourse WHERE StudentID ='$stId' AND totalGrade > '5'";
        $courses = $conn->query($sql);
        $conn->close();
        return $courses;
    }

    public function courseStatement($lang) {
        $result = $this->getStudentSemesterCourses($_SESSION['username']);
        $semCourses = array();
        while ($r = $result->fetch_assoc()) {
            $semCourses[] = $r['courseID'];
        }
        $conn = $this->connect();
        $studentID = $_SESSION['username'];
        if ($lang === null) {
            $sql = "DELETE FROM studentHasCourse WHERE StudentID = '$studentID' AND (totalGrade = '0' OR totalGrade IS NULL)";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            return;
        }
        foreach ($lang as $value) {
            echo'->' . $value . '<-';
            if (in_array($value, $semCourses)) {

                continue;
            } else {
                $sql = "INSERT INTO studentHasCourse (courseID,StudentID) VALUES ('$value','$studentID')";
                if ($conn->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        $diff = array_diff($semCourses, $lang);
        foreach ($diff as $value) {
            $sql = "DELETE FROM studentHasCourse WHERE courseID = '$value' AND StudentID = '$studentID' AND (totalGrade = '0' OR totalGrade IS NULL)";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    public function deleteUser() {
        $conn = $this->connect();
        $userId = $_POST['id'];
        $sql = "DELETE FROM users WHERE userId = '$userId'";

        if ($conn->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
            echo "A course was deleted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function deleteCourse() {
        $conn = $this->connect();
        $courseId = $_POST['courseID'];
        $num = $_GET['num'];
        $sql = "DELETE FROM course WHERE courseID = '$courseId' OR num='$num'";

        if ($conn->query($sql) === TRUE) {
            echo "A course was deleted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function updateUser($username) {
        $conn = $this->connect();
        echo'mpike edw';
        if (isset($_POST['submitCredentials'])) {
            $errors = $this->validateUser($_POST, ['submitCredentials']);
            // receive all input values from the form
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt the password before saving in the database
            if (count($errors) === 0) {
                echo'mpike73';
                $sql = "UPDATE users SET email='$email', password='$password' WHERE username='$username'";
                $result = $conn->query($sql);
                if ($result !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                if ($result) {
                    $_SESSION['success_msg'] = "User account successfully updated";
                }
            } else {
                // continue editting if there were errors
                return $errors;
            }
        }
    }

// Accept a user object, validates user and return an array with the error messages
    function validateUser($user, $ignoreFields) {
        $conn = $this->connect();
        $errors = [];
        $username = $user['icsd'];
        // password confirmation
        //echo $user['password'].$user['passwordConf'];

        if (isset($user['passwordConf']) && ($user['password'] !== $user['passwordConf'])) {
            echo'The two passwords do not match';
            $errors['passwordConf'] = "The two passwords do not match";
        }
        // if passwordOld was sent, then verify old password
        if (isset($user['passwordOld'])) {
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            //echo '->'.$row['username'].$row['email'].'<-';
            // Free result set
            mysqli_free_result($result);
            $conn->close();
            $prevPasswordHash = $row['password'];
            if (!password_verify($user['passwordOld'], $prevPasswordHash)) {
                echo'The old password does not match';
                $errors['passwordOld'] = "The old password does not match";
            }
        }
        // the email should be unique for each user for cases where we are saving admin user or signing up new user
        if (in_array('save_user', $ignoreFields) || in_array('submitCredentials', $ignoreFields)) {
            $email = $user['email'];
            $icsd = $user['icsd'];
            $sql = "SELECT * FROM users WHERE email= '$email' OR username='$icsd' LIMIT 1";
            //echo $email.$icsd;
            $result = mysqli_query($conn, $sql);

            // Associative array
            $row = mysqli_fetch_assoc($result);
            //echo '->'.$row['username'].$row['email'].'<-';
            // Free result set
            mysqli_free_result($result);

            mysqli_close($conn);
            if (!empty($row['email']) && $email === $row['email']) { // if user exists
                $errors['email'] = "Email already exists";
            }
            if (!empty($row['username']) && $row['username'] === $icsd) { // if user exists
                $errors['username'] = "Username already exists";
            }
        }
        // required validation
        foreach ($user as $key => $value) {
            if (in_array($key, $ignoreFields)) {
                continue;
            }
            if (empty($user[$key])) {
                $errors[$key] = "This field is required";
            }
        }
        return $errors;
    }

    public function login($username) {
        $conn = $this->connect();
        $sql = "SELECT username,password,roleId FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        // Associative array
        $row = mysqli_fetch_assoc($result);

        echo 'from function login' . $row['username'] . $row['password'] . $row['roleId'];
        if ($row['username'] !== '') {
            return $row;
        } else {
            echo'Could not log you in';
            throw new Exception('Could not log you in');
        }
    }

}
