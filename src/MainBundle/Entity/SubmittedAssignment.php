<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/16/2016
 * Time: 3:58 PM
 */

namespace MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="submittedassignments")
 */
class SubmittedAssignment
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $asgn_id;
    /**
     * @ORM\Column(type="string", length=7)
     */
    private $std_id;
    /**
     * @ORM\Column(type="integer")
     */
    private $marks;
    /**
     * @ORM\Column(type="string", length=10000)
     */
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStdId()
    {
        return $this->std_id;
    }

    /**
     * @return mixed
     */
    public function getAsgnId()
    {
        return $this->asgn_id;
    }

    /**
     * @param mixed $asgn_id
     */
    public function setAsgnId($asgn_id)
    {
        $this->asgn_id = $asgn_id;
    }

    /**
     * @param mixed $std_id
     */
    public function setStdId($std_id)
    {
        $this->std_id = $std_id;
    }

    /**
     * @return mixed
     */
    public function getMarks()
    {
        return $this->marks;
    }

    /**
     * @param mixed $marks
     */
    public function setMarks($marks)
    {
        $this->marks = $marks;
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









}