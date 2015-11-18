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
            "text" => "<div class=\"pure-g\">
            <div class=\"pure-u-1 pure-u-md-1-2 pure-u-lg-1-4\">
                <div class=\"l-box\">
                    <p>
                        Dámy a pánové, milí hráči!
                    </p>
                    <p></p>
                    Tímto bychom Vás chtěli pozvat na soutěž o AK-47 |Wasteland Rebel (Lehce opotřebený), která bude probíhat na našich CS:GO serverech. Hrát se bude o jeden skin, to značí, že se bude bojovat do posledního dne do poslední minuty!
                    <p></p>
                </div>
            </div>
             <div class=\"pure-u-1\">
                <a href=\"http://ezpz.cz\">
                    <img class=\"pure-img\" src=\"http://i.imgur.com/hWadWfY.png\" alt=\"soutez\">
                </a>
            </div>
            <div>
                <div class=\"pure-u-1 pure-u-md-1-2 pure-u-lg-1-4\">
                    <div class=\"l-box\">
                        <p>
                          </p><ul>
                            <li>Termín</li>
                              <ul>
                                <li>od 2.11.2015 do 1.12.2015</li>
                              </ul>
                            <li>Servery</li>
                              <ul>
                                <li><a href=\"steam://connect/84.245.95.238:27016\">Classic #1 (csgo.ezpz.cz:27016)</a></li>
                                <li><a href=\"steam://connect/84.245.95.238:27015\">Classic #2 (csgo.ezpz.cz:27015)</a></li>
                              </ul>
                            <li>Pravidla a ceny</li>
                              <ul>
                                <li>1. místo: ➡  AK-47 |Wasteland Rebel (Lehce opotřebený)</li>
                                <li>Výherce vzejde za největší počet killů AK-47+M4A4-s1+M4A4</li>
                                <li>Vítěz bude zveřejněn na našem <a href=\"https://www.facebook.com/ezpz.cz.sk.en\">Facebooku</a> a <a href=\"http://ezpz.cz/viewtopic.php?f=42&amp;t=235\">webu</a></li>
                                <li>Výherce se přihlásí do 14 dnů od vyhlášení na naše fórum nebo náš FB.</li>
                              </ul>
                          </ul>
                        <p></p>

                        <p>
                            Těšíme se na Vaši účast v této soutěži a nechť zvítězí ten nejlepší!
                        </p>
                        <p>
                          <strong>
                            GOOD LUCK &amp; HAVE FUN
                          </strong>
                        </p>
                        <h3>
                          Váš <a href=\"http://www.ezpz.cz\">EzPz.cz</a> tým
                        </h3>
                    </div>
                </div>
            </div>
        </div>"
        ),
    );

    if ($lang == "en") return array(
        "table_headers" => array(
            "nick" => "Nick",
            "kills" => "Kills",
        ),

        "page" => array(
            "soutez" => "Contest",
            "text" => "<div class=\"pure-g\">
            <div class=\"pure-u-1 pure-u-md-1-2 pure-u-lg-1-4\">
                <div class=\"l-box\">
                    <p>
                        Ladies and gentlemen, dear players!
                    </p>
                    <p></p>
                        We would like to invite you to the contest, which will take place on our CS:GO servers.
                    <p></p>
                </div>
            </div>
            <div class=\"pure-u-1\">
                <a href=\"http://ezpz.cz\">
                    <img class=\"pure-img\" src=\"http://i.imgur.com/5hsqH52.png\" alt=\"soutez\">
                </a>
            </div>
            <div>
                <div class=\"pure-u-1 pure-u-md-1-2 pure-u-lg-1-4\">
                    <div class=\"l-box\">
                        <p>
                          </p><ul>
                            <li>Period</li>
                              <ul>
                                <li>from 2.11.2015 till 1.12.2015</li>
                              </ul>
                            <li>Servers</li>
                              <ul>
                                <li><a href=\"steam://connect/84.245.95.238:27016\">Classic #1 (csgo.ezpz.cz:27016)</a></li>
                                <li><a href=\"steam://connect/84.245.95.238:27015\">Classic #2 (csgo.ezpz.cz:27015)</a></li>
                              </ul>
                            <li>Rules and prizes</li>
                              <ul>
                                <li>1. place: ➡ AK-47 | Wasteland Rebel (Minimal Wear)</li>
                                <li>The winner will be player with the highest number of kills</li>
                                <li>Winners will be announced on our <a href=\"https://www.facebook.com/ezpz.cz.sk.en\">Facebook</a> and <a href=\"http://ezpz.cz/viewtopic.php?f=42&amp;t=235\">web</a></li>
                                <li>Winners must contact us on our Facebook or on our forum till 14.12.2015.</li>
                              </ul>
                          </ul>
                        <p></p>

                        <p>
                            We look forward to your participation in this contest and let the best one win!
                        </p>
                        <p>
                          <strong>
                            GOOD LUCK &amp; HAVE FUN
                          </strong>
                        </p>
                        <h3>
                          Your <a href=\"http://www.ezpz.cz\">EzPz.cz</a> team
                        </h3>
                    </div>
                </div>
            </div>
        </div>"
        ),
    );

    return False;
}
