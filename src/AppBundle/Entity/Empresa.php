<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Exception;

/**
 * @Entity
 * @Table(name="empresa")
 */
class Empresa{
    /**
     * @var int
     *
     * @Id
     * @Column (type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @var string
     * @Column (type="string")
     */
    private $ruc;
    /**
     * @var string
     * @Column (type="string")
     */
    private $razon_social;
    /**
     * @var string
     * @Column (type="string")
     */
    private $direccion_fiscal;
    /**
     * @var string
     * @Column (type="string")
     */
    private $nombre_comercial;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity="DetalleUsuario",
     *     mappedBy="empresa")
     */
    private $listaDetalleUsuario = null;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity="Eventualidad",
     *     mappedBy="empresa")
     */
    private $listaEventualidad = null;

    public function __construct(){
        $this->listaDetalleUsuario = new ArrayCollection();
        $this->listaEventualidad = new ArrayCollection();
    }

    public function addDetalleUsuario($detalleUsuario){
        $this->listaDetalleUsuario->add($detalleUsuario);
    }

    public function addEventualidad($eventualidad){
        $this->listaEventualidad->add($eventualidad);
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
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param string $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return string
     */
    public function getNombreComercial()
    {
        return $this->nombre_comercial;
    }

    /**
     * @param string $nombre_comercial
     */
    public function setNombreComercial($nombre_comercial)
    {
        $this->nombre_comercial = $nombre_comercial;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @throws Exception
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime('now',new \DateTimeZone("America/Lima"));
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @throws Exception
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now',new \DateTimeZone("America/Lima"));
    }

    /**
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param string $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    /**
     * @return string
     */
    public function getDireccionFiscal()
    {
        return $this->direccion_fiscal;
    }

    /**
     * @param string $direccion_fiscal
     */
    public function setDireccionFiscal($direccion_fiscal)
    {
        $this->direccion_fiscal = $direccion_fiscal;
    }

    /**
     * @return ArrayCollection
     */
    public function getListaDetalleUsuario()
    {
        return $this->listaDetalleUsuario;
    }

    /**
     * @param ArrayCollection $listaDetalleUsuario
     */
    public function setListaDetalleUsuario($listaDetalleUsuario)
    {
        $this->listaDetalleUsuario = $listaDetalleUsuario;
    }

    /**
     * @return ArrayCollection
     */
    public function getListaEventualidad()
    {
        return $this->listaEventualidad;
    }

    /**
     * @param ArrayCollection $listaEventualidad
     */
    public function setListaEventualidad($listaEventualidad)
    {
        $this->listaEventualidad = $listaEventualidad;
    }


}