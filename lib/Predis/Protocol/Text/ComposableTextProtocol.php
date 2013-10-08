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

use Predis\Command\CommandInterface;
use Predis\Connection\ComposableConnectionInterface;
use Predis\Protocol\ResponseReaderInterface;
use Predis\Protocol\CommandSerializerInterface;
use Predis\Protocol\ComposableProtocolInterface;

/**
 * Implements a customizable protocol processor that uses the standard Redis
 * wire protocol to serialize Redis commands and parse replies returned by
 * the server using a pluggable set of classes.
 *
 * @link http://redis.io/topics/protocol
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Protocol_Text_ComposableTextProtocol implements Predis_Protocol_ComposableProtocolInterface
{
    private $serializer;
    private $reader;

    /**
     * @param array $options Set of options used to initialize the protocol processor.
     */
    public function __construct(Array $options = array())
    {
        $this->setSerializer(new Predis_Protocol_Text_TextCommandSerializer());
        $this->setReader(new Predis_Protocol_Text_TextResponseReader());

        if (count($options) > 0) {
            $this->initializeOptions($options);
        }
    }

    /**
     * Initializes the protocol processor using a set of options.
     *
     * @param array $options Set of options.
     */
    private function initializeOptions(Array $options)
    {
        foreach ($options as $k => $v) {
            $this->setOption($k, $v);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setOption($option, $value)
    {
        switch ($option) {
            case 'iterable_multibulk':
                $handler = $value ? new Predis_Protocol_Text_ResponseMultiBulkStreamHandler() : new Predis_Protocol_Text_ResponseMultiBulkHandler();
                $this->reader->setHandler(TextProtocol::PREFIX_MULTI_BULK, $handler);
                break;

            default:
                throw new \InvalidArgumentException("The option $option is not supported by the current protocol");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(Predis_Command_CommandInterface $command)
    {
        return $this->serializer->serialize($command);
    }

    /**
     * {@inheritdoc}
     */
    public function write(Predis_Connection_ComposableConnectionInterface $connection, CommandInterface $command)
    {
        $connection->writeBytes($this->serializer->serialize($command));
    }

    /**
     * {@inheritdoc}
     */
    public function read(Predis_Connection_ComposableConnectionInterface $connection)
    {
        return $this->reader->read($connection);
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(Predis_Protocol_CommandSerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function setReader(ResponseReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * {@inheritdoc}
     */
    public function getReader()
    {
        return $this->reader;
    }
}
