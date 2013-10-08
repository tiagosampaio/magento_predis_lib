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
 * @link http://redis.io/commands/brpoplpush
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Command_ListPopLastPushHeadBlocking extends Predis_Command_AbstractCommand implements Predis_Command_PrefixableCommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'BRPOPLPUSH';
    }

    /**
     * {@inheritdoc}
     */
    public function prefixKeys($prefix)
    {
        PrefixHelpers::skipLast($this, $prefix);
    }
}
