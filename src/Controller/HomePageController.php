<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lists;
use App\Repository\ListsRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(ListsRepository $listsRepository): Response
    {
        // $date = new DateTime('now');

        $lists = $listsRepository->findAll();

        return $this->render('home_page/home_page.html.twig', [
           'controller_name' => 'HomePageController',
           'lists' => $lists,
        ]);
    }

    /**
     * @Route("/{id}/delete", name="list_delete_page")
     */
    public function deleteList(Lists $list, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($list);
        $entityManager->flush();
        $this->addFlash('success', 'La liste a bien été supprimée!');

        return $this->redirectToRoute('home_page');
    }
}
