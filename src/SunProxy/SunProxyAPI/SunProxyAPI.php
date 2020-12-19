<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

use pocketmine\network\mcpe\protocol\PacketPool;
use pocketmine\Player;

class SunProxyAPI
{
    /**
     * The ID of the SunTransferPacket
     */
    public const SUN_TRANSFER_PACKET = 0x300;
    /**
     * The ID of the SunTextPacket
     */
    public const SUN_TEXT_PACKET = 0x301;

    /**
     * @author Jviguy
     *
     * Registers the Custom Proxy packets for use!
     *
     * @api - MUST BE CALLED THIS NEEDS TO BE CALLED BEFORE USING ANY API METHOD OR PACKET
     */
    public static function Register() {
        PacketPool::registerPacket(new SunTransferPacket());
        PacketPool::registerPacket(new SunTextPacket());
    }

    /**
     * @author Jviguy
     *
     * Uses the FastTransfer Packet to Transfer a player to a new server faster!
     *
     * @param Player $player - the player to be fast transferred
     * @param string $address - the ip address of the new server
     * @param int $port - a uint16 representing the port
     */
    public static function FastTransferPlayer(Player $player, string $address, int $port = 19132) {
        $pk = new SunTransferPacket();
        $pk->address = $address;
        $pk->port = $port;
        $player->sendDataPacket($pk);
    }

    /**
     * @author Jviguy
     *
     * Sends a proxy wide chat through a single player node
     *
     * @param Player $player - the player to send the packet to
     * @param string $msg - the message to be sent
     */
    public static function SendProxyWideChat(Player $player, string $msg) {
        $pk = new SunTextPacket();
        $pk->message = $msg;
        $player->sendDataPacket($pk);
    }
}