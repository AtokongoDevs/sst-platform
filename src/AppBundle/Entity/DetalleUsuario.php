<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Exception;

/**
 * @Entity @ORM\Table(name="detalle_usuario")
 */
class DetalleUsuario{
    /**
     * @var int
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @var string
     * @Column (type="string")
     */
    private $nombre;
    /**
     * @var string
     * @Column (type="string")
     */
    private $apellido;
    /**
     * @var string
     * @Column (type="string")
     */
    private $cargo;
    /**
     * @var DateTime
     * @Column (type="datetime")
     */
    private $created_at;
    /**
     * @var DateTime
     * @Column (type="datetime")
     */
    private $updated_at;

    /**
     * @var Usuario
     * @ORM\OneToOne(
     *     targetEntity="Usuario",
     *     inversedBy="detalleUsuario",
     *     cascade="ALL")
     */
    private $usuario;

    /**
     * @var Empresa
     * @ManyToOne (
     *     targetEntity="Empresa",
     *     inversedBy="listaDetalleUsuario")
     */
    private $empresa;

    public function setEmpresa($empresa){
        $this->empresa = $empresa;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param string $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @throws Exception
     */
    public function setCreatedAt()
    {
        $this->created_at = new \DateTime('now',new \DateTimeZone("America/Lima"));
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @throws Exception
     */
    public function setUpdatedAt()
    {
        $this->updated_at = new \DateTime('now',new \DateTimeZone("America/Lima"));
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


}