<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Predis\Command;

/**
 * @link http://redis.io/commands/rpoplpush
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Command_ListPopLastPushHead extends Predis_Command_AbstractCommand implements Predis_Command_PrefixableCommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'RPOPLPUSH';
    }

    /**
     * {@inheritdoc}
     */
    public function prefixKeys($prefix)
    {
        PrefixHelpers::all($this, $prefix);
    }
}
