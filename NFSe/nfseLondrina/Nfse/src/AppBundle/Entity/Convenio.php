<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenio
 *
 * @ORM\Table(name="clinica_convenio")
 * @ORM\Entity
 */
class Convenio
{
    /**
     * @var string
     *
     * @ORM\Column(name="FONE", type="string", length=15, nullable=true)
     */
    private $fone;

    /**
     * @var string
     *
     * @ORM\Column(name="E_MAIL", type="string", length=60, nullable=true)
     */
    private $email;


    /**
     * @var string
     *
     * @ORM\Column(name="UF", type="string", length=2, nullable=true)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="CEP", type="string", length=9, nullable=true)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="COD_CID", type="string", length=7, nullable=true)
     */
    private $codCid;

    /**
     * @var string
     *
     * @ORM\Column(name="CIDADE", type="string", length=40, nullable=true)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="BAIRRO", type="string", length=40)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="COMPLEMENTO", type="string", length=40)
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="NUMERO", type="string", length=6)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="ENDERECO", type="string", length=40)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME_CONVENIO", type="string", length=40)
     */
    private $nomeConvenio;

    /**
     * @var string
     *
     * @ORM\Column(name="INSCRICAO_EST", type="string", length=20, nullable=true)
     */
    private $inscricaoEst;

    /**
     * @var string
     *
     * @ORM\Column(name="INSCRICAO_MUN", type="string", length=20, nullable=true)
     */
    private $inscricaoMun;

    /**
     * @var string
     *
     * @ORM\Column(name="CPFCNPJ", type="string", length=18, nullable=true)
     */
    private $cpfCnpj;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_EMPRESA", type="integer", nullable=true)
     */
    private $idEmpresa;

    /**
     * @var integer
     *
     * @ORM\Column(name="STATUS", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set cpfCnpj
     *
     * @param string $cpfCnpj
     *
     * @return Convenio
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;

        return $this;
    }

    /**
     * Get cpfCnpj
     *
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * Set inscricaoMun
     *
     * @param string $inscricaoMun
     *
     * @return Convenio
     */
    public function setInscricaoMun($inscricaoMun)
    {
        $this->inscricaoMun = $inscricaoMun;

        return $this;
    }

    /**
     * Get inscricaoMun
     *
     * @return string
     */
    public function getInscricaoMun()
    {
        return $this->inscricaoMun;
    }

    /**
     * Set inscricaoEst
     *
     * @param string $inscricaoEst
     *
     * @return Convenio
     */
    public function setInscricaoEst($inscricaoEst)
    {
        $this->inscricaoEst = $inscricaoEst;

        return $this;
    }

    /**
     * Get inscricaoEst
     *
     * @return string
     */
    public function getInscricaoEst()
    {
        return $this->inscricaoEst;
    }

    /**
     * Set nomeConvenio
     *
     * @param string $nomeConvenio
     *
     * @return Convenio
     */
    public function setNomeConvenio($nomeConvenio)
    {
        $this->nomeConvenio = $nomeConvenio;

        return $this;
    }

    /**
     * Get nomeConvenio
     *
     * @return string
     */
    public function getNomeConvenio()
    {
        return $this->nomeConvenio;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Convenio
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Convenio
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     *
     * @return Convenio
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Convenio
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Convenio
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set codCid
     *
     * @param string $codCid
     *
     * @return Convenio
     */
    public function setCodCid($codCid)
    {
        $this->codCid = $codCid;

        return $this;
    }

    /**
     * Get codCid
     *
     * @return string
     */
    public function getCodCid()
    {
        return $this->codCid;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return Convenio
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set cep
     *
     * @param string $cep
     *
     * @return Convenio
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set fone
     *
     * @param string $fone
     *
     * @return Convenio
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Get fone
     *
     * @return string
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Convenio
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Get idEmpresa
     *
     * @return integer
     */
    public function getIdEmpresa()
    {
        return $this->id;
    }

    /**
     * Set idEmpresa
     *
     * @param integer $idEmpresa
     *
     * @return Convenio
     */
    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Convenio
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


}
