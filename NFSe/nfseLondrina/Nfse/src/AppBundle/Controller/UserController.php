<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Empresa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class UserController extends Controller
{
    private $session;

    public function __construct() {
        $this->session=new Session();
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request){
        $authenticationUtils = $this->get("security.authentication_utils");
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render("security/login.html.twig", array(
            "error" => $error,
            "last_username" => $lastUsername,
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request){

    }

    /**
     * @Route("/login_cadastro", name="login_cadastro")
     * @Method({"GET", "POST"})
     */
    public function login_cadastro(Request $request){

        //$request->request->get('_email');

        $em=$this->getDoctrine()->getEntityManager();
        $user_repo=$em->getRepository("AppBundle:User");
        $user = $user_repo->findOneBy(array("email"=>$request->request->get('_email')));

        if(count($user)==0){
            $user = new User();
            $user->setName($request->request->get('_name'));
            $user->setEmail($request->request->get('_email'));

            $factory = $this->get("security.encoder_factory");
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($request->request->get('_password'), $user->getSalt());

            $user->setPassword($password);
            $user->setRole("ROLE_USER");
            $user->setImagen(null);

            $empresa = $this->CadastraNovaEmpresa($request->request->get('_name_emp'), $request->request->get('_cnpj_emp'), $request->request->get('_email'));
            $user->setEmpresa($empresa);

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $flush = $em->flush();
            if($flush==null){
                $status = "Usuario Cadastrado!";
            }else{
                $status = "Erro ao Cadastrar.#1";
            }
        }else{
            $status = "Email já está cadastrado!";
        }

        $this->session->getFlashBag()->add("status",$status);

        return $this->render("security/login.html.twig", array(
            "error" => "",
            "last_username" => $request->request->get('_email'),
            "status" => $status,
        ));

    }

    public function CadastraNovaEmpresa($nomeEmpresa, $cpfcnpj, $email){
        $empresa = new Empresa();

        $empresa->setNome($nomeEmpresa);
        $empresa->setStatus(1);
        $empresa->setEmpresaTipo('COMERCIO');
        $empresa->setCpfcnpj($cpfcnpj);
        $empresa->setEMail($email);
        $empresa->setSimples('S');

        $em = $this->getDoctrine()->getManager();
        $em->persist($empresa);
        $em->flush();

        return $empresa->getId();
    }

}
