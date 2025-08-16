<?php

namespace App\Controller;

use App\Entity\Actualites;
use App\Form\ActualitesForm;
use App\Repository\ActualitesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/actualites')]
final class AdminActualitesController extends AbstractController
{
    #[Route(name: 'app_admin_actualites_index', methods: ['GET'])]
    public function index(ActualitesRepository $actualitesRepository): Response
    {
        return $this->render('admin_actualites/index.html.twig', [
            'actualites' => $actualitesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_actualites_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actualite = new Actualites();
        $form = $this->createForm(ActualitesForm::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_actualites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_actualites/new.html.twig', [
            'actualite' => $actualite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_actualites_show', methods: ['GET'])]
    public function show(Actualites $actualite): Response
    {
        return $this->render('admin_actualites/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_actualites_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Actualites $actualite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActualitesForm::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_actualites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_actualites/edit.html.twig', [
            'actualite' => $actualite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_actualites_delete', methods: ['POST'])]
    public function delete(Request $request, Actualites $actualite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actualite->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($actualite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_actualites_index', [], Response::HTTP_SEE_OTHER);
    }
}
