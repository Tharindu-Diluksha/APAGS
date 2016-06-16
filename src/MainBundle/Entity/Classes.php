<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/16/2016
 * Time: 7:26 AM
 */

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="class")
 */
class Classes
{
    /**
     * @ORM\Column(type="string", length=7)
     * @ORM\Id
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=7)
     */
    private $instructor_id;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;



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



}