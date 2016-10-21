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

        return $this->render('empresa/edit.html.twig', array(
            'empresa' => $empresa,
        ));
    }

    /**
     * @Route("/EditarEmpresa", name="EditarEmpresa")
     * @Method({"GET", "POST"})
     */
    public function EditarEmpresa(Request $request){

        $dados = $request->request->get('dados', null);

        $em = $this->getDoctrine()->getManager();
        $empresa = $em->getRepository('AppBundle:Empresa')->findOneBy(
            array('id' => $this->get('app.emp')->getIdEmpresa())
        );

        $empresa->setNome($dados['empresa_nome']);
        $empresa->setEMail($dados['empresa_email']);
        $empresa->setFone($dados['empresa_fone']);

        $empresa->setInicioAtividade(new \DateTime(date($dados['empresa_inicio_atividade'])));

        if (array_key_exists("check_switch", $dados)) {
            $simples = 'S';
        }else{
            $simples = 'N';
        }
        $empresa->setSimples($simples);

        $empresa->setEmpresaTipo($dados['empresa_tipo']);
        $empresa->setCep($dados['empresa_cep']);
        $empresa->setEndereco($dados['empresa_endereco']);
        $empresa->setNumero($dados['empresa_numero']);
        $empresa->setBairro($dados['empresa_bairro']);
        $empresa->setComplemento($dados['empresa_complemento']);
        $empresa->setCidade($dados['empresa_cidade']);
        $empresa->setCodCid($dados['empresa_cod_cidade']);
        $empresa->setUf($dados['empresa_uf']);

        $empresa->setCmc($dados['empresa_cmc']);
        $empresa->setCpfcnpj($dados['empresa_cpf_prefeitura']);
        $empresa->setCpfPrefeitura($dados['empresa_cpf_prefeitura']);
        $empresa->setSenhaPrefeitura($dados['empresa_senha_prefeitura']);
        $empresa->setProducao($dados['empresa_tipo_emissao']);

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

    public function inverteData($data){
        $new_data = explode('/', $data);
        $data = $new_data[1]."/".$new_data[0]."/".$new_data[2];
        return $data;
    }

    /**
     * @Route("/completa_cadastro", name="completa_cadastro")
     * @Method({"GET", "POST"})
     */
    public function completa_cadastro(){

        $idEmpresa = $this->get('app.emp')->getIdEmpresa();

        $em = $this->getDoctrine()->getManager();
        $empresa= $em->getRepository('AppBundle:Empresa')->findOneBy(
            array('id' => $idEmpresa,
                'status'  => 1)
        );

        $sql = "select id from cliente where empresa= :idemp limit 1";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $params['idemp'] = $idEmpresa;
        $stmt->execute($params);
        $cliente = $stmt->fetchAll();

        return $this->render('empresa/cadastro.html.twig', array(
            'empresa' => $empresa,
            'cliente' => $cliente,
        ));

    }

}
