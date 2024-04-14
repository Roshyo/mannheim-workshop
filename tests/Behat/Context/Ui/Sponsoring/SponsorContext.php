<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context\Ui\Sponsoring;

use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Shop\HomePageInterface;
use Webmozart\Assert\Assert;

class SponsorContext implements Context
{
    public function __construct(
        private HomePageInterface $homePage,
    ) {
    }

    /**
     * @Then I should see the list of sponsors
     */
    public function iShouldSeeTheListOfSponsors(): void
    {
        $this->homePage->open();

        Assert::contains($this->homePage->getContent(), 'data-test-sponsors-list');
    }

    /**
     * @Then I should see :sponsorCode sponsor
     */
    public function iShouldSeeSponsor(string $sponsorCode): void
    {
        $this->homePage->open();

        Assert::contains($this->homePage->getContent(), 'data-test-sponsor="'.$sponsorCode.'"');
    }
}
