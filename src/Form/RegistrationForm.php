<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                 'placeholder' => 'Saisir une adresse email',
                 'required' => false,
                ]
               
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'required' => false,
                'label_html' => true,
                'label' => 'J\'accepte les conditions générales d\'utilisation du site',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions générales d\'utilisation du site',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'required' => false,
                'label' => 'Mot de passe',
                'label_html' => true,
                'attr' => ['autocomplete' => 'new-password', 'placeholder' => 'Saisir un mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Saisir un mot de passe',
                    ]),

                    new Regex([ 
                   'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?.])([-+!*$@%_?.\w]{12,})$/',
                   'match' => true,
                   'message' => 'Votre mot de passe doit comporter au moins douze 
                    caractères, dont des lettres majuscules et minuscules, un chiffre et un symbole : 
                        - + ! * $ @ % _ ? . '
                     

                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
