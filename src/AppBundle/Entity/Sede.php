<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sede
 * @ORM\Entity
 * @ORM\Table(name="sede")
 */
class Sede
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
     *     targetEntity="Colaborador",
     *     mappedBy="sede")
     */
    private $listaColaborador;

    public function __construct(){
        $this->listaColaborador = new ArrayCollection();
    }

    public function addColaborador($colaborador){
        $this->listaColaborador->add($colaborador);
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
     * @return Sede
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
     * @return Sede
     */
    public function setListaColaborador($listaColaborador){
        $this->listaColaborador = $listaColaborador;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getListaColaborador(){
        return $this->listaColaborador;
    }
}

