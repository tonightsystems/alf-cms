<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<!--[if IE]><![endif]-->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ALF CMS</title>
<meta name="author" content="" />
<link rel="shortcut icon" href="" />
<!-- Touch Icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
<!-- Facebook -->
<meta property="og:title" content=""/>
<meta property="og:type" content="website"/>
<meta property="og:url" content=""/>
<meta property="og:image" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<!-- HTML5 FOR IE -->
<!--[if lt IE 9]><script src="js/lib/html5.js"></script><![endif]-->
<!-- STYLESHEETS -->
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="all">
    <header id="header">
        <div class="center">
            <div id="logo"><img src="img/logo-tema.png"></div>
            <ul id="menu">
                <li><a href="#">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
            <form action="" id="busca">
                <input type="text" name="busca" placeholder="Buscar no site">
                <input type="submit" name="busca-enviar" id="busca-enviar" value="">
            </form>
        </div>
    </header>
    <div id="main">
        <div class="content center">
            <div id="localizacao">
                <p>Você está em: <span>Inicia / Sobre</span></p>
            </div>
            <div class="texto">
                <h2>Titulo da pagina</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, aut, error, dolorum libero odio accusantium aspernatur commodi perferendis sunt iusto assumenda sapiente dignissimos ex. Ipsam, veritatis reprehenderit distinctio nemo necessitatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, aut, error, dolorum libero odio accusantium aspernatur commodi perferendis sunt iusto assumenda sapiente dignissimos ex. Ipsam, veritatis reprehenderit distinctio nemo necessitatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, aut, error, dolorum libero odio accusantium aspernatur commodi perferendis sunt iusto assumenda sapiente dignissimos ex. Ipsam, veritatis reprehenderit distinctio nemo necessitatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, aut, error, dolorum libero odio accusantium aspernatur commodi perferendis sunt iusto assumenda sapiente dignissimos ex. Ipsam, veritatis reprehenderit distinctio nemo necessitatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, aut, error, dolorum libero odio accusantium aspernatur commodi perferendis sunt iusto assumenda sapiente dignissimos ex. Ipsam, veritatis reprehenderit distinctio nemo necessitatibus.</p>
            </div>
            <div id="sidebar">
                <div id="facebook">
                    <div class="fb-like" data-href="https://www.facebook.com/MarcoAurelioNoFace" data-send="false" data-width="250" data-show-faces="true"></div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer"></footer>
</div>
<!-- SCRIPTS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/script.js"></script>
<!-- facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Google Analytics -->
<!--<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>-->
</body>
</html>