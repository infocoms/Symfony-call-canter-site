<?php

namespace App\Controller;

use App\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\QuestionType;

class TicketController extends AbstractController
{
    /**
     * @Route("/ticket", name="ticket")
     */
    public function index()
    {
        return $this->render('ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }
    /**
     * @Route("/ticket/ask", name="app_question_ask")
     */
    public function askQuestion()
    {
        $question = new Ticket();
        $form = $this->createForm(QuestionType::class, $question);
        return $this->render('ticket/ask.html.twig', [
            'questionForm' => $form->createView()
        ]);
    }




}
