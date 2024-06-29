<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Botão copiar';
$this->params['breadcrumbs'][] = ['label' => 'Código Extra', 'url' => ['/site/codigoextra']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- fica flutuando -->
<style>
    #flash-message {
        position: fixed;
       /*  top: 20px; */
        top: 113.4px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        display: none;
        max-width: 90%;
        text-align: center;
    }
</style>
 <!-- fim- fica flutuando -->

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- ficado no topo -->
    <!-- <div id="flash-message" class="alert alert-primary" style="display: none;"></div> -->
    <!--fim- ficado no topo -->
    
    <!-- fica flutuando -->
    <div id="flash-message" class="alert alert-primary"></div>
    <!-- fim- fica flutuando -->

    <?php $form = ActiveForm::begin(); ?>

    <?php for ($i = 1; $i <=5; $i++): ?>
        <div class="form-group">
            <label for="campo_avulso_<?= $i ?>">Campo Avulso <?= $i ?></label>
            <div class="input-group">
                <input type="text" id="campo_avulso_<?= $i ?>" class="form-control" name="campo_avulso_<?= $i ?>" maxlength="true">
                <div class="input-group-append">
                    <button type="button" class="copy-button btn btn-warning" data-target="campo_avulso_<?= $i ?>">
                        <i class="fa fa-copy"></i> Copiar
                    </button>
                </div>
            </div>
        </div>
    <?php endfor; ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- alert do navegador -->
<!-- <script>
    $(document).on('click', '.copy-button', function() {
        var targetInputId = $(this).data('target');
        var targetInput = document.getElementById(targetInputId);
        targetInput.select();
        document.execCommand('copy');
        
        showAlert('Copiado: ' + targetInput.value);
    });

    function showAlert(message) {
        alert(message);
    }
</script> -->
<!--fim- alert do navegador -->

<!-- flash-message -->
<script>
    $(document).on('click', '.copy-button', function() {
        var targetInputId = $(this).data('target');
        var targetInput = document.getElementById(targetInputId);
        targetInput.select();
        document.execCommand('copy');
        
        showFlashMessage('Copiado: ' + targetInput.value);
    });

    function showFlashMessage(message) {
        var flashMessage = document.getElementById('flash-message');
        flashMessage.innerHTML = message;
        flashMessage.style.display = 'block';

        setTimeout(function() {
            flashMessage.style.display = 'none';
        }, 3000); // Esconde a mensagem após 3 segundos
    }
</script>
<!--fim- flash-message -->