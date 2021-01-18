<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;

class DisconnectPacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::PLANET_DISCONNECT_PACKET;

    /**
     * @var string $message - the message given for the disconnect.
     */
    public string $message;


    public function encodePayload()
    {
        $this->putString($this->message);
    }

    public function decodePayload()
    {
        $this->message = $this->getString();
    }

    /**
     * @inheritDoc
     */
    public function handle(NetworkSession $session): bool
    {
        return false;
    }
}