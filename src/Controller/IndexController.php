<?php

namespace App\Controller;

use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param QuizzRepository $quizzRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(QuizzRepository $quizzRepository)
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'quizzs' => $quizzRepository->findAll(),
        ]);
    }


    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('index/about.html.twig');
    }
}
