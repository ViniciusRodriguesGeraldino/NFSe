<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * GetEmpresa controller.
 *
 */
class Biblioteca extends Controller
{

    public function getIdEmpresa()
    {
          return 1;
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
            ->where('a.status = 1')
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

        if($codigo.$length = 11){
            $mask = '###.###.###-##';
            return $this->Mask($mask, $codigo);
        }
        else if($codigo.$length = 14){
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
}
