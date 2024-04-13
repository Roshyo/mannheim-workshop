<?php

declare(strict_types=1);

namespace App\Menu\Listener;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu()->getChild('marketing');

        $menu
            ->addChild('sponsors', ['route' => 'app_admin_sponsor_index'])
            ->setLabel('app.ui.sponsors')
            ->setLabelAttribute('icon', 'handshake')
        ;
    }
}
