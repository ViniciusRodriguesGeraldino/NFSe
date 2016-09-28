<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Servico;
use AppBundle\Form\ServicoType;

/**
 * Servico controller.
 *
 * @Route("/servico")
 */
class ServicoController extends Controller
{
    /**
     * Lists all Servico entities.
     *
     * @Route("/", name="servico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servicos = $em->getRepository('AppBundle:Servico')->findBy(array('idEmpresa' => $this->get('app.emp')->getIdEmpresa()));

        return $this->render('servico/index.html.twig', array(
            'servicos' => $servicos,
        ));
    }

    /**
     * Creates a new Servico entity.
     *
     * @Route("/new", name="servico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sql = "select plano, descricao from plano where empresa= :idemp and tipo = :tipo";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idemp'] = $this->get('app.emp')->getIdEmpresa();
        $params['tipo'] = 'S';
        $stmt->execute($params);
        $plano = $stmt->fetchAll();

        $sql = "select * from listaservico";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $listaServicos = $stmt->fetchAll();

        return $this->render('servico/new.html.twig', array(
            'plano' => $plano,
            'listaServicos' => $listaServicos,
        ));
    }

    /**
     * Displays a form to edit an existing Servico entity.
     *
     * @Route("/{id}/edit", name="servico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Servico $servico)
    {
        $deleteForm = $this->createDeleteForm($servico);
        $editForm = $this->createForm('AppBundle\Form\ServicoType', $servico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servico);
            $em->flush();

            return $this->redirectToRoute('servico_edit', array('id' => $servico->getId()));
        }

        return $this->render('servico/edit.html.twig', array(
            'servico' => $servico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    private function getListaPrefeitura($desc) {

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Listaservico');
        $query = $repo->createQueryBuilder('c')
            ->select('c.codigo, c.descricao, c.aliquota')
            ->where('c.descricao LIKE :val')
            ->setParameter('val', '%'.$desc.'%')
            ->getQuery();
        $result = $query->getResult();

        $lista = array();

//        foreach($result as $item){
//            $lista[] = array("codigo" => $item['codigo'], "descricao" => $item['descricao'], "aliquota" => $item['aliquota']);
//        }

        foreach($result as $item){
            $lista[] = "(". $item['codigo'] .")". " ". $item['descricao']." * Aliquota:". $item['aliquota'] . " %";
        }

        return $lista;
    }

    /**
     *
     * @Route("/loadListaServicos", name="loadListaServicos")
     * @Method({"POST"})
     */
    public function loadListaServicos(Request $request){

        $valor = $request->request->get('str', null);

        $array = $this->getListaPrefeitura($valor);

        return new JsonResponse($array);
    }

    /**
     * @Route("/SalvarServico", name="SalvarServico")
     * @Method({"GET", "POST"})
     */
    public function SalvarServico(Request $request){

        $dados = $request->request->get('dados', null);
die(var_dump($dados));
        $servico = new Servico();

        $servico->setCodSerPref($dados[0]['value']);
        $servico->setNome($dados[1]['value']);
        $servico->setValor($dados[2]['value']);
        $servico->setPlano($dados[3]['value']);
        $servico->setPercIss($dados[4]['value']);
        $servico->setPercIrrf($dados[5]['value']);
        $servico->setPercCsl($dados[6]['value']);
        $servico->setPercPis($dados[7]['value']);
        $servico->setPercCofins($dados[8]['value']);

        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            $response['success'] = true;
            return new JsonResponse($response);

        }catch (Exception $e){
            $response['success'] = false;
            $response['msg'] = $e;
            return new JsonResponse($response);
        }
    }
}
