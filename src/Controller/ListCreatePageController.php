<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Form\ListCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ListCreatePageController extends AbstractController
{
    #[Route('/list/create', name: 'list_create_page')]
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
            $this->addFlash('success', 'La liste a bien été enregistrée!');
            return $this->redirectToRoute('home_page');
        }
        
        
        return $this->render('list_page/list_form_page.html.twig', [
            'controller_name' => 'ListCreatePageController',
            'title' => 'Créer une liste',
            'form' => $form->createView(),
        ]);
    }
}
