<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table (name="colaborador")
 */
class Colaborador{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="tipo_documento",type="string")
     */
    private $tipoDocumento;
    /**
     * @var string
     * @ORM\Column(name="numero_documento",type="string")
     */
    private $numeroDocumento;
    /**
     * @var string
     * @ORM\Column(name="nombre",type="string")
     */
    private $nombre;
    /**
     * @var string
     * @ORM\Column(name="genero",type="string")
     */
    private $genero;
    /**
     * @var Area
     * @ORM\ManyToOne(
     *     targetEntity="Area",
     *     inversedBy="listaColaborador")
     */
    private $area;
    /**
     * @var Cargo
     * @ORM\ManyToOne(
     *     targetEntity="Cargo",
     *     inversedBy="listaColaborador")
     */
    private $cargo;
    /**
     * @var Sede
     * @ORM\ManyToOne(
     *     targetEntity="Sede",
     *     inversedBy="listaColaborador")
     */
    private $sede;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Eventualidad",mappedBy="colaborador")
     */
    private $listaEventualidad;

    public function __construct(){
        $this->listaEventualidad = new ArrayCollection();
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
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * @param string $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return string
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @param string $numeroDocumento
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
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
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param string $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param Area $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @return Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return Sede
     */
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * @param Sede $sede
     */
    public function setSede($sede)
    {
        $this->sede = $sede;
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