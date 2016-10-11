<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Cliente;
use AppBundle\Form\ClienteType;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Cliente controller.
 *
 * @Route("/cliente")
 */
class ClienteController extends Controller
{
    private $session;

    public function __construct() {
        $this->session=new Session();
//        die(var_dump($this->session));
    }

    /**
     * Lists all Cliente entities.
     *
     * @Route("/", name="cliente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('cliente/index.html.twig', array());
    }


    /**
     * @Route("/cliente_paginate", name="cliente_paginate")
     */
    public function paginateAction(Request $request)
    {
        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $clientes = $this->search(
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($this->search($filters, 0, false)),
            'recordsTotal' => count($this->search(array(), 0, false))
        );

        foreach ($clientes as $cliente) {
            $output['data'][] = [
                'id' => $cliente->getId(),
                'nome' => $cliente->getNome(),
                'cpfcnpj' => $cliente->getCpfcnpj(),
                'cidade' => $cliente->getCidade(),
                'fone' => $cliente->getFone(),
            ];
        }

        return new JsonResponse($output);
    }

    public function search($data, $page = 0, $max = NULL, $getResult = true)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $query = isset($data['query']) && $data['query']?$data['query']:null;

        $qb->select('u')
           ->from('AppBundle:Cliente', 'u')
           ->andWhere('u.empresa = :idemp')
           ->setParameter('idemp', $this->get('app.emp')->getIdEmpresa())
        ;

        if ($query) {
            $qb
                ->andWhere('u.nome like :query')
                ->setParameter('query', "%".$query."%")
            ;
        }

        if ($max) {
            $preparedQuery = $qb->getQuery()
                ->setMaxResults($max)
                ->setFirstResult($page * $max)
            ;
        } else {
            $preparedQuery = $qb->getQuery();
        }
        return $getResult?$preparedQuery->getResult():$preparedQuery;
    }

    /**
     * Creates a new Cliente entity.
     *
     * @Route("/new", name="cliente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $empresa_tipo = 'CLINICA';
        $em = $this->getDoctrine()->getManager();
        $convenios = $em->getRepository('AppBundle:Convenio')->findBy(
            array('idEmpresa' => $this->get('app.emp')->getIdEmpresa(),
                  'status'  => 1)
        );

        return $this->render('cliente/new.html.twig', array(
            'empresa_tipo' => $empresa_tipo,
            'convenios' => $convenios,
        ));
    }

    /**
     * @Route("/SalvarCliente", name="SalvarCliente")
     * @Method({"POST"})
     */
    public function SalvarCliente(Request $request){
        $dados = $request->request->get('dados', null);

        $cliente = new Cliente();

        $cliente->setCodigoCliente($dados[0]['value']);
        $cliente->setEmpresa($this->get('app.emp')->getIdEmpresa());
        $cliente->setNome($dados[1]['value']);

        $cpfcnpj = $dados[2]['value'];
        if(strpos($cpfcnpj, '.') || strpos($cpfcnpj, '-') || strpos($cpfcnpj, '/'))
            $cliente->setCpfcnpj(preg_replace("/\D+/", "", $cpfcnpj));
        else
            $cliente->setCpfcnpj($dados[2]['value']);

        $cliente->setEMail($dados[3]['value']);
        $cliente->setDataNasc(new \DateTime(date($this->inverteData($dados[4]['value']))));
        $cliente->setFone($dados[5]['value']);
        $cliente->setCelular($dados[6]['value']);
        $cliente->setCep($dados[7]['value']);
        $cliente->setEndereco($dados[8]['value']);
        $cliente->setNumero($dados[9]['value']);
        $cliente->setBairro($dados[10]['value']);
        $cliente->setComplemento($dados[11]['value']);
        $cliente->setCidade($dados[12]['value']);
        $cliente->setCodCid($dados[13]['value']);
        $cliente->setUf($dados[14]['value']);
        $cliente->setSexo($dados[15]['value']);
        $cliente->setProfissao($dados[16]['value']);
        $cliente->setNomeMae($dados[17]['value']);
        $cliente->setEstadoCivil($dados[18]['value']);
        $cliente->setNomeConjuge($dados[19]['value']);
        $cliente->setConvenio($dados[20]['value']);
        $cliente->setIndicacao($dados[21]['value']);
        $cliente->setNomeTitular($dados[22]['value']);
        $cliente->setCpfTitular($dados[23]['value']);
        $cliente->setTipoDependente($dados[24]['value']);

        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            $response['success'] = true;
            $response['idCliente'] = $cliente->getId();

            return new JsonResponse($response);

        }catch (Exception $e){
            $response['success'] = true;
            $response['msg'] = $e;
        }
    }

    /**
     * @Route("/{id}/EditarCliente", name="EditarCliente")
     * @Method({"GET", "POST"})
     */
    public function EditarCliente(Request $request, Cliente $cliente){
        $dados = $request->request->get('dados', null);

        $cliente->setCodigoCliente($dados[0]['value']);
        $cliente->setNome($dados[1]['value']);

        $cpfcnpj = $dados[2]['value'];
        if(strpos($cpfcnpj, '.') || strpos($cpfcnpj, '-') || strpos($cpfcnpj, '/'))
            $cliente->setCpfcnpj(preg_replace("/\D+/", "", $cpfcnpj));
        else
            $cliente->setCpfcnpj($dados[2]['value']);

        $cliente->setEMail($dados[3]['value']);
        $cliente->setDataNasc(new \DateTime(date($this->inverteData($dados[4]['value']))));
        $cliente->setFone($dados[5]['value']);
        $cliente->setCelular($dados[6]['value']);
        $cliente->setCep($dados[7]['value']);
        $cliente->setEndereco($dados[8]['value']);
        $cliente->setNumero($dados[9]['value']);
        $cliente->setBairro($dados[10]['value']);
        $cliente->setComplemento($dados[11]['value']);
        $cliente->setCidade($dados[12]['value']);
        $cliente->setCodCid($dados[13]['value']);
        $cliente->setUf($dados[14]['value']);
        $cliente->setSexo($dados[15]['value']);
        $cliente->setProfissao($dados[16]['value']);
        $cliente->setNomeMae($dados[17]['value']);
        $cliente->setEstadoCivil($dados[18]['value']);
        $cliente->setNomeConjuge($dados[19]['value']);


        $cliente->setConvenio($dados[20]['value']);

        if($dados[21]['value'] == 'on'){
            $cliente->setDependente(true);

            $cliente->setIndicacao($dados[22]['value']);
            $cliente->setNomeTitular($dados[23]['value']);
            $cliente->setCpfTitular($dados[24]['value']);
            $cliente->setTipoDependente($dados[25]['value']);
        }
        else {
            $cliente->setDependente(false);
            $cliente->setIndicacao($dados[21]['value']);
            $cliente->setNomeTitular('');
            $cliente->setCpfTitular('');
            $cliente->setTipoDependente('');
        }


        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            $response['success'] = true;
            $response['idCliente'] = $cliente->getId();

            return new JsonResponse($response);

        }catch (Exception $e){
            $response['success'] = false;
            $response['msg'] = $e;
        }
    }

    public function inverteData($data){
        $new_data = explode('/', $data);
        $data = $new_data[1]."/".$new_data[0]."/".$new_data[2];
        return $data;
    }

     /**
     * Finds and displays a Cliente entity.
     *
     * @Route("/{id}", name="cliente_show")
     * @Method("GET")
     */
    public function showAction(Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);

        return $this->render('cliente/show.html.twig', array(
            'cliente' => $cliente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     * @Route("/{id}/edit", name="cliente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cliente $cliente)
    {
        $empresa_tipo = $this->get('app.emp')->GetTipoEmpresa();

        $em = $this->getDoctrine()->getManager();
        $convenios = $em->getRepository('AppBundle:Convenio')->findBy(
            array('idEmpresa' => $this->get('app.emp')->getIdEmpresa(),
                'status'  => 1)
        );

        return $this->render('cliente/edit.html.twig', array(
            'cliente' => $cliente,
            'empresa_tipo' => $empresa_tipo,
            'convenios' => $convenios,
        ));
    }

    /**
     * Deletes a Cliente entity.
     *
     * @Route("/{id}", name="cliente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cliente $cliente)
    {
        $form = $this->createDeleteForm($cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cliente);
            $em->flush();
        }

        return $this->redirectToRoute('cliente_index');
    }

    /**
     * Creates a form to delete a Cliente entity.
     *
     * @param Cliente $cliente The Cliente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cliente $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cliente_delete', array('id' => $cliente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
}
