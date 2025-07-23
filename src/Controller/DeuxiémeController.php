<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeuxiémeController extends AbstractController
{
    #[Route('/deuxi/me', name: 'app_deuxi_me')]
    public function index(): Response
    {
        return $this->render('deuxiéme/index.html.twig', [
            
        ]);
    }
}
