<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/jumbotron-narrow.css') ?>" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"
                integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
        <title>Test Crud</title>
    </head>
    <body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation">
                        <a href="<?php echo base_url('home') ?>">Home</a>
                    </li>
                <?php if (!isset($titulo_menu)): ?>
                    <li role="presentation" <?php echo ($menu == 'hom') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('cadastro/listar') ?>">Listar</a>
                    </li>
                    <li role="presentation" <?php echo ($menu == 'cad') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('cadastro') ?>">Cadastrar</a>
                    </li>
                <?php endif; ?>
                </ul>
            </nav>
            <h3 class="text-muted"><?php echo (isset($titulo_menu)) ? $titulo_menu : 'Lista de Cadastros' ?></h3>
        </div>