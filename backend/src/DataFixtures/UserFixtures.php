<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@ktebna.tn');
        $user->setIsAdmin(true);
        $user->setName('Admin');
        $user->setPhone('52259212');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'admin'
        ));
        $manager->persist($user);
        $user = new User();
        $user->setEmail('user1@ktebna.tn');
        $user->setIsAdmin(false);
        $user->setName('User one');
        $user->setPhone('52259213');
        $user->setPoints(0);
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'user'
        ));
        $manager->persist($user);
        $user = new User();
        $user->setEmail('user2@ktebna.tn');
        $user->setIsAdmin(false);
        $user->setName('User two');
        $user->setPhone('52259214');
        $user->setPoints(1000);
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'user'
        ));
        $manager->persist($user);
        $manager->flush();
    }
}
