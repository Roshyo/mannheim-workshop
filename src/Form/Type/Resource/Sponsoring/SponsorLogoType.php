<?php

declare(strict_types=1);

namespace App\Form\Type\Resource\Sponsoring;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\FormBuilderInterface;

final class SponsorLogoType extends ImageType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->remove('type');
    }

    public function getBlockPrefix(): string
    {
        return 'app_sponsor_logo';
    }
}
