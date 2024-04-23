<!-- Ejercicio derivado de un repositorio de Github con una API hecho en Python.-->
<!--Aprovecho la API para complementar el ejercicio y adaptarlo a PHP.-->
<!--Web hecha en ingles para mostrar y aprovechar al máximo la API/implementación PHP.-->
<?php 
    require_once './Connection/apiConnection.php';
    require_once './Functions/templateRender.php'; 
    require_once './Classes/NextMovieClass.php'; 
    
    $next_movie = NextMovie::fetch_and_create_movie(API_URL);
    $next_movie_data = $next_movie -> get_data();
?>

<head>
    <?php render_template('HeadSection', $next_movie_data); ?>
</head>

<main>
    <?php render_template('HeaderSection', $next_movie_data); ?>
    <?php render_template('ImgSection', $next_movie_data); ?>
    <?php render_template('InfoSection', array_merge($next_movie_data, ["until_message" => $next_movie ->get_until_message()])); ?>
    <?php render_template('SocialSection', $next_movie_data); ?>
</main>