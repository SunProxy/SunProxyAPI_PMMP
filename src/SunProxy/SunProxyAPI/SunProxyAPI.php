<?php

/*
      ___           ___           ___
     /  /\         /__/\         /__/\
    /  /:/_        \  \:\        \  \:\
   /  /:/ /\        \  \:\        \  \:\
  /  /:/ /::\   ___  \  \:\   _____\__\:\
 /__/:/ /:/\:\ /__/\  \__\:\ /__/::::::::\
 \  \:\/:/~/:/ \  \:\ /  /:/ \  \:\~~\~~\/
  \  \::/ /:/   \  \:\  /:/   \  \:\  ~~~
   \__\/ /:/     \  \:\/:/     \  \:\
     /__/:/       \  \::/       \  \:\
     \__\/         \__\/         \__\/

MIT License

Copyright (c) 2020 Jviguy

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
 */

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

use pocketmine\network\mcpe\protocol\PacketPool;
use pocketmine\Player;

class SunProxyAPI
{
    /**
     * The ID of the SunTransferPacket
     */
    public const SUN_TRANSFER_PACKET = 0xFA;

    /**
     * The ID of the SunTextPacket
     */
    public const SUN_TEXT_PACKET = 0xFB;

    /**
     * The ID of the AuthPacket
     */
    public const PLANET_AUTH_PACKET = 0x00;

    /**
     * The ID of the DisconnectPacket
     */
    public const PLANET_DISCONNECT_PACKET = 0x01;

    /**
     * The ID of the PlanetTransferPacket
     */
    public const PLANET_TRANSFER_PACKET = 0x02;

    /**
     * The ID of the TransferResponsePacket
     */
    public const PLANET_TRANSFER_RESPONSE_PACKET = 0x03;

    /**
     * The ID of the PlanetTextPacket
     */
    public const PLANET_TEXT_PACKET = 0x04;

    /**
     * The ID of the TextResponsePacket
     */
    public const PLANET_TEXT_RESPONSE_PACKET = 0x05;

    /**
     * @api - MUST BE CALLED THIS NEEDS TO BE CALLED BEFORE USING ANY API METHOD OR PACKET
     * @author Jviguy
     *
     * Registers the Custom Proxy packets for use!
     *
     */
    public static function Register() {
        PacketPool::registerPacket(new SunTransferPacket());
        PacketPool::registerPacket(new SunTextPacket());
        PacketPool::registerPacket(new AuthPacket());
        PacketPool::registerPacket(new DisconnectPacket());
        PacketPool::registerPacket(new PlanetTransferPacket());
        PacketPool::registerPacket(new TransferResponsePacket());
        PacketPool::registerPacket(new PlanetTextPacket());
        PacketPool::registerPacket(new TextResponsepacket());
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

    /**
     * @author Jviguy
     *
     * Sends a message to the said servers if there are players on it
     *
     * @param Player $player - the player to send the packet too
     * @param string $msg - the message to be sent
     * @param array $servers - an array of ips formatted like "IP:PORT"
     */
    public static function SendChatToServers(Player $player, string $msg, array $servers) {
        $pk = new SunTextPacket();
        $pk->message = $msg;
        $pk->servers = $servers;
        $player->sendDataPacket($pk);
    }
}