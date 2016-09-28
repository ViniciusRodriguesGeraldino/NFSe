<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Empresa;
use AppBundle\Form\EmpresaType;

/**
 * Empresa controller.
 *
 * @Route("/empresa")
 */
class EmpresaController extends Controller
{

    /**
     * Displays a form to edit an existing Empresa entity.
     *
     * @Route("/edit", name="empresa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $empresa = $em->getRepository('AppBundle:Empresa')->findOneBy(
            array('id' => $this->get('app.emp')->getIdEmpresa())
        );

//        die(var_dump($empresa));

        return $this->render('empresa/edit.html.twig', array(
            'empresa' => $empresa,
        ));
    }

    /**
     * @Route("/EditarEmpresa", name="EditarEmpresa")
     * @Method({"GET", "POST"})
     */
    public function EditarCliente(Request $request){

        $dados = $request->request->get('dados', null);

        $em = $this->getDoctrine()->getManager();
        $empresa = $em->getRepository('AppBundle:Empresa')->findOneBy(
            array('id' => $this->get('app.emp')->getIdEmpresa())
        );

        $empresa->setNome($dados[0]['value']);
        $empresa->setEMail($dados[1]['value']);
        $empresa->setFone($dados[2]['value']);
        $empresa->setInicioAtividade(new \DateTime(date($dados[3]['value'])));

        if($dados[4]['value'] == 'on')
            $empresa->setSimples('S');
        else
            $empresa->setSimples('N');

        $empresa->setEmpresaTipo($dados[5]['value']);
        $empresa->setCep($dados[6]['value']);
        $empresa->setEndereco($dados[7]['value']);
        $empresa->setNumero($dados[8]['value']);
        $empresa->setBairro($dados[9]['value']);
        $empresa->setComplemento($dados[10]['value']);
        $empresa->setCidade($dados[11]['value']);
        $empresa->setCodCid($dados[12]['value']);
        $empresa->setUf($dados[13]['value']);
        $empresa->setCmc($dados[14]['value']);
        $empresa->setCpfcnpj($dados[15]['value']);
        $empresa->setCpfPrefeitura($dados[15]['value']);
        $empresa->setSenhaPrefeitura($dados[16]['value']);
        $empresa->setProducao($dados[17]['value']);

        try{
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

//            return $this->redirectToRoute('homepage');

            $response['success'] = true;
            return new JsonResponse($response);

        }catch (Exception $e){
            $response['success'] = false;
            $response['msg'] = $e;
            return new JsonResponse($response);
        }
    }

    public function inverteData($data){
        $new_data = explode('/', $data);
        $data = $new_data[1]."/".$new_data[0]."/".$new_data[2];
        return $data;
    }

}
