<?php

class Rizardon extends Pikatyuu
{
    const MAX_HITPOINT = 150;
    private $hitPoint = self::MAX_HITPOINT; //selfｈリザードン自身のＨＰをみるということ
    private $attackPoint = 30;
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
        if (rand(1, 3) === 1) {
            // スキルの発動
            echo "『" .$this->getName() . "』の『だいもんじ』！！".PHP_EOL;
            echo $enemy->getName() . " に " . $this->attackPoint * 1.5 . " のダメージ！".PHP_EOL;
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            echo "『" .$this->getName() . "』のかえんほうしゃ！".PHP_EOL;
            //this 自分自身、つまりPokemonクラス　
            //this->name Pokemonクラスの$nameを参照していること
            echo "【" . $enemy->getName() . "】に " . $this->attackPoint . " のダメージ！".PHP_EOL; //PHP_EOLで改行するンゴ
            $enemy->tookDamage($this->attackPoint);
            //親クラスのメゾットを使いまさす場合はparent::doAttack($enemy);
        }
        return true;
    }
}
