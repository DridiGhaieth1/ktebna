<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request): JsonResponse
    {
        $user = $this->getUser();

        return $this->json([
            // The getUserIdentifier() method was introduced in Symfony 5.3.
            // In previous versions it was called getUsername()
            'username' => $user->getUserIdentifier(),
            'admin' => $user->getRoles(),
        ]);
    }
}