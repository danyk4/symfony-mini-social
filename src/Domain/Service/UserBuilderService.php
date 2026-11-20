<?php

namespace App\Domain\Service;

use App\Domain\Entity\User;
use Doctrine\ORM\Exception\ORMException;

class UserBuilderService
{
    public function __construct(
        private readonly TweetService $tweetService,
        private readonly UserService $userService,
    ) {}

    /**
     * @param  string[]  $texts
     *
     * @throws ORMException
     */
    public function createUserWithTweets(string $login, array $texts): User
    {
        $user = $this->userService->create($login);
        foreach ($texts as $text) {
            $this->tweetService->postTweet($user, $text);
        }
        
        return $user;
    }
}
