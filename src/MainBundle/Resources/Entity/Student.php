<?php

namespace MainBundle\Resources\Entity;

class Student{

    private $std_id;
    private $std_name;
    
    

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->std_id;
    }
    
    public function setStudentId($std_id)
    {
        $this->std_id = $std_id;
    }
    
    public function getStudentName()
    {
        return $this->std_name;
    }
    
    public function setStudentName($std_name)
    {
        $this->std_name = $std_name;
    }
    
}