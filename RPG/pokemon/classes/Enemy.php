<?php
class Enemy extends Lives
{
    const MAX_HITPOINT = 100;    // 最大HPの定義 定数
    /*
    public $name; // 敵の名前
    public $hitPoint = 100; // 現在のHP
    public $attackPoint = 10; // 攻撃力
    */
    public function __construct($name, $hitPoint, $attackPoint) // ここを変更
    {
        /*
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint; // この行を追加
        */
        $special = 0;
        parent::__construct($name, $hitPoint, $attackPoint, $special);
    }
    /*
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
    public function doAttack($pokemons)
    {
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }

        $pokemonIndex = rand(0, count($pokemons) - 1); // 添字は0から始まるので、-1する
        $pokemon = $pokemons[$pokemonIndex]
        ;
        echo "『" .$this->getName() . "』の攻撃！".PHP_EOL;
        echo "【" . $pokemon->getName() . "】に " . $this->attackPoint . " のダメージ！".PHP_EOL;
        $pokemon->tookDamage($this->attackPoint);
    }
    public function tookDamage($damage)
    {
        $this->hitPoint-=$damage;
        if ($this->hitPoint<0) {
            $this->hitPoint=0;
        }
    }
    */
}
