<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecebimentoItensContaPagarReceber
 *
 * @ORM\Table(name="recebimento_itens_conta_pagar_receber")
 * @ORM\Entity
 */
class RecebimentoItensContaPagarReceber
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
    private $idItemConta;


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
     * @var string
     *
     * @ORM\Column(name="HISTORICO", type="string", length=10, nullable=true)
     */
    private $historico;

    /**
     * @var string
     *
     * @ORM\Column(name="HISTORICO", type="string", length=10, nullable=true)
     */
    private $formaPagamento;

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
     * @return RecebimentoItensContaPagarReceber
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
     * Set idItemConta
     *
     * @param integer $idItemConta
     *
     * @return RecebimentoItensContaPagarReceber
     */
    public function setIdItemConta($idItemConta)
    {
        $this->idItemConta = $idItemConta;

        return $this;
    }

    /**
     * Get idItemConta
     *
     * @return integer
     */
    public function getIdItemConta()
    {
        return $this->idItemConta;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return RecebimentoItensContaPagarReceber
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
     * @return RecebimentoItensContaPagarReceber
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
     * @return RecebimentoItensContaPagarReceber
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
     * @return RecebimentoItensContaPagarReceber
     */
    public function setDataLancamento($datalancamento)
    {
        $this->datalancamento = $datalancamento;

        return $this;
    }

    /**
     * Get datalancamento
     *
     * @return string
     */
    public function getDataLancamento()
    {
        return $this->datalancamento;
    }

    /**
     * Set historico
     *
     * @param string $historico
     *
     * @return RecebimentoItensContaPagarReceber
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get formaPagamento
     *
     * @return string
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    /**
     * Set formaPagamento
     *
     * @param string $formaPagamento
     *
     * @return RecebimentoItensContaPagarReceber
     */
    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;

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
