<?php

namespace MainBundle\Resources\Entity;

class TestCase{

    private $test_id;
    private $test_name;
    private $description;
    

    /**
     * @return mixed
     */
    public function getTestId()
    {
        return $this->test_id;
    }
    public function setTestId($test_id)
    {
        $this->test_id = $test_id;
    }
    
    public function getTestName()
    {
        return $this->test_name;
    }   
    public function setTestName($test_name)
    {
        $this->test_name = $test_name;
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