<?php
$models=[
'Actor',
'Blog',
'Category',
'CategoryUser',
'Episode',
'EpisodeUser',
'Movie',
'MovieActor',
'MovieUser',
'Plan',
'Season',
'Serial',
'SerialActor',
'SerialCategory',
'SerialUser',
'Tag',
];

foreach($models as $model){
// system('php artisan make:policy '.$model.'Policy --model='.$model);
system('php artisan nova:resource '.$model);

}
?>
