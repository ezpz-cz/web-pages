<?php

function getTranslation($lang)
{
    if ($lang == "cz") return array(
        "table_headers" => array(
            "nick" => "Meno",
            "kills" => "Počet zabití",
        ),

        "page" => array(
            "soutez" => "Soutěž",
        ),
    );

    if ($lang == "en") return array(
        "table_headers" => array(
            "nick" => "Nick",
            "kills" => "Kills",
        ),

        "page" => array(
            "soutez" => "Contest",
        ),
    );

    return False;
}