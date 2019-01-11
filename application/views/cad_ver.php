<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row marketing">
    <div class="col-lg-12">
        <dl class="dl-horizontal">
            <dt>Nome</dt>
            <dd><?php echo $cadastro->nome ?></dd>

            <dt>E-mail</dt>
            <dd><?php echo $cadastro->email ?></dd>

            <dt>Telefone</dt>
            <dd id="exampleInputPhone"><?php echo $cadastro->telefone ?></dd>

            <dt>RG</dt>
            <dd id="exampleInputRg"><?php echo $cadastro->rg ?></dd>

            <dt>CEP</dt>
            <dd id="exampleInputCep"><?php echo $cadastro->cep ?></dd>

            <dt>Endereço</dt>
            <dd><?php echo $cadastro->endereco ?></dd>

            <dt>Número</dt>
            <dd><?php echo $cadastro->numero ?></dd>
        </dl>

        <a class="btn btn-default btn-xs" href="javascript:history.go(-1);" role="button">
            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            <span class="glyphicon-class">Voltar</span>
        </a>
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

<script type="text/javascript">
    $(document).ready(function () {
        $("#exampleInputPhone").mask('(00)0000.00000');
        $("#exampleInputRg").mask('00.000.000-0', {reverse: true});
        $("#exampleInputCep").mask('00000-000', {reverse: true});
    });
</script>