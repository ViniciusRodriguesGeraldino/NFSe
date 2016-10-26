<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DomCrawler\Crawler;
use Exception;
use Goutte\Client;

/**
 * GetEmpresa controller.
 *
 */
class Biblioteca extends Controller
{

    public function getIdEmpresa()
    {
        $user = $this->getUser();
        return $user->getEmpresa();
    }

    public function getClientes($valor){

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Cliente');
        $query = $repo->createQueryBuilder('a')
            ->select('a.id,a.nome,a.cpfcnpj')
            ->where('a.nome LIKE :val')
            ->andWhere('a.empresa = :emp')
            ->andWhere('a.status = 1')
            ->setParameter('val', '%'.$valor.'%')
            ->setParameter('emp', $this->getIdEmpresa())
            ->getQuery();
        $result = $query->getArrayResult();

        $ret2 = [];

        foreach ($result as $value) {
            $ret2[] = array('id' => $value['id'], 'nome' => $value['nome'], 'cpfcnpj' => $this->formataCpfCnpj($value['cpfcnpj']));
        }

        return new JsonResponse($ret2);
    }

    public function getListaClientes(){

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Cliente');
        $query = $repo->createQueryBuilder('a')
            ->select('a.id,a.nome,a.cpfcnpj,a.codigoCliente')
            ->andWhere('a.status = 1')
            ->andWhere('a.empresa = :emp')
            ->setParameter('emp', $this->getIdEmpresa())
            ->getQuery();
        $result = $query->getArrayResult();

        $ret2 = [];

        foreach ($result as $value) {
            $ret2[] = array(
                    'id' => $value['id'],
                    'nome' => $value['nome'],
                    'cnpj' => $this->formataCpfCnpj($value['cpfcnpj']),
                    'codigoCliente' => $value['codigoCliente']
                );
        }

        return new JsonResponse($ret2);
    }

    public function formataCpfCnpj($codigo){
        $mask = '';

        $codigo = str_replace(".", "", $codigo);
        $codigo = str_replace("-", "", $codigo);
        $codigo = str_replace("/", "", $codigo);

        if(strlen($codigo) == 11){
            $mask = '###.###.###-##';
            return $this->Mask($mask, $codigo);
        }
        else if(strlen($codigo) == 14){
            $mask = '##.###.###/####-##';
            return $this->Mask($mask, $codigo);
        }
        else{
            return $codigo;
        }

    }

    function Mask($mask,$str){

        $str = str_replace(" ","",$str);

        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }

        return $mask;
    }

    function GetTipoEmpresa(){

        $em = $this->getDoctrine()->getManager();
        $tipo = $em->getRepository('AppBundle:Empresa')->findOneBy(
            array('id' => $this->getIdEmpresa(),
                'status'  => 1)
        );
        return $tipo->getEmpresaTipo();
    }


    public function validaCadastro(){

        $idEmpresa = $this->getIdEmpresa();

        $sql = "select e.uf, e.fone, e.e_mail, e.endereco, e.numero, e.bairro, e.cidade, e.cep,
              e.cpfcnpj, e.cmc, e.cpf_prefeitura, e.senha_prefeitura from empresa e where e.id = :idemp";

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idemp'] = $idEmpresa;
        $stmt->execute($params);
        $empresa = $stmt->fetchAll();

        $sql = "select id from cliente where empresa= :idemp limit 1";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idemp'] = $idEmpresa;
        $stmt->execute($params);
        $cliente = $stmt->fetchAll();

        if(
            !isset($empresa[0]['uf']) || trim($empresa[0]['uf'])==='' ||
//            !isset($empresa[0]['fone']) || trim($empresa[0]['fone'])==='' ||
            !isset($empresa[0]['e_mail']) || trim($empresa[0]['e_mail'])==='' ||
            !isset($empresa[0]['endereco']) || trim($empresa[0]['endereco'])==='' ||
            !isset($empresa[0]['numero']) || trim($empresa[0]['numero'])==='' ||
            !isset($empresa[0]['bairro']) || trim($empresa[0]['bairro'])==='' ||
            !isset($empresa[0]['cidade']) || trim($empresa[0]['cidade'])==='' ||
            !isset($empresa[0]['cep']) || trim($empresa[0]['cep'])==='' ||
            !isset($empresa[0]['cpfcnpj']) || trim($empresa[0]['cpfcnpj'])==='' ||
            !isset($empresa[0]['cmc']) || trim($empresa[0]['cmc'])==='' ||
            !isset($empresa[0]['cpf_prefeitura']) || trim($empresa[0]['cpf_prefeitura'])==='' ||
            !isset($empresa[0]['senha_prefeitura']) || trim($empresa[0]['senha_prefeitura'])===''
//            || sizeof($cliente) == 0
            )
        {
                return false;

        }else{
                return true;
        }
    }

    function IsNullOrEmptyString($texto){
        return (!isset($texto) || trim($texto)==='');
    }

    public function unmask($texto) {
        return preg_replace('/[\-\|\(\)\/\.\: ]/', '', $texto);
    }

}
