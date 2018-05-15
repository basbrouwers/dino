<?php

return [
    'shelter.animals' => [
        'index' => 'shelter::animals.list resource',
        'create' => 'shelter::animals.create resource',
        'edit' => 'shelter::animals.edit resource',
        'view' => 'shelter::animals.view resource',
        'destroy' => 'shelter::animals.destroy resource',
    ],
    'shelter.owners' => [
        'index' => 'shelter::owners.list resource',
        'create' => 'shelter::owners.create resource',
        'edit' => 'shelter::owners.edit resource',
        'destroy' => 'shelter::owners.destroy resource',
    ],
    'shelter.breeds' => [
        'index' => 'shelter::breeds.list resource',
        'create' => 'shelter::breeds.create resource',
        'edit' => 'shelter::breeds.edit resource',
        'destroy' => 'shelter::breeds.destroy resource',
    ],
// append



];
