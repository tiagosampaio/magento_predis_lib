<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Predis\Connection;

use Predis\ClientException;
use Predis\CommunicationException;
use Predis\NotSupportedException;
use Predis\Command\CommandInterface;
use Predis\Protocol\ProtocolException;

/**
 * Base class with the common logic used by connection classes to communicate with Redis.
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
abstract class Predis_Connection_AbstractConnection implements Predis_Connection_SingleConnectionInterface
{
    private $resource;
    private $cachedId;

    protected $parameters;
    protected $initCmds = array();

    /**
     * @param ConnectionParametersInterface $parameters Parameters used to initialize the connection.
     */
    public function __construct(Predis_Connection_ConnectionParametersInterface $parameters)
    {
        $this->parameters = $this->checkParameters($parameters);
    }

    /**
     * Disconnects from the server and destroys the underlying resource when
     * PHP's garbage collector kicks in.
     */
    public function __destruct()
    {
        $this->disconnect();
    }

    /**
     * Checks some of the parameters used to initialize the connection.
     *
     * @param ConnectionParametersInterface $parameters Parameters used to initialize the connection.
     */
    protected function checkParameters(Predis_Connection_ConnectionParametersInterface $parameters)
    {
        switch ($parameters->scheme) {
            case 'unix':
                if (!isset($parameters->path)) {
                    throw new \InvalidArgumentException('Missing UNIX domain socket path');
                }

            case 'tcp':
                return $parameters;

            default:
                throw new \InvalidArgumentException("Invalid scheme: {$parameters->scheme}");
        }
    }

    /**
     * Creates the underlying resource used to communicate with Redis.
     *
     * @return mixed
     */
    protected abstract function createResource();

    /**
     * {@inheritdoc}
     */
    public function isConnected()
    {
        return isset($this->resource);
    }

    /**
     * {@inheritdoc}
     */
    public function connect()
    {
        if ($this->isConnected()) {
            throw new Predis_ClientException('Connection already estabilished');
        }

        $this->resource = $this->createResource();
    }

    /**
     * {@inheritdoc}
     */
    public function disconnect()
    {
        unset($this->resource);
    }

    /**
     * {@inheritdoc}
     */
    public function pushInitCommand(Predis_Command_CommandInterface $command)
    {
        $this->initCmds[] = $command;
    }

    /**
     * {@inheritdoc}
     */
    public function executeCommand(Predis_Command_CommandInterface $command)
    {
        $this->writeCommand($command);
        return $this->readResponse($command);
    }

    /**
     * {@inheritdoc}
     */
    public function readResponse(Predis_Command_CommandInterface $command)
    {
        return $this->read();
    }

    /**
     * Helper method to handle connection errors.
     *
     * @param string $message Error message.
     * @param int $code Error code.
     */
    protected function onConnectionError($message, $code = null)
    {
        CommunicationException::handle(new Predis_Connection_ConnectionException($this, "$message [{$this->parameters->scheme}://{$this->getIdentifier()}]", $code));
    }

    /**
     * Helper method to handle protocol errors.
     *
     * @param string $message Error message.
     */
    protected function onProtocolError($message)
    {
        CommunicationException::handle(new Predis_Protocol_ProtocolException($this, "$message [{$this->parameters->scheme}://{$this->getIdentifier()}]"));
    }

    /**
     * Helper method to handle not supported connection parameters.
     *
     * @param string $option Name of the option.
     * @param mixed $parameters Parameters used to initialize the connection.
     */
    protected function onInvalidOption($option, $parameters = null)
    {
        $class = get_called_class();
        $message = "Invalid option for connection $class: $option";

        if (isset($parameters)) {
            $message .= sprintf(' [%s => %s]', $option, $parameters->{$option});
        }

        throw new Predis_NotSupportedException($message);
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        if (isset($this->resource)) {
            return $this->resource;
        }

        $this->connect();

        return $this->resource;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Gets an identifier for the connection.
     *
     * @return string
     */
    protected function getIdentifier()
    {
        if ($this->parameters->scheme === 'unix') {
            return $this->parameters->path;
        }

        return "{$this->parameters->host}:{$this->parameters->port}";
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        if (!isset($this->cachedId)) {
            $this->cachedId = $this->getIdentifier();
        }

        return $this->cachedId;
    }

    /**
     * {@inheritdoc}
     */
    public function __sleep()
    {
        return array('parameters', 'initCmds');
    }
}
