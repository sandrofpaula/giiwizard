<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>

<!---->
<?php
 // Obter a conexão com o banco de dados
 $db = Yii::$app->db;
 // Obter os nomes das tabelas
 $tables = $db->schema->getTableNames();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="site-about">
        <div class="form-group">
            <h1 class="modal-title"><span class="badge bg-danger ">Gii Wizard</span></h1>          
            <label for="module-name-input">Insira o nome do módulo</label>
            <?= Html::textInput('moduleName', '', ['id' => 'module-name-input', 'class' => 'form-control', 'maxlength' => true, 'placeholder' => 'Enter module name']) ?>
        </div>

        <h2>Tabelas de banco de dados</h2>
        <ul class="list-group">
            <?php foreach ($tables as $table): ?>
                <li class="list-group-item">
                    <?= Html::radio('selectedTable', false, ['value' => $table, 'class' => 'table-radio', 'name' => 'selectedTable']) ?>
                    <?= Html::encode($table) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <div id="module-result" class="mt-3">
            <!-- O resultado será exibido aqui -->
        </div>
        <button id="copy-button" class="btn btn-primary mt-3" style="display:none;">Copiar</button>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$('#module-name-input').on('input', function() {
    updateResult();
});

$('.table-radio').on('change', function() {
    updateResult();
});

function updateResult() {
    var moduleName = $('#module-name-input').val();
    var capitalizedModuleName = moduleName.charAt(0).toUpperCase() + moduleName.slice(1);
    var selectedTable = $('input[name="selectedTable"]:checked').val();

       // Dividir a string selectedTable pelo sublinhado e usar a parte direita
       var parts = selectedTable.split('_');
        var rightPart = parts.length > 1 ? parts[1].toUpperCase() : selectedTable.toUpperCase();

        var modelClass = 'app\\modules\\' + moduleName + '\\models\\' + rightPart;
        var namespace = 'app\\modules\\' + moduleName + '\\models';
        var searchModelClass = 'app\\modules\\' + moduleName + '\\models\\' + capitalizeFirstLetter(rightPart.toLowerCase()) + 'Search';
        var controllerClass = 'app\\modules\\' + moduleName + '\\controllers\\' + capitalizeFirstLetter(rightPart.toLowerCase()) + 'Controller';
        var viewPath = '@app/modules/' + moduleName + '/views/' + rightPart.toLowerCase();

        var resultHtml = 
            '<h1 class="modal-title"><span class="badge bg-dark ">Module Generator</span></h1>' +
            
            '<div class="form-group"><label>Module Class:</label> <input type="text" class="form-control" value="app\\modules\\' + moduleName + '\\' + capitalizedModuleName + '" readonly></div>' +
            '<div class="form-group"><label>Module ID:</label> <input type="text" class="form-control" value="' + moduleName + '" readonly></div>' +
            
            '<h1 class="modal-title"><span class="badge bg-primary">Table Name</span></h1>' +
            '<div class="form-group"><label>Selected Table:</label> <input type="text" class="form-control" value="' + selectedTable + '" readonly></div>' +

            '<h1 class="modal-title"><span class="badge bg-warning text-dark">Model Generator</span></h1>' +
            '<div class="form-group"><label>Model Class Name:</label> <input type="text" class="form-control" value="' + rightPart + '" readonly></div>' +
            '<div class="form-group"><label>Namespace:</label> <input type="text" class="form-control" value="' + namespace + '" readonly></div>' +
            
            '<h1 class="modal-title"><span class="badge bg-success">Model Generator</span></h1>' +
            '<div class="form-group"><label>Model Class:</label> <input type="text" class="form-control" value="' + modelClass + '" readonly></div>' +
            '<div class="form-group"><label>Search Model Class:</label> <input type="text" class="form-control" value="' + searchModelClass + '" readonly></div>' +
            '<div class="form-group"><label>Controller Class:</label> <input type="text" class="form-control" value="' + controllerClass + '" readonly></div>' +
            '<div class="form-group"><label>View Path:</label> <input type="text" class="form-control" value="' + viewPath + '" readonly></div>';
    
            if (moduleName && selectedTable) {
 
        $('#module-result').html(resultHtml);
        $('#copy-button').show().off('click').on('click', function() {
            copyToClipboard(resultHtml);
        });
    } else {
        $('#module-result').html('');
        $('#copy-button').hide();
    }
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function copyToClipboard(html) {
    var tempElement = $('<div>').html(html).appendTo('body').css({position: 'absolute', left: '-9999px'});
    var range = document.createRange();
    range.selectNode(tempElement[0]);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
    tempElement.remove();
    alert('Copiado para a área de transferência');
}
</script>
</body>