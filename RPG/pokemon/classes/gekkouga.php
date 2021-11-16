<?php
class Gekkouga extends Pokemon
{
    const MAX_HITPOINT=100;
    private $hitPoint=100;
    private $attackPoint=20;
    private $special = 10;
    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }
   
    public function doAttack($enemies)
    {
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1); // 添字は0から始まるので、-1する
        $enemy = $enemies[$enemyIndex];
        if (rand(1, 2) === 1) {
            // スキルの発動
            echo "『" .$this->getName() . "』の『みずしゅりけん』！！".PHP_EOL;
            echo $enemy->getName() . " に " . $this->special. " のダメージ！".PHP_EOL;
            $enemy->tookDamage($this->special);
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
