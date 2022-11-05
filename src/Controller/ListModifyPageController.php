<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ListsRepository;
use App\Entity\Lists;
use App\Form\ListCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class ListModifyPageController extends AbstractController
{
    #[Route('/list/modify/{id}', name: 'list_modify_page')]
    public function index(EntityManagerInterface $doctrine, Request $request, ListsRepository $listsRepository, int $id): Response
    {
        
        $listDetails = $listsRepository->find($id);

        $form = $this->createForm(ListCreateType::class, $listDetails);
        $form->handleRequest($request);        

        if($form->isSubmitted() ){
            // dd($form->getData());
            // $list->setAuthor("Renée Truc");
            // $list->setName("course");
            // $list->setPriority('oui');
            // $list->setDateLimited($date);
            $doctrine->persist($listDetails);
            $doctrine->flush();
            $this->addFlash('success', 'La liste a bien été modifiée!');
            return $this->redirectToRoute('home_page');
        }
        
        
        return $this->render('list_page/list_modify_page.html.twig', [
            'controller_name' => 'ListModifyPageController',
            'title' => 'Créer une liste',
            'listDetails' => $listDetails,
            'form' => $form->createView(),
        ]);
    }
}
