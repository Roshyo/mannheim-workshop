<?php

declare(strict_types=1);

namespace App\Twig\Extension\Sponsoring;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class SponsorExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_sponsors', [SponsorRuntime::class, 'getSponsors']),
        ];
    }
}
