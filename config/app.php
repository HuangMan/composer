<?php
// 使用databaseProvider，不然APP中无法找到当前类
use hd\config\databaseProvider;

return [

    "providers"=>[
        databaseProvider::class,

    ]
    ];