<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row marketing">
    <div class="col-lg-12">
        <?php if (!is_null($this->session->flashdata('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Sucesso!</strong> <?php echo $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (!is_null($this->session->flashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Ops!</strong> <?php echo $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>RG</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cadastros as $cadastro): ?>
                <tr>
                    <th scope="row"><?php echo $cadastro->id ?></th>
                    <td><?php echo $cadastro->nome ?></td>
                    <td><?php echo $cadastro->email ?></td>
                    <td class="exampleInputPhone"><?php echo $cadastro->telefone ?></td>
                    <td class="exampleInputRg"><?php echo $cadastro->rg ?></td>
                    <td>
                        <a class="btn btn-default btn-xs" href="<?php echo base_url('cadastro/ver/' . $cadastro->id); ?>" role="button">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <span class="glyphicon-class">Ver</span>
                        </a>
                        <a class="btn btn-default btn-xs" href="<?php echo base_url('cadastro/editar/' . $cadastro->id); ?>" role="button">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <span class="glyphicon-class">Editar</span>
                        </a>
                        <a class="btn btn-default btn-xs" href="<?php echo base_url('cadastro/excluir/' . $cadastro->id); ?>" role="button">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span class="glyphicon-class">Excluir</span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".exampleInputPhone").mask('(00)0000.00000');
        $(".exampleInputRg").mask('00.000.000-0', {reverse: true});
    });
</script>