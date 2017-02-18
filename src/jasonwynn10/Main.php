<?php
namespace jasonwynn10;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;

class Main extends PluginBase {
    public function onEnable() {
        $this->saveDefaultConfig();
        $this->getLogger()->notice(TF::GREEN."Enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        if(strtolower($command) == "code") {
            if($sender instanceof Player) {
                if(isset($args)) {
                    if(strtolower($args[0]) == "reset") {
                        #
                    }
                }
                #
            }
        }
        return true;
    }
    public function onDisable() {
        $this->getLogger()->notice(TF::GREEN."Disabled!");
    }
}