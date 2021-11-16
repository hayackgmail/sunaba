<?php
class Message
{
    // ステータス表示
    public function displayStatusMessage($objects)
    {
        foreach ($objects as $object) {
            echo $object->getName() . "　：　" . $object->getHitPoint() . "/" . $object::MAX_HITPOINT . PHP_EOL;
        }
        echo PHP_EOL;
    }
    // 攻撃メッセージ
    public function displayAttackMessage($objects, $targets)
    {
        foreach ($objects as $object) {
            // 回復の場合、味方のオブジェクトも渡す
            if (get_class($object) == "Hapinesu") {
                $attackResult = $object->doAttackHapinesu($targets, $objects);
            } else {
                $attackResult = $object->doAttack($targets);
            }
            if ($attackResult) {
                echo PHP_EOL;
            }
            $attackResult = false;
        }
        echo "\n";
    }
}
