<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Tweet;

/**
 * @extends AbstractRepository<Tweet>
 */
readonly class TweetRepository extends AbstractRepository
{
    public function create(Tweet $tweet): int
    {
        return $this->store($tweet);
    }
}
