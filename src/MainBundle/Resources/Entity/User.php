<?php

namespace MainBundle\Resources\Entity;

class User{

    private $user_id;
    private $username;
    private $role;
    private $password;
    

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }
    
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getRole()
    {
        return $this->role;
    }
    
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
}