<?php
declare(strict_types=1);

namespace App\State\Provider;

use AltchaOrg\Altcha\Altcha;
use AltchaOrg\Altcha\Challenge;
use AltchaOrg\Altcha\ChallengeOptions;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Metadata\Operation;
use Symfony\Component\HttpFoundation\Response;

class ChallengeRequestProvider implements ProviderInterface
{
    public function __construct(
        private readonly string $hmacKey
    ) {}
    /**
     * @param mixed[] $uriVariables
     * @param mixed[] $context
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): Challenge
    {
        if ($operation instanceof GetCollection) {
            throw new \RuntimeException('not supported', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        $options = new ChallengeOptions([
            'hmacKey'   => $this->hmacKey,
            'maxNumber' => 100000
        ]);

        return Altcha::createChallenge($options);
    }
}
