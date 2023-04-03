<?php

return [
    'module.EventImporter' => [
    "enabled" => function() {
        $app = MapasCulturais\App::i();
        $allowd =[34866,26250,109563,109559,36280];
        
        if(in_array($app->user->profile->id, $allowd)){
            return true;
        }
    },
]
];