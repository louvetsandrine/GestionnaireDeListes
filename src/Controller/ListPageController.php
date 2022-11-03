<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Form\ListCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ListPageController extends AbstractController
{
    #[Route('/list_page', name: 'list_page')]
    public function index(EntityManagerInterface $doctrine, Request $request): Response
    {
        $list = new Lists();

        $form = $this->createForm(ListCreateType::class, $list);
        $form->handleRequest($request);

        if($form->isSubmitted() ){
            // dd($form->getData());
            // $list->setAuthor("Renée Truc");
            // $list->setName("course");
            // $list->setPriority('oui');
            // $list->setDateLimited($date);
            $doctrine->persist($list);
            $doctrine->flush();
            $this->addFlash('success', 'La tâche a bien été enregistrée');
            return $this->redirectToRoute('home_page');
        }
        
        
        return $this->render('list_page/list_form_page.html.twig', [
            'controller_name' => 'ListPageController',
            'title' => 'Créer une liste',
            'form' => $form->createView(),
        ]);
    }
}
