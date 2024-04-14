<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context\Setup\Sponsoring;

use App\Entity\Sponsoring\Sponsor;
use App\Entity\Sponsoring\SponsorLogo;
use Behat\Behat\Context\Context;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;

class SponsorContext implements Context
{
    public function __construct(
        private readonly FactoryInterface $sponsorFactory,
        private readonly FactoryInterface $sponsorLogoFactory,
        private readonly ObjectManager $sponsorManager,
        private readonly ImageUploaderInterface $imageUploader,
        private readonly string $baseDirectory,
    ) {
    }

    /**
     * @Given there is a sponsor named :name with :url url and :logo logo
     */
    public function thereIsASponsor(string $name, string $url, string $logoPath): void
    {
        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorFactory->createNew();

        $slugger = new AsciiSlugger();
        $sponsor->setCode((string) $slugger->slug($name)->lower());
        $sponsor->setName($name);
        $sponsor->setUrl($url);

        $absoluteLogoPath = $this->baseDirectory . '/tests/Behat/Resources/fixtures/images/' . $logoPath;
        /** @var SponsorLogo $logo */
        $logo = $this->sponsorLogoFactory->createNew();
        $logo->setPath($absoluteLogoPath);

        $sponsor->setImage($logo);

        $this->imageUploader->upload($logo);

        $this->sponsorManager->persist($sponsor);
        $this->sponsorManager->flush();
    }
}
