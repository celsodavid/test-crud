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
        <title>Test Crud</title>
    </head>
    <body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation" <?php echo ($menu == 'hom') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url() ?>">Listar</a>
                    </li>
                    <li role="presentation" <?php echo ($menu == 'cad') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo base_url('cadastro') ?>">Cadastrar</a>
                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">Lista de Cadastros</h3>
        </div>