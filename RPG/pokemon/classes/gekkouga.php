<?php
class Gekkouga extends Pikatyuu
{
    const MAX_HITPOINT=80;
    private $hitPoint=80;
    private $attackPoint=5;
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
    public function doAttack($enemy)
    {
        if (rand(1, 2) === 1) {
            // スキルの発動
            echo "『" .$this->getName() . "』の『みずしゅりけん』！！".PHP_EOL;
            echo $enemy->getName() . " に " . $this->special. " のダメージ！".PHP_EOL;
            $enemy->tookDamage($this->special);
        } else {
            echo "『" .$this->getName() . "』のつじぎり！".PHP_EOL;
            //this 自分自身、つまりPokemonクラス　
            //this->name Pokemonクラスの$nameを参照していること
            echo "【" . $enemy->getName() . "】に " . $this->attackPoint . " のダメージ！".PHP_EOL; //PHP_EOLで改行するンゴ
            $enemy->tookDamage($this->attackPoint);
            //親クラスのメゾットを使いまさす場合はparent::doAttack($enemy);
        }
        return true;
    }
}
