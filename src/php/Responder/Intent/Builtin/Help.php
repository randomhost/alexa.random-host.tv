<?php

namespace randomhost\Alexa\Responder\Intent\Builtin;

use randomhost\Alexa\Responder\AbstractResponder;
use randomhost\Alexa\Responder\ResponderInterface;

/**
 * Help Intent.
 *
 * @author    Ch'Ih-Yu <chi-yu@web.de>
 * @copyright 2020 random-host.tv
 * @license   https://opensource.org/licenses/BSD-3-Clause  BSD License (3 Clause)
 *
 * @see       https://random-host.tv
 */
class Help extends AbstractResponder implements ResponderInterface
{
    /**
     * Help output.
     *
     * @var array
     */
    protected $helpOutput
        = [
            'In der Rubrik Minecraft:',
            'Anzahl der Spieler,',
            'Spieler Liste,',
            'oder Version des Servers.',
            'In der Rubrik TeamSpeak:',
            'Anzahl der Benutzer,',
            'Benutzer Liste,',
            'In der Rubrik System:',
            'System Auslastung,',
            'System Updates,',
            'oder System Uptime.',
            'In der Rubrik Sonstiges:',
            'Random Facts.',
        ];

    /**
     * Runs the Responder.
     *
     * @return $this
     */
    public function run(): ResponderInterface
    {
        $responses = $this->config->get('response', 'help');
        if (is_null($responses) || empty($responses)) {
            $responses = ['Folgende Funktionen sind verfügbar:'];
        }

        $this->response
            ->respondSSML(
                sprintf(
                    $this->withSound(self::SOUND_CONFIRM, "%s\r\n%s"),
                    $this->randomizeResponseText($responses),
                    implode("\r\n", $this->helpOutput)
                )
            )
            ->withCard(
                'Verfügbare Funktionen',
                "Minecraft:\r\n".
                "- Wie viele Spieler sind auf dem Minecraft Server?\n".
                "- Welche Spieler sind auf dem Minecraft Server?\n".
                "- Wie ist die Version des Minecraft Servers?\r\n".
                "TeamSpeak:\r\n".
                "- Wie viele Benutzer sind auf dem TeamSpeak Server?\n".
                "- Welche Benutzer sind auf dem TeamSpeak Server?\r\n".
                "System:\r\n".
                "- Wie ist die System Auslastung?\n".
                "- Gibt es System Updates?\n".
                "- Wie ist die System Uptime?\r\n".
                "Sonstiges:\r\n".
                '- Gib mir einen Random Fact.'
            )
            ->endSession(false)
        ;

        return $this;
    }
}
