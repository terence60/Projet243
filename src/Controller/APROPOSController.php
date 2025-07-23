<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class APROPOSController extends AbstractController
{
    #[Route('/a/p/r/o/p/o/s', name: 'app_a_p_r_o_p_o_s')]
    public function index(): Response
    {
        return $this->render('apropos/index.html.twig', [
           
        ]);
    }
}
