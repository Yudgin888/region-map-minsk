<?php
$regions = [
    'minsk' => ['lat' => 53.8978979, 'lng' => 27.5223145, 'zoom' => 11, 'decs' => 'Минск'],
    'saviecki' => ['lat' => 53.9404821, 'lng' => 27.6016771, 'zoom' => 12.75, 'decs' => 'Советский'],
    'pyershamayski' => ['lat' => 53.9300958, 'lng' => 27.623531, 'zoom' => 12.5, 'decs' => 'Первомайский'],
    'partyzanski' => ['lat' => 53.9017857, 'lng' => 27.6396909, 'zoom' => 13.25, 'decs' => 'Партизанский'],
    'zavodski' => ['lat' => 53.8498558, 'lng' => 27.6327213, 'zoom' => 12, 'decs' => 'Заводской'],
    'lyeninski' => ['lat' => 53.867774, 'lng' => 27.590935, 'zoom' => 12.75, 'decs' => 'Ленинский'],
    'maskouski' => ['lat' => 53.8712811, 'lng' => 27.4164494, 'zoom' => 12, 'decs' => 'Московский'],
    'frunzyenski' => ['lat' => 53.8974029, 'lng' => 27.4659675, 'zoom' => 13, 'decs' => 'Фрунзенский'],
    'centralny' => ['lat' => 53.9343415, 'lng' => 27.4344149, 'zoom' => 12, 'decs' => 'Центральный'],
    'kastrycnicki' => ['lat' => 53.8448112, 'lng' => 27.5726499, 'zoom' => 12.5, 'decs' => 'Октябрьский']
];

$reg_marks = [
    'saviecki' => [
        ['label' => 'A', 'lat' => 53.9486881, 'lng' => 27.5864893, 'content' => '<p class="content">Описание А<br>(saviecki)</p>', 'desc' => 'Описание А (saviecki)'],
        ['label' => 'B', 'lat' => 53.9593091, 'lng' => 27.6065703, 'content' => '<p class="content">Описание B<br>(saviecki)</p>', 'desc' => 'Описание B (saviecki)'],
    ],
    'pyershamayski' => [
        ['label' => 'A', 'lat' => 53.9438441, 'lng' => 27.7164783, 'content' => '<p class="content">Описание А<br>(pyershamayski)</p>', 'desc' => 'Описание А (pyershamayski)'],
        ['label' => 'B', 'lat' => 53.9260371, 'lng' => 27.6183483, 'content' => '<p class="content">Описание B<br>(pyershamayski)</p>', 'desc' => 'Описание B (pyershamayski)'],
    ],
    'partyzanski' => [
        ['label' => 'A', 'lat' => 53.9024611, 'lng' => 27.6281113, 'content' => '<p class="content">Описание А<br>(partyzanski)</p>', 'desc' => 'Описание А (partyzanski)'],
    ],
    'zavodski' => [
        ['label' => 'A', 'lat' => 53.8736321, 'lng' => 27.6328513, 'content' => '<p class="content">Описание А<br>(zavodski)</p>', 'desc' => 'Описание А (zavodski)'],
        ['label' => 'B', 'lat' => 53.865308, 'lng' => 27.662060, 'content' => '<p class="content">Описание B<br>(zavodski)</p>', 'desc' => 'Описание B (zavodski)'],
    ],
    'lyeninski' => [
        ['label' => 'A', 'lat' => 53.858119, 'lng' => 27.591049, 'content' => '<p class="content">Описание А<br>(lyeninski)</p>', 'desc' => 'Описание А (lyeninski)'],
    ],
    'maskouski' => [
        ['label' => 'A', 'lat' => 53.860365, 'lng' => 27.463140, 'content' => '<p class="content">Описание А<br>(maskouski)</p>', 'desc' => 'Описание А (maskouski)'],
    ],
    'frunzyenski' => [
        ['label' => 'A', 'lat' => 53.907027, 'lng' => 27.454133, 'content' => '<p class="content">Описание А<br>(frunzyenski)</p>', 'desc' => 'Описание А (frunzyenski)'],
    ],
    'centralny' => [
        ['label' => 'A', 'lat' => 53.939509, 'lng' => 27.488836, 'content' => '<p class="content">Описание А<br>(centralny)</p>', 'desc' => 'Описание А (centralny)'],
    ],
    'kastrycnicki' => [
        ['label' => 'A', 'lat' => 53.850408, 'lng' => 27.536852, 'content' => '<p class="content">Описание А<br>(kastrycnicki)</p>', 'desc' => 'Описание А (kastrycnicki)'],
        ['label' => 'B', 'lat' => 53.814356, 'lng' => 27.584152, 'content' => '<p class="content">Описание B<br>(kastrycnicki)</p>', 'desc' => 'Описание B (kastrycnicki)'],
    ],
];
?>
<html>
<head>
    <title>Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div id="map"></div>
        <div class="select-wrapper">
            <select class="custom-select">
                <?php foreach ($regions as $key => $item):?>
                <option value="<?= $key?>"><?= $item['decs']?></option>
                <?php endforeach;?>
            </select>
            <div class="container-desc">
                <?foreach ($reg_marks as $id => $marks):?>
                <div class="marks-block" id="<?= $id?>">
                    <?foreach ($marks as $key => $item):?>
                    <span data-key="<?=$key?>" class="badge" data-toggle="tooltip" data-trigger="click" data-html="true" title="<b>Подробное описание</b><br><u>(<?= $key?>)</u><br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>">
                        <?= $item['desc']?>
                    </span>
                    <?php endforeach;?>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <script>
        var regions = {
            <?foreach ($regions as $key => $item):?>
                '<?= $key?>': {lat: <?= $item['lat']?>, lng: <?= $item['lng']?>, zoom: <?= $item['zoom']?>},
            <?php endforeach;?>
        };
        var reg_marks = {
            <?foreach ($reg_marks as $key => $marks):?>
            '<?= $key?>': [
                <?foreach ($marks as $item):?>
                    {label: '<?= $item['label']?>', lat: <?= $item['lat']?>, lng: <?= $item['lng']?>, content: '<?= $item['content']?>'},
                <?php endforeach;?>
            ],
            <?php endforeach;?>
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDW8rOjpw608kA78ZaY5eAPkWFuXPZxm8&callback=initMap"
            async defer></script>
</body>
</html>