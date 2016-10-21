<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Ob\HighchartsBundle\Highcharts\Highchart;


class RelatoriosController extends Controller
{

    /**
     * @Route("/reports", name="reports")
     */
    public function loginAction(Request $request){

        // Chart
        $series = array(
            array("name" => "Data Serie Name", "data" => array(1,2,4,2,5,6,3,8))
        );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->title->text('Chart Title');
        $ob->xAxis->title(array('text'  => "Horizontal axis title"));
        $ob->yAxis->title(array('text'  => "Vertical axis title"));
        $ob->series($series);

        return $this->render("reports/index.html.twig", array(
            'chart' => $ob,
        ));
    }

    /**
     * @Route("/reports/relclientes", name="relclientes")
     */
    public function relatorioClientes(){
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository('AppBundle:Cliente')->findBy(array('empresa' => $this->get('app.emp')->getIdEmpresa(),
//            'status' => 1
            )
        );

        $arrayGeral = [];
        $arrayClientes = [];
        $contador = 0;

        foreach ($clientes as $cliente){
            $arrayClientes[] = array('id' => $cliente->getId(), 'codigoCliente' => $cliente->getCodigoCliente(),
                            'nome' => $cliente->getNome(), 'cpfcnpj' => $cliente->getCpfcnpj(), 'fone' => $cliente->getFone()
                    );

            $contador++;

            if($contador == 42){
                $arrayGeral[] = $arrayClientes;
                unset($arrayClientes);
                $arrayClientes = [];
                $contador = 0;
            }
        }

        $arrayGeral[] = $arrayClientes;

//        die(var_dump($arrayGeral));

        return $this->render("reports/clientes.html.twig", array(
            'clientes' => $arrayGeral,
        ));

    }

}
