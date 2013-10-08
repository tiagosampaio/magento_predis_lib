<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Predis\Option;

use Predis\Profile\ServerProfile;
use Predis\Profile\ServerProfileInterface;

/**
 * Option class that handles server profiles to be used by a client.
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Option_ClientProfile extends Predis_Option_AbstractOption
{
    /**
     * {@inheritdoc}
     */
    public function filter(Predis_Option_ClientOptionsInterface $options, $value)
    {
        if (is_string($value)) {
            $value = ServerProfile::get($value);

            if (isset($options->prefix)) {
                $value->setProcessor($options->prefix);
            }
        }

        if (is_callable($value)) {
            $value = call_user_func($value, $options, $this);
        }

        if (!$value instanceof Predis_Profile_ServerProfileInterface) {
            throw new \InvalidArgumentException('Invalid value for the profile option');
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefault(Predis_Option_ClientOptionsInterface $options)
    {
        $profile = Predis_Profile_ServerProfile::getDefault();

        if (isset($options->prefix)) {
            $profile->setProcessor($options->prefix);
        }

        return $profile;
    }
}
