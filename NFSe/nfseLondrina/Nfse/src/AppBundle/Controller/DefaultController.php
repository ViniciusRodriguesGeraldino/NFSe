<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BeSimple;
use BeSimple\SoapClient;
use Doctrine\ORM\Query\ResultSetMapping;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

//        $valor = $this->get('app.token_authenticator')->start($request);
//        $valor2 = $this->get('app.token_authenticator')->getCredentials($request);

        $totalNotas  = $this->getTotalNFesEmitidas();
        $valorReceberHoje = $this->getMovimentacaoSaidaDiaria();
        $valorPagarHoje  = $this->getMovimentacaoEntradaDiaria();
        $valorTotalEntradas = $this->getMovimentacaoTotalEntrada();
        $valorTotalSaidas = $this->getMovimentacaoTotalSaida();

        $valorReceberHoje = $valorReceberHoje != null ? $valorReceberHoje : '0,00';
        $valorPagarHoje = $valorPagarHoje != null ? $valorPagarHoje : '0,00';
        $valorTotalEntradas = $valorTotalEntradas != null ? $valorTotalEntradas : '0,00';
        $valorTotalSaidas = $valorTotalSaidas != null ? $valorTotalSaidas : '0,00';

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'totalNotas' => $totalNotas,
            'valorReceberHoje' => $valorReceberHoje,
            'valorPagarHoje' => $valorPagarHoje,
            'valorTotalEntradas' => $valorTotalEntradas,
            'valorTotalSaidas' => $valorTotalSaidas,

        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $user = $this->getUser();

        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('homepage');
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
            ->getLastAuthenticationError();

        return $this->render('login/login.html.twig', [
            'error' => $exception ? $exception->getMessage() : NULL,
        ]);
    }

    public function getTotalNFesEmitidas(){

        $idEmp = $this->get('app.emp')->getIdEmpresa();

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();

        $qb ->select('count(n.id)')
            ->from('AppBundle:Nota', 'n')
            ->where('n.empresa = :emp')
            ->andWhere('n.data = :dataHoje')
            ->setParameter('emp', $idEmp)
            ->setParameter('dataHoje', date('Y-m-d'));

        $result = $qb->getQuery()->getResult();

        return $result[0][1];
    }

    public function getMovimentacaoSaidaDiaria(){

    }

    public function getMovimentacaoEntradaDiaria(){

    }

    public function getMovimentacaoTotalEntrada(){

        $sql = "select 	(coalesce(sum(icp.valor),0) + coalesce(sum(icp.acrescimo),0)  - coalesce(sum(icp.desconto),0)  
		- coalesce(sum(recicp.valor),0)  + coalesce(sum(recicp.acrescimo),0)  - coalesce(sum(recicp.desconto),0)) \"total\"
        from itens_conta_pagar_receber icp
        left join recebimento_itens_conta_pagar_receber recicp on recicp.id_empresa = icp.id_empresa and recicp.id_item_conta =icp.id
        inner join contaspagarreceber cpr on cpr.empresa = icp.id_empresa and cpr.id = icp.id_conta
        where icp.id_empresa = 1 and cpr.tipo_conta = 'PAGAR'";

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idemp'] = $this->get('app.emp')->getIdEmpresa();
        $stmt->execute($params);
        $items = $stmt->fetchAll();

        return $items[0]['total'];
    }

    public function getMovimentacaoTotalSaida(){
        $sql = "select 	(coalesce(sum(icp.valor),0) + coalesce(sum(icp.acrescimo),0)  - coalesce(sum(icp.desconto),0)  
		- coalesce(sum(recicp.valor),0)  + coalesce(sum(recicp.acrescimo),0)  - coalesce(sum(recicp.desconto),0)) \"total\"
        from itens_conta_pagar_receber icp
        left join recebimento_itens_conta_pagar_receber recicp on recicp.id_empresa = icp.id_empresa and recicp.id_item_conta =icp.id
        inner join contaspagarreceber cpr on cpr.empresa = icp.id_empresa and cpr.id = icp.id_conta
        where icp.id_empresa = 1 and cpr.tipo_conta = 'RECEBER'";

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idemp'] = $this->get('app.emp')->getIdEmpresa();
        $stmt->execute($params);
        $items = $stmt->fetchAll();

        return $items[0]['total'];
    }
}
