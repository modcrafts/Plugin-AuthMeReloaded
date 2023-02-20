<?php

namespace Azuriom\Plugin\Authme\Cards;

use Azuriom\Extensions\Plugin\UserProfileCardComposer;

class AuthmeViewCard extends UserProfileCardComposer
{
    /**
     *      * Get the cards to add to the user profile.
     *           * Each card should contains:
     *                * - 'name' : The name of the card
     *                     * - 'view' : The view (Ex: shop::giftcards.index).
     *                          */
    public function getCards(): array
    {
        return [
            [
                'name' => trans('authme::messages.click2login.title'),
                'view' => 'authme::cards.click2login',
            ],
        ];
    }
}
