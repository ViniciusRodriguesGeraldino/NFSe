<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Agenda;
use AppBundle\Entity\Empresa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class AgendaController extends Controller
{
    private $session;

    public function __construct() {
        $this->session=new Session();
    }

    /**
     * @Route("/agenda", name="agenda")
     */
    public function indexAction(Request $request){

        return $this->render("agenda/index.html.twig", array(

        ));
    }

    /**
     * @Route("/agenda_getEventos", name="agenda_getEventos")
     * @Method({"GET"})
     */
    public function agenda_getEventos(Request $request){

        $em = $this->getDoctrine()->getManager();

        $eventosAgenda = $em->getRepository('AppBundle:Agenda')->findBy(array('empresa' => $this->get('app.emp')->getIdEmpresa(),
//            'status' => 1
            )
        );

        $lista = array();

        foreach ($eventosAgenda as $evento) {

            $agList = New AgendaLista();
            $agList->setaAgendaLista($evento->getDescricaoEvento(), date_format($evento->getDataInicio(), 'Y-m-d\TH:i:s'));
            $lista[] = $agList;

        }

        return new JsonResponse($lista);
    }


    /**
     * @Route("/agenda_addEventos", name="agenda_addEventos")
     * @Method({"POST"})
     */
    public function agenda_addEventos() {
        $em = $this->getDoctrine()->getManager();
        //fetch the POST Data
        $request = $this->get('request');
        $data = $request->request->all();

        //save the Reservation
        $booking = new Booking();

        $booking->setTitle($data["title"]);
        $booking->setStart(new \DateTime($data["start"]));
        $booking->setEnd(new \DateTime($data["end"]));

        $em->persist($booking);
        $em->flush();

        //return response
        $serializedEntity = $this->container->get('serializer')->serialize($booking, 'json');
        $response = new Response($serializedEntity);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}

class AgendaLista {
    public $title;
    public $start;

    public function setaAgendaLista($desc, $dataIni){
        $this->start = $dataIni;
        $this->title = $desc;
    }
}