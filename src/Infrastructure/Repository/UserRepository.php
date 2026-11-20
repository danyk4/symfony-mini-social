<?php


namespace App\Infrastructure\Repository;

use App\Domain\Entity\User;

/**
 * @extends AbstractRepository<User>
 */
readonly class UserRepository extends AbstractRepository
{
    public function create(User $user): int
    {
        return $this->store($user);
    }
}
