<?php


namespace SunProxy\SunProxyAPI;


use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;

class SunTextPacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::SUN_TEXT_PACKET;

    /** @var string $message - the given message to be sent proxy wide */
    public $message;

    protected function decodePayload(){
        //read Message
        $this->message = $this->getString();
    }

    protected function encodePayload() {
        //Write Message
        $this->putString($this->message);
    }


    /**
     * @inheritDoc
     */
    public function handle(NetworkSession $session): bool
    {
        return false;
    }
}