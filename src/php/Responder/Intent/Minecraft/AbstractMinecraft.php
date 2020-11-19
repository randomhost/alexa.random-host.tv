<?php

namespace randomhost\Alexa\Responder\Intent\Minecraft;

use randomhost\Alexa\Responder\AbstractResponder;
use randomhost\Alexa\Responder\ResponderInterface;

/**
 * Abstract base class for Minecraft Intents.
 *
 * @author    Ch'Ih-Yu <chi-yu@web.de>
 * @copyright 2020 random-host.tv
 * @license   https://opensource.org/licenses/BSD-3-Clause  BSD License (3 Clause)
 *
 * @see       https://random-host.tv
 */
abstract class AbstractMinecraft extends AbstractResponder implements ResponderInterface
{
    /**
     * Data from the minecraft Server.
     *
     * @var array
     */
    protected $data;

    /**
     * AbstractMinecraft constructor.
     *
     * @param array $data Data from the Minecraft server.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
