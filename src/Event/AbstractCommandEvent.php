<?php
namespace GuzzleHttp\Command\Event;

use GuzzleHttp\Event\AbstractEvent;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\ServiceClientInterface;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Collection;

class AbstractCommandEvent extends AbstractEvent
{
    /** @var CommandTransaction */
    protected $trans;

    /**
     * @param CommandTransaction $trans Command transaction
     */
    public function __construct(CommandTransaction $trans)
    {
        $this->trans = $trans;
    }

    /**
     * Get the command associated with the event
     *
     * @return CommandInterface
     */
    public function getCommand()
    {
        return $this->trans->command;
    }

    /**
     * Gets the HTTP request that will be sent for the command (if one is set).
     *
     * @return RequestInterface|null
     */
    public function getRequest()
    {
        return $this->trans->request;
    }

    /**
     * Returns the result of the command if it was intercepted.
     *
     * @return mixed|null
     */
    public function getResult()
    {
        return $this->trans->result;
    }

    /**
     * Get the service client associated with the command transfer.
     *
     * @return ServiceClientInterface
     */
    public function getClient()
    {
        return $this->trans->serviceClient;
    }

    /**
     * Get context associated with the command transfer.
     *
     * The return value is a Guzzle collection object which can be accessed and
     * mutated like a PHP associative array. You can add arbitrary data to the
     * context for application specific purposes.
     *
     * @return Collection
     */
    public function getContext()
    {
        return $this->trans->context;
    }

    /**
     * Gets the transaction associated with the event
     *
     * @return CommandTransaction
     */
    public function getTransaction()
    {
        return $this->trans;
    }
}
