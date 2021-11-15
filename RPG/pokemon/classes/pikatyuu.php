<?php
class Pikatyuu
{
    const MAX_HITPOINT=100; //定数の定義は大文字だお
    private $name;
    private $hitPoint=100;
    private $attackPoint=20;
    public function getName()
    {  //プライベートの変数を呼び出す　//HPは初期値があるから返さなくておK
        return $this->name;
    }
    public function __construct($name)
    {
        $this->name = $name;
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
        echo "『" .$this->getName() . "』の10万ボルト！".PHP_EOL;
        //this 自分自身、つまりPokemonクラス　
        //this->name Pokemonクラスの$nameを参照していること
         echo "【" . $enemy->getName() . "】に " . $this->attackPoint . " のダメージ！".PHP_EOL; //PHP_EOLで改行するンゴ
        $enemy->tookDamage($this->attackPoint);
    }
    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;
        if ($this->hitPoint > $target::MAX_HITPOINT) {
            $this->hitPoint = $target::MAX_HITPOINT;
        }
    }
}
