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
    protected $duedate;
    protected $duetime;
    protected $totalmarks;
    protected $nooftestcases;
    protected $firstemail;
    protected $emails = array();

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
    public function getFirstemail()
    {
        return $this->firstemail;
    }

    /**
     * @param mixed $firstemail
     */
    public function setFirstemail($firstemail)
    {
        $this->firstemail = $firstemail;
    }


    /**
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param mixed $emails
     */
    public function setEmails($emails)
    {
        /*$this->$emails->add($emails);*/
        array_push($this->emails,$emails);
    }


}