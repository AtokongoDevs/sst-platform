<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEventualidad
 *
 * @ORM\Table(name="tipo_eventualidad")
 * @ORM\Entity
 */
class TipoEventualidad
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
     * @ORM\OneToMany (targetEntity="Eventualidad",mappedBy="tipo")
     */
    private $listaEventualidad;

    public function __construct(){
        $this->listaEventualidad = new ArrayCollection();
    }

    public function addEventualidad($eventualidad){
        $this->listaEventualidad->add($eventualidad);
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
     * @return TipoEventualidad
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
     * @param $listaEventualidad
     * @return TipoEventualidad
     */
    public function setListaEventualidad($listaEventualidad){
        $this->listaEventualidad = $listaEventualidad;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getListaEventualidad(){
        return $this->listaEventualidad;
    }
}

