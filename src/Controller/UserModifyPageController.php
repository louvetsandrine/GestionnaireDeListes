<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UsersRepository;
use App\Entity\Users;
use App\Form\UserCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class UserModifyPageController extends AbstractController
{
    #[Route('/user/modify/{id}', name: 'user_modify_page')]
    public function index(EntityManagerInterface $doctrine, Request $request, UsersRepository $usersRepository, int $id): Response
    {
        
        $userDetails = $usersRepository->find($id);

        $form = $this->createForm(UserCreateType::class, $userDetails);
        $form->handleRequest($request);        

        if($form->isSubmitted() ){
            $doctrine->persist($userDetails);
            $doctrine->flush();
            $this->addFlash('success', 'L\'utilisateur a bien été modifiée!');
            return $this->redirectToRoute('user_list_page');
        }
        
        
        return $this->render('user_page/user_modify_page.html.twig', [
            'controller_name' => 'UserModifyPageController',
            'title' => 'Créer une liste',
            'userDetails' => $userDetails,
            'form' => $form->createView(),
        ]);
    }
}
