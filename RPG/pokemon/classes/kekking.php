<?php

class Kekking extends Pikatyuu
{
    const MAX_HITPOINT = 150;
    private $hitPoint = self::MAX_HITPOINT; //selfｈリザードン自身のＨＰをみるということ
    private $attackPoint = 30;
    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

   
    public function doAttack($enemy)
    {
        if (rand(1, 2) === 1) {
            // スキルの発動
            echo "『" .$this->getName() . "』の『ギガインパクト』！！".PHP_EOL;
            echo $enemy->getName() . " に " . $this->attackPoint * 2 . " のダメージ！".PHP_EOL;
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            echo "『" .$this->getName() . "』のなまける！".PHP_EOL;
            //this 自分自身、つまりPokemonクラス　
            //this->name Pokemonクラスの$nameを参照していること
            echo "『" .$this->getName() . "』はなまけている！".PHP_EOL;
            //親クラスのメゾットを使いまさす場合はparent::doAttack($enemy);
        }
        return true;
    }
}
