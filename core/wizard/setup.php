<?php
    header('Content-Type: text/html; charset=utf-8');

    // Pega o passo atual na URL
    $step = (!empty($_GET['step'])) ? (int) $_GET['step'] : 0;

    // Arquivo template de configuração
    $configFile = file(WIZARD . DS . 'sample' . DS . 'config' . EXT);

    if (!empty($_POST)) {
        switch ($step) {
            case 1:
                foreach ($configFile as $lineNum => $line) {
                    $item = inPost($line);
                    if ($item !== false) {
                        $configFile[$lineNum] = "Config::set('" . $item . "', '" . $_POST[$item] . "');\r\n";
                    }
                }

                // Cria arquivo de configuração do usuário
                $handle = fopen(ROOT . 'config-tmp' . EXT, 'w');
                foreach($configFile as $line) {
                    fwrite($handle, $line);
                }
                fclose($handle);
                chmod(ROOT . 'config-tmp' . EXT, 0666);

                // Cria o banco de dados
                Config::set('database_host', $_POST['database_host']);
                Config::set('database_user', $_POST['database_user']);
                Config::set('database_password', $_POST['database_password']);
                Config::set('database_name', $_POST['database_name']);
                Config::set('table_prefix', $_POST['table_prefix']);
                Database::init();
                if (Database::make()) {
                    redirect('?step=2');
                }
                break;

            case 2:
                Database::init();
                Database::setting('app_name', $_POST['app_name']);
                Database::setting('app_description', $_POST['app_description']);
                redirect('?step=3');
                break;

            case 3:
                Database::init();
                $table = Config::get('table_prefix') . 'users';
                $name = $_POST['user_name'];
                $email = $_POST['user_email'];
                $password = $_POST['user_password'];
                Database::query("INSERT INTO `$table` (`id`, `name`, `email`, `password`, `type`, `created`, `modified`) VALUES (NULL, '$name', '$email', '$password', 'admin', NOW(), NOW())");
                redirect('?step=4');
                break;

            case 4:
                rename(ROOT . 'config-tmp' . EXT, ROOT . 'config' . EXT);
                redirect('admin/?first');
                break;
        }
    }

