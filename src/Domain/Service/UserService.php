<?php

namespace App\Domain\Service;

use App\Domain\Entity\User;
use App\Infrastructure\Repository\UserRepository;
use Doctrine\ORM\Exception\ORMException;

class UserService
{
    public function __construct(private UserRepository $userRepository) {}

    public function create(string $login): User
    {
        $user = new User();
        $user->setLogin($login);
        $user->setCreatedAt();
        $user->setUpdatedAt();

        $this->userRepository->create($user);

        return $user;
    }

    /**
     * @throws ORMException
     */
    public function refresh(User $user): void
    {
        $this->userRepository->refresh($user);
    }
}
