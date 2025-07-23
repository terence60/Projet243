<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TousdroitsreservesController extends AbstractController
{
    #[Route('/tousdroitsreserves', name: 'app_tousdroitsreserves')]
    public function index(): Response
    {
        return $this->render('tousdroitsreserves/index.html.twig', [
        ]);
    }
}
