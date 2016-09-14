<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ContasPagarReceber;
use AppBundle\Entity\ItensContaPagarReceber;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * ContasPagarReceber controller.
 *
 * @Route("/contaspagarreceber")
 */
class ContasPagarReceberController extends Controller
{
    /**
     * Lists all ContasPagarReceber entities.
     *
     * @Route("/", name="contas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contas = $em->getRepository('AppBundle:ContasPagarReceber')->findBy(array('empresa' => $this->get('app.emp')->getIdEmpresa()));

        return $this->render('contas/index.html.twig', array(
            'contas' => $contas,
        ));
    }

    /**
     * Creates a new ContasPagarReceber entity.
     *
     * @Route("/new", name="contas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $data       = date("d/m/Y");
        $clientes   = $em->createQueryBuilder()
            ->select('c.nome, c.cpfcnpj')
            ->from('AppBundle:Cliente', 'c')
            ->where('c.empresa = :empresa')->setParameter('empresa', $this->get('app.emp')->getIdEmpresa())
            ->getQuery();

        $formValues = [
            'data'       => $data,
            'clientes'   => $clientes

        ];

        return $this->render('contas/new.html.twig' , array('formValues' => $formValues,));
    }

    /**
     * Displays a form to edit an existing Contas entity.
     *
     * @Route("/{id}/edit", name="contas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContasPagarReceber $conta)
    {
        $em = $this->getDoctrine()->getManager();
        $itens = $em->getRepository('AppBundle:ItensContaPagarReceber')->findBy(array('idConta' => $conta->getId()));

        $possuiLancamentos = $this->verificaLancamentosJaPagos($conta, $itens);

        return $this->render('contas/edit.html.twig', array(
            'conta' => $conta,
            'itens' => $itens,
            'possuiLancamentos' => $possuiLancamentos,
        ));

    }

    /**
     * Deletes a Bancos entity.
     *
     * @Route("/{id}", name="bancos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bancos $banco)
    {
        $form = $this->createDeleteForm($banco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($banco);
            $em->flush();
        }

        return $this->redirectToRoute('bancos_index');
    }

    /**
     * Creates a form to delete a Bancos entity.
     *
     * @param Bancos $banco The Bancos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bancos $banco)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bancos_delete', array('id' => $banco->getIdBanco())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     *
     * @Route("/carregaClientes", name="carregaClientes")
     * @Method({"POST"})
     */
    public function carregaClientes(Request $request){
        $valor = $request->request->get('str', null);
        return $this->get('app.emp')->getClientes($valor);
    }

