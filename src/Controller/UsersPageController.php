<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class UsersPageController extends AbstractController
{
    #[Route('/user/list', name: 'user_list_page')]
    public function index(UsersRepository $usersRepository): Response
    {
        $users = $usersRepository->findAll();

        return $this->render('user_page/user_list_page.html.twig', [
           'users' => $users,
        ]);
    }

    /**
     * @Route("/{id}/delete", name="user_delete_page")
     */
    public function deleteUsers(Users $user, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('success', 'L\'utilisateur a bien été supprimé!');

        return $this->redirectToRoute('home_page');
    }
}
