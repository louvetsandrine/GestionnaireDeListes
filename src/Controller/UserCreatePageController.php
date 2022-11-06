<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Form\UserCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class UserCreatePageController extends AbstractController
{
    #[Route('/user_page', name: 'user_page')]
    public function index(EntityManagerInterface $doctrine, Request $request): Response
    {
        $user = new Users();

        $form = $this->createForm(UserCreateType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() ){
            $doctrine->persist($user);
            $doctrine->flush();
            $this->addFlash('success', 'L\'utilisateur a bien été enregistré!');
            return $this->redirectToRoute('home_page');
        }
        
        
        return $this->render('user_page/user_form_page.html.twig', [
            'controller_name' => 'UserCreatePageController',
            'form' => $form->createView(),
        ]);
    }
}