    /**
     * @Route("/SalvarConta", name="SalvarConta")
     * @Method({"POST"})
     */
    public function SalvarConta(Request $request){

        $conta = new ContasPagarReceber();

        $dados = $request->request->get('dados', null);
        $lancs = $request->request->get('lancamentos', null);

        if($dados[0]['value'] == '1'){ //1 = a pagar -- 2 = a receber
            $conta->setTipoConta('PAGAR');
        }else{
            $conta->setTipoConta('RECEBER');
        }

        $conta->setEmpresa($this->get('app.emp')->getIdEmpresa());

        $idAux = $dados[1]['value']; //Pega o id cliente aqui
        $pos = strpos($idAux, ')');
        $pos -= 1;
        $idAux2 = substr($idAux, 1, $pos );
        $idCliente = trim($idAux2[0]);
        $conta->setIdCliente($idCliente);
        $pos2 = strpos($idAux, ':');
        $nome = substr($idAux, $pos+2,$pos2-4);
        $nome = trim($nome);

        $conta->setNome($nome);
        $conta->setNumeroDocumento($dados[3]['value']);
        $conta->setDataLancamento(new \DateTime(date('Y-m-d')));
        $conta->setDataVencimento(new \DateTime(date($this->inverteData($dados[2]['value']))));
        $conta->setValorTotal($dados[4]['value']);
        $conta->setAcrescimos($dados[5]['value']);
        $conta->setDescontos($dados[6]['value']);
//        $conta->setCredito();
//        $conta->setDebito();
//        $conta->setPlano();
        $conta->setHistorico($dados[7]['value']);
        $conta->setPagamento($dados[8]['value']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($conta);
        $em->flush();

        //Cria o itens conta pagar receber
        foreach ($lancs as $lcto){
            
            $itemConta = new ItensContaPagarReceber();

            $itemConta->setIdEmpresa($this->get('app.emp')->getIdEmpresa());
            $itemConta->setIdConta($conta->getId());
            $itemConta->setValor($lcto[1]);
            $itemConta->setAcrescimo($lcto[2]);
            $itemConta->setDescontos($lcto[3]);
            $itemConta->setDataLancamento(new \DateTime(date('Y-m-d')));
            $itemConta->setDataVencimento(new \DateTime(date($this->inverteData($lcto[0]))));
            $itemConta->setHistorico($lcto[4]);

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($itemConta);
            $ema->flush();
            $ema->clear();
        }

        $response['success'] = true;
        return new JsonResponse( $response );
    }

    public function inverteData($data){
        $new_data = explode('/', $data);
        $data = $new_data[1]."/".$new_data[0]."/".$new_data[2];
        return $data;
    }


    /**
     * @Route("/{id}/EditarConta", name="EditarConta")
     * @Method({"GET", "POST"})
     */
    public function EditarConta(Request $request, ContasPagarReceber $conta){

        $dados = $request->request->get('dados', null);
        $lancs = $request->request->get('lancamentos', null);

        if($dados[0]['value'] == '1'){ //1 = a pagar -- 2 = a receber
            $conta->setTipoConta('PAGAR');
        }else{
            $conta->setTipoConta('RECEBER');
        }

        $idAux = $dados[1]['value']; //Pega o id cliente aqui
        $pos = strpos($idAux, ')');
        $pos -= 1;
        $idAux2 = substr($idAux, 1, $pos );
        $idCliente = trim($idAux2[0]);
        $conta->setIdCliente($idCliente);
        $pos2 = strpos($idAux, ':');
        $nome = substr($idAux, $pos+2,$pos2-4);
        $nome = trim($nome);

        $conta->setNome($nome);
        $conta->setNumeroDocumento($dados[3]['value']);
        $conta->setDataVencimento(new \DateTime(date($this->inverteData($dados[2]['value']))));
        $conta->setValorTotal($dados[4]['value']);
        $conta->setAcrescimos($dados[5]['value']);
        $conta->setDescontos($dados[6]['value']);
//        $conta->setCredito();
//        $conta->setDebito();
//        $conta->setPlano();
        $conta->setHistorico($dados[7]['value']);
        $conta->setPagamento($dados[8]['value']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($conta);
        $em->flush();

        //Deleta para criar novamente.
        $itens = $em->getRepository('AppBundle:ItensContaPagarReceber')->findBy(array('idConta' => $conta->getId()));

        foreach ($itens as $iten) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($iten);
            $em->flush();
        }

        //Cria o itens conta pagar receber
        foreach ($lancs as $lcto){

            $itemConta = new ItensContaPagarReceber();

            $itemConta->setIdEmpresa($this->get('app.emp')->getIdEmpresa());
            $itemConta->setIdConta($conta->getId());
            $itemConta->setValor($lcto[1]);
            $itemConta->setAcrescimo($lcto[2]);
            $itemConta->setDescontos($lcto[3]);
            $itemConta->setDataLancamento(new \DateTime(date('Y-m-d')));
            $itemConta->setDataVencimento(new \DateTime(date($this->inverteData($lcto[0]))));
            $itemConta->setHistorico($lcto[4]);

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($itemConta);
            $ema->flush();
            $ema->clear();
        }

        $response['success'] = true;
        return new JsonResponse( $response );
    }

    public function verificaLancamentosJaPagos($conta, $itens){

        $em = $this->getDoctrine()->getManager();

        $temLancamento = false;

        foreach ($itens as $iten) {

            $lancamento = $em->getRepository('AppBundle:Lancamentos')->findOneBy(
                array('empresa' => $this->get('app.emp')->getIdEmpresa(),
                      'iddoc' => $iten->getId(),
                      'numerodoc' => $conta->getNumeroDocumento(),
                      'idcliente' => $conta->getIdCliente(),
                      'tipolanc' => 'CONTAS',
                      'valor' => $iten->getValor() ));

            if(isset($lancamento)){
                $temLancamento = true;
            }
        }

        return $temLancamento;
    }


    /**
     * Displays a form to edit an existing Contas entity.
     *
     * @Route("/{id}/baixa", name="contas_baixa")
     * @Method({"GET", "POST"})
     */
    public function BaixarLancamentos(Request $request, ContasPagarReceber $conta){

        $sql = "select icp.id, icp.valor, icp.acrescimo, icp.desconto, icp.data_vencimento, icp.historico,
                ((icp.valor + icp.acrescimo - icp.desconto) - sum(recicp.valor)) \"saldo\",
                sum(recicp.valor) \"valorPago\", sum(recicp.acrescimo) \"recicp_acres\", sum(recicp.desconto) \"recicp_desc\", 
                recicp.data_lancamento \"data_pagamento\"
                from itens_conta_pagar_receber icp
                left join recebimento_itens_conta_pagar_receber recicp on recicp.id_empresa = icp.id_empresa and recicp.id_item_conta =icp.id
                where icp.id_conta = :idcont
                order by icp.data_vencimento";

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idcont'] = $conta->getId();
        $stmt->execute($params);
        $items = $stmt->fetchAll();

        return $this->render('contas/baixa.html.twig', array(
            'conta' => $conta,
            'items' => $items,
        ));

    }

}
