<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table (name="usuario")
 */
class Usuario {
    /**
     * @var integer
     * @Id
     * @Column (type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @var string
     * @Column (type="string")
     */
    private $username;
    /**
     * @var string
     * @Column (type="string")
     */
    private $email;
    /**
     * @var string
     * @Column (type="string")
     */
    private $password;
    /**
     * @var bool
     * @Column (type="boolean")
     */
    private $isActive;

    /**
     * @var DetalleUsuario
     * @ORM\OneToOne(
     *     targetEntity="DetalleUsuario",
     *     mappedBy="usuario",
     *     cascade="ALL",
     *     orphanRemoval=true)
     */
    private $detalleUsuario;

    public function __construct()
    {
        $this->isActive = false;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return DetalleUsuario
     */
    public function getDetalleUsuario()
    {
        return $this->detalleUsuario;
    }

    /**
     * @param DetalleUsuario $detalleUsuario
     */
    public function setDetalleUsuario($detalleUsuario)
    {
        $this->detalleUsuario = $detalleUsuario;
    }


}