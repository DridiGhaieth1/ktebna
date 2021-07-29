<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends ApiController
{
    /**
     * @param UserRepository $userRepository
     * @param int $id
     * @return JsonResponse
     * @Route("/api/users/{id}", name="users_get", methods={"GET"})
     */
    public function getUsers(UserRepository $userRepository, int $id = 0): JsonResponse
    {
        if (!$id) {
            return $this->json($userRepository->findAll());
        }
        $user = $userRepository->find($id);
        if (!$user) return $this->respondNotFound('User not found');
        return $this->json($user);
    }

}