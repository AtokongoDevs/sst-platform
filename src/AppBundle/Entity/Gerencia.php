<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Gerencia
 * @ORM\Entity
 * @ORM\Table(name="gerencia")
 */
class Gerencia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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
     *     targetEntity="Area",
     *     mappedBy="gerencia")
     */
    private $listaArea;

    public function __construct(){
        $this->listaArea = new ArrayCollection();
    }

    public function addArea($area){
        $this->listaArea->add($area);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $descripcion
     * @return Gerencia
     */
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(){
        return $this->descripcion;
    }

    /**
     * @param $listaColaborador
     * @return Gerencia
     */
    public function setListaArea($listaArea){
        $this->listaArea = $listaArea;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getListaArea(){
        return $this->listaArea;
    }
}

