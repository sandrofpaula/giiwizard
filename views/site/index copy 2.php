 <!-- Bootstrap CSS -->
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?php
use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = 'Gii Wizard!';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Gii Wizard!</h1>

        <!-- <p class="lead">You have successfully created your Yii-powered application.</p> -->

        <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Comece com o Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2>Sistema com Módulos</h2>
                <p><?php echo Html::a('Gii Wizard para Sistema com Módulos', ['/site/commodule'], ['class' => 'btn btn-outline-secondary']);?></p>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#withModulesModal">
                <i class="fas fa-info-circle"></i> Sistema Com Módulos
                </button>
                
                
            </div>
            <div class="col-lg-4 mb-5">
                <h2>Sistema sem Módulos</h2>

                <!-- <p>Módulos em Yii2 são como sub-aplicações dentro da aplicação principal. 
                    Cada módulo pode ter seus próprios controladores, modelos, visões, e até configurações específicas. 
                    Usar módulos é útil para projetos grandes ou complexos, 
                    onde diferentes partes do sistema precisam ser isoladas logicamente.</p> -->

                <p><?php echo Html::a('Gii Wizard para Sistema sem Módulos', ['/site/semmodule'], ['class' => 'btn btn-outline-primary']);?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noModulesModal">
                <i class="fas fa-info-circle"></i> Sistema Sem Módulos
                </button>
                
                
            </div>
        </div>

    </div>
</div>

<!-- Modal -->

<!-- Modal Sistema Sem Módulos -->
<div class="modal fade" id="noModulesModal" tabindex="-1" role="dialog" aria-labelledby="noModulesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noModulesModalLabel">Sistema Sem Módulos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Um sistema sem módulos é mais simples e adequado para projetos menores. Todos os controladores, modelos e visões são organizados em pastas diretamente na estrutura principal da aplicação.</p>
                <h6>Vantagens:</h6>
                <ul>
                    <li>Simplicidade na estrutura do projeto.</li>
                    <li>Menor configuração inicial.</li>
                    <li>Facilidade de navegação entre arquivos.</li>
                </ul>
                <h6>Desvantagens:</h6>
                <ul>
                    <li>Escalabilidade limitada.</li>
                    <li>Organização pode se tornar confusa conforme o projeto cresce.</li>
                    <li>Menos adequado para reutilização de código.</li>
                </ul>
                <h6>Estrutura de Projeto Sem Módulos:</h6>
                <pre>
frontend/
├── controllers/
│   └── SiteController.php
├── models/
│   └── User.php
├── views/
│   └── site/
│       └── index.php
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sistema Com Módulos -->
<div class="modal fade" id="withModulesModal" tabindex="-1" role="dialog" aria-labelledby="withModulesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withModulesModalLabel">Sistema Com Módulos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Um sistema com módulos organiza o código em sub-aplicações dentro da aplicação principal. Cada módulo pode ter seus próprios controladores, modelos, visões e configurações específicas.</p>
                <h6>Vantagens:</h6>
                <ul>
                    <li>Melhor organização do código.</li>
                    <li>Maior escalabilidade para grandes projetos.</li>
                    <li>Facilita a reutilização de código.</li>
                    <li>Isolamento de funcionalidades, facilitando manutenção.</li>
                </ul>
                <h6>Desvantagens:</h6>
                <ul>
                    <li>Configuração inicial mais complexa.</li>
                    <li>Estrutura de diretórios mais profunda.</li>
                    <li>Possível impacto no desempenho.</li>
                </ul>
                <h6>Estrutura de Projeto Com Módulos:</h6>
                <pre>
frontend/
├── modules/
│   └── admin/
│       ├── controllers/
│       │   └── DefaultController.php
│       ├── models/
│       │   └── AdminUser.php
│       ├── views/
│       │   └── default/
│       │       └── index.php
│       ├── Module.php
├── controllers/
│   └── SiteController.php
├── models/
│   └── User.php
├── views/
│   └── site/
│       └── index.php
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!---->

<!-- exemplo JSON -->
<div class="modal fade" id="exemplojson" tabindex="-1" role="dialog" aria-labelledby="exemplojsonLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exemplojsonLabel">Exemplo JSON</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Exemplo JSON para emular as tabelas de banco de dados.</p>

                <pre>
                    {
                    "database": {
                        "tables": [
                        "tb_autores",
                        "tb_categorias",
                        "tb_editoras",
                        "tb_emprestimos",
                        "tb_livros",
                        "tb_migration",
                        "tb_usuario"
                        ]
                    }
                    }
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php

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
        <h1 class="modal-title"><span class="badge bg-danger">Gii Wizard</span></h1>
        
        <h2>Banco de Dados: Personalizado</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exemplojson">
                <i class="fas fa-info-circle"></i> Exemplo JSON
                </button>
        <div class="form-group">
            <label for="json-input">Insira o código JSON</label>
            <textarea id="json-input" class="form-control" rows="10" placeholder='{"database": {"tables": ["tb_autores", "tb_categorias", "tb_editoras", "tb_emprestimos", "tb_livros", "tb_migration", "tb_usuario"]}}'></textarea>
        </div>
        <button id="process-json-button" class="btn btn-primary">Processar JSON</button>
        
        <div id="table-list" class="mt-3">
            <!-- A lista de tabelas será exibida aqui -->
        </div>
        
        <div id="module-result" class="mt-3">
            <!-- O resultado será exibido aqui -->
        </div>
        <button id="copy-all-button" class="btn btn-primary mt-3" style="display:none;">Copiar Tudo</button>
    </div>
</div>

<div id="custom-alert" class="alert alert-primary custom-alert" role="alert">
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$('#process-json-button').on('click', function() {
    processJSON();
});

function processJSON() {
    var jsonInput = $('#json-input').val();
    try {
        var jsonData = JSON.parse(jsonInput);
        var tables = jsonData.database.tables;
        var tableListHtml = '<h2>Tabelas de banco de dados</h2><ul class="list-group">';
        tables.forEach(function(table) {
            tableListHtml += '<li class="list-group-item">';
            tableListHtml += '<input type="radio" name="selectedTable" value="' + table + '" class="table-radio">';
            tableListHtml += '<label>' + table + '</label>';
            tableListHtml += '</li>';
        });
        tableListHtml += '</ul>';
        $('#table-list').html(tableListHtml);
        
        // Adiciona evento de mudança nos novos rádios
        $('.table-radio').on('change', function() {
            updateResult();
        });
    } catch (e) {
        showAlert('JSON inválido. Por favor, corrija e tente novamente.');
    }
}

function updateResult() {
    var moduleName = 'proesc'; // Nome do módulo fixo
    var capitalizedModuleName = moduleName.charAt(0).toUpperCase() + moduleName.slice(1);
    var selectedTable = $('input[name="selectedTable"]:checked').val();

    if (!selectedTable) {
        return;
    }

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

    if (selectedTable) {
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
