<?php
require_once __DIR__ . "/vendor/autoload.php";
$studentController = new \App\controller\StudentController();
$page = (isset($_REQUEST['page']))?$_REQUEST['page']:NULL;
switch ($page){
    case 'add':
        $studentController->add();
        break;
    case 'delete':
        $studentController->delete();
        break;
    case 'edit':
        $studentController->edit();
        break;
    case 'search':
        $studentController->search();
        break;
    default:
        $studentController->show();
}







