# <p align="center"><img src="https://github.com/SunProxy/sun/blob/master/SunProxy.png"/></p>
the pmmp virion for interacting with the sun proxy api


# Usage
This virion is meant to be used with a server using the [SunProxy](https://github.com/SunProxy/sun) <br>
### Fast Transfer
```php
//Use the class 
use SunProxy\SunProxyAPI\SunProxyAPI;

class Main extends \pocketmine\plugin\PluginBase {
    public function onEnable() {
        //Is always needed to start up Packet usage
        SunProxyAPI::Register();
    }

    public function onCommand(\pocketmine\command\CommandSender $sender,\pocketmine\command\Command $command,string $label, array $args) : bool {
        switch ($label) {
            case "transfer":
                if ($sender instanceof \pocketmine\Player) {
                    //transfer players based on arg input
                    SunProxyAPI::FastTransferPlayer($sender, $args[0], (int) $args[1]);
                }
        }
        return true;
    }

}
```
### Proxy Wide Chat
```php
//Use the class 
use SunProxy\SunProxyAPI\SunProxyAPI;

class Main extends \pocketmine\plugin\PluginBase {
    public function onEnable() {
        //Is always needed to start up Packet usage
        SunProxyAPI::Register();
    }

    public function onChat(\pocketmine\event\player\PlayerChatEvent $event) {
        SunProxyAPI::SendProxyWideChat($event->getPlayer(), $event->getMessage());
    }
}
```

# License
```
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
SOFTWARE.```