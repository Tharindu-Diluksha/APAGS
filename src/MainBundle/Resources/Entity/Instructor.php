<?php

namespace MainBundle\Resources\Entity;

class Instructor{

    private $instructor_id;
    private $instructor_name;
    
    

    /**
     * @return mixed
     */
    public function getInstructorId()
    {
        return $this->instructor_id;
    }
    
    public function setInstructorId($instructor_id)
    {
        $this->instructor_id = $instructor_id;
    }
    
    public function getInstructorName()
    {
        return $this->instructor_name;
    }
    
    public function setInstructorName($instructor_name)
    {
        $this->instructor_name = $instructor_name;
    }
    
}