<?php
class Pokemon extends Lives
{
    const MAX_HITPOINT=100; //定数の定義は大文字だお
    /*
    private $name;
    private $hitPoint=100;
    private $attackPoint=20;
    */
    public function __construct($name, $hitPoint = 100, $attackPoint = 20, $special=0)
    {
        /*
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
        */
        parent::__construct($name, $hitPoint, $attackPoint, $special);
    }
    /*
    public function getName()
    {  //プライベートの変数を呼び出す　//HPは初期値があるから返さなくておK
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
    public function doAttack($enemies)
    {
        if ($this->hitPoint <= 0) {
            return false;
        }
        $enemyIndex = rand(0, count($enemies) - 1); // 添字は0から始まるので、-1する
        $enemy = $enemies[$enemyIndex];

        echo "『" .$this->getName() . "』のたいあたり！".PHP_EOL;
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
    */
}
