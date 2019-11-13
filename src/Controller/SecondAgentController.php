<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuestionRepository;

class SecondAgentController extends AbstractController
{
    /**
     * @Route("/secondagent", name="secondagent")
     * @param QuestionRepository $questionRepository
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function index(QuestionRepository $questionRepository)
    {

        $questions = $questionRepository->findBy([], ['created' => 'DESC']);

        return $this->render('second_agent/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}