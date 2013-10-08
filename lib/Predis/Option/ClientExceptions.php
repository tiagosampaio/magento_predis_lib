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

/**
 * Option class used to specify if the client should throw server exceptions.
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Option_ClientExceptions extends Predis_Option_AbstractOption
{
    /**
     * {@inheritdoc}
     */
    public function filter(Predis_Option_ClientOptionsInterface $options, $value)
    {
        return (bool) $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefault(Predis_Option_ClientOptionsInterface $options)
    {
        return true;
    }
}
