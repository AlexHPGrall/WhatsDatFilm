<?php

$aResult = array();

if (!isset($_GET['functionname'])) {
    $aResult['error'] = 'No function name!';
    echo json_encode($aResult);
    exit();
}

switch ($_GET['functionname']) {
    case 'search':
        if (isset($_GET['query'])) {
            $api_key = 'e11bcbacfb586b262bd9dee3675da662';
            $query = urlencode($_GET['query']);
            $url = "https://api.themoviedb.org/3/search/movie?api_key={$api_key}&query={$query}";

            $response = file_get_contents($url);
            if ($response === FALSE) {
                $aResult['error'] = 'Error fetching data from API!';
                echo json_encode($aResult);
                exit();
            }

            $data = json_decode($response, true);
            echo json_encode($data);
        } else {
            $aResult['error'] = 'No query parameter!';
            echo json_encode($aResult);
        }
        break;
    
    case 'details':
        include_once $_SERVER['DOCUMENT_ROOT'].'/controllers/movieController.php';
        if (isset($_GET['movieId'])) {
            $api_key = 'e11bcbacfb586b262bd9dee3675da662';
            $id = $_GET['movieId'];
            $searchArray = array(
                "details" => "https://api.themoviedb.org/3/movie/{$id}?api_key={$api_key}",
                "credits" => "https://api.themoviedb.org/3/movie/{$id}/credits?api_key={$api_key}",
            );

            $resultArray = array();

            foreach ($searchArray as $key => $url) {
                $response = file_get_contents($url);
                if ($response === FALSE) {
                    $aResult['error'] = 'Error fetching data from API!';
                    echo json_encode($aResult);
                    exit();
                }
                $data = json_decode($response, true);
                $resultArray[$key] = $data;
            }
            movieController::movieDetails($resultArray);

        } else {
            $aResult['error'] = 'No id parameter!';
            echo json_encode($aResult);
        }
        break;

    default:
        $aResult['error'] = 'Not found function ' . $_GET['functionname'] . '!';
        echo json_encode($aResult);
        break;
}
?>
