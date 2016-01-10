<?php

function getServerStatsTranslation($lang)
{
    if ($lang == "cz") return array(
        "table_headers" => array(
            "nick" => "Meno",
            "interval" => "Od-Do",
            "played" => "Nahraný čas",
        ),

        "page" => array(
            "activity" => "Návštěvnost serverů EzPz.cz",
            "from" => "Datum od",
            "to"  => "Datum do",
            "button_search" => "Hledat",
            "filter-link" => "Link na tento filtr",
        ),
    );

    if ($lang == "en") return array(
        "table_headers" => array(
            "nick" => "Nick",
            "interval" => "From-To",
            "played" => "Played time",
        ),

        "page" => array(
            "activity" => "Traffic on the servers EzPz.cz",
            "from" => "Date from",
            "to"  => "Date to",
            "button_search" => "Search",
            "filter-link" => "Link for this filter",
        ),
    );

    return False;
}
