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

use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;

class SunTextPacket extends DataPacket
{
    public const NETWORK_ID = SunProxyAPI::SUN_TEXT_PACKET;

    /** @var string $message - the given message to be sent proxy wide */
    public $message;

    /** @var string[] $servers - An array of ips that messages will be sent too */
    public $servers = [];

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