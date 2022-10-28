<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskPageController extends AbstractController
{
    #[Route('/task_page', name: 'task_page')]
    public function index(): Response
    {
        return $this->render('task_page/task_form_page.html.twig', [
            'controller_name' => 'TaskPageController',
        ]);
    }
}