/**
 * Verifica se algum índice do `$_POST` existe na linha do arquivo de
 * configuração
 *
 * @param  string $line A linha do arquivo de configuração
 * @return mixed
 */
    function inPost($line) {
        foreach ($_POST as $key => $value) {
            if (strpos($line, $key) != false){
                return $key;
            }
        }

        return false;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title><?php echo __('Setup'); ?> &rsaquo; Alf CMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Alf CMS">

<!-- CSS -->
<link href="core/assets/css/bootstrap.css" rel="stylesheet">
<link href="core/wizard/assets/css/setup.css" rel="stylesheet">

<!-- FAVICON -->
<link rel="shortcut icon" href="core/assets/ico/favicon.png">

<!-- HTML5 -->
<!--[if lt IE 9]><script src="core/assets/js/html5shiv.js"></script><![endif]-->

</head>
<body>
<div class="container-narrow">
    <!-- HEADER -->
    <header class="masthead">
        <h1>Alf CMS <small><?php echo __('Setup'); ?></small></h1>
    </header>

    <hr>

    <?php
        // PASSO 0
        if ($step === 0) :
    ?>
    <div class="hero-unit">
        <p class="lead"><?php echo __('You are just a few clicks away from your Alf CMS setup'); ?></p>
        <a id="btn-setup" class="btn btn-large btn-primary" href="?step=1"><?php echo __('Begin setup'); ?></a>
    </div>
    <?php endif; ?>

    <div id="steps" >
        <form action="" method="post" class="form-horizontal">
            <?php
                // PASSO 1
                if ($step === 1) :
            ?>
            <div id="step-1">
                <div class="control-group">
                    <label class="control-label" for="dbHost"><?php echo __('Database host'); ?></label>
                    <div class="controls">
                        <input type="text" name="database_host" id="dbHost" placeholder="192.168.0.1" value="localhost" autofocus>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="dbUser"><?php echo __('Database user'); ?></label>
                    <div class="controls">
                        <input type="text" name="database_user" id="dbUser" placeholder="root" value="root">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="dbPassword"><?php echo __('Database password'); ?></label>
                    <div class="controls">
                        <input type="text" name="database_password" id="dbPassword" placeholder="root" value="root">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="dbName"><?php echo __('Database name'); ?></label>
                    <div class="controls">
                        <input type="text" name="database_name" id="dbName" placeholder="alfcms" value="alf">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="dbPrefix"><?php echo __('Table prefix'); ?></label>
                    <div class="controls">
                        <input type="text" name="table_prefix" id="dbPrefix" placeholder="alf_" value="alf_">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><?php echo __('Next step'); ?></button>
                    </div>
                </div>
            </div>
            <?php endif; // ^passo 1 ?>

            <?php
                // PASSO 2
                if ($step === 2) :
            ?>
            <div id="step-2">
                <div class="control-group">
                    <label class="control-label" for="appName"><?php echo __('Website name'); ?></label>
                    <div class="controls">
                        <input type="text" name="app_name" id="appName" placeholder="<?php echo __('Your website name'); ?>" autofocus>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="appDescription"><?php echo __('Website description'); ?></label>
                    <div class="controls">
                        <input type="text" name="app_description" id="appDescription" placeholder="<?php echo __('Your website description') ?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><?php echo __('Next step'); ?></button>
                    </div>
                </div>
            </div>
            <?php endif; // ^passo 2 ?>

            <?php
                // PASSO 3
                if ($step === 3) :
            ?>
            <div id="step-3">
                <div class="control-group">
                    <label class="control-label" for="userName"><?php echo __('Your name'); ?></label>
                    <div class="controls">
                        <input type="text" name="user_name" id="userName" placeholder="" autofocus>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="userEmail"><?php echo __('Your e-mail'); ?></label>
                    <div class="controls">
                        <input type="email" name="user_email" id="userEmail" placeholder="<?php echo __('email@example.com'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="userPassword"><?php echo __('Your password'); ?></label>
                    <div class="controls">
                        <input type="password" name="user_password" id="userPassword" placeholder="<?php echo __('Password'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"><?php echo __('Next step'); ?></button>
                    </div>
                </div>
            </div>
            <?php endif; // ^passo 3 ?>

            <?php
                // PASSO 4
                if ($step === 4) :
            ?>
            <div id="step-4">
                <p><?php echo __('Select theme'); ?></p>
                <ul id="themes" class="thumbnails">
                    <li class="span3">
                        <div class="thumbnail">
                            <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,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">
                            <div class="caption">
                                <h3>Theme 1</h3>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><label for="theme-1"><input type="radio" name="theme" id="theme-1" class="none" value="1" checked="checked"> <span class="btn btn-block" data-toggle="button"><?php echo __('Select theme'); ?></span></label></p>
                            </div>
                        </div>
                    </li>
                    <li class="span3">
                        <div class="thumbnail">
                            <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,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">
                            <div class="caption">
                                <h3>Theme 2</h3>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><label for="theme-2"><input type="radio" name="theme" id="theme-2" class="none" value="2"> <span class="btn btn-block" data-toggle="button"><?php echo __('Select theme'); ?></span></label></p>
                            </div>
                        </div>
                    </li>
                    <li class="span3">
                        <div class="thumbnail">
                            <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,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">
                            <div class="caption">
                                <h3>Theme 3</h3>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><label for="theme-3"><input type="radio" name="theme" id="theme-3" class="none" value="3"> <span class="btn btn-block" data-toggle="button"><?php echo __('Select theme'); ?></span></label></p>
                            </div>
                        </div>
                    </li>
                </ul>
                <button type="submit" class="btn btn-large btn-primary"><?php echo __('Finish installation'); ?></button>
            </div>
            <?php endif; // ^passo 4 ?>
        </form>
    </div>

    <hr>

    <!-- FOOTER -->
    <footer class="footer">
        <p>&copy; Alf CMS 2013</p>
    </footer>
</div> <!-- /container -->

<!-- SCRIPTS -->
<script src="core/assets/js/jquery.js"></script>
<script src="core/assets/js/bootstrap.js"></script>
<script src="core/wizard/assets/js/setup.js"></script>

</body>
</html>
