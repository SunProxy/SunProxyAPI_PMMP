<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI\Packet;


use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;
use SunProxy\SunProxyAPI\SunProxyAPI;

class AuthPacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::PLANET_AUTH_PACKET;

    /**
     * @var string $key - the given TCP Auth Key in the SunProxy config file
     */
    public string $key;

    /**
     * @inheritDoc
     */
    public function encodePayload()
    {
        $this->putString($this->key);
    }

    /**
     * @inheritDoc
     */
    public function decodePayload()
    {
        $this->key = $this->getString();
    }

    /**
     * @inheritDoc
     */
    public function handle(NetworkSession $session): bool
    {
        return false;
    }
}