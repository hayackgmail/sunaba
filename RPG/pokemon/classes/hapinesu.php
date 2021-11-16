<?php
class Hapinesu extends Pokemon
{
    const MAX_HITPOINT=80;
    private $hitPoint=80;
    private $attackPoint=10;
    private $special = 30;
    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }
    
    public function doAttackHapinesu($enemies, $pokemons)
    {
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }

        $pokemonIndex = rand(0, count($pokemons) - 1); // 添字は0から始まるので、-1する
        $pokemon = $pokemons[$pokemonIndex];

        $enemyIndex = rand(0, count($enemies) - 1); // 添字は0から始まるので、-1する
        $enemy = $enemies[$enemyIndex];
        
        if (rand(1, 2) === 1) {
            echo "『" .$this->getName() . "』のタマゴうみ！".PHP_EOL;
            echo $pokemon->getName() . " のHPを " . $this->special * 1.5 . " 回復！".PHP_EOL;
            $pokemon->recoveryDamage($this->special * 1.5, $pokemon);
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
