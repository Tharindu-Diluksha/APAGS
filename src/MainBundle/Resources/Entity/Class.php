<?php

namespace MainBundle\Resources\Entity;

class Class{

    private $class_id;
    private $class_name;
    private $description;
    

    /**
     * @return mixed
     */
    public function getClassId()
    {
        return $this->class_id;
    }
    public function setClassId($class_id)
    {
        $this->class_id = $class_id;
    }
    
    public function getClassName()
    {
        return $this->class_name;
    }   
    public function setClassName($class_name)
    {
        $this->class_name = $class_name;
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