<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row marketing">
    <div class="col-lg-12">
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
                    <td><?php echo $cadastro->telefone ?></td>
                    <td><?php echo $cadastro->rg ?></td>
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