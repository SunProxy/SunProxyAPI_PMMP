<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;

class PlanetTextPacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::PLANET_TEXT_PACKET;

    /** @var string $message - the given message to be sent proxy wide */
    public string $message;

    /** @var string[] $servers - An array of ips that messages will be sent too */
    public array $servers = [];

    protected function decodePayload(){
        //read Message
        $this->message = $this->getString();
        //Read the count
        $count = $this->getUnsignedVarInt();
        //Read the servers
        for ($i = 0; $i < $count; $i++) {
            $this->message[] = $this->getString();
        }
    }

    protected function encodePayload() {
        //Write Message
        $this->putString($this->message);
        //Put the count
        $this->putUnsignedVarInt(count($this->servers));
        //Put all the servers
        foreach ($this->servers as $server) {
            $this->putString($server);
        }
    }

    /**
     * @inheritDoc
     */
    public function handle(NetworkSession $session): bool
    {
        return false;
    }
}