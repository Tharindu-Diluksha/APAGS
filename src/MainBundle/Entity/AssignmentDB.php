<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/15/2016
 * Time: 12:45 PM
 */

namespace MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="assignments")
 */
class AssignmentDB
{

    /**
     * @ORM\Column(type="string", length=10)
     * @ORM\Id
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=7)
     */
    private $class_id;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=7)
     */
    private $instructor_id;
    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;
    /**
     * @ORM\Column(type="integer")
     */
    private $total_marks;
    /**
     * @ORM\Column(type="date")
     */
    private $dueDate;
    /**
     * @ORM\Column(type="time")
     */
    private $dueTime;








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
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * @param mixed $class_id
     */
    public function setClassId($class_id)
    {
        $this->class_id = $class_id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getInstructorId()
    {
        return $this->instructor_id;
    }

    /**
     * @param mixed $instructor_id
     */
    public function setInstructorId($instructor_id)
    {
        $this->instructor_id = $instructor_id;
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
    public function getTotalMarks()
    {
        return $this->total_marks;
    }

    /**
     * @param mixed $total_marks
     */
    public function setTotalMarks($total_marks)
    {
        $this->total_marks = $total_marks;
    }




    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getDueTime()
    {
        return $this->dueTime;
    }

    /**
     * @param mixed $dueTime
     */
    public function setDueTime($dueTime)
    {
        $this->dueTime = $dueTime;
    }

    /**
     * @return mixed
     */




}