<?php

function getBlogsTranslation($lang)
{
    if ($lang == "cz") return array(
        "page" => array(
            "blogs" => "Články",
            "blogs_en" => "Anglické články",
            "empty" => "V této sekci nejsou žádné články",
            "more"=> "(více)",
//            "" => "",
        ),
    );

    if ($lang == "en") return array(
        "page" => array(
            "blogs" => "Czech blogs",
            "blogs_en" => "English blogs",
            "empty" => "In this section there are no blogs",
            "more"=> "(more)",
        ),
    );

    return False;
}