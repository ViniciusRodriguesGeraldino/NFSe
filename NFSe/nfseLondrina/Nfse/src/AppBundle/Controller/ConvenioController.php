<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Convenio;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Convenio controller.
 *
 * @Route("/convenio")
 */
class ConvenioController extends Controller
{
    /**
     * Lists all Convenio entities.
     *
     * @Route("/", name="convenio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $convenios = $em->getRepository('AppBundle:Convenio')->findBy(array('idEmpresa' => $this->get('app.emp')->getIdEmpresa()));

        return $this->render('convenio/index.html.twig', array(
            'convenios' => $convenios,
        ));
    }

    /**
     * Creates a new Convenio entity.
     *
     * @Route("/new", name="convenio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        return $this->render('convenio/new.html.twig', array());
    }

    /**
     * Displays a form to edit an existing Convenio entity.
     *
     * @Route("/{id}/edit", name="convenio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Convenio $convenio)
    {
        return $this->render('convenio/edit.html.twig', array(
            'convenio' => $convenio,
        ));
    }

    /**
 * @Route("/SalvarConvenio", name="SalvarConvenio")
 * @Method({"GET", "POST"})
 */
    public function SalvarConvenio(Request $request){
        $dados = $request->request->get('dados', null);

        $convenio = new Convenio();

        $convenio->setIdEmpresa($this->get('app.emp')->getIdEmpresa());

        $cpfcnpj = $dados[1]['value'];

        if(strpos($cpfcnpj, '.') || strpos($cpfcnpj, '-') || strpos($cpfcnpj, '/'))
            $convenio->setCpfCnpj(preg_replace("/\D+/", "", $cpfcnpj));
        else
            $convenio->setCpfCnpj($dados[2]['value']);


        $convenio->setNomeConvenio($dados[0]['value']);
        $convenio->setInscricaoMun($dados[2]['value']);
        $convenio->setInscricaoEst($dados[3]['value']);
        $convenio->setCep($dados[4]['value']);
        $convenio->setEndereco($dados[5]['value']);
        $convenio->setNumero($dados[6]['value']);
        $convenio->setCidade($dados[7]['value']);
        $convenio->setCodCid($dados[8]['value']);
        $convenio->setUf($dados[9]['value']);
        $convenio->setBairro($dados[10]['value']);
        $convenio->setComplemento($dados[11]['value']);
        $convenio->setEmail($dados[12]['value']);
        $convenio->setFone($dados[13]['value']);
        $convenio->setStatus(1);

        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($convenio);
            $em->flush();

            $response['success'] = true;
            $response['idConvenio'] = $convenio->getId();
            return new JsonResponse($response);

        }catch (Exception $e){
            $response['success'] = true;
            $response['msg'] = $e;
        }
    }

    /**
     * @Route("/{id}/EditarConvenio", name="EditarConvenio")
     * @Method({"GET", "POST"})
     */
    public function EditarConvenio(Request $request, Convenio $convenio){
        $dados = $request->request->get('dados', null);

        $cpfcnpj = $dados[1]['value'];

        if(strpos($cpfcnpj, '.') || strpos($cpfcnpj, '-') || strpos($cpfcnpj, '/'))
            $convenio->setCpfCnpj(preg_replace("/\D+/", "", $cpfcnpj));
        else
            $convenio->setCpfCnpj($dados[2]['value']);


        $convenio->setNomeConvenio($dados[0]['value']);
        $convenio->setInscricaoMun($dados[2]['value']);
        $convenio->setInscricaoEst($dados[3]['value']);
        $convenio->setCep($dados[4]['value']);
        $convenio->setEndereco($dados[5]['value']);
        $convenio->setNumero($dados[6]['value']);
        $convenio->setCidade($dados[7]['value']);
        $convenio->setCodCid($dados[8]['value']);
        $convenio->setUf($dados[9]['value']);
        $convenio->setBairro($dados[10]['value']);
        $convenio->setComplemento($dados[11]['value']);
        $convenio->setEmail($dados[12]['value']);
        $convenio->setFone($dados[13]['value']);
        $convenio->setStatus(1);

        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($convenio);
            $em->flush();

            $response['success'] = true;
            return new JsonResponse($response);

        }catch (Exception $e){
            $response['success'] = true;
            $response['msg'] = $e;
        }
    }

}
