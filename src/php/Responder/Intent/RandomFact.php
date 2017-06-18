<?php

namespace randomhost\Alexa\Responder\Intent;

use randomhost\Alexa\Responder\AbstractResponder;
use randomhost\Alexa\Responder\ResponderInterface;

/**
 * RandomFact Intent.
 *
 * @author    Ch'Ih-Yu <chi-yu@web.de>
 * @copyright 2017 random-host.com
 * @license   http://www.debian.org/misc/bsd.license  BSD License (3 Clause)
 * @link      http://composer.random-host.com
 */
class RandomFact extends AbstractResponder implements ResponderInterface
{
    /**
     * Runs the Responder.
     *
     * @return $this
     */
    public function run()
    {
        $randomFacts = $this->config->get('response', 'randomFact');
        if (is_null($randomFacts) || empty($randomFacts)) {
            $this->response
                ->respond(
                    'Es wurden leider keine Facts configuriert. '.
                    'Kann ich dir sonst irgendwie helfen?'
                )
                ->endSession(false);

            return $this;
        }

        $this->response
            ->respond($this->randomizeResponseText($randomFacts))
            ->endSession(false);

        return $this;
    }
}
