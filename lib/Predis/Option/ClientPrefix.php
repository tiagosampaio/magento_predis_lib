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

use Predis\Command\Processor\KeyPrefixProcessor;

/**
 * Option class that handles the prefixing of keys in commands.
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Option_ClientPrefix extends Predis_Option_AbstractOption
{
    /**
     * {@inheritdoc}
     */
    public function filter(Predis_Option_ClientOptionsInterface $options, $value)
    {
        return new Predis_Command_KeyPrefixProcessor($value);
    }
}
