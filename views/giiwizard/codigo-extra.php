<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Código Extra';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-12">
    <p class="d-inline-block"><?php echo Html::a('botão copiar', ['/site/botao-copiar'], ['class' => 'btn btn-outline-primary']); ?></p>
    <p class="d-inline-block"><?php echo Html::a('Bootstrap Icons', ['/site/icones-bootstrap'], ['class' => 'btn btn-outline-primary']); ?></p>
    <p class="d-inline-block"><?php echo Html::a('Font Awesome Icons', ['/site/icones-font-awesome'], ['class' => 'btn btn-outline-primary']); ?></p>
</div>


    <div    id="flash-message" 
            style="
            display:none; 
            position:fixed; 
            top:100px; 
            right:500px; 
            background:lightgrey; 
            padding:10px; 
            border-radius:5px;
    ">
    </div>

    <div class="bootstrap-colors-content">
        <div class="alert alert-warning">
            Copia o Código do botão
            <button class="btn text-bg-primary p-3" onclick="copyButtonText(this)">primary</button>
            <button class="btn text-bg-secondary p-3" onclick="copyButtonText(this)">secondary</button>
            <button class="btn text-bg-success p-3" onclick="copyButtonText(this)">success</button>
            <button class="btn text-bg-danger p-3" onclick="copyButtonText(this)">danger</button>
            <button class="btn text-bg-warning p-3" onclick="copyButtonText(this)">warning</button>
            <button class="btn text-bg-info p-3" onclick="copyButtonText(this)">info</button>
            <button class="btn text-bg-light p-3" onclick="copyButtonText(this)">light</button>
            <button class="btn text-bg-dark p-3" onclick="copyButtonText(this)">dark</button>
        </div>
    </div>
    <br >
    <div class="bootstrap-colors-content">
        <div class="alert alert-success">
            Copia o Value  do botão
            <button class="btn text-bg-primary p-3" onclick="copyValueText(this)">primary</button>
            <button class="btn text-bg-secondary p-3" onclick="copyValueText(this)">secondary</button>
            <button class="btn text-bg-success p-3" onclick="copyValueText(this)">success</button>
            <button class="btn text-bg-danger p-3" onclick="copyValueText(this)">danger</button>
            <button class="btn text-bg-warning p-3" onclick="copyValueText(this)">warning</button>
            <button class="btn text-bg-info p-3" onclick="copyValueText(this)">info</button>
            <button class="btn text-bg-light p-3" onclick="copyValueText(this)">light</button>
            <button class="btn text-bg-dark p-3" onclick="copyValueText(this)">dark</button>
        </div>
    </div>
</div>

<script>
    function copyButtonText(element) {
        var tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = element.outerHTML;//copia o codigo do botão
        //tempInput.value = element.textContent.trim();// copia o value do botão
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        showFlashMessage('Copiado: ' +  element.outerHTML);
    }
    function copyValueText(element) {
        var tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        //tempInput.value = element.outerHTML;//copia o codigo do botão
        tempInput.value = element.textContent.trim();// copia o value do botão
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        showFlashMessage('Copiado: ' + element.outerHTML);
    }

    function showFlashMessage(message) {
        var flashMessage = document.getElementById('flash-message');
        flashMessage.innerHTML = message;
        flashMessage.style.display = 'block';

        setTimeout(function() {
            flashMessage.style.display = 'none';
        }, 3000); // Esconde a mensagem após 3 segundos
    }
</script>