<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;







class UserFixtures extends Fixture
{


    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->em = $entityManager;
    }

    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $usersData = [
            0 => [
                'email' => 'user@example.com',
                'role' => ['USER'],
                'password' => 123456
            ]
        ];

        foreach ($usersData as $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);
            $newUser->setPassword($user['password']);
            $newUser->setRoles($user['role']);
            $this->em->persist($newUser);
        }

        $this->em->flush();
    }
}