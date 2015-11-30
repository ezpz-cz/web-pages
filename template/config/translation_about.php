<?php

function getTranslation($lang)
{
    if ($lang == "cz") return array(
        "page" => array(
            "about" => "O nás",
            "content" => "<p>
        Herní portál <a href=\"http://ezpz.cz/\">EzPz.cz</a> vznikl po rozpadu portálu SOE.cz. Dva tamější hlavní admini,
        Meverik a Ushirew, se poté rozhodli založit nový herní portál a zároveň do něj převzít bývalé členy realizačního
        týmu SOE.cz. A tak došlo k založení <a href=\"http://ezpz.cz/\">EzPz.cz</a>, kam se přesunul prakticky celý tým
        SOE.cz.
    </p>

    <p>
        Naší hlavní činností je provoz <a href=\"http://ezpz.cz/page/servers\">kvalitních serverů</a> pro hru
        Counter-Strike:
        Global Offensive. Dále na adrese <a href=\"ts3server://ts.ezpz.cz\">ts.ezpz.cz</a> nabízíme veřejný TeamSpeak3
        server
        (máte-li zájem o permanentní místnost, <a href=\"http://ezpz.cz/viewtopic.php?f=10&t=20\">napište nám</a>).
    </p>

    <p>
        <strong>Mezi přednosti našich CS:GO serverů především patří:</strong>

    <ul>
        <li><strong>výkonný hardware</strong> – je tak zajištěna naprostá plynulost hry</li>
        <li><strong>128tick</strong> – komunikace mezi hráči a serverem je u nás (narozdíl od Valve serverů) 2x
            rychlejší,
            což zajišťuje přesné hitboxy a celkově lepší požitek ze hry (128tick používají i profesionální servery v
            ligách
            FaceIt nebo ESEA)
        </li>
        <li><strong>skiny zbraní</strong> – pomocí příkazu !ws si u nás můžete na jakoukoliv zbraň nastavit libovolný
            skin
            (dokonce se to vztahuje i na bombu :)
        </li>
        <li><strong>nože</strong> – pomocí příkazu !knife si lze nastavit jakýkoliv nůž (a klidně ho dále oskinovat
            pomocí
            !ws)
        </li>
        <li><strong><a href=\"http://stats.ezpz.cz/\">HLStats</a></strong> – detailní statistiky (nejen) hráčů</li>
        <li><strong><a href=\"http://ezpz.cz/page/report-system\">Report System</a></strong> – náš vlastnoručně vytvořený
            systém, skrz který mohou hráči nahlašovat hráče porušující pravidla. Tato hlášení se pak objeví na <a
                href=\"http://ezpz.cz/page/report-system\">stránce Report Systému</a> a jsou vyřizována našimi adminy.
        </li>
    </ul>
    </p>

    <p>
        Naší prioritou je i spokojenost hráčů, která je na serverech bohužel často narušována cheatery a neslušnými
        hráči.
        Práci herních adminů velmi ulehčují tyto, většinou vlastnoručně vytvořené, nástroje, pomocí kterých lze zpětně
        dohledat data o hráčích:
    <ul>
        <li><strong><a href=\"http://ezpz.cz/page/utilities-connectlog\">Connect Log</a></strong> – výpis všech příchodů a
            odchodů hráčů na našich serverech
        </li>
        <li><strong><a href=\"http://ezpz.cz/page/utilities-chatlog\">Chat Log</a></strong> – výpis chatu na našich
            serverech
        </li>
        <li><strong><a href=\"http://ezpz.cz/page/utils-gotv\">GOTV dema</a></strong> – stažení všech dem až 2 týdny do
            minulosti
        </li>
        <li><strong><a href=\"http://ezpz.cz/page/report-system\">Report System</a></strong></li>
        <li><strong><a href=\"http://sourcebans.ezpz.cz/\">SourceBans</a></strong> – přehledná správa banů</li>
    </ul>
    </p>

    <p>
        Bohužel náš portál nemá aktivního sponzora, tudíž náklady na provoz
        jsou placeny námi a in-game MOTD reklamami, které však nejsou
        otravné, protože se zobrazují jen jednou při připojení na server.
    </p>

    <p>
        Jestli bude i nadále trvat zájem hráčů o naše servery, tak v
        budoucnu určitě otevřeme nové, abychom vyšli vstříc co nejširší
        skupině hráčů – ať už se jedná o hráče, kteří hru berou vážněji,
        nebo hráče, kteří si prostě chtějí oddechnout a užít si trochu
        srandy.
    </p>

    <p>
        Děkujeme za Váš zájem a podporu a velmi rádi Vás, hráče a hráčky,
        uvidíme na našich serverech, případně i našem fóru a
        <a href=\"https://www.facebook.com/ezpz.cz.sk.en/\">Facebooku</a>. Máte-li rádi naše servery a chtěli byste
        vstoupit
        do
        našich řad, přečtěte si <a href=\"http://ezpz.cz/viewtopic.php?f=16&t=30\">Nábor CS:GO adminů – minimální
            požadavky</a> a pak si případně
        podejte žádost. Rádi uvítáme nové přátelské posily :)
    </p>

    <p>
        Máte-li zájem o spolupráci s naším portálem (např. sponzoring, reklama), kontaktujte nás prosím na e-mail <img
            src=\"http://ezpz.cz/images/admin@ezpz.cz.png\" alt=\"admin ezpz.cz\" title=\"admin ezpz.cz\"/>, případně zde na
        fóru formou soukromé zprávy.
    </p>


    <h2 class=\"end\">
        <strong>
            <a href=\"http://ezpz.cz/memberlist.php?mode=team\">Váš realizační tým EzPz.cz</a>
        </strong>
    </h2>",

        ),
    );

    if ($lang == "en") return array(
        "page" => array(
            "about" => "About us",
            "content" => "<p>
        Gaming portal <a href=\"http://ezpz.cz/\">EzPz.cz</a> was created after the breakup of the portal SOE.cz.
        The two main admins, Meverik and Ushirew, then decided to create a new gaming portal. And that is how
        <a href=\"http://ezpz.cz/\">EzPz.cz</a> was founded, where almost the entire admin team of SOE.cz was moved.
    </p>

    <p>
        Our main activity is the operation of <a href=\"http://ezpz.cz/page/servers\">high quality servers</a> for game
        Counter-Strike: Global Offensive. Furthermore, at <a href=\"ts3server://ts.ezpz.cz\">ts.ezpz.cz</a> we offer
        public TeamSpeak3 server ( if you are interested in a permanent room, <a href = \"http: // ezpz.cz/viewtopic.php?f=10&t=20\">contact us</a> )
    </p>

    <p>
        <strong>The main advantages of our CS:GO servers are:</strong>

    <ul>
        <li><strong>powerful hardware</strong> – it is to ensure full continuity of play</li>
        <li><strong>128tick</strong> – communication between the players and the ours server (unlike Valve servers) are
        2 times faster, which ensures accurate hitboxes an overall better enjoyment of the game (128tick used in servers
        and professional leagues like FaceIT or ESEA)
        </li>
        <li><strong>skins of weapons</strong> – on our servers you can set up any skin on weapon using command !ws -
        you can even change the skin of bomb :)

        </li>
        <li><strong>knifes</strong> – using the command !knife you can set any knife (and later its skin can be changed using !ws)
        </li>
        <li><strong><a href=\"http://stats.ezpz.cz/\">HLStats</a></strong> – detailed statistics (not only) the players</li>
        <li><strong><a href=\"http://ezpz.cz/page/report-system\">Report System</a></strong> – Our self-created system
        through which players can player to report violators. These reports will appear on the
        <a href=\"http://ezpz.cz/page/report-system\">Report System</a> are handled by our admins.
        </li>
    </ul>
    </p>

    <p>
        Our priority is also the satisfaction of players – unfortunately there will always be some cheaters and rude players,
         but our admins can use our mostly self-created tools which provide the tracking of past data about players and simplify their job:
    <ul>
        <li><strong><a href=\"http://ezpz.cz/page/utilities-connectlog\">Connect Log</a></strong> – a listing of all connects and disconnects of players on our servers
        </li>
        <li><strong><a href=\"http://ezpz.cz/page/utilities-chatlog\">Chat Log</a></strong> – chat listing on our servers
        </li>
        <li><strong><a href=\"http://ezpz.cz/page/utils-gotv\">GOTV demos</a></strong> – download all demos up to 2 weeks in the past
        </li>
        <li><strong><a href=\"http://ezpz.cz/page/report-system\">Report System</a></strong></li>
        <li><strong><a href=\"http://sourcebans.ezpz.cz/\">SourceBans</a></strong> – management of bans</li>
    </ul>
    </p>

    <p>
        Unfortunately, our portal does not have an active sponsor, so operating costs are paid by us and in-game MOTD ads
        which are not annoying because they appear only once when connecting to the server.
    </p>

    <p>
        If it continues to take an interest of players on our servers so in the future certainly open new ones in order
        to meet the widest possible group of players - whether they are players who play take seriously or players who
        just want to relax and enjoy a lot of fun.
    </p>

    <p>
        Thank you for your interest and support. we are very glad to see you on our servers, or even our forums and
        <a href=\"https://www.facebook.com/ezpz.cz.sk.en/\">Facebook</a>. If you like our servers and would like to join to our team  <a href=\"http://ezpz.cz/viewtopic.php?f=43&t=218\">Recruiting CS:GO admins – minimal requirements</a> and then possibly apply now. We welcome new friends reinforcements :)
    </p>

    <p>
        If you are interested in cooperation with our portal (eg. Sponsorship, advertising) please contact us via e-mail
        <img src=\"http://ezpz.cz/images/admin@ezpz.cz.png\" alt=\"admin ezpz.cz\" title=\"admin ezpz.cz\"/>, possibly
            here in the forum through private messages.
    </p>


    <h2 class=\"end\">
        <strong>
            <a href=\"http://ezpz.cz/memberlist.php?mode=team\">Your realization team EzPz.cz</a>
        </strong>
    </h2>",

        ),
    );

    return False;
}
