<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Entity
 * @ORM\Table(name="cargo")
 */
class Cargo
{
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
     * @var ArrayCollection
     * @ORM\OneToMany (
     *     targetEntity="Colaborador",
     *     mappedBy="cargo")
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
     * @return Cargo
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
     * @return Cargo
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