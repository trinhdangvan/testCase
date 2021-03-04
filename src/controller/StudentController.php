<?php


namespace App\controller;


use App\model\Student;
use App\model\StudentModel;

class StudentController
{
    protected $studentModel;
    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }
    public function show(){
        $students = $this->studentModel->getAll();
        include_once "src/view/list.php";
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            include_once "src/view/add.php";
        }
        else{
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $address = $_REQUEST['address'];
            $student = new Student($name,$age,$address);
            $this->studentModel->addStudent($student);
            header('location:index.php');
        }
    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD']== 'GET'){
            $id = $_REQUEST['id'];
            $student = $this->studentModel->getStudentById($id);
            include_once "src/view/edit.php";
        }
        else{
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $address = $_REQUEST['address'];
            $newStudent = new Student($name,$age,$address);
            $newStudent->setId($id);
            $this->studentModel->editStudent($newStudent);
            header('location:index.php');
        }
    }
    public function delete(){
        $id = $_REQUEST['id'];
        $this->studentModel->deleteStudent($id);
        header('location:index.php');
    }
    public function search()
    {
        $name = "%".$_REQUEST['name']."%";
        $students = $this->studentModel->search($name);
        include_once "src/view/list.php";
    }
}
