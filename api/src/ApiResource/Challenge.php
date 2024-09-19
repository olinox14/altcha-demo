<?php
declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\State\Processor\ChallengeProcessor;
use App\State\Provider\ChallengeProvider;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/challenge',
            provider: ChallengeProvider::class
        ),
        new Post(
            uriTemplate: '/challenge',
            processor: ChallengeProcessor::class
        ),
    ],

)]
class Challenge
{
    private string | null $payload = null;
    private ?bool $verified = null;

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(?string $payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;
        return $this;
    }
}
