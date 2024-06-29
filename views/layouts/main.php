<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
///<!-- dark-mode -->
$darkMode = Yii::$app->request->cookies->getValue('dark_mode', '0'); // Pega a preferência do cookie
///<!-- fim - dark-mode -->
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!-- dark-mode -->
<body class="d-flex flex-column h-100 <?= $darkMode == '1' ? 'dark-mode' : '' ?>">
<!-- fim-- dark-mode -->
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'Com Module', 'url' => ['/site/commodule']],
            // ['label' => 'Sem Module', 'url' => ['/site/semmodule']],


            ['label' => 'SGdb', 'url' => [''],
                'items' => [
                    ['label' => 'Com Module', 'url' => ['/site/commodule']],
                    ['label' => 'Sem Module', 'url' => ['/site/semmodule']],
                ]
            ],


            ['label' => 'JSON', 'url' => [''],
                'items' => [
                    ['label' => 'Com Module JSON', 'url' => ['/site/commodulejson']],
                    ['label' => 'Sem Module JSON', 'url' => ['/site/semmodulejson']],
                ]
            ],



            //['label' => 'Com Module JSON', 'url' => ['/site/commodulejson']],
            //['label' => 'Sem Module JSON', 'url' => ['/site/semmodulejson']],
            //['label' => 'Código Extra', 'url' => ['/site/codigoextra']],

            ['label' => 'Extra', 'url' => [''],
                'items' => [
                    ['label' => 'Código Extra', 'url' => ['/site/codigoextra']],
                    ['label' => 'botão copia', 'url' => ['/site/botao-copiar']],
                    ['label' => 'Bootstrap Icons', 'url' => ['/site/icones-bootstrap']],
                    ['label' => 'Font Awesome Icons', 'url' => ['/site/icones-font-awesome']],
                ]
            ],

            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            // Yii::$app->user->isGuest
            //     ? ['label' => 'Login', 'url' => ['/site/login']]
            //     : '<li class="nav-item">'
            //         . Html::beginForm(['/site/logout'])
            //         . Html::submitButton(
            //             'Logout (' . Yii::$app->user->identity->username . ')',
            //             ['class' => 'nav-link btn btn-link logout']
            //         )
            //         . Html::endForm()
            //         . '</li>',
            '<li class="nav-item">'
                . Html::a('Alternar Tema', '#', [
                    'class' => 'nav-link',
                    'id' => 'toggle-theme'
                ])
                . '</li>',
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- <footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">sandrofpaula@gmail.com <?= date('Y') ?> | @sandrofpaula</div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer> -->


<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">sandrofpaula@gmail.com <?= date('Y') ?> | @sandrofpaula</div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>



<?php
$toggleThemeUrl = Url::to(['/site/toggle-theme']);
$script = <<<JS
$(document).ready(function() {
    $('#toggle-theme').on('click', function(e) {
        e.preventDefault();
        console.log('Button clicked'); // Log para depuração
        $.ajax({
            url: '$toggleThemeUrl',
            type: 'POST',
            success: function(data) {
                console.log('AJAX success:', data); // Log para depuração
                if (data == '1') {
                    $('body').addClass('dark-mode');
                    $('#footer').removeClass('bg-light');
                } else {
                    $('body').removeClass('dark-mode');
                    $('#footer').addClass('bg-light');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error); // Log para depuração
            }
        });
    });
});
JS;
$this->registerJs($script);
?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
