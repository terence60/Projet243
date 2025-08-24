<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public const ROLE_ADMIN = 'ROLE_ADMIN';

    private UserPasswordHasherInterface $encoder;

    public function __construct(
        UserPasswordHasherInterface $encoder
    ) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();

        $password = 'Blakelively18@';

        $user
            ->setEmail('tete@blog.com')
            ->setIsVerified(false)
            ->setRoles([self::ROLE_ADMIN]);
        $hash = $this->encoder->hashPassword($user, $password);
        $user->setPassword($hash);
        $manager->persist($user);

        // category 
        $categorySante = (new Category())->setTitle('Santé');
        $categorySport = (new Category())->setTitle('Sport');
        $manager->persist($categorySante);
        $manager->persist($categorySport);

        $manager->flush();
    }
}
