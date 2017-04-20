<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenda
 *
 * @ORM\Table(name="agenda")
 * @ORM\Entity
 */
class Agenda
{

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="EMPRESA", type="integer")
     */
    private $empresa;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA_INICIO", type="date", nullable=false)
     */
    private $datainicio;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA_FIM", type="date", nullable=true)
     */
    private $datafim;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO_EVENTO", type="string", length=10000, nullable=true)
     */
    private $descricaoevento;

    /**
     * @var string
     *
     * @ORM\Column(name="RESPONSAVEL_EVENTO", type="string", length=255, nullable=true)
     */
    private $responsavelevento;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDCLIENTE", type="integer", nullable=true)
     */
    private $idCliente;

    /**
     * Set DataInicio
     *
     * @param date $datainicio
     *
     * @return Agenda
     */
    public function setDataInicio($datainicio)
    {
        $this->datainicio = $datainicio;

        return $this;
    }

    /**
     * Get DataInicio
     *
     * @return date
     */
    public function getDataInicio()
    {
        return $this->datainicio;
    }

    /**
     * Set DataFim
     *
     * @param date $datafim
     *
     * @return Agenda
     */
    public function setDataFim($datafim)
    {
        $this->datafim = $datafim;

        return $this;
    }

    /**
     * Get DataFim
     *
     * @return date
     */
    public function getDataFim()
    {
        return $this->datafim;
    }

    /**
     * Set DescricaoEvento
     *
     * @param string $descricaoevento
     *
     * @return Agenda
     */
    public function setDescricaoEvento($descricaoevento)
    {
        $this->descricaoevento = $descricaoevento;

        return $this;
    }

    /**
     * Get DescricaoEvento
     *
     * @return string
     */
    public function getDescricaoEvento()
    {
        return $this->descricaoevento;
    }

    /**
     * Set ResponsavelEvento
     *
     * @param string $responsavelevento
     *
     * @return Agenda
     */
    public function setResponsavelEvento($responsavelevento)
    {
        $this->responsavelevento = $responsavelevento;

        return $this;
    }

    /**
     * Get ResponsavelEvento
     *
     * @return string
     */
    public function getResponsavelEvento()
    {
        return $this->responsavelevento;
    }

    /**
     * Set IdCliente
     *
     * @param integer $idCliente
     *
     * @return Agenda
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get IdCliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set Empresa
     *
     * @param integer $empresa
     *
     * @return Agenda
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get Empresa
     *
     * @return integer
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }


}
