<!-- Custom Fonts -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/styles/pbtech/theme/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/styles/pbtech/theme/css/custom.css">
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
<!--        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
<!--        <li data-target="#myCarousel" data-slide-to="1"></li>-->
        <!--            <li data-target="#myCarousel" data-slide-to="2"></li>-->
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="/styles/pbtech/theme/images/stanSeVIP_<?php echo $lang ?>.png"
                 alt="First slide">

<!--            <div class="container">-->
<!--                <div class="carousel-caption">-->
<!--                    <h1>Example headline.</h1>-->
<!---->
<!--                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous"-->
<!--                        Glyphicon buttons on the left and right might not load/display properly due to web browser-->
<!--                        security rules.</p>-->
<!---->
<!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <!--        <div class="item">-->
        <!--            <img class="second-slide" src="/styles/pbtech/theme/images/stanSeVIP_en.png"-->
        <!--                 alt="Second slide">-->
        <!--            <div class="container">-->
        <!--                <div class="carousel-caption">-->
        <!--                    <h1>Another example headline.</h1>-->
        <!--                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida-->
        <!--                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
        <!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>

<!--    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">-->
<!--        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
<!--        <span class="sr-only">Previous</span>-->
<!--    </a>-->
<!--    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">-->
<!--        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
<!--        <span class="sr-only">Next</span>-->
<!--    </a>-->
</div>

<div id="wrapper">


<!-- /.carousel -->
<div id="page-wrapper" class="marketing">

<div class="panel panel-default">
    <div class="panel-body lead">
        <?php
        if ($lang === "cz") {
            echo "//prepisať//
             Tu bude text o tom ze preco podporit nas potal, preco bude VIp atd/..
             <br /><br />
             z gamesites:
             Líbí se vám naše servery? Máte rádi náš portál?  Můžete nás podpořit nejen tím, že budete u nás hrát!
                    Provoz našich serverů stojí měsíčně nemalé peníze, a proto si lze u nás aktivovat VIP výhody, které jsou
                    zpoplatněny. Jen díky aktivacím jsme schopni portál udržovat a starat se o něj.";

            echo "<br /><br /><div>Zobrazit <a href=\"#vyhody\">výhody</a> na všech našich serverech, TeamSpeaku a webu.</div>";

        } else {

            echo "2 &euro;";
        }
        ?>

    </div>
</div>

<hr class="featurette-divider">

<h2 id="vyhody" class="featurette-heading"><span class="text-muted">Výhody</span> na serveroch</h2>
<ul class="list-group">
    <!--        SERVER-->
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span><span>Rezervovaný slot</span> na
        všetky naše servery.
    </li>
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span>Väčší výber <span>skinov</span></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span>Väčší výber <span>knifov</span></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span><span>Žiadne reklamy</span> v chate
    </li>
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span><span>Žiadne prehadzovanie</span> do
        súperovho tímu
    </li>
</ul>

<h2 class="featurette-heading"><span class="text-muted">Výhody</span> na webe</h2>
<ul class="list-group">
    <!--        WEB-->
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span>Super <span>rank</span> na fóre</li>
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span><span>Žiadne reklamy</span> na webe
    </li>
</ul>

<h2 class="featurette-heading"><span class="text-muted">Výhody</span> na TeamSpeaku</span></h2>
<ul class="list-group">
    <!--        TS-->
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span>Super <span>rank</span> na našom
        TeamSpeaku
    </li>
    <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span><span>Vyhradené miesto</span> pre
        tvoju miestnosť
    </li>
</ul>

<hr class="featurette-divider">

<div class="row">
    <div class="col-lg-6">
        <!--                /styles/pbtech/theme/images/vip1_--><?php //echo $lang ?><!--.png-->
        <a href="#month" role="button">
            <img class="img-circle"
                 src="/styles/pbtech/theme/images/vip_gold.png"
                 alt="VIP 1 month" width="200" height="200">
        </a>

        <h1><?php
            if ($lang === "cz")
                echo "50 Kč / 2 &euro;";
            else
                echo "2 &euro;"?>
        </h1>

        <h2><?php
            if ($lang === "cz")
                echo "1 měsíc";
            else
                echo "1 month"?>
        </h2>

        <p>Tu bude super text aky je tento produk uzastny. Nejake info
            <?php
            if ($lang === "cz") {
                ?>

            <?php
            } else {

            }
            ?>
        </p>

        <p>
            <a class="btn btn-default" href="#month" role="button">
                <?php
                if ($lang === "cz")
                    echo "Zobrazit podrobnosti »";
                else
                    echo "View details »";
                ?>
            </a>
        </p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-6">
        <a href="#month" role="button">
            <img class="img-circle"
                 src="/styles/pbtech/theme/images/vip_gold.png"
                 alt="VIP 1 month" width="200" height="200">
        </a>

        <h1><?php
            if ($lang === "cz")
                echo "99 Kč / 4 &euro;";
            else
                echo "4 &euro;"?>
        </h1>

        <h2><?php
            if ($lang === "cz")
                echo "3 měsíce";
            else
                echo "3 months"?>
        </h2>

        <p>
            Tu bude super text aky je tento produk uzastny. Donec sed odio dui. Etiam porta sem malesuada magna mollis
            euismod. Nullam id dolor id nibh ultricies
            vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
            cursus magna.
            <?php
            if ($lang === "cz") {
                ?>

            <?php
            } else {

            }
            ?>
        </p>

        <p>
            <a class="btn btn-default" href="#months" role="button">
                <?php
                if ($lang === "cz")
                    echo "Zobrazit podrobnosti »";
                else
                    echo "View details »";
                ?>
            </a>
        </p>
    </div>
    <!-- /.col-lg-4 -->
</div>

<hr class="featurette-divider">

<div class="row featurette" id="month">
    <div class="col-md-10">
        <h2 class="featurette-heading">
            <?php if ($lang === "cz")
                echo "50 Kč / 2 &euro;";
            else
                echo "2 &euro;"
            ?>
            <span class="text-muted">
                        <?php
                        if ($lang === "cz")
                            echo "na všechny naše servery na jeden měsíc";
                        else
                            echo "on our all servers for one month"?>
                    </span>
        </h2>

        <p class="lead">
            <?php
            if ($lang === "cz"){
            ?>
            Tu bude blizsie info o VIP 1 mesiac
            Pre aktivaciu na 1 mesiac je nutne poslat sms v nasledujucom tvare:
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th width="25%">Krajina</th>
                <th width="50%">Tvar SMS zprávy</th>
                <th width="25%" class="center">Telefonní číslo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="black">Česko</td>
                <td class="green">PM CW 5461 &lt;STEAM ID&gt;</td>
                <td class="red center">9033350</td>
            </tr>
            <tr>
                <td class="black">Slovensko</td>
                <td class="green">CLANWARS 2 5461 &lt;STEAM ID&gt;</td>
                <td class="red center">8866</td>
            </tr>
            </tbody>
        </table>
        <?php
        } else {

        }
        ?>
        </p>
    </div>
    <div class="col-md-2">
        <!--                <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto"-->
        <!--                     alt="Generic placeholder image">-->
    </div>
</div>

<hr class="featurette-divider">

<div class="row featurette" id="months">
    <div class="col-md-10 col-md-push-2">
        <h2 class="featurette-heading">
            <?php if ($lang === "cz")
                echo "99 Kč / 4 &euro;";
            else
                echo "4 &euro;"
            ?>
            <span class="text-muted">
                        <?php
                        if ($lang === "cz")
                            echo "na všechny naše servery na tři měsíce";
                        else
                            echo "on our all servers for three months"?>
                    </span>
        </h2>

        <p class="lead">
            <?php
            if ($lang === "cz"){
            ?>
            Tu bude blizsie info o VIP 3 mesiac
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th width="25%">Krajina</th>
                <th width="50%">Tvar SMS zprávy</th>
                <th width="25%" class="center">Telefonní číslo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="black">Česko</td>
                <td class="green">PM CW 5461 &lt;STEAM ID&gt;</td>
                <td class="red center">9033399</td>
            </tr>
            <tr>
                <td class="black">Slovensko</td>
                <td class="green">CLANWARS 4 5461 &lt;STEAM ID&gt;</td>
                <td class="red center">8866</td>
            </tr>
            </tbody>
        </table>
        <?php
        } else {

        }
        ?>
        </p>
    </div>
    <div class="col-md-2 col-md-pull-10">
        <!--                <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto"-->
        <!--                     alt="Generic placeholder image">-->
    </div>
</div>
</div>

</div>