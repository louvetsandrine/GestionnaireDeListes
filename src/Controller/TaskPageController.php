<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Entity\Tasks;
use App\Form\TaskCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class TaskPageController extends AbstractController
{
    #[Route('/task_page', name: 'task_page')]
    public function index(EntityManagerInterface $doctrine, Request $request): Response
    {
        $task = new Tasks();

        $form = $this->createForm(TaskCreateType::class, $task);
        $form->handleRequest($request);

        if($form->isSubmitted() ){
            // dd($form->getData());
            // $list->setAuthor("Renée Truc");
            // $list->setName("course");
            // $list->setPriority('oui');
            // $list->setDateLimited($date);
            $doctrine->persist($task);
            $doctrine->flush();
            $this->addFlash('success', 'La tâche a bien été enregistrée');
            return $this->redirectToRoute('home_page');
        }
        
        return $this->render('task_page/task_form_page.html.twig', [
            'controller_name' => 'TaskPageController',
            'title' => 'Créer une tâche',
            'form' => $form->createView(),
        ]);
    }
}
