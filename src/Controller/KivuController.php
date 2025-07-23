<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class KivuController extends AbstractController
{
    #[Route('/kivu', name: 'app_kivu')]
    public function index(): Response
    {
        return $this->render('kivu/index.html.twig', [
            
        ]);
    }
}
