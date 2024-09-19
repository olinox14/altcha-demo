<?php
declare(strict_types=1);

namespace App\State\Processor;

use AltchaOrg\Altcha\Altcha;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Post;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\Challenge;
use Symfony\Component\HttpFoundation\Response;

class ChallengeProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly string $hmacKey
    ) {}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Challenge
    {
        if (!$operation instanceof Post) {
            throw new \RuntimeException('not supported', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        /** @var Challenge $challenge */
        $challenge = $data;

        $valid = Altcha::verifySolution(
            $challenge->getPayload(),
            $this->hmacKey,
            true
        );

        $challenge->setVerified($valid);

        return $challenge;
    }
}
