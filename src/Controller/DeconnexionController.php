<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeconnexionController extends AbstractController
{
    #[Route('/deconnexion', name: 'app_deconnexion')]
    public function index(): Response
    {
        return $this->render('deconnexion/index.html.twig', [
            
        ]);
    }
}
