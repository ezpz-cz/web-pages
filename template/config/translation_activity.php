<?php

function getActivityTranslation($lang)
{
    if ($lang == "cz") return array(
        "table_headers" => array(
            "nick" => "Meno",
            "interval" => "Od-Do",
            "played" => "Nahraný čas",
            "sum" => "Reportů Spolu",
            "solved" => "Vyřešených",
            "unsolved" => "Nevyřešených",
        ),

        "page" => array(
            "activity" => "Aktivita adminov",
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
            "sum" => "Total reports",
            "solved" => "Solved",
            "unsolved" => "Unsolved",
        ),

        "page" => array(
            "activity" => "Activity of admins",
            "from" => "Date from",
            "to"  => "Date to",
            "button_search" => "Search",
            "filter-link" => "Link for this filter",
        ),
    );

    return False;
}
