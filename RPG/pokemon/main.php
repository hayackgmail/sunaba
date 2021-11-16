<?php
require_once('./classes/Lives.php');
require_once('classes/pokemon.php');
require_once('classes/pikatyuu.php');
require_once('classes/kekking.php');
require_once('classes/gekkouga.php');
require_once('classes/hapinesu.php');
require_once('classes/enemy.php');
require_once('./classes/Message.php');
$members = array();
$members[] = new Pikatyuu('ピカチュウ');
$members[] = new Kekking('ケッキング');
$members[] = new Gekkouga('ゲッコウガ');
$members[] = new Hapinesu('ハピナス');
$enemies = array();
$enemies[] = new Enemy('イワーク', 75, 10);
$enemies[] = new Enemy('カイロス', 120, 25);
$enemies[] = new Enemy('ルージュラ', 100, 20);
$messageObj = new Message;
$turn = 1;
$isFinishFlg = false;

  // 終了条件の判定
  function isFinish($objects)
  {
      $deathCnt = 0; // HPが0以下の仲間の数
      foreach ($objects as $object) {
          // １人でもHPが０を超えていたらfalseを返す
          if ($object->getHitPoint() > 0) {
              return false;
          }
          $deathCnt++;
      }
      // 仲間の数が死亡数(HPが０以下の数)と同じであればtrueを返す
      if ($deathCnt === count($objects)) {
          return true;
      }
  }
while (!$isFinishFlg) {
    echo $turn . 'ターン目' . PHP_EOL;
    // 仲間の表示
    $messageObj->displayStatusMessage($members);
    // 敵の表示
    $messageObj->displayStatusMessage($enemies);
    // 仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);
 
    // 敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);
    // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
    $isFinishFlg = isFinish($members);
    if ($isFinishFlg) {
        $message = "GAME OVER ....\n\n";
        break;
    }
 
    $isFinishFlg = isFinish($enemies);
    if ($isFinishFlg) {
        $message = "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }
    /*
    foreach ($members as $member) {
        echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . PHP_EOL;
    }
    echo PHP_EOL;
    foreach ($enemies as $enemy) {
        echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . PHP_EOL;
    }
    echo PHP_EOL;
    */
    /*
       echo $pikatyuu->getName().":".$pikatyuu->getHitPoint()."/".$pikatyuu::MAX_HITPOINT.PHP_EOL;
       echo $kekking->getName().":".$kekking->getHitPoint()."/".$kekking::MAX_HITPOINT.PHP_EOL;
       echo $gekkouga->getName().":".$gekkouga->getHitPoint()."/".$gekkouga::MAX_HITPOINT.PHP_EOL;
       echo $hapinesu->getName().":".$hapinesu->getHitPoint()."/".$hapinesu::MAX_HITPOINT.PHP_EOL;
       echo $iwaku->getName().":".$iwaku->getHitPoint()."/".$iwaku::MAX_HITPOINT.PHP_EOL;
      */
    
    /*foreach ($members as $member) {
        // ハピネスの回復のために味方へも引数を渡す
        if (get_class($member) == "Hapinesu") {
            $member->doAttackHapinesu($enemies, $members);
        } else {
            $member->doAttack($enemies, $members);
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;
    foreach ($enemies as $enemy) {
        $enemy->doAttack($members);
        echo PHP_EOL;
    }
*/
    /*
      $pikatyuu->doAttack($iwaku);
      $kekking->doAttack($iwaku);
      $gekkouga->doAttack($iwaku);
      $hapinesu->doAttackHapinesu($iwaku, $pikatyuu);
      $iwaku->doAttack($pikatyuu);*/
/*
    // 仲間の全滅チェック
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($members as $member) {
        if ($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        echo "GAME OVER ....".PHP_EOL;
        break;
    }
    // 敵の全滅チェック
    $deathCnt = 0; // HPが0以下の敵の数
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo "♪♪♪ファンファーレ♪♪♪".PHP_EOL;
        break;
    }
    $turn++;
    echo PHP_EOL;
    */
}

echo '戦闘終了！'.PHP_EOL;
  echo $message;
/*
echo $pikatyuu->getName().":".$pikatyuu->getHitPoint()."/".$pikatyuu::MAX_HITPOINT.PHP_EOL;
echo $kekking->getName().":".$kekking->getHitPoint()."/".$kekking::MAX_HITPOINT.PHP_EOL;
echo $gekkouga->getName().":".$gekkouga->getHitPoint()."/".$gekkouga::MAX_HITPOINT.PHP_EOL;
echo $hapinesu->getName().":".$hapinesu->getHitPoint()."/".$hapinesu::MAX_HITPOINT.PHP_EOL;
echo $iwaku->getName().":".$iwaku->getHitPoint()."/".$iwaku::MAX_HITPOINT.PHP_EOL;
*/
// 仲間の表示
$messageObj->displayStatusMessage($members);
// 敵の表示
$messageObj->displayStatusMessage($enemies);
