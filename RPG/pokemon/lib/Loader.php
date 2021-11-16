<?php
class Loader
{
    // オートロード対象のディレクトリを保持するプロパティ
    private $directories = array();

    // オートロード対象のフォルダーのパスを$directoriesプロパティに配列形式で格納する。
    public function regDirectory($dir)
    {
        $this->directories[] = $dir;
        return;
    }

    // クラスを読み込むオブジェクトを登録するメソッド
    public function register()
    {
        // 自分自身のloadClass()メソッドをコールバックとして登録
        //sql_autoload_register(array(「コールバックされるインスタンス」, 「コールバックされるメソッド」))
        spl_autoload_register(array($this, 'loadClass'));
    }
    // register()によってオートロードに登録されたコールバック
    public function loadClass($className)
    {
        // パスを１個ずつ取り出す
        foreach ($this->directories as $dir) {
            // クラスファイルへのパスを生成
            $filePath = $dir . '/' . $className . '.php';
            // $filePathが読み込めるかどうかチェック ファイルの大文字小文字注意
            if (is_readable($filePath)) {
                // 読み込めたら、requireして、ループ終了
                require $filePath;
                return;
            }
        }
    }
}
