<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserDetailsPageController extends AbstractController
{
    /**
     * @Route("/user/details/{id}", name="user_details_page")
     */
    public function userDetailsPage(UsersRepository $usersRepository, int $id)
    {        
        $userDetails = $usersRepository->find($id);
          
        return $this->render('user_page/user_details_page.html.twig', [
            'title' => 'Gestionnaire de listes',
            'subtitle' => 'Gérer vos listes et vos tâches en toute simplicité!',
            'userDetails' => $userDetails
            ]);
    }
}