<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Exception;

/**
 * Eventualidad
 * @ORM\Entity
 * @ORM\Table(name="eventualidad")
 */
class Eventualidad
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
     * @ORM\Column(name="lugar_accidente", type="string", length=255)
     */
    private $lugarAccidente;

    /**
     * @var string
     *
     * @ORM\Column(name="parte_afectada", type="string", length=255)
     */
    private $parteAfectada;

    /**
     * @var string
     *
     * @ORM\Column(name="lado_afectado", type="string", length=255)
     */
    private $ladoAfectado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="medidas", type="string", length=255)
     */
    private $medidas;

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
     * @var Colaborador
     *
     * @ORM\ManyToOne (targetEntity="Colaborador",inversedBy="listaEventualidad")
     */
    private $colaborador;
    /**
     * @var TipoEventualidad
     *
     * @ORM\ManyToOne (targetEntity="TipoEventualidad",inversedBy="listaEventualidad")
     */
    private $tipo;
    /**
     * @var Status
     *
     * @ORM\ManyToOne (targetEntity="Status",inversedBy="listaEventualidad")
     */
    private $status;

    /**
     * @var Empresa
     * @ManyToOne (
     *     targetEntity="Empresa",
     *     inversedBy="listaEventualidad")
     */
    private $empresa;

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
    public function getLugarAccidente()
    {
        return $this->lugarAccidente;
    }

    /**
     * @param string $lugarAccidente
     */
    public function setLugarAccidente($lugarAccidente)
    {
        $this->lugarAccidente = $lugarAccidente;
    }

    /**
     * @return string
     */
    public function getParteAfectada()
    {
        return $this->parteAfectada;
    }

    /**
     * @param string $parteAfectada
     */
    public function setParteAfectada($parteAfectada)
    {
        $this->parteAfectada = $parteAfectada;
    }

    /**
     * @return string
     */
    public function getLadoAfectado()
    {
        return $this->ladoAfectado;
    }

    /**
     * @param string $ladoAfectado
     */
    public function setLadoAfectado($ladoAfectado)
    {
        $this->ladoAfectado = $ladoAfectado;
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
     * @return string
     */
    public function getMedidas()
    {
        return $this->medidas;
    }

    /**
     * @param string $medidas
     */
    public function setMedidas($medidas)
    {
        $this->medidas = $medidas;
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
     * @return Colaborador
     */
    public function getColaborador()
    {
        return $this->colaborador;
    }

    /**
     * @param Colaborador $colaborador
     */
    public function setColaborador($colaborador)
    {
        $this->colaborador = $colaborador;
    }

    /**
     * @return TipoEventualidad
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param TipoEventualidad $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return Empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param Empresa $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

}

