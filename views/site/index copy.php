<?php

/** @var yii\web\View $this */

$this->title = 'Gii Wizard';
?>

<!---->
<?php
use yii\helpers\Html;
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
    <style>
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            display: none;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="site-about">
        <div class="form-group">
            <h1 class="modal-title"><span class="badge bg-danger">Gii Wizard</span></h1>          
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
        <button id="copy-all-button" class="btn btn-primary mt-3" style="display:none;">Copiar Tudo</button>
    </div>
</div>

<div id="custom-alert" class="alert alert-success custom-alert" role="alert">
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$('#module-name-input').on('input', function() {
    updateResult();
});

$(document).on('change', '.table-radio', function() {
    updateResult();
});

function updateResult() {
    var moduleName = $('#module-name-input').val();
    var capitalizedModuleName = moduleName.charAt(0).toUpperCase() + moduleName.slice(1);
    var selectedTable = $('input[name="selectedTable"]:checked').val();

    var parts = selectedTable.split('_');
    var rightPart = parts.length > 1 ? parts[1].toUpperCase() : selectedTable.toUpperCase();

    var modelClass = 'app\\modules\\' + moduleName + '\\models\\' + rightPart;
    var namespace = 'app\\modules\\' + moduleName + '\\models';
    var searchModelClass = 'app\\modules\\' + moduleName + '\\models\\' + capitalizeFirstLetter(rightPart.toLowerCase()) + 'Search';
    var controllerClass = 'app\\modules\\' + moduleName + '\\controllers\\' + capitalizeFirstLetter(rightPart.toLowerCase()) + 'Controller';
    var viewPath = '@app/modules/' + moduleName + '/views/' + rightPart.toLowerCase();

    var resultHtml = 
        '<h1 class="modal-title"><span class="badge bg-dark">Module Generator</span></h1>' +
        createInputWithCopy('Module Class:', 'app\\modules\\' + moduleName + '\\' + capitalizedModuleName) +
        createInputWithCopy('Module ID:', moduleName) +
        '<h1 class="modal-title"><span class="badge bg-primary">Table Name</span></h1>' +
        createInputWithCopy('Selected Table:', selectedTable) +
        '<h1 class="modal-title"><span class="badge bg-warning text-dark">Model Generator</span></h1>' +
        createInputWithCopy('Model Class Name:', rightPart) +
        createInputWithCopy('Namespace:', namespace) +
        '<h1 class="modal-title"><span class="badge bg-success">Model Generator</span></h1>' +
        createInputWithCopy('Model Class:', modelClass) +
        createInputWithCopy('Search Model Class:', searchModelClass) +
        createInputWithCopy('Controller Class:', controllerClass) +
        createInputWithCopy('View Path:', viewPath);

    if (moduleName && selectedTable) {
        $('#module-result').html(resultHtml);
        $('#copy-all-button').show().off('click').on('click', function() {
            copyAll();
        });
    } else {
        $('#module-result').html('');
        $('#copy-all-button').hide();
    }
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function createInputWithCopy(label, value) {
    var inputId = label.replace(/\s+/g, '-').toLowerCase() + '-' + Math.random().toString(36).substr(2, 5);
    return '<div class="form-group">' +
               '<label>' + label + '</label>' +
               '<div class="input-group">' +
                   '<input type="text" class="form-control" id="' + inputId + '" value="' + value + '" readonly>' +
                   '<div class="input-group-append">' +
                       '<button class="btn btn-outline-secondary copy-button" type="button" data-target="' + inputId + '">Copiar</button>' +
                   '</div>' +
               '</div>' +
           '</div>';
}

$(document).on('click', '.copy-button', function() {
    var targetInputId = $(this).data('target');
    var targetInput = document.getElementById(targetInputId);
    targetInput.select();
    document.execCommand('copy');
    
    showAlert('Copiado: ' + targetInput.value);
});

function copyAll() {
    var allText = '';
    $('#module-result .form-group').each(function() {
        var label = $(this).find('label').text();
        var value = $(this).find('input[type="text"]').val();
        allText += label + '\n' + value + '\n';
    });
    
    var tempInput = $('<textarea>');
    $('body').append(tempInput);
    tempInput.val(allText).select();
    document.execCommand('copy');
    tempInput.remove();
    
    showAlert('Todos os valores foram copiados.');
}

function showAlert(message) {
    var alertBox = $('#custom-alert');
    alertBox.text(message).fadeIn();

    setTimeout(function() {
        alertBox.fadeOut();
    }, 2000);
}
</script>
</body>
