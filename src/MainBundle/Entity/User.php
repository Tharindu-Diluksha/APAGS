<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/15/2016
 * Time: 9:09 PM
 */

namespace MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Column(type="string", length=7)
     * @ORM\Id
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=1000000)
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=1)
     */
    private $role;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;



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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }




}