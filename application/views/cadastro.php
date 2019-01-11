<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row marketing">
    <div class="col-lg-12">
        <?php if (!is_null($this->session->flashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Ops!</strong> <?php echo $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php echo validation_errors(); ?>

        <form method="post" action="<?php echo base_url('cadastro/adicionar') ?>" id="form_cadastro">
            <div class="form-group">
                <label for="exampleInputNome">Nome</label>
                <input type="text" class="form-control" id="exampleInputNome" name="nome"
                       placeholder="Nome" value="<?php echo set_value('nome') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                       placeholder="E-mail" value="<?php echo set_value('email') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha"
                       placeholder="Senha" value="<?php echo set_value('senha') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPasswordConfirm">Confirmar Senha</label>
                <input type="password" class="form-control" id="exampleInputPasswordConfirm" name="confirmar_senha"
                       placeholder="Confirmar Senha" value="<?php echo set_value('confirmar_senha') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Telefone</label>
                <input type="text" class="form-control" id="exampleInputPhone" name="telefone"
                       placeholder="Telefone" value="<?php echo set_value('telefone') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputRg">RG</label>
                <input type="text" class="form-control" id="exampleInputRg" name="rg"
                       placeholder="RG" value="<?php echo set_value('rg') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputCep">Cep</label>
                <input type="text" class="form-control" id="exampleInputCep" name="cep"
                       placeholder="Cep"  value="<?php echo set_value('cep') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputAddress">Endereço</label>
                <input type="text" class="form-control" id="exampleInputAddress" name="endereco"
                       placeholder="Endereço"  value="<?php echo set_value('endereco') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputNumber">Número</label>
                <input type="text" class="form-control" id="exampleInputNumber" name="numero"
                       placeholder="Número"  value="<?php echo set_value('numero') ?>">
            </div>
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#exampleInputPhone").mask('(00)0000.00000');
        $("#exampleInputRg").mask('00.000.000-0', {reverse: true});

        $("#exampleInputCep").mask('00000-000', {reverse: true});
        $("#exampleInputCep").blur(function () {
            $.getJSON("https://viacep.com.br/ws/"+ $("#exampleInputCep").val() +"/json",
            function (dados) {
                if (!("erro" in dados)) {
                    $("#exampleInputAddress").val(dados.logradouro);
                    $("#exampleInputNumber").focus();
                }
                else {
                    alert("CEP não encontrado.");
                }
            });
        });

        $("#form_cadastro").submit(function() {
            $("#exampleInputCep").unmask();
            $("#exampleInputPhone").unmask();
            $("#exampleInputRg").unmask();
        });
    });
</script>