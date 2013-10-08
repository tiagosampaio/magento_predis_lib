<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Protocol\Text;

use Predis\ResponseQueued;
use Predis\Connection\ComposableConnectionInterface;
use Predis\Protocol\ResponseHandlerInterface;

/**
 * Implements a response handler for status replies using the standard wire
 * protocol defined by Redis.
 *
 * @link http://redis.io/topics/protocol
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Protocol_Text_ResponseStatusHandler implements Predis_Protocol_ResponseHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle(Predis_Connection_ComposableConnectionInterface $connection, $status)
    {
        switch ($status) {
            case 'OK':
                return true;

            case 'QUEUED':
                return new Predis_ResponseQueued();

            default:
                return $status;
        }
    }
}
