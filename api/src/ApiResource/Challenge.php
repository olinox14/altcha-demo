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
        ),
    ],
    processor: ChallengeRequestProvider::class
)]
class Challenge
{
    private string $algorithm = 'SHA-256';

    private string $challenge;

    private string $salt;

    private string $signature;

    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    public function setAlgorithm(string $algorithm): self
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    public function getChallenge(): string
    {
        return $this->challenge;
    }

    public function setChallenge(string $challenge): self
    {
        $this->challenge = $challenge;
        return $this;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;
        return $this;
    }

    public function getSignature(): string
    {
        return $this->signature;
    }

    public function setSignature(string $signature): self
    {
        $this->signature = $signature;
        return $this;
    }
}
