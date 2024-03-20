<?php

class FormMaker {

    public function newCourseForm() {
        ?>


        <div class="container">
            <h2>Add A New Course</h2>
            <form method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
                <div class="row">
                    <div class="col-25">
                        <label for="cId">Course ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" placeholder="Enter Course ID" name = "courseID" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="cName">Course Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" placeholder="Enter Course Name" name="courseName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="cYear">Course Year</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" placeholder="Enter Year of Teaching" name = "year" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="cYear">Course Semester</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" placeholder="Enter semester of Teaching" name = "semester" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <button type="submit" class="btn btn-primary" name="submitNewCourse">Submit</button>
                </div>
            </form>
        </div> 
        <?php
    }

    public function editCourseForm($searchedCourse) {
        $db = new DbHandler;
        $row = $searchedCourse->fetch_assoc();
        $num = $row['num'];
        $courseId = $row['courseID'];
        $name = $row['courseName'];
        $descr = $row['description'];
        $year = $row['year'];
        $semester = $row['semester'];
        $theoryW = $row['theoryW'];
        $labW = $row['labW'];
        $yearTheory = $row['yearTheory'];
        $yearLab = $row['yearLab'];
        ?>
        <div class="container">
            <form method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
                <h1>Edit Course</h1>
                <p>Alter the courses information</p> 
                <div class="form-group row">
                    <div class="col-75">
                        <input type="hidden" class="form-control" name = "num" value= "<?php echo $num ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">Course ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "courseID" value= "<?php echo $courseId ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">Course Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name="courseName" value="<?php echo $name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">Year of Teaching</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "year" value="<?php echo $year ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">semester of Teaching</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "semester" value="<?php echo $semester ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">Weight of Theory</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "theoryW" value="<?php echo $theoryW ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">Weight of Lab</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "labW" value="<?php echo $labW ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">From which year grade stays of theory</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "yearTheory" value="<?php echo $yearTheory ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">From which year grade stays of lab</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" name = "yearLab" value="<?php echo $yearLab ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="lesson">Required Courses: <?php $db->printCoursesReqs($courseId) ?></label>
                    </div>
                    <div class="col-75">
                        <select class="form-control" id="reqs" name="reqs[]" multiple>             
                            <?php
                            $result = $db->getCourses();
                            while ($row = $result->fetch_assoc()) {
                                if ($row['semester'] < $semester) {
                                    echo"<option value= " . $row['courseID'] . " >" . $row['courseID'] . "-Year  " . $row['year'] . "-Semester  " . $row['semester'] . "</option>";
                                }
                            }
                            ?>
                        </select> 
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-25">
                        <label for="text">Description</label>
                    </div>
                    <div class="col-75">
                        <textarea class="form-control" rows="5" name="area" ><?php echo $descr ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <button type="submit" class="btn btn-primary" name="submitChangedCourse">Submit</button>
                </div>
            </form>
        </div>
        <?php
    }

    public function validateUserForm($searchedUser) {


        $row = $searchedUser->fetch_assoc();
        $id = $row['userId'];
        $appRole = $row['appliedRole'];
        $username = $row['username'];
        $name = $row['name'];
        $surname = $row['surname'];
        $email = $row['email'];
        ?>
        <div>
            <form class="set-padding set-margin" method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
                <h1>Validate User</h1>
                <p>Check if credentials are correct</p>
                <div class="form-group">
                    <label for="text">UserID</label>
                    <input type="text" class="form-control" name = "id" value= "<?php echo $id ?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="text">Username</label>
                    <input type="text" class="form-control" name = "username" value= "<?php echo $username ?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="text">Name</label>
                    <input type="text" class="form-control" name = "name" value= "<?php echo $name ?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="text">Username</label>
                    <input type="text" class="form-control" name = "surname" value= "<?php echo $surname ?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="text">email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="text">Applied Role</label>
                    <input type="text" class="form-control" name = "appliedRole" value="<?php echo $appRole ?>"readonly>
                </div>
                <button type="submit" class="btn btn-secondary" name="validate">Submit</button>
                <button type="submit" class="btn btn-secondary" name="decline" >Decline</button>
            </form>
        </div>
        <?php
    }

