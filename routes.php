<?php
    include('dbconnect.php');

    $params = explode('/', $_GET['url']);

    $resource = $params[0];
    $action = $params[1];

    // URLにidが指定された場合
    if (count($params) > 2) {
        $id = $params[2];
    }

    $table_name = singular2plural($resource);

    include('./models/' . $resource . '.php'); // model呼び出す
    include('./controllers/' . $table_name . '_controller.php'); // controller呼び出す
    include('./views/helpers/application_helper.php'); // ヘルパーの読み込み
    include('./views/layouts/application.php'); // レイアウトファイルを読み込み

    // http://qiita.com/mpyw/items/41230bec5c02142ae691 参考
?>


<?php
    // 単数形resource名の単語を複数形に変換する関数
    function singular2plural($singular) {
        $dictionary = array(
            'man' => 'men',
            'seaman' => 'seamen',
            'snowman' => 'snowmen',
            'woman' => 'women',
            'person' => 'people',
            'child' => 'children',
            'foot' => 'feet',
            'crux' => 'cruces',
            'oasis' => 'oases',
            'phenomenon' => 'phenomena',
            'tooth' => 'teeth',
            'goose' => 'geese',
            'genus' => 'genera',
            'graffito' => 'graffiti',
            'mythos' => 'mythoi',
            'numen' => 'numina',
            'equipment' => 'equipment',
            'information' => 'information',
            'rice' => 'rice',
            'money' => 'money',
            'species' => 'species',
            'series' => 'series',
            'fish' => 'fish',
            'sheep' => 'sheep',
            'swiss' => 'swiss',
            'chief' => 'chiefs',
            'cliff' => 'cliffs',
            'proof' => 'proofs',
            'reef' => 'reefs',
            'relief' => 'reliefs',
            'roof' => 'roofs',
            'piano' => 'pianos',
            'photo' => 'photos',
            'safe' => 'safes'
        );

        if (array_key_exists($singular, $dictionary)) {
            $plural = $dictionary[$singular];
        } elseif (preg_match('/(a|i|u|e|o)o$/', $singular)) {
            $plural = $singular . "s";
        } elseif (preg_match('/(s|x|sh|ch|o)$/', $singular)) {
            $plural = preg_replace('/(s|x|sh|ch|o)$/', '$1es', $singular);
        } elseif (preg_match('/(b|c|d|f|g|h|j|k|l|m|n|p|q|r|s|t|v|w|x|y|z)y$/', $singular)) {
            $plural = preg_replace('/(b|c|d|f|g|h|j|k|l|m|n|p|q|r|s|t|v|w|x|y|z)y$/', '$1ies', $singular);
        } elseif (preg_match('/(f|fe)$/', $singular)) {
            $plural = preg_replace('/(f|fe)$/', 'ves', $singular);
        } else {
            $plural = $singular . "s";
        }
        return $plural;
    }
?>















