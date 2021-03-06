<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContasPagarReceber
 *
 * @ORM\Table(name="contaspagarreceber")
 * @ORM\Entity
 */
class ContasPagarReceber
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
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO_CONTA", type="string", length=10, nullable=false)
     */
    private $tipoConta;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CLIENTE", type="integer", nullable=false)
     */
    private $idCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=60, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERO_DOCUMENTO", type="integer", nullable=false)
     */
    private $numeroDocumento;

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
     * @var float
     *
     * @ORM\Column(name="VALOR_TOTAL", type="float", precision=10, scale=0, nullable=true)
     */
    private $valorTotal;

    /**
     * @var float
     *
     * @ORM\Column(name="ACRESCIMOS", type="float", precision=10, scale=0, nullable=true)
     */
    private $acrescimos;
    /**
     * @var float
     *
     * @ORM\Column(name="DESCONTOS", type="float", precision=10, scale=0, nullable=true)
     */
    private $descontos;

    /**
     * @var integer
     *
     * @ORM\Column(name="CREDITO", type="integer", nullable=false)
     */
    private $credito;

    /**
     * @var integer
     *
     * @ORM\Column(name="DEBITO", type="integer", nullable=false)
     */
    private $debito;

    /**
     * @var string
     *
     * @ORM\Column(name="HISTORICO", type="string", length=10, nullable=true)
     */
    private $historico;

    /**
     * @var string
     *
     * @ORM\Column(name="PLANO", type="string", length=10, nullable=false)
     */
    private $plano;


    /**
     * @var integer
     *
     * @ORM\Column(name="PAGAMENTO", type="integer", nullable=false)
     */
    private $pagamento;


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
     * Set empresa
     *
     * @param integer $empresa
     *
     * @return ContasPagarReceber
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return integer
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set $tipoConta
     *
     * @param string $tipoConta
     *
     * @return ContasPagarReceber
     */
    public function setTipoConta($tipoConta)
    {
        $this->tipoConta = $tipoConta;

        return $this;
    }

    /**
     * Get tipoConta
     *
     * @return string
     */
    public function getTipoConta()
    {
        return $this->tipoConta;
    }

     /**
     * Set idCliente
     *
     * @param integer $idCliente
     *
     * @return ContasPagarReceber
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set pagamento
     *
     * @param integer $pagamento
     *
     * @return ContasPagarReceber
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;

        return $this;
    }

    /**
     * Get pagamento
     *
     * @return integer
     */
    public function getPagamento()
    {
        return $this->pagamento;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return ContasPagarReceber
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     *
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set numeroDocumento
     *
     * @param integer $numeroDocumento
     *
     * @return ContasPagarReceber
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    /**
     * Get numeroDocumento
     *
     * @return integer
     *
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set valorTotal
     *
     * @param float $valorTotal
     *
     * @return ContasPagarReceber
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return float
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * Set acrescimos
     *
     * @param float $acrescimos
     *
     * @return ContasPagarReceber
     */
    public function setAcrescimos($acrescimos)
    {
        $this->acrescimos = $acrescimos;

        return $this;
    }

    /**
     * Get acrescimos
     *
     * @return float
     */
    public function getAcrescimos()
    {
        return $this->acrescimos;
    }

    /**
     * Set descontos
     *
     * @param float $descontos
     *
     * @return ContasPagarReceber
     */
    public function setDescontos($descontos)
    {
        $this->descontos = $descontos;

        return $this;
    }

    /**
     * Get descontos
     *
     * @return float
     */
    public function getDescontos()
    {
        return $this->descontos;
    }

    /**
     * Set datalancamento
     *
     * @param date $datalancamento
     *
     * @return ContasPagarReceber
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
     * @return ContasPagarReceber
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
     * @return ContasPagarReceber
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

    /**
     * Set credito
     *
     * @param integer $credito
     *
     * @return ContasPagarReceber
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;

        return $this;
    }

    /**
     * Get credito
     *
     * @return integer
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * Set debito
     *
     * @param integer $debito
     *
     * @return ContasPagarReceber
     */
    public function setDebito($debito)
    {
        $this->debito = $debito;

        return $this;
    }

    /**
     * Get debito
     *
     * @return integer
     */
    public function getDebito()
    {
        return $this->debito;
    }

    /**
     * Set plano
     *
     * @param string $plano
     *
     * @return ContasPagarReceber
     */
    public function setPlano($plano){
        $this->plano = $plano;

        return $this;
    }

    /**
     * Get plano
     *
     * @return string
     */
    public function getPlano()
    {
        return $this->plano;
    }

}