    public function getGradeForm($students, $course) {
        $db = new DbHandler();
        $result = $db->getGradingAvailability($course);
        $avail = $result->fetch_assoc();
        ?>
        <form class="set-padding set-margin" method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
            <h1>Input Grades For Course <?php echo $course; ?></h1>
            <input type="hidden" class="form-control" name = "courseID" value= "<?php echo $course ?>" readonly>
            <input type="hidden" class="form-control" name = "avail" value= "<?php echo $avail['grading'] ?>" readonly>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="text-white">
                        <tr>
                            <th></th>
                            <th>Student ID</th>
                            <th>Theory Grade</th>
                            <th>Lab Grade</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">                            
                        <?php
                        $i = 1;
                        while ($row = $students->fetch_assoc()) {
                            echo '<tr>';
                            echo'<td>' . $i . '</td>';
                            echo'<input type="hidden" id="courseID" name="courseID" value="' . $course . '">';
                            echo'<td><input type="text" class="form-input" name="id[]" value="' . $row['StudentID'] . '" id="studentID' . $i . '" readonly></td>';
                            if ($avail['grading'] === '0') {
                                echo'<td><input type="text" class="form-input" name="theor[]" placeholder="Enter TheoryGrade" value="' . $row['theoryGrade'] . '" id="theoryG' . $i . '" readonly></td>';
                                echo'<td><input type="text" class="form-input" name="lab[]" placeholder="Enter LabGrade" value="' . $row['labGrade'] . '" id="labG' . $i . '" readonly></td>';
                            } else {
                                echo'<td><input type="text" class="form-input" name="theor[]" placeholder="Enter TheoryGrade" value="' . $row['theoryGrade'] . '" id="theoryG' . $i . '" ></td>';
                                echo'<td><input type="text" class="form-input" name="lab[]" placeholder="Enter LabGrade" value="' . $row['labGrade'] . '" id="labG' . $i . '"></td>';
                            }
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        if ($avail['grading'] === '1') {
            echo '<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>';
            ?><br><br>
            <?php
            echo '<button type="submit" value="submit" name="close" class="btn btn-primary">Close</button>';
        } else {
            echo '<button type="submit" value="submit" name="open" class="btn btn-primary">Open</button>';
        }
        ?>
        </form>
        <?php
    }

    public function addYearForm() {
        $id = $_SESSION['username'];
        ?>
        <div class="container"> 
            <h1>Entry Year</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">
                <div class="form-group">
                    <label for="text">UserID</label>
                    <input type="text" class="form-control" name = "id" value= "<?php echo $id ?>"  readonly>
                </div>
                <input type="text" class="form-control" placeholder="Enter Entry Year" name = "year">

                <button type="submit" class="btn btn-primary" name="entryYear">Submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function addPositForm() {
        $id = $_SESSION['username'];
        ?>
        <div class="container"> 
            <h1>Professor Position</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">
                <div class="form-group">
                    <label for="text">ProfID</label>
                    <input type="text" class="form-control" name = "id" value= "<?php echo $id ?>"  readonly>
                </div>
                <select class="form-control" id="posit" name="posit">             
                    <option value="Instructor" >Instructor</option>
                    <option value="Assistant Professor" >Assistant Professor</option>
                    <option value="Associate Professor" >Associate Professor</option>
                    <option value="Professor" >Professor</option>
                </select> 
                <br>
                <button type="submit" class="btn btn-primary" name="position">Submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function studentsForValidation() {
        ?>
        <div class="container">  
            <h1>Validate User</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                <?php $this->selectNewStudent(); ?>

                <button type="submit" class="btn btn-primary" name="validateThis">submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function proffesorsForValidation() {
        ?>
        <div class="container">  
            <h1>Validate User</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                <?php $this->selectNewProfessor() ?>

                <button type="submit" class="btn btn-primary" name="validateThis">submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function adminCourseSearch() {
        ?>
        <div class="container"> 
            <h1>Course Search</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                <input type="text" class="form-control" placeholder="Enter Course ID" name = "courseID">

                <button type="submit" class="btn btn-primary" name="getCourses">Submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function getAssignCourseForm() {
        ?>

        <div class="container">  
            <h1>Assign Course To Teacher</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                <?php $this->selectCourse(); ?>
                <?php $this->selectProfessor(); ?>
                <div class="row">
                    <button type="submit" class="btn btn-primary" name="assignToTeacher">submit</button>     
                </div>
            </form>                
        </div>  
        <?php
    }

    public function getProfsCoursesForm() {
        ?>

        <div class="container">  
            <h1>Pick a Course</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                <?php $this->selectProffsCourse(); ?>
                <button type="submit" class="btn btn-primary" name="showCourses">submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function selectProffsCourse() {

        $courseList = new DbHandler;
        ?>
        <div class="form-group row"> 
            <div class="col-25">
                <label for="lesson">Course:</label>  
            </div>
            <div class="col-75">
                <select class="form-control" id="courseID" name="courseID">             
                    <?php
                    $result = $courseList->getProfsCourses($_SESSION['username']);
                    while ($row = $result->fetch_assoc()) {
                        if ($row['theoryW'] === NULL) {

                            echo"<option value= " . $row['courseID'] . " >" . $row['courseID'] . '<span> NEEDS VALIDATING</span>' . "</option>";
                        } else {
                            echo"<option value= " . $row['courseID'] . " >" . $row['courseID'] . "</option>";
                        }
                    }
                    ?>
                </select>   
            </div>
        </div>
        <?php
    }

    public function selectCourse() {
        $courseList = new DbHandler;
        ?>
        <div class="form-group row">
            <div class="col-25">
                <label for="lesson">Course:</label>  
            </div>
            <div class="col-75">
                <select class="form-control" id="courseID" name="courseID">             
                    <?php
                    $result = $courseList->getUnassignedCourses();
                    while ($row = $result->fetch_assoc()) {
                        echo"<option value= " . $row['courseID'] . " >" . $row['courseName'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }

    public function selectNewStudent() {
        $profList = new DbHandler;
        ?>
        <div class="form-group">         
            <label for="lesson">User:</label>  
            <select class="form-control" id="profID" name="userId">             
                <?php
                $result = $profList->getNumberOfStudentAppl();

                while ($row = $result->fetch_assoc()) {
                    echo'<option value="' . $row['userId'] . '">' . $row['username'] . ' ' . $row['email'] . '</option>';
                }
                ?>
            </select>             
        </div>
        <?php
    }

    public function selectNewProfessor() {
        $profList = new DbHandler;
        ?>
        <div class="form-group">         
            <label for="lesson">User:</label>  
            <select class="form-control" id="profID" name="userId">             
                <?php
                $result = $profList->getNumberOfProffesorsAppl();

                while ($row = $result->fetch_assoc()) {
                    echo'<option value="' . $row['userId'] . '">' . $row['username'] . ' ' . $row['email'] . '</option>';
                }
                ?>
            </select>             
        </div>
        <?php
    }

    public function selectProfessor() {
        $profList = new DbHandler;
        ?>
        <div class="form-group row">
            <div class="col-25">
                <label for="lesson">Professor:</label> 
            </div>
            <div class="col-75">
                <select class="form-control" id="profID" name="profID">             
                    <?php
                    $result = $profList->getProfs();
                    while ($row = $result->fetch_assoc()) {
                        echo'<option value="' . $row['profID'] . '">' . $row['Name'] . ' ' . $row['SurName'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }

    public function deleteCourseForm() {
        ?>

        <div class="container">  
            <h1>Pick Course To Delete</h1>
            <form action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?> " method="post">  
                <?php $this->selectCourse(); ?>
                <button type="submit" class="btn btn-primary" name="courseToDelete">submit</button>         
            </form>                
        </div>  
        <?php
    }

    public function importCoursesForm($course) {
        ?>
        <div class="container">
            <h2>Upload grades</h2>
            <form method="post" action="import_file.php?name=<?php echo $course ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="lesson">File:</label> 
                    </div>
                    <div class="col-75">
                        <input type="file" class="form-control"  name="file" accept=".xlsx, .xls, .csv"/>

                        <br>
                    </div>
                    <div class="row"><button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
    }

    public function getSignUpForm($errors) {
        ?>
        <form class="set-padding set-margin" method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
            <h1>Register</h1>
            <p>Enter your Credentials</p> 
            <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                <label class="control-label">Username</label>
                <input type="text" name="icsd" value="<?php echo $username; ?>" class="form-control">
                <?php if (isset($errors['username'])): ?>
                    <span class="help-block"><?php echo $errors['username'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : '' ?>">
                <label class="control-label">Email Address</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                <?php if (isset($errors['email'])): ?>
                    <span class="help-block"><?php echo $errors['email'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="control-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Surname</label>
                <input type="text" name="surname" class="form-control">
            </div>
            <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control">
                <?php if (isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['passwordConf']) ? 'has-error' : '' ?>">
                <label class="control-label">Password confirmation</label>
                <input type="password" name="passwordConf" class="form-control">
                <?php if (isset($errors['passwordConf'])): ?>
                    <span class="help-block"><?php echo $errors['passwordConf'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">         
                <label for="text">Role</label>  
                <select class="form-control" name="appliedRole">             
                    <?php
                    $roleList = new DbHandler;
                    $result = $roleList->getRoles();
                    echo '<option value=""></option>';
                    while ($row = $result->fetch_assoc()) {
                        echo"<option value= " . $row['roleId'] . " >" . $row['name'] . ' ' . $row['description'] . "</option>";
                    }
                    ?>
                </select>             
            </div>

            <button type="submit" class="btn btn-primary" name="submitCredentials">Submit</button>
        </form>
        <?php
    }

    public function getEditProfileForm($errors) {

        $db = new DbHandler();
        $result = $db->getUserForUpdate($_SESSION['username']);

        $user = $result->fetch_assoc();
        ?>
        <form class="set-padding set-margin" method="post" action="<?php htmlspecialchars($_SERVER[PHP_SELF]) ?>">
            <h1>Edit Profile</h1>
            <p>Enter New Credentials</p> 
            <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                <label class="control-label">Username</label>
                <input type="text" name="icsd" value="<?php echo $user['username'] ?>" class="form-control">
                <?php if (isset($errors['username'])): ?>
                    <span class="help-block"><?php echo $errors['username'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : '' ?>">
                <label class="control-label">Email Address</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" required>
                <?php if (isset($errors['email'])): ?>
                    <span class="help-block"><?php echo $errors['email'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['passwordOld']) ? 'has-error' : '' ?>">
                <label class="control-label">Old Password</label>
                <input type="password" name="passwordOld" class="form-control" required>
                <?php if (isset($errors['passwordOld'])): ?>
                    <span class="help-block"><?php echo $errors['passwordOld'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                <?php if (isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['passwordConf']) ? 'has-error' : '' ?>">
                <label class="control-label">Password confirmation</label>
                <input type="password" name="passwordConf" class="form-control" required>
                <?php if (isset($errors['passwordConf'])): ?>
                    <span class="help-block"><?php echo $errors['passwordConf'] ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary" name="submitCredentials">Submit</button>
        </form>
        <?php
    }

    public function loginForm() {
        ?>    
        <form class="set-padding set-margin" method="post" action="authenticate.php">
            <div class="form-group">
                <h1>Log In</h1>
                <p>Enter your Credentials</p> 
                <input type="text" class="form-control" id="uname" placeholder="username" name="username" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="password" name="password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>            
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
        </div>        
        <?php
        $this->addFormValidation();
    }

    public function addFormValidation() {
        ?>
        <script>
            // Disable form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script> 
        <?php
    }

}
