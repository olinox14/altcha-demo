<?php
declare(strict_types=1);

namespace App\State\Provider;

use AltchaOrg\Altcha\Altcha;
use AltchaOrg\Altcha\Challenge;
use AltchaOrg\Altcha\ChallengeOptions;
use AltchaOrg\Altcha\Hasher\Algorithm;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Metadata\Operation;
use DateMalformedStringException;
use Symfony\Component\HttpFoundation\Response;

class ChallengeProvider implements ProviderInterface
{
    public function __construct(
        private readonly Altcha $altcha
    ) {}

    /**
     * @param mixed[] $uriVariables
     * @param mixed[] $context
     * @throws DateMalformedStringException
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): Challenge
    {
        if ($operation instanceof GetCollection) {
            throw new \RuntimeException('not supported', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        $options = new ChallengeOptions(
            Algorithm::SHA256,
            100000,
            (new \DateTime())->modify('+15 minute')
        );

        return $this->altcha->createChallenge($options);
    }
}
