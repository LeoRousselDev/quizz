<?php

namespace App\Controller;

use App\Entity\PropertySearch;
use App\Entity\Quizz;
use App\Form\PropertySearchType;
use App\Form\QuizzType;
use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Route("/quizz")
 */
class QuizzController extends AbstractController
{
    /**
     * @Route("/", name="quizz_index", methods={"GET"})
     */
    public function index(QuizzRepository $quizzRepository): Response
    {
        return $this->render('quizz/index.html.twig', [
            'quizzs' => $quizzRepository->findAll(),
        ]);
    }

    /**
     * @Route("/informatique", name="informatique", methods={"GET"})
     */
    public function informatique(QuizzRepository $quizzRepository): Response
    {
        return $this->render('quizz/informatique.html.twig', [
            'quizzs' => $quizzRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="quizz_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $quizz = new Quizz();
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quizz);
            $entityManager->flush();

            return $this->redirectToRoute('quizz_index');
        }

        return $this->render('quizz/new.html.twig', [
            'quizz' => $quizz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/{cmp}", name="quizz_show")
     */
    public function show(Quizz $quizz, $cmp, QuizzRepository $quizzRepository, Request $request, SessionInterface $session): Response
    {
        if($cmp == 1){
            $session->set('reussite', 0);
        }

        if($cmp>6){
            echo "vous avez fini.";
        }
        if($cmp==6){

            return $this->redirectToRoute('recap',['id' => $quizz->getId()]);

        }

        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        $get=$quizz->getResp($cmp);

        if($form->isSubmitted()){
            if ($search->getSearchbar() == $get){
                echo "ok";
                $session->set('reussite', $session->get('reussite')+1);

                var_dump($get);
            } else {
                echo "erreur";
            }
            $session->set('quest', $session->get('quest'));
            $cmp++;

            return $this->redirectToRoute('quizz_show', ['id' => $quizz->getId(), 'cmp' => $cmp]);
        }

        return $this->render('quizz/show.html.twig', [
            'form' => $form->createView(),
            'quizz' => $quizz ,
            'question' => $quizz->getQuest($cmp),
            'indice' => $quizz->getIndice($cmp),
            'cmp' => $cmp,
        ]);


    }

    /**
     * @Route("{id}/recap", name="recap")
     */
    public function recap(SessionInterface $session, QuizzRepository $quizzRepository): Response
    {
        return $this->render('quizz/recap.html.twig', [
            'reussit' => $session->get('reussite'),
            'quizz' => $quizzRepository,
            'quizzs' => $quizzRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="quizz_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Quizz $quizz): Response
    {
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quizz_index');
        }

        return $this->render('quizz/edit.html.twig', [
            'quizz' => $quizz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quizz_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Quizz $quizz): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quizz->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($quizz);
            $entityManager->flush();
        }

        return $this->redirectToRoute('quizz_index');
    }

    /**
     * @Route("/q1", name="q1")
     */
    public function q1(QuizzRepository $quizzRepository, Request $request)
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        return $this->render('quizz/show.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}


