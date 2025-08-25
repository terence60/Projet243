<?php

namespace App\Controller;

use App\Form\ContactForm;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request,MailerInterface $mailer): Response
    {
       $form = $this->createForm(ContactForm::class);

       $form->handleRequest($request);

       if($form->isSubmitted()&& $form->isValid()){

        $data = $form->getData();
        $address = $data['email'];
        $message = $data['message'];

        $email = (new Email())

            ->from($address)
            ->to('tete@blog.com')
            ->subject('Demande de contact')
            ->text($message);

            $mailer->send($email);
       }

        return $this->render('contact/index.html.twig', [
        'formulaire' => $form
        ]);
    }
}
