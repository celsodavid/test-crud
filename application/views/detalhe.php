<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row marketing">
    <div class="col-lg-12">
        <dl class="dl-horizontal">
            <dt>Total de Produtos:</dt>
            <dd><?php echo $total_produtos ?> de produto(s)</dd>

            <dt>Total de Especial(is):</dt>
            <dd><?php echo $qtd_produtos_especiais ?> de produto(s)</dd>

            <dt>Total de Outro(s):</dt>
            <dd><?php echo $qtd_demais_produtos ?> de produto(s)</dd>

            <dt>Pontos Gerados</dt>
            <dd><?php echo $pontos_gerados ?> de pontos</dd>
        </dl>
    </div>
</div>