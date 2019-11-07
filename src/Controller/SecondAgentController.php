<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class SecondAgentController extends AbstractController
{
    /**
     * @Route("/second/agent", name="second_agent")
     */
    public function index()
    {
        return $this->render('second_agent/index.html.twig', [
            'controller_name' => 'SecondAgentController',
        ]);
    }


    /**
     * @Route("/ticket", name="app_ticket")
     */



    public  function seeTickets()
    {
        $arr_tickets = array();
        $question1 ='I have a problem with my gsm';
        $question2 ='My gift did not arrive';
        $arr_tickets[] = $question1;
        $arr_tickets[] = $question2;
        $customer1 = new Customer($arr_tickets);

        $question1 = new Ticket();
        $question1->setUser(new Customer($arr_tickets));
        $question1->setBody('test');

        /*
        $question2 = new Ticket();
        $question2->getId();
        $question2->setUser('Pedro');
        $question2->setBody('madam');


        $question3= new Ticket();
        $question3->getId();
        $question3->setUser('ingrid');
        $question3->setBody('flow');
        */


        //$arr_tickets[] = $question2;
        //$arr_tickets[] = $question3;

        var_dump($arr_tickets);

//        echo $arrayTicket1;
//        echo $arrayTickets2;
//        echo $arrayTickets3;

        return $this->render('ticket/index.html.twig', [
            'controller_name' => 'SecondAgentController',
            ]);



    }


}


