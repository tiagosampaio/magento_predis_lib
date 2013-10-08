<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Predis\Protocol\Text;

use Predis\ResponseError;
use Predis\Connection\ComposableConnectionInterface;
use Predis\Protocol\ResponseHandlerInterface;

/**
 * Implements a response handler for error replies using the standard wire
 * protocol defined by Redis.
 *
 * This handler returns a reply object to notify the user that an error has
 * occurred on the server.
 *
 * @link http://redis.io/topics/protocol
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Protocol_Text_ResponseErrorHandler implements Predis_Protocol_ResponseHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle(Predis_Connection_ComposableConnectionInterface $connection, $errorMessage)
    {
        return new Predis_ResponseError($errorMessage);
    }
}
