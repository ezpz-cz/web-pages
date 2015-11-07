<?php

function getServersTranslation($lang)
{
    if ($lang == "cz") return array(
        "table_headers" => array(
            "game" => "Hra",
            "name" => "Název",
            "vac" => "VAC",
            "players" => "Hráči",
            "map" => "Mapa",
            "nick" => "Meno",
            "score" => "Skóre",
            "time" => "Čas",
            "connect" => "Připojit se do hry",
        ),

        "page" => array(
            "servers" => "Servery",
            "actual_status" => "Aktuální statusy",
            "idle_servers" => "Idle servery",
            "servers_text" => "Zde naleznete seznam všech našich CS:GO serverů. Po kliknutí na název se Vám zobrazí nejen podrobnější
            informace o konkrétním serveru (jména přítomných hráčů a skóre), ale také vyskakovací okno, kde lze zvolit
            možnost \"Spustit aplikaci\" a můžete se tak napojit do hry přímo z prohlížeče(Podmínkou však je, abyste byli
            přihlášeni na svůj Steam účet). Pokud kliknete na \"Neprováděť žádnou akci\", dojde pouze k zobrazení
            informací o serveru.
            <br/><br/>
            Níže je také uvedena adresa TeamSpeak 3 serveru a odkazy na streamy některých našich hráčů a adminů.",
            "streamers" => "Streameri",
            "ts" => "EzPz.cz TeamSpeak / ts.ezpz.cz",
        ),
    );

    if ($lang == "en") return array(
        "table_headers" => array(
            "game" => "Game",
            "name" => "Name",
            "vac" => "VAC",
            "players" => "Players",
            "map" => "MapS",
            "nick" => "Nick",
            "score" => "Score",
            "time" => "Time",
            "connect" => "Connect to server",
        ),

        "page" => array(
            "servers" => "Servers",
            "actual_status" => "Actual status",
            "idle_servers" => "Idle servers",
            "servers_text" => "Here you will find a list of IP addresses of all our gaming and communication server.
            Clicking on the name of server you will see not only detailed information about server (the names od the
            players and score), but also a popup window where you can choose the option \"Run Application\" and so you
            can connect to the game directly from the browser (if you are logged in your Steam accout). If you click on
            \"Do Nothing \", it will only display information about the server.
            <br/><br/>
            Below is also the IP of the our TeamSpeak3 server and links to the streams of some of our players and
            admins.",
            "streamers" => "Streamers",
            "ts" => "EzPz.cz TeamSpeak / ts.ezpz.cz",
        ),
    );

    return False;
}