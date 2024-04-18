<?php

declare(strict_types=1);

namespace App\Form\Type\Resource\Sponsoring;

use App\Entity\Sponsoring\Sponsor;
use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SponsorType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventSubscriber(new AddCodeFormSubscriber());
        $builder->add('name', TextType::class);
        $builder->add('logo', SponsorLogoType::class);
        $builder->add('url', TextType::class);
        $builder->add('tier', ChoiceType::class, [
            'choices' => Sponsor::TIER_CHOICES,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', Sponsor::class);
    }
}
