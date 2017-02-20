<?php
namespace jasonwynn10;

use pocketmine\item\Item;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
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
                if(count($args) >= 1) {
                    if($args[0] == $this->getConfig()->get("CodeName","Name")) {
                        foreach ($this->getConfig()->get("Prizes",[]) as $item) {
                            $arr = explode(":", $item);
                            if(count($arr) <= 2){
                                $this->getLogger()->debug("Invalid item in plugin config");
                                continue;
                            }
                            $i = Item::get($arr[0],$arr[1],$arr[2]);
                            if(count($arr) >= 4) {
                                $i->setCustomName($arr[3]);
                            }
                            $sender->getInventory()->addItem($i);
                            return true;
                        }
                    }
                }
                return false;
            }
        }
        return true;
    }
    public function onDisable() {
        $this->getLogger()->notice(TF::GREEN."Disabled!");
    }
}