<?php

namespace Playgrounds\Domain;

class LogInfo
{
    /** @var string|null */
    public $ipAddress;

    /** @var string|null */
    public $username;

    /** @var \DateTime */
    public $time;

    /**
     * UserInformation constructor.
     *
     * @param null|string $ipAddress
     * @param null|string $username
     */
    public function __construct($ipAddress, $username)
    {
        $this->ipAddress = $ipAddress;
        $this->username = $username;
        $this->time = new \DateTime();
    }
}
