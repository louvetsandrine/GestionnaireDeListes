<?php

namespace App\Controller;

use App\Entity\Lists;
use App\Repository\ListsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListDetailsPageController extends AbstractController
{
    /**
     * @Route("/listDetails/{id}", name="list_details_page")
     */
    public function listDetailsPage(ListsRepository $listsRepository, int $id)
    {        
        $listDetails = $listsRepository->find($id);
          
        return $this->render('list_page/list_details_page.html.twig', [
            'title' => 'Gestionnaire de listes',
            'subtitle' => 'Gérer vos listes et vos tâches en toute simplicité!',
            'listDetails' => $listDetails
            ]);
    }
}