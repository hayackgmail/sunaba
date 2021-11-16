<?php
class Enemy
{
    const MAX_HITPOINT = 100; // 最大HPの定義 定数
    public $name; // 敵の名前
    public $hitPoint = 100; // 現在のHP
    public $attackPoint = 10; // 攻撃力
    public function __construct($name, $hitPoint, $attackPoint) // ここを変更
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint; // この行を追加
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
    public function doAttack($pokemon)
    {
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
}
