<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PremierController extends AbstractController
{
    #[Route('/premier', name: 'app_premier')]
    public function index(): Response
    {
        return $this->render('premier/index.html.twig', [
            
        ]);
    }
}
