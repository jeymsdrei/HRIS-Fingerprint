<?php

namespace App\Services;

/**
 * Masks an email address for display on the password recovery screens.
 *
 * The first character of the local part and the domain stay visible so staff can
 * still recognise which address a code was sent to. The number of mask
 * characters always matches the real local-part length, so the displayed width
 * stays consistent per account without revealing the address itself.
 */
class EmailMask
{
    /**
     * Character used to hide the hidden part of the local part.
     */
    public const MASK_CHARACTER = '*';

    /**
     * Mask an email address, keeping the display length of the local part intact.
     */
    public static function mask(?string $email): ?string
    {
        if ($email === null || $email === '') {
            return $email;
        }

        if (! str_contains($email, '@')) {
            return str_repeat(self::MASK_CHARACTER, strlen($email));
        }

        [$name, $domain] = explode('@', $email, 2);

        $visible = mb_substr($name, 0, 1);
        $hidden = max(strlen($name) - mb_strlen($visible), 0);

        return $visible.str_repeat(self::MASK_CHARACTER, $hidden).'@'.$domain;
    }
}