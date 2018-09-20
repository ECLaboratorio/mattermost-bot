<?php
/**
 * Created by PhpStorm.
 * User: isoria
 * Date: 11/09/18
 * Time: 14:06
 */

namespace MattermostBot\Api;

class User {
    public $id;
    public $create_at;
    public $update_at;
    public $delete_at;
    public $username;
    public $email;
    public $nickname;
    public $first_name;
    public $last_name;
    public $position;
    public $last_picture_update;

    public function populateFromApi($userObject){
        $this->id = $userObject->id;
        $this->create_at = $userObject->create_at;
        $this->update_at = $userObject->update_at;
        $this->delete_at = $userObject->delete_at;
        $this->username = $userObject->username;
        $this->email = $userObject->email;
        $this->nickname = $userObject->nickname;
        $this->first_name = $userObject->first_name;
        $this->last_name = $userObject->last_name;
        $this->position = $userObject->position;
        $this->last_picture_update = $userObject->last_picture_update;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param mixed $create_at
     * @return User
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     * @return User
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleteAt()
    {
        return $this->delete_at;
    }

    /**
     * @param mixed $delete_at
     * @return User
     */
    public function setDeleteAt($delete_at)
    {
        $this->delete_at = $delete_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
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
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     * @return User
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     * @return User
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     * @return User
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastPictureUpdate()
    {
        return $this->last_picture_update;
    }

    /**
     * @param mixed $last_picture_update
     * @return User
     */
    public function setLastPictureUpdate($last_picture_update)
    {
        $this->last_picture_update = $last_picture_update;
        return $this;
    }



}