<?php

return [
    'module.EventImporter' => [
        'enable'=> function()
        {
            $app = MapasCulturais\App::i();
            $allow = [101124,34866,26250,109563,109559,36280];
            if(is_array($app->user->profile->id, $allow)){
                return true;
            }
        }
    ]
];
