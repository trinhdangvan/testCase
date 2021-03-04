<?php


namespace App\model;


class StudentModel
{
    protected $database;
    public function __construct()
    {
        $db = new DBconnect();
        $this->database = $db->connect();
    }
    public function getAll(){
        $sql = 'SELECT * FROM student';
        $stmt = $this->database->query($sql);
         return $stmt->fetchAll();
        }
    public function addStudent($student){
        $sql = 'INSERT INTO student (`name`,`age`,`address`) VALUES (:name,:age,:address)';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$student->getName());
        $stmt->bindParam(':age',$student->getAge());
        $stmt->bindParam(":address",$student->getAddress());
        $stmt->execute();
    }
    public function getStudentById($id){
        $sql = 'SELECT * FROM student WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function editStudent($newStudent){
        $sql = 'UPDATE student SET `name`=:name,age=:age,address=:address WHERE id=:id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$newStudent->getName());
        $stmt->bindParam(':age',$newStudent->getAge());
        $stmt->bindParam(':address',$newStudent->getAddress());
        $stmt->bindParam(':id',$newStudent->getId());
        $stmt->execute();
    }
    public function deleteStudent($id){
        $sql = 'DELETE FROM student WHERE id =:id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
    public function search($name)
    {
        $sql = "SELECT * FROM student WHERE name like :name";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->execute();
        return $stmt->fetchAll();
    }



}