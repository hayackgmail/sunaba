<?php
require_once('classes/pikatyuu.php');
require_once('classes/rizardon.php');
require_once('classes/gekkouga.php');
require_once('classes/hapinesu.php');
require_once('classes/enemy.php');

$pikatyuu=new Pikatyuu('ピカチュウ');
$rizardon=new Rizardon('リザードン');
$gekkouga=new Gekkouga('ゲッコウガ');
$hapinesu=new Hapinesu('ハピナス');
$iwaku=new enemy('イワーク');

$turn=1;
while ($pikatyuu->getHitPoint() > 0 && $iwaku->getHitPoint() > 0) {
    echo $turn.'ターン目'.PHP_EOL;
    echo $pikatyuu->getName().":".$pikatyuu->getHitPoint()."/".$pikatyuu::MAX_HITPOINT.PHP_EOL;
    echo $rizardon->getName().":".$rizardon->getHitPoint()."/".$rizardon::MAX_HITPOINT.PHP_EOL;
    echo $gekkouga->getName().":".$gekkouga->getHitPoint()."/".$gekkouga::MAX_HITPOINT.PHP_EOL;
    echo $hapinesu->getName().":".$hapinesu->getHitPoint()."/".$hapinesu::MAX_HITPOINT.PHP_EOL;
    echo $iwaku->getName().":".$iwaku->getHitPoint()."/".$iwaku::MAX_HITPOINT.PHP_EOL;
    $pikatyuu->doAttack($iwaku);
    $rizardon->doAttack($iwaku);
    $gekkouga->doAttack($iwaku);
    $hapinesu->doAttackHapinesu($iwaku, $pikatyuu);
    $iwaku->doAttack($pikatyuu);
    $turn++;
    echo PHP_EOL;
}
echo '戦闘終了！'.PHP_EOL;
echo $pikatyuu->getName().":".$pikatyuu->getHitPoint()."/".$pikatyuu::MAX_HITPOINT.PHP_EOL;
echo $rizardon->getName().":".$rizardon->getHitPoint()."/".$rizardon::MAX_HITPOINT.PHP_EOL;
echo $gekkouga->getName().":".$gekkouga->getHitPoint()."/".$gekkouga::MAX_HITPOINT.PHP_EOL;
echo $hapinesu->getName().":".$hapinesu->getHitPoint()."/".$hapinesu::MAX_HITPOINT.PHP_EOL;
echo $iwaku->getName().":".$iwaku->getHitPoint()."/".$iwaku::MAX_HITPOINT.PHP_EOL;
