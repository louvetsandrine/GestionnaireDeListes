<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListPageController extends AbstractController
{
    #[Route('/list_page', name: 'list_page')]
    public function index(): Response
    {
        $form = $this->createForm(ListCreateType::class);
        
        return $this->render('list_page/list_form_page.html.twig', [
            'controller_name' => 'ListPageController',
            'title' => 'Gestionnaire de listes'
        ]);
    }
}
