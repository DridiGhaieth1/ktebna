<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserController extends ApiController
{

    /**
     * @var TokenStorageInterface
     */
    private $storage;
    /**
     * @var JWTTokenManagerInterface
     */
    private $jwtManager;

    public function __construct(TokenStorageInterface $storage, JWTTokenManagerInterface $jwtManager)
    {
        $this->storage = $storage;
        $this->jwtManager = $jwtManager;
    }

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

    /**
     * @param UserRepository $userRepository
     * @return JsonResponse
     * @Route("/api/users/token", name="users_get", methods={"GET"})
     */
    public function getUserByToken(UserRepository $userRepository): JsonResponse
    {
        try {
            $decodedJwtToken = $this->jwtManager->decode($this->storage->getToken());
        } catch (JWTDecodeFailureException $e) {
            return $this->respondNotFound($e->getMessage());
        }
        if (is_array($decodedJwtToken)) {
            $user = $userRepository->findOneBy(['email' => $decodedJwtToken['username']]);
            if (!$user) return $this->respondNotFound('User not found');
            return $this->json($user);
        } else {
            return $this->respondNotFound('User not found');
        }
    }

}