<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Repository\ListsRepository;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(ListsRepository $listsRepository): Response
    {
        $lists = $listsRepository->findAll();

        return $this->render('home_page/home_page.html.twig', [
            'controller_name' => 'HomePageController',
            'title' => 'Gestionnaire de listes',
            'lists' => $lists
        ]);
    }
}
