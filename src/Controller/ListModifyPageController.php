<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ListsRepository;

class ListModifyPageController extends AbstractController
{
    #[Route('/list/modify/{id}', name: 'list_modify_page')]
    public function listDetailsPage(ListsRepository $listsRepository, int $id)
    {        
        $listDetails = $listsRepository->find($id);
          
        return $this->render('list_page/list_modify_page.html.twig', [
            'title' => 'Gestionnaire de listes',
            'subtitle' => 'Gérer vos listes et vos tâches en toute simplicité!',
            'listDetails' => $listDetails
            ]);
    }
 
}
