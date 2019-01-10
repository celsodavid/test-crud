<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row marketing">
    <div class="col-lg-12">
        <dl class="dl-horizontal">
            <dt>Nome</dt>
            <dd><?php echo $cadastro->nome ?></dd>

            <dt>E-mail</dt>
            <dd><?php echo $cadastro->email ?></dd>

            <dt>Telefone</dt>
            <dd><?php echo $cadastro->telefone ?></dd>

            <dt>RG</dt>
            <dd><?php echo $cadastro->rg ?></dd>

            <dt>CEP</dt>
            <dd><?php echo $cadastro->cep ?></dd>

            <dt>Endereço</dt>
            <dd><?php echo $cadastro->endereco ?></dd>
        </dl>

        <a class="btn btn-default btn-xs" href="<?php echo base_url('cadastro/editar/' . $cadastro->id); ?>" role="button">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <span class="glyphicon-class">Editar</span>
        </a>
        <a class="btn btn-default btn-xs" href="<?php echo base_url('cadastro/excluir/' . $cadastro->id); ?>" role="button">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <span class="glyphicon-class">Excluir</span>
        </a>
    </div>
</div>