<?php

namespace MainBundle\Resources\Entity;

class Assignment{

    private $assignment_id;
    private $assignment_name;
    private $due_date;
    private $due_time;
    private $description;
    

    /**
     * @return mixed
     */
    public function getAssignmentId()
    {
        return $this->assignment_id;
    }
    public function setAssignmentId($assignment_id)
    {
        $this->assignment_id = $assignment_id;
    }
    
    public function getAssignmentName()
    {
        return $this->assignment_name;
    }   
    public function setAssignmentName($assignment_name)
    {
        $this->assignment_name = $assignment_name;
    }

    public function getDueDate()
    {
        return $this->due_date;
    }    
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }

    public function getDueTime()
    {
        return $this->due_time;
    }    
    public function setDueTime($due_time)
    {
        $this->due_time = $due_time;
    }

    public function getDescription()
    {
        return $this->description;
    }    
    public function setDescription($description)
    {
        $this->description = $description;
    }
}