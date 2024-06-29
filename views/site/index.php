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

        <p><a class="btn btn-lg btn-success" target="_blank" href="https://www.yiiframework.com">Comece com o Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2>Sistema com Módulos</h2>
                <p><?php echo Html::a('Gii Wizard para Sistema com Módulos', ['/site/commodule'], ['class' => 'btn btn-outline-warning']);?></p>
                
                <p><?php echo Html::a('Gii Wizard para Sistema com Módulos (JSON)', ['/site/commodulejson'], ['class' => 'btn btn-outline-warning']);?></p>
                
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#withModulesModal">
                <i class="fas fa-info-circle"></i> Sistema Com Módulos
                </button>
                
                
            </div>
            <div class="col-lg-4 mb-5">
                <h2>Sistema sem Módulos</h2>

                <p><?php echo Html::a('Gii Wizard para Sistema sem Módulos', ['/site/semmodule'], ['class' => 'btn btn-outline-success']);?></p>

                <p><?php echo Html::a('Gii Wizard para Sistema sem Módulos (JSON)', ['/site/semmodulejson'], ['class' => 'btn btn-outline-success']);?></p>
                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#noModulesModal">
                <i class="fas fa-info-circle"></i> Sistema Sem Módulos
                </button>
            </div>
            <div class="col-lg-4 mb-5">
                <h2>Código Extra</h2>

                <p><?php echo Html::a('Código Extra', ['/site/codigoextra'], ['class' => 'btn btn-outline-primary']);?></p>

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


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>