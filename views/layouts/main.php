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

$themeMode = Yii::$app->request->cookies->getValue('theme_mode', '0'); // Pega a preferência do cookie
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column h-100 <?= $themeMode == '1' ? 'dark-mode' : ($themeMode == '2' ? 'dark-mode-high-contrast' : '') ?>">
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
            ['label' => 'Extra', 'url' => [''],
                'items' => [
                    ['label' => 'Código Extra', 'url' => ['/site/codigoextra']],
                    ['label' => 'botão copia', 'url' => ['/site/botao-copiar']],
                    ['label' => 'Bootstrap Icons', 'url' => ['/site/icones-bootstrap']],
                    ['label' => 'Font Awesome Icons', 'url' => ['/site/icones-font-awesome']],
                    ['label' => 'Editor Código Monaco', 'url' => ['/site/editor-codigo-monaco']],
                ]
            ],
            '<li class="nav-item">'
                . Html::a('<i class="bi ' . ($themeMode == '0' ? 'bi-brightness-high' : ($themeMode == '1' ? 'bi-moon-stars' : 'bi-eye')) . '"></i>', '#', [
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
        $.ajax({
            url: '$toggleThemeUrl',
            type: 'POST',
            success: function(data) {
                if (data == '1') {
                    $('body').addClass('dark-mode').removeClass('dark-mode-high-contrast');
                    $('#toggle-theme i').removeClass('bi-brightness-high bi-eye').addClass('bi-moon-stars');
                    $('#footer').removeClass('bg-light');
                } else if (data == '2') {
                    $('body').addClass('dark-mode-high-contrast').removeClass('dark-mode');
                    $('#toggle-theme i').removeClass('bi-brightness-high bi-moon-stars').addClass('bi-eye');
                    $('#footer').removeClass('bg-light');
                } else {
                    $('body').removeClass('dark-mode dark-mode-high-contrast');
                    $('#toggle-theme i').removeClass('bi-moon-stars bi-eye').addClass('bi-brightness-high');
                    $('#footer').addClass('bg-light');
                }
            },
            /**
             * Explicação Passo a Passo 
                success: function(data)

                Esta função é chamada quando a requisição AJAX é bem-sucedida.
                data é a resposta do servidor, que indica qual modo de tema deve ser aplicado. Espera-se que data seja '0' (modo claro), '1' (modo escuro) ou '2' (modo de alto contraste).
                Primeiro Bloco: if (data == '1')

                Objetivo: Ativar o modo escuro.
                Ações:
                Adiciona a classe dark-mode ao body para aplicar estilos do modo escuro.
                Remove a classe dark-mode-high-contrast do body para garantir que o modo de alto contraste não esteja ativo.
                Atualiza o ícone no botão de alternância para um ícone de lua (bi-moon-stars), removendo os ícones de brilho (bi-brightness-high) e olho (bi-eye).
                Remove a classe bg-light do rodapé para garantir que ele adote os estilos de fundo escuro.
                Segundo Bloco: else if (data == '2')

                Objetivo: Ativar o modo de alto contraste.
                Ações:
                Adiciona a classe dark-mode-high-contrast ao body para aplicar estilos do modo de alto contraste.
                Remove a classe dark-mode do body para garantir que o modo escuro normal não esteja ativo.
                Atualiza o ícone no botão de alternância para um ícone de olho (bi-eye), removendo os ícones de brilho (bi-brightness-high) e lua (bi-moon-stars).
                Remove a classe bg-light do rodapé para garantir que ele adote os estilos de fundo de alto contraste.
                Bloco Final: else

                Objetivo: Ativar o modo claro.
                Ações:
                Remove as classes dark-mode e dark-mode-high-contrast do body para garantir que nenhum estilo de modo escuro ou alto contraste esteja ativo.
                Atualiza o ícone no botão de alternância para um ícone de brilho (bi-brightness-high), removendo os ícones de lua (bi-moon-stars) e olho (bi-eye).
                Adiciona a classe bg-light ao rodapé para aplicar os estilos de fundo claro.
                Resumo
                Este trecho de código ajusta dinamicamente a aparência da página com base na resposta do servidor. 
                Ele alterna entre modos de tema (claro, escuro e alto contraste) aplicando e removendo classes 
                CSS apropriadas e atualizando o ícone do botão de alternância para refletir o modo ativo. 
                Isso garante uma experiência de usuário consistente e responsiva conforme a escolha do tema.
             * 
             */
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
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
