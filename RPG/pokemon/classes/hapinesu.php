<?php
class Hapinesu extends Pikatyuu
{
    const MAX_HITPOINT=80;
    private $hitPoint=80;
    private $attackPoint=10;
    private $special = 30;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getHitPoint()
    {
        return $this->hitPoint;
    }
    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
    public function doAttackHapinesu($enemy, $pikatyuu)
    {
        if (rand(1, 2) === 1) {
            echo "『" .$this->getName() . "』のタマゴうみ！\n";
            echo $pikatyuu->getName() . " のHPを " . $this->intelligence * 1.5 . " 回復！\n";
            $pikatyuu->recoveryDamage($this->intelligence * 1.5, $pikatyuu);
        } else {
            echo "『" .$this->getName() . "』のタマゴばくだん！".PHP_EOL;
            //this 自分自身、つまりPokemonクラス　
            //this->name Pokemonクラスの$nameを参照していること
            echo "【" . $enemy->getName() . "】に " . $this->attackPoint . " のダメージ！".PHP_EOL; //PHP_EOLで改行するンゴ
            $enemy->tookDamage($this->attackPoint);
            //親クラスのメゾットを使いまさす場合はparent::doAttack($enemy);
        }
        return true;
    }
}
