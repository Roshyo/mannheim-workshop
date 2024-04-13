<?php

declare(strict_types=1);

namespace App\Entity\Sponsoring;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;

#[ORM\Entity]
#[ORM\Table(name: 'app_sponsor_logo')]
class SponsorLogo extends Image
{
    /** @var Sponsor|null */
    #[ORM\OneToOne(inversedBy: 'logo', targetEntity: Sponsor::class)]
    #[ORM\JoinColumn(name: 'owner_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;
}
