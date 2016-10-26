<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cliente;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Empresa;
use AppBundle\Entity\Servico;
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

        $sql = "select * from listaservico";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $listaServicos = $stmt->fetchAll();

        return $this->render('empresa/cadastro.html.twig', array(
            'empresa' => $empresa,
            'cliente' => $cliente,
            'listaServicos' => $listaServicos,
        ));
    }


    /**
     * @Route("/registra_cadastro", name="registra_cadastro")
     * @Method({"POST"})
     */
    public function registra_cadastro(Request $request){

        $passo = $request->request->get('passo');
        $idEmpresa = $this->get('app.emp')->getIdEmpresa();
        $em = $this->getDoctrine()->getManager();
        $empresa= $em->getRepository('AppBundle:Empresa')->findOneBy(
            array('id' => $idEmpresa,
                'status'  => 1)
        );

        if($passo == 'passo1'){

            $empresa->setCep($request->request->get('cep'));
            $empresa->setEndereco($request->request->get('endereco'));
            $empresa->setNumero($request->request->get('numero'));
            $empresa->setBairro($request->request->get('bairro'));
            $empresa->setCidade($request->request->get('cidade'));
            $empresa->setCodCid($request->request->get('codCidade'));
            $empresa->setUf($request->request->get('uf'));

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

        }else if($passo == 'passo2'){

            $empresa->setCpfPrefeitura($request->request->get('cpfprefeitura'));
            $empresa->setSenhaPrefeitura($request->request->get('senhaprefeitura'));
            $empresa->setCmc($request->request->get('cmc'));
            $empresa->setProducao($request->request->get('tipoemissao'));

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

        }else if($passo == 'passo3'){

            $cliente = new Cliente();
            $cliente->setEmpresa($idEmpresa);
            $cliente->setNome($request->request->get('nomeCliente'));
            $cliente->setCep($request->request->get('cepCliente'));
            $cliente->setEndereco($request->request->get('enderecoCliente'));
            $cliente->setNumero($request->request->get('numeroCliente'));
            $cliente->setBairro($request->request->get('bairroCliente'));
            $cliente->setCidade($request->request->get('cidadeCliente'));
            $cliente->setCodCid($request->request->get('codCidCliente'));
            $cliente->setUf($request->request->get('ufCliente'));

            $cnpj = $request->request->get('cpfcnpjCliente');
            $cnpj = str_replace(".", "", $cnpj);
            $cnpj = str_replace("-", "", $cnpj);
            $cnpj = str_replace("/", "", $cnpj);
            $cliente->setCpfcnpj($cnpj);

            $cliente->setEMail($request->request->get('emailCliente'));
            $cliente->setDependente(0);
            $cliente->setStatus(1);

            try{
                $em = $this->getDoctrine()->getManager();
                $em->persist($cliente);
                $em->flush();

                $response['success'] = true;
                return new JsonResponse($response);

            }catch (Exception $e){
                $response['success'] = false;
                $response['msg'] = $e;
                return new JsonResponse($response);
            }

        }else if($passo == 'passo4'){

            $servico = new Servico();
            $servico->setidEmpresa($idEmpresa);
            $servico->setCodSerPref($request->request->get('codServ'));
            $servico->setDescricao($request->request->get('nomeServ'));
            $servico->setValor($request->request->get('valorServ'));

            $servico->setPercIss($request->request->get('issServ'));
            $servico->setPercIrrf($request->request->get('irrfServ'));
            $servico->setPercCsl($request->request->get('cslServ'));
            $servico->setPercPis($request->request->get('pisServ'));
            $servico->setPercCofins($request->request->get('cofinsServ'));

            try{
                $em = $this->getDoctrine()->getManager();
                $em->persist($servico);
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

}
