<?php

return [
    'module.EventImporter' => [
    "enabled" => function() {
        $app = MapasCulturais\App::i();
        //IDS DOS EVENTOS QUE PODE TER OS IMPORTS
        $allowd =[101124,34866,26250,109563,109559,36280,105262,118108,5352,36831,6139,35355,40999,101129,100799,21927,28932,21390,114694,117511,25535,31200,101334,117447,99846,101124,34866,5352,110774,40179,14915,36368,114885,109559,26250,18468,5960];
        
        if(in_array($app->user->profile->id, $allowd)){
            return true;
        }
    },
]
];