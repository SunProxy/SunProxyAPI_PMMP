<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;

class PlanetTransferPacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::PLANET_TRANSFER_PACKET;

    /** @var string $address - the said ip the player should be transferred to */
    public string $address;

    /** @var int $port - a uint16 representing the port the player should go to on the address */
    public int $port = 19132;

    /** @var string $user - string holding the raw player uuid to be transferred. */
    public string $user;

    protected function decodePayload(){
        //read Address
        $this->address = $this->getString();
        //read uint16
        $this->port = ((unpack("v", $this->get(2))[1]));
        //Read user
        $this->user = $this->getString();
    }

    protected function encodePayload() {
        //Address
        $this->putString($this->address);
        //write uint16 to buffer
        ($this->buffer .= (pack("v", $this->port)));
        //write String into buffer
        $this->putString($this->user);
    }

    /**
     * @inheritDoc
     */
    public function handle(NetworkSession $session): bool
    {
        return false;
    }
}