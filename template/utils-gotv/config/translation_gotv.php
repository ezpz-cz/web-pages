<?php

function getGotvTranslation($lang)
{
    if ($lang == "cze") return array(
        "table_headers" => array(
            "datetime" => "Datum a èas",
            "map" => "Mapa",
            "download" => "Stáhnout",
            "server" => "Server"),

        "page" => array(
            "demos" => "Dema",
            "server" => "Server",
            "map" => "Mapa",
            "search" => "Hledat"),
    );

    if ($lang == "en") return array(
        "table_headers" => array(
            "datetime" => "Date and time",
            "map" => "Map",
            "download" => "Download",
            "server" => "Server"),

        "page" => array(
            "demos" => "Demos",
            "server" => "Server",
            "map" => "Map",
            "search" => "Search"),
    );

    return False;
}