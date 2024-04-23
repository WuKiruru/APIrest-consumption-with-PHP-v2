<?php
//Declarando los tipos estrictos para las variables
    declare(strict_types=1);

// Constante donde guardamos la llamada a la API
    const API_URL = "https://whenisthenextmcufilm.com/api";

//Extracción de datos de API, ahora se hacen directamente desde los métodos de la clase NextMovie al crear el objeto
    # function get_data(string $url): array {
        # $result = file_get_contents($url);
        # $data = json_decode($result, true);
        # return $data;
    # }

    # $data = get_data(API_URL);
?>