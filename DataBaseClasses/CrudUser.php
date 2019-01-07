<?php

require_once 'DB.php';

abstract class CrudUser extends DB {

    protected $table;
    public $name;
    public $email;
    public $fone;
    public $password;
    public $salary;
    public $role;
    public $picture;
    public $idManager;
    public $notes;
    public $sex;
    public $day;
    public $breed;
    public $version;
    public $registerDate;
    public $registerUser;
    public $updateDate;
    public $updateUser;

    /**
     * Get the value of Table
     *
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set the value of Table
     *
     * @param mixed table
     *
     * @return self
     */
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Fone
     *
     * @return mixed
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Set the value of Fone
     *
     * @param mixed fone
     *
     * @return self
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of Salary
     *
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of Salary
     *
     * @param mixed salary
     *
     * @return self
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of Role
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of Role
     *
     * @param mixed role
     *
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of Picture
     *
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of Picture
     *
     * @param mixed picture
     *
     * @return self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of Id Manager
     *
     * @return mixed
     */
    public function getIdManager()
    {
        return $this->idManager;
    }

    /**
     * Set the value of Id Manager
     *
     * @param mixed idManager
     *
     * @return self
     */
    public function setIdManager($idManager)
    {
        $this->idManager = $idManager;

        return $this;
    }

    /**
     * Get the value of Notes
     *
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set the value of Notes
     *
     * @param mixed notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get the value of Sex
     *
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of Sex
     *
     * @param mixed sex
     *
     * @return self
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of day
     *
     * @return mixed
     */
    public function getday()
    {
        return $this->day;
    }

    /**
     * Set the value of day
     *
     * @param mixed day
     *
     * @return self
     */
    public function setday($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of Breed
     *
     * @return mixed
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set the value of Breed
     *
     * @param mixed breed
     *
     * @return self
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get the value of Version
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of Version
     *
     * @param mixed version
     *
     * @return self
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get the value of Register Date
     *
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set the value of Register Date
     *
     * @param mixed registerDate
     *
     * @return self
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get the value of Register User
     *
     * @return mixed
     */
    public function getRegisterUser()
    {
        return $this->registerUser;
    }

    /**
     * Set the value of Register User
     *
     * @param mixed registerUser
     *
     * @return self
     */
    public function setRegisterUser($registerUser)
    {
        $this->registerUser = $registerUser;

        return $this;
    }

    /**
     * Get the value of Update Date
     *
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set the value of Update Date
     *
     * @param mixed updateDate
     *
     * @return self
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get the value of Update User
     *
     * @return mixed
     */
    public function getUpdateUser()
    {
        return $this->updateUser;
    }

    /**
     * Set the value of Update User
     *
     * @param mixed updateUser
     *
     * @return self
     */
    public function setUpdateUser($updateUser)
    {
        $this->updateUser = $updateUser;

        return $this;
    }

}
