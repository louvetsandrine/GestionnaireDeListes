<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Form\ListCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use DateTime;


class ListPageController extends AbstractController
{
    #[Route('/list_page', name: 'list_page')]
    public function index(EntityManagerInterface $doctrine, Request $request): Response
    {
        $list = new Lists();
        $date = new DateTime('now');

        $form = $this->createForm(ListCreateType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() ){
            // dd($form->getData());
            $list->setAuthor("Renée Truc");
            $list->setName("course");
            $list->setPriority('oui');
            $list->setDateLimited($date);
            $list->setNowDate($date);
            $doctrine->persist($list);
            $doctrine->flush();
            return $this->redirectToRoute('home_page');
        }
        
        
        return $this->render('list_page/list_form_page.html.twig', [
            'controller_name' => 'ListPageController',
            'title' => 'Créer une liste',
            'form' => $form->createView()
        ]);
    }
}
