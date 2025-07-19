<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DéconnexionController extends AbstractController
{
    #[Route('/d/connexion', name: 'app_d_connexion')]
    public function index(): Response
    {
        return $this->render('déconnexion/index.html.twig', [
            'controller_name' => 'DéconnexionController',
        ]);
    }
}
