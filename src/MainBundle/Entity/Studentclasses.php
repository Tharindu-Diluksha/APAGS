<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/16/2016
 * Time: 12:15 PM
 */

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="studentclass")
 */
class Studentclasses
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $class_id;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $student_id;



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
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }



}