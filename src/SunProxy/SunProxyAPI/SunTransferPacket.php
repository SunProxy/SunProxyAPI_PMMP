<?php


namespace SunProxy\SunProxyAPI;


use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;

class SunTransferPacket extends DataPacket /* implements ClientBoundPacket */
{
    public const NETWORK_ID = ProtocolInfo::TRANSFER_PACKET;

    /** @var string $address - the said ip the player should be transferred to */
    public $address;

    /** @var int $port - a uint16 representing the port the player should go to on the address */
    public $port = 19132;

    protected function decodePayload(){
        //read Address
        $this->address = $this->getString();
        //read uint16
        $this->port = ((\unpack("v", $this->get(2))[1]));
    }

    protected function encodePayload() {
        //Address
        $this->putString($this->address);
        //write uint16 to buffer
        ($this->buffer .= (\pack("v", $this->port)));
    }

    /**
     * @inheritDoc
     */
    public function handle(NetworkSession $session) : bool {
        //let client handle it as pmmp does this too
        return false;
    }
}