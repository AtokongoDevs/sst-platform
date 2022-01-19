<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="area")
 */
class Area{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany (
     *     targetEntity="Colaborador",
     *     mappedBy="area")
     */
    private $listaColaborador;

    /**
     * @var int
     *
     * @ORM\ManyToOne (
     *     targetEntity="Gerencia",
     *     inversedBy="listaArea")
     */
    private $gerencia;

    public function __construct(){
        $this->listaColaborador = new ArrayCollection();
    }

    public function addColaborador($colaborador){
        $this->listaColaborador->add($colaborador);
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return ArrayCollection
     */
    public function getListaColaborador()
    {
        return $this->listaColaborador;
    }

    /**
     * @param ArrayCollection $listaColaborador
     */
    public function setListaColaborador($listaColaborador)
    {
        $this->listaColaborador = $listaColaborador;
    }

    /**
     * @return int
     */
    public function getGerencia()
    {
        return $this->gerencia;
    }

    /**
     * @param int $gerencia
     */
    public function setGerencia($gerencia)
    {
        $this->gerencia = $gerencia;
    }


}