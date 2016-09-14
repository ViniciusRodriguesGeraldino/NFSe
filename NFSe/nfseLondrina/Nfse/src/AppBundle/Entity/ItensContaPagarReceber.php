<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItensContaPagarReceber
 *
 * @ORM\Table(name="itens_conta_pagar_receber")
 * @ORM\Entity
 */
class ItensContaPagarReceber
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
     * @ORM\Column(name="EMPRESA", type="integer", nullable=false)
     */
    private $idEmpresa;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_DOC", type="integer", nullable=false)
     */
    private $idConta;


    /**
     * @var float
     *
     * @ORM\Column(name="VALOR", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var float
     *
     * @ORM\Column(name="ACRESCIMOS", type="float", precision=10, scale=0, nullable=true)
     */
    private $acrescimo;
    /**
     * @var float
     *
     * @ORM\Column(name="DESCONTOS", type="float", precision=10, scale=0, nullable=true)
     */
    private $desconto;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA_LANCAMENTO", type="date", nullable=true)
     */
    private $datalancamento;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA_VENCIMENTO", type="date", nullable=true)
     */
    private $datavencimento;

    /**
     * @var string
     *
     * @ORM\Column(name="HISTORICO", type="string", length=10, nullable=true)
     */
    private $historico;



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
     * Set idEmpresa
     *
     * @param integer $idEmpresa
     *
     * @return ItensContaPagarReceber
     */
    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

    /**
     * Get idEmpresa
     *
     * @return integer
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * Set idConta
     *
     * @param integer $idConta
     *
     * @return ItensContaPagarReceber
     */
    public function setIdConta($idConta)
    {
        $this->idConta = $idConta;

        return $this;
    }

    /**
     * Get idConta
     *
     * @return integer
     */
    public function getIdConta()
    {
        return $this->idConta;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return ItensContaPagarReceber
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set acrescimo
     *
     * @param float $acrescimo
     *
     * @return ItensContaPagarReceber
     */
    public function setAcrescimo($acrescimo)
    {
        $this->acrescimo = $acrescimo;

        return $this;
    }

    /**
     * Get acrescimo
     *
     * @return float
     */
    public function getAcrescimo()
    {
        return $this->acrescimo;
    }

    /**
     * Set desconto
     *
     * @param float $desconto
     *
     * @return ItensContaPagarReceber
     */
    public function setDescontos($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }

    /**
     * Get desconto
     *
     * @return float
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * Set datalancamento
     *
     * @param date $datalancamento
     *
     * @return ItensContaPagarReceber
     */
    public function setDataLancamento($datalancamento)
    {
        $this->datalancamento = $datalancamento;

        return $this;
    }

    /**
     * Get datalancamento
     *
     * @return \DateTime
     */
    public function getDataLancamento()
    {
        return $this->datalancamento;
    }


    /**
     * Set datavencimento
     *
     * @param date $datavencimento
     *
     * @return ItensContaPagarReceber
     */
    public function setDataVencimento($datavencimento)
    {
        $this->datavencimento = $datavencimento;

        return $this;
    }

    /**
     * Get datavencimento
     *
     * @return \DateTime
     */
    public function getDataVencimento()
    {
        return $this->datavencimento;
    }

    /**
     * Set historico
     *
     * @param string $historico
     *
     * @return ItensContaPagarReceber
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get historico
     *
     * @return string
     */
    public function getHistorico()
    {
        return $this->historico;
    }

}
