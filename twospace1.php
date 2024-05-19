<?php

namespace Project\Module;
// ここはProject Module 名前空間の中

class Directory {}
// Project\Module\Directory クラス

namespace Project\Module2;
// ここはProject Module2 名前空間の中

class Directory {}
// Project\Module2\Directory クラス

class SomeClass {
    //コンストラクタ
    public function __construct()
    {
     echo 'twospace1 someClass';
    }
 }

namespace Foo\Bar;

    class Baz {
        //コンストラクタ
        public function __construct()
        {
            echo 'twospace2 Foo\Bar\Baz';
        }
    }

//こっちの書き方が混在するとエラー出る　namespace Foo\Bar{}