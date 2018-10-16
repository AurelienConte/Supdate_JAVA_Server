<!DOCTYPE html>
<html lang="fr">
<head>

    <!-- Chargement des properties -->

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>JAVA Updater Server</title>
        <meta name="description" content="Bienvenue sur SolariaMc, serveur proposant des mini-jeux innovant accessible de l'1.8 à l'1.13.x !">
        <meta name="keywords" content="minecraft server, minecraft serveur, minecraft, solariamc, mini-jeux, minijeux, mini jeux, minigame, mini-game, mini game, minigames, mini-games, mini games, serveur 1.8, 1.8, server 1.8">
        <meta property="og:type" content="website">
        <meta property="og:title" content="SolariaMc | Serveur Minecraft Mini-Jeux 1.8 & 1.13.x">
        <meta property="og:description" content="Bienvenue sur SolariaMc, serveur proposant des mini-jeux innovant accessible de l'1.8 à l'1.13.x !">
        <meta property="og:url" content="index.html">
        <meta property="og:image" content="{{ asset('assets/images/solaria-logo.png') }}">
        <meta name="author" content="Blushley, SolariaMc">
    </head>

    <!-- Mise en place des polices d'écritures -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Load des fichiers CSS -->


    <link rel="stylesheet" href="{{ asset('assets/css/main19ca.css?36') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

    <!-- Load des fichiers JS -->

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    </head>
<body style="background: #eee;">


<header>
@if(Request::is('/administration/*'))
    <!-- Menu de navigation -->
    <nav class="navigation">
        <div class="container">
            <div class="row">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-collapse" aria-expanded="false">
                    <span class="navbar-toggle-text">Menu</span>
                    <span class="navbar-toggle-icon">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navigation-collapse">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <ul class="navbar-nav">
                                <li id="nav-home"><a href="index.html">Accueil</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
@endif



<!-- Contenue du site -->


<div class="container">
    @yield("content")
</div>

<!-- FOOTER -->


<html lang="fr">
<link rel="stylesheet" href="{{ asset('assets/css/footer_style.css') }}">
<footer style="background:#333;color:white;padding-top:10px;">
    <div class="section footer-legals container">
        <p>Free app provided by Aurelien Conte :)</p>
    </div>
</footer>
</html>

</body>
