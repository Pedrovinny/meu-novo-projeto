<?php
defined('CONTROL') or die('Acesso Inválido');

$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if (!$country) { 
    header('Location: ?route=home');
    die();
}


//get country data
$country_data = $api->get_country($country);

?>


<div class="container mt-5">
    <div class="d-flex">
        <div class="card p-2 shadows">
            <img src="<?= $country_data[0]['flags']['png'] ?>">
        </div>
        <div class="ms-5 align-self-center">
            <p class="display-3"><strong><?= $country_data[0]['name']['common'] ?></strong></p>
            <p class="p-0 m-0">Capital:</p>
            <h4 class="p-0 m-0>"><?= $country_data[0]['capital'][0] ?></h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <p>Região: <br><strong><?= $country_data[0]['region']?></strong></p>
            <p>Sub-região: <br><strong><?= $country_data[0]['subregion']?></strong></p>
            <p>População: <br><strong><?= $country_data[0]['population']?></strong></p>
            <p>Area: <br><strong><?= $country_data[0]['area']?> Km<sup>2</sup></strong></p>
            <p>Sigla do País: <br><strong><?= $country_data[0]['flag']?></strong></p>
            <p>Localização no Google: <br><strong><?= $country_data[0]['maps']['googleMaps']?></strong></p>
        </div>
    </div>

    <div>
        <a href="?route=home" class="btn btn-primary px-5">Voltar</a>
    </div>
</div>