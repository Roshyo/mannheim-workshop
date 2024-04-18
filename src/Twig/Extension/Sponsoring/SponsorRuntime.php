<?php

declare(strict_types=1);

namespace App\Twig\Extension\Sponsoring;

use App\Entity\Sponsoring\Sponsor;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Twig\Extension\RuntimeExtensionInterface;

final readonly class SponsorRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private RepositoryInterface $sponsorRepository,
    ) {
    }

    /**
     * @return Sponsor[]
     */
    public function getSponsors(): array
    {
        $sponsors = $this->sponsorRepository->findBy([], ['tier' => 'ASC']);

        return $sponsors;
    }
}
