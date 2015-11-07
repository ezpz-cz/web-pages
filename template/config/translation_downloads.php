<?php

function getDownloadsTranslation($lang)
{
    if ($lang == "cz") return array(
        "page" => array(
            "csgo" => "Counter-Strike: Global Offensive",
            "ts" => "Teamspeak 3",
            "cs16" => "Counter-Strike 1.6",
            "css"=> "Counter-Strike: Source",
            "download" => "Stáhnout",
//            "" => "",
        ),
    );

    if ($lang == "en") return array(
        "page" => array(
            "csgo" => "Counter-Strike: Global Offensive",
            "ts" => "Teamspeak 3",
            "cs16" => "Counter-Strike 1.6",
            "css"=> "Counter-Strike: Source",
            "download" => "Download",
        ),
    );

    return False;
}