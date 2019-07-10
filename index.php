<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <!--*******************************BOOTSTRAP**********************************-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--*******************************BOOTSTRAP**********************************-->
    <?php
    $xml = simplexml_load_file("https://www.lemonde.fr/rss/une.xml");
    ?>
</head>

<body>
    <header>
        <h1 class="text-center">Le site de regroupement d'informations</h1>
        <form class="text-center" method="post">
            <select name="infos" id="infos">
                <option value="https://www.lemonde.fr/rss/une.xml">Le Monde</option>
                <option value="https://www.francetvinfo.fr/titres.rss">France info</option>
                <option value="https://www.bfmtv.com/rss/info/flux-rss/flux-toutes-les-actualites/">BFMTV</option>
                <option value="http://www.leparisien.fr/actualites-a-la-une.rss.xml#xtor=RSS-1481423633">Le Parisien</option>
            </select>
            <input type="submit" value="Valider" />
        </form>
    </header>

    <?php
    if ($_POST != null) {
        $xml = simplexml_load_file($_POST["infos"]);
        foreach ($xml->channel->item as $item) {
            echo '<div class="news_box justify-content-center container offset-1 col-10">';
            echo '<h3 class="text-center">' . $item->title . '</h3>';
            echo '<div class="inline_box col-12 row">';
            echo '<img class="col-4" src="' . $item->enclosure["url"] . '">';
            echo '<div class="col-8">';
            echo '<p class="col-12">' . strip_tags($item->description, '<p><a>') . '</p>';
            echo '<a href="' . $item->guid . '" target="_blank" class="col-12">En savoir plus</a>';
            echo '</div>';
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            echo '<p class="col-12">' . $date . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>
    <footer>
    </footer>
    <!--*******************************BOOTSTRAP**********************************-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--*******************************BOOTSTRAP**********************************-->
</body>

</html>