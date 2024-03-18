<?php
if (isset($_GET['query'])) {
    $api_key = 'e11bcbacfb586b262bd9dee3675da662';
    $query = urlencode($_GET['query']);
    $url = "https://api.themoviedb.org/3/search/movie?api_key={$api_key}&query={$query}";

    $response = file_get_contents($url);
    $data = json_decode($response);

    echo json_encode($data);
}
?>