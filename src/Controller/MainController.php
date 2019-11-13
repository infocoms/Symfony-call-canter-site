<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuestionRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @param QuestionRepository $questionRepository
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function index(QuestionRepository $questionRepository)
    {
        if($this->isGranted("ROLE_SECOND"))
    {
            return $this->redirectToRoute("secondagent");
        }
        $questions = $questionRepository->findBy([], ['created' => 'DESC']);

        return $this->render('main/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
