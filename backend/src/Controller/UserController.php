<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param UserRepository $userRepository
     * @return JsonResponse
     * @Route("/api/users/token", name="posts_put", methods={"PUT"})
     * @throws Exception
     */
    public function updateUserByToken(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository): JsonResponse
    {
        try {
            try {
                $decodedJwtToken = $this->jwtManager->decode($this->storage->getToken());
            } catch (JWTDecodeFailureException $e) {
                return $this->respondNotFound($e->getMessage());
            }
            if (is_array($decodedJwtToken)) {
                $user = $userRepository->findOneBy(['email' => $decodedJwtToken['username']]);
                if (!$user) return $this->respondNotFound('User not found');
                $request = $this->transformJsonBody($request);
                if (!$request || !$request->get('name') || !$request->request->get('email') || !$request->request->get('phone')) {
                    throw new Exception("All fields are required");
                }
                $user->setName($request->get('name'));
                $user->setEmail($request->get('email'));
                $user->setPhone($request->get('phone'));
                $entityManager->flush();
                return $this->respondWithSuccess('User updated');
            } else {
                return $this->respondNotFound('User not found');
            }
        } catch (Exception $e) {
            return $this->respondValidationError('Validate data');
        }
    }

}