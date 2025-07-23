<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MentionsLégalesController extends AbstractController
{
    #[Route('/mentions/l/gales', name: 'app_mentions_l_gales')]
    public function index(): Response
    {
        return $this->render('mentions_légales/index.html.twig', [
            
        ]);
    }
}
