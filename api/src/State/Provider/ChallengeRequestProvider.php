<?php
declare(strict_types=1);

namespace App\State\Provider;

use AltchaOrg\Altcha\Altcha;
use AltchaOrg\Altcha\ChallengeOptions;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Metadata\Operation;
use App\ApiResource\Challenge;
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
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof GetCollection) {
            throw new \RuntimeException('not supported', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        // Create a new challenge
        $options = new ChallengeOptions([
            'hmacKey'   => $this->hmacKey,
            'maxNumber' => 50000, // the maximum random number
        ]);

        $challenge = Altcha::createChallenge($options);

        return json_encode($challenge);
//        $challenge = new Challenge();

//        return $challenge;
    }
}
