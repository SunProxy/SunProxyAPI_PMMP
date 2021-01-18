<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;

class TextResponsePacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::PLANET_TEXT_RESPONSE_PACKET;

    /**
     * @var int $type - A byte representing the type of response we got back Shown in Types/TextResponse.php
     */
    public int $type;

    /**
     * @var string $message - the message returned in the response
     */
    public string $message;


    public function encodePayload()
    {
        $this->putByte($this->type);
        $this->putString($this->message);
    }

    public function decodePayload()
    {
        $this->type = $this->getByte();
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