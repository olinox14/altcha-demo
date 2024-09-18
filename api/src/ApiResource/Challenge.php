<?php
declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\State\Provider\ChallengeRequestProvider;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/challenge',
            provider: ChallengeRequestProvider::class
        ),
    ],

)]
class Challenge
{
}
