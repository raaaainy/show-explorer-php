<?php
class Show
{
    public function __construct(
        public $image,
        public $name,
        public $summary,
        public $season,
        public $episode
    )
    {}
}

$name = isset($_GET['show']) ? $_GET['show'] : '1';

$showDetailsJSON = file_get_contents("https://api.tvmaze.com/shows/$name");
$showNameDecoded = json_decode($showDetailsJSON);

$episodeDetailsJSON = file_get_contents("https://api.tvmaze.com/shows/$name/episodes");
$episodeDetailsDecoded = json_decode($episodeDetailsJSON);

$episodes = array_map(function($raw)
{
    $image_url = isset($raw->image->medium) ? $raw->image->medium : "";
    return new Show($image_url, $raw->name, $raw->summary, $raw->season, $raw->number);
}, $episodeDetailsDecoded);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

    <h1><?= $showNameDecoded->name ?></h1>
    <div class='row row-cols-1 row-cols-md-3 g-4'>
    <?php
    foreach($episodes as $episode)
    {
        echo "<div class='col'>";
        echo "<div class='card h-100'>";
        echo "<img src='$episode->image' class='card-img-top' alt='...'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$episode->name</h5>";
        echo "<p class='card-text'>$episode->summary</p>";
        echo "</div>";
        echo "<div class='card-footer'>";
        echo "<small class='text-body-secondary'>Season $episode->season, Episode $episode->episode</small>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>