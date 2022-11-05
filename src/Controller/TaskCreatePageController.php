<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Repository\ListsRepository;
use App\Entity\Tasks;
use App\Form\TaskCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class TaskCreatePageController extends AbstractController
{
    #[Route('/task_page', name: 'task_page')]
    public function index(EntityManagerInterface $doctrine, Request $request, ListsRepository $listsRepository,): Response
    {

        $task = new Tasks();
        // $listDetails = $listsRepository->findAll();
        $form = $this->createForm(TaskCreateType::class, $task);
        $form->handleRequest($request);

        if($form->isSubmitted() ){
            dd($form->getData());
            $doctrine->persist($task);
            $doctrine->flush();
            $this->addFlash('success', 'La tâche a bien été enregistrée');
            return $this->redirectToRoute('home_page');
        }
        
        return $this->render('task_page/task_form_page.html.twig', [
            'controller_name' => 'TaskCreatePageController',
            'title' => 'Créer une tâche',
            'form' => $form->createView(),
        ]);
    }
}
