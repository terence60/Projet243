<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ActualitésController extends AbstractController
{
    #[Route('/actualit/s', name: 'app_actualit_s')]
    public function index(): Response
    {
        return $this->render('actualités/index.html.twig', [
            
        ]);
    }
}
