<?php

/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/13/2016
 * Time: 8:41 AM
 */

namespace InstructorBundle\Entity;
class Assignment
{
    protected $assignmentid;
    protected $instructorid;
    protected $classid;
    protected $description;
    protected $duedate;
    protected $duetime;
    protected $totalmarks;
    protected $nooftestcases;
    protected $testcasetype;
    protected $inputs = array();
    protected $outputs = array();
    protected $testcasemarks =array();



    /**
     * @return mixed
     */
    public function getAssignmentid()
    {
        return $this->assignmentid;
    }

    /**
     * @param mixed $assignmentid
     */
    public function setAssignmentid($assignmentid)
    {
        $this->assignmentid = $assignmentid;
    }

    /**
     * @return mixed
     */
    public function getInstructorid()
    {
        return $this->instructorid;
    }

    /**
     * @param mixed $instructorid
     */
    public function setInstructorid($instructorid)
    {
        $this->instructorid = $instructorid;
    }

    /**
     * @return mixed
     */
    public function getClassid()
    {
        return $this->classid;
    }

    /**
     * @param mixed $classid
     */
    public function setClassid($classid)
    {
        $this->classid = $classid;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @return mixed
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * @param mixed $duedate
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;
    }

    /**
     * @return mixed
     */
    public function getDuetime()
    {
        return $this->duetime;
    }

    /**
     * @param mixed $duetime
     */
    public function setDuetime($duetime)
    {
        $this->duetime = $duetime;
    }

    /**
     * @return mixed
     */
    public function getTotalmarks()
    {
        return $this->totalmarks;
    }

    /**
     * @param mixed $totalmarks
     */
    public function setTotalmarks($totalmarks)
    {
        $this->totalmarks = $totalmarks;
    }

    /**
     * @return mixed
     */
    public function getNooftestcases()
    {
        return $this->nooftestcases;
    }

    /**
     * @param mixed $nooftestcases
     */
    public function setNooftestcases($nooftestcases)
    {
        $this->nooftestcases = $nooftestcases;
    }

    /**
     * @return mixed
     */
    public function getTestcasetype()
    {
        return $this->testcasetype;
    }

    /**
     * @param mixed $testcasetype
     */
    public function setTestcasetype($testcasetype)
    {
        $this->testcasetype = $testcasetype;
    }

    /**
     * @return array
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param array $inputs
     */
    public function setInputs($inputs)
    {
        /*$this->inputs = $inputs;*/
        array_push($this->inputs,$inputs);
    }

    /**
     * @return array
     */
    public function getOutputs()
    {
        return $this->outputs;
    }

    /**
     * @param array $outputs
     */
    public function setOutputs($outputs)
    {
        /*$this->outputs = $outputs;*/
        array_push($this->outputs,$outputs);
    }

    /**
     * @return array
     */
    public function getTestcasemarks()
    {
        return $this->testcasemarks;
    }

    /**
     * @param array $testcasemarks
     */
    public function setTestcasemarks($testcasemarks)
    {
        /*$this->testcasemarks = $testcasemarks;*/
        array_push($this->testcasemarks,$testcasemarks);
    }



}