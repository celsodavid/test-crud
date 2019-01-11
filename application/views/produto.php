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

        <?php echo validation_errors(
                '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Ops!</strong>',
                '</div>'
        ); ?>

        <form method="post" action="<?php echo base_url('produto/criar') ?>" id="form_cadastro">
            <div class="bs-example" data-example-id="simple-ul">
                <ul>
                <?php foreach ($produtos as $produto): ?>
                    <li>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="combo[]"
                                       value="<?php echo $produto->id ?>">
                                       <?php echo $produto->nome ?>
                            </label>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <button type="submit" class="btn btn-default">Criar Combo</button>
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