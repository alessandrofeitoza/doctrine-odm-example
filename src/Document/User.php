<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 15/09/18
 * Time: 09:07
 */

namespace Application\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Field;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Id;
use Doctrine\ODM\MongoDB\Mapping\Annotations\UniqueIndex;
use Doctrine\ODM\MongoDB\Mapping\Annotations\HasLifecycleCallbacks;
use Documents\Address;


/**
 * Class User
 * @package Application\Document
 * @ODM\Document(collection="user")
 * @HasLifecycleCallbacks()
 */
class User
{
    /**
     * @var string
     * @Id(name="id", type="string")
     */
    private $id;

    /**
     * @var string
     * @Field(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     * @Field(name="email", type="string") @UniqueIndex()
     */
    private $email;

    /**
     * @var string
     * @Field(name="password", type="string")
     */
    private $password;

    /**
     * @var array
     * @Field(type="collection")
     */
    private $roles = [];


    /**
     * @var \DateTime
     * @Field(type="date", nullable=true)
     */
    private $registered;

    /**
     * @var \DateTime
     * @Field(type="date", nullable=true)
     */
    private $updated;

    /**
     * @ODM\PrePersist()
     */
    public function prePersist()
    {
        $this->registered = new \DateTime();
    }

    /**
     * @ODM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->updated = new \DateTime();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param \DateTime $registered
     * @return User
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }



}