<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Código Extra';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-4 mb-5">


        <p><?php echo Html::a('botão copiar', ['/site/botaocopiar'], ['class' => 'btn btn-outline-primary']);?></p>

    </div>

</div>
