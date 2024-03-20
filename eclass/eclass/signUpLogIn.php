<?php

include 'DbHandler.php';
$db = new DbHandler();
include 'PageMaker.php';
include 'FormMaker.php';
$fm = new FormMaker();
$pm = new PageMaker();
$pm->headMatter();
$pm->startNavbar();
switch (@$_REQUEST['action']) {

    case 'signUp':
        $errors = $db->newSignUp();
        if ($erros !== '') {
            $fm->getSignUpForm($errors);
        }
        break;
    case 'logIn':
        $fm->loginForm();
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

        $pm->diplayCourseDetails(null);
        break;
    case 'showStudentsDetails':
        $pm->diplayStudentsDetails();
        break;
    case 'showProfessorsDetails':
        $pm->diplayProfessorsDetails();
        break;
}
$pm->endMatter();

