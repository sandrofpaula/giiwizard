<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Tutorial e Editor de Código';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs/loader.min.js"></script> -->
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-12">
    <p class="d-inline-block"><?php echo Html::a('botão copiar', ['/site/botao-copiar'], ['class' => 'btn btn-outline-primary']); ?></p>
    <p class="d-inline-block"><?php echo Html::a('Bootstrap Icons', ['/site/icones-bootstrap'], ['class' => 'btn btn-outline-primary']); ?></p>
    <p class="d-inline-block"><?php echo Html::a('Font Awesome Icons', ['/site/icones-font-awesome'], ['class' => 'btn btn-outline-primary']); ?></p>
</div>

<style>

        body {
            font-family: Arial, sans-serif; /* Define a fonte padrão do corpo do documento */
            margin: 20px; /* Adiciona uma margem de 20 pixels ao redor do corpo */
        }
        h1, h2, h3 {
            color: #333; /* Define a cor do texto dos cabeçalhos */
        }
        pre {
            background-color: #f4f4f4; /* Define a cor de fundo dos elementos <pre> */
            padding: 10px; /* Adiciona preenchimento interno de 10 pixels */
            border: 1px solid #ddd; /* Define uma borda sólida de 1 pixel com cor cinza claro */
            overflow-x: auto; /* Adiciona rolagem horizontal se o conteúdo exceder a largura do elemento */
        }
        .editor-section {
            margin-bottom: 40px; /* Adiciona uma margem inferior de 40 pixels */
        }
        .editor {
            width: 100%; /* Define a largura do editor para 100% do contêiner pai */
            height: 300px; /* Define a altura do editor para 300 pixels */
            border: 1px solid #ddd; /* Define uma borda sólida de 1 pixel com cor cinza claro */
        }
        .copy-button {
            margin-top: 10px; /* Adiciona uma margem superior de 10 pixels */
        }
        #flash-message {
            display: none; /* Inicialmente, oculta o elemento */
            /* background-color: #4CAF50; */ /* Define a cor de fundo para verde */
            /* color: white; */ /* Define a cor do texto para branco */
            text-align: center; /* Alinha o texto ao centro */
            padding: 10px; /* Adiciona preenchimento interno de 10 pixels */
            position: fixed; /* Posiciona o elemento de forma fixa em relação à janela de visualização */
            top: 140px; /* Posiciona o elemento a 140 pixels do topo da janela */
            right:500px; /* Posiciona o elemento a 500 pixels da borda direita da janela */
            z-index: 1000; /* Define a ordem de empilhamento do elemento, garantindo que ele fique acima de outros elementos */
        }
    </style>

    <p>Bem-vindo ao tutorial! Aqui você encontrará exemplos de códigos em várias linguagens de programação e editores interativos para testar seus próprios códigos.</p>

    <div class="editor-section">
        <h2>PHP</h2>
        <p>Este é um exemplo simples de um código PHP:</p>
        <div id="editor-php" class="editor"></div>
        <button type="button" class="copy-button btn btn-warning" data-target="editor-php">
            <i class="fa fa-copy"></i> Copiar
        </button>
    </div>

    <div class="editor-section">
        <h2>JavaScript</h2>
        <p>Este é um exemplo simples de um código JavaScript:</p>
        <div id="editor-js" class="editor"></div>
        <button type="button" class="copy-button btn btn-warning" data-target="editor-js">
            <i class="fa fa-copy"></i> Copiar
        </button>
    </div>

    <div class="editor-section">
        <h2>SQL</h2>
        <p>Este é um exemplo simples de um código SQL:</p>
        <div id="editor-sql" class="editor"></div>
        <button type="button" class="copy-button btn btn-warning" data-target="editor-sql">
            <i class="fa fa-copy"></i> Copiar
        </button>
    </div>

    <div class="editor-section">
        <h2>Node.js</h2>
        <p>Este é um exemplo simples de um código Node.js:</p>
        <div id="editor-node" class="editor"></div>
        <button type="button" class="copy-button btn btn-warning" data-target="editor-node">
            <i class="fa fa-copy"></i> Copiar
        </button>
    </div>

    <div class="editor-section">
        <h2>PL/SQL</h2>
        <p>Este é um exemplo simples de um código PL/SQL:</p>
        <div id="editor-plsql" class="editor"></div>
        <button type="button" class="copy-button btn btn-warning" data-target="editor-plsql">
            <i class="fa fa-copy"></i> Copiar
        </button>
    </div>

    <div class="editor-section">
        <h2>Python</h2>
        <p>Este é um exemplo simples de um código Python:</p>
        <div id="editor-python" class="editor"></div>
        <button type="button" class="copy-button btn btn-warning" data-target="editor-python">
            <i class="fa fa-copy"></i> Copiar
        </button>
    </div>

    <!-- <div id="flash-message"></div> -->
    <div id="flash-message" class="alert alert-warning" role="alert"> </div>

    <script>
        function loadMonacoEditor(callback) {
            var script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs/loader.min.js';
            script.onload = callback;
            document.head.appendChild(script);
        }

        loadMonacoEditor(function() {
            require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs' }});
            require(['vs/editor/editor.main'], function() {
                // Definindo um tema personalizado
                monaco.editor.defineTheme('myCustomTheme', {
                    base: 'vs-dark', // Pode ser 'vs', 'vs-dark' ou 'hc-black'
                    inherit: true,
                    rules: [
                        { token: 'comment', foreground: 'ffa500', fontStyle: 'italic underline' },
                        { token: 'keyword', foreground: '00ff00', fontStyle: 'bold' },
                        { token: 'number', foreground: '00ffff' },
                        { token: 'string', foreground: 'ff0000' },
                        { token: 'operator', foreground: 'ff00ff' },
                        { token: 'identifier', foreground: 'ffffff' },
                        { token: 'delimiter', foreground: '888888' },
                        { token: 'type', foreground: 'ffcc00' },
                        { token: 'function', foreground: '00ccff', fontStyle: 'bold' },
                        { token: 'constant', foreground: 'ff66cc' },
                        { token: 'class', foreground: 'ffcc00' },
                        { token: 'interface', foreground: '66ccff' },
                        { token: 'namespace', foreground: 'ff9900' },
                        { token: 'parameter', foreground: 'ccccff' },
                        { token: 'variable', foreground: 'ff9966' },
                        { token: 'property', foreground: '99cc99' },
                        { token: 'enum', foreground: 'ffcc66' },
                        { token: 'enumMember', foreground: 'ffcc99' },
                        { token: 'module', foreground: '6699cc' },
                        { token: 'method', foreground: '66cc66' },
                        { token: 'macro', foreground: 'cc99cc' },
                        { token: 'annotation', foreground: 'ff99ff' },
                        { token: 'attribute', foreground: 'ccffcc' },
                        { token: 'builtin', foreground: 'ff99cc' },
                        { token: 'escape', foreground: '66ffff' },
                        { token: 'tag', foreground: 'ff6699' },
                        { token: 'tag.attribute', foreground: '99ccff' },
                        { token: 'tag.delimiter', foreground: 'ffcccc' }
                    ],
                    colors: {
                        'editor.foreground': '#F8F8F8', /* Cor do texto no editor */
                        'editor.background': '#2B2B2B', /* Cor de fundo do editor */
                        'editorCursor.foreground': '#A7A7A7', /* Cor do cursor no editor */
                        'editor.lineHighlightBackground': '#3C3C3C', /* Cor de fundo da linha destacada */
                        'editorLineNumber.foreground': '#BBBBBB', /* Cor dos números das linhas */
                        'editor.selectionBackground': '#88000030', /* Cor do fundo da seleção de texto */
                        'editor.inactiveSelectionBackground': '#88000015', /* Cor do fundo da seleção inativa */
                        'editor.selectionHighlightBackground': '#add6ff26', /* Cor do fundo da seleção destacada */
                        'editor.wordHighlightBackground': '#575757B8', /* Cor do fundo das palavras destacadas */
                        'editor.wordHighlightStrongBackground': '#004972B8', /* Cor do fundo das palavras fortemente destacadas */
                        'editor.findMatchBackground': '#9F40FF', /* Cor do fundo das correspondências de pesquisa */
                        'editor.findMatchHighlightBackground': '#EA5C004D', /* Cor do fundo das correspondências de pesquisa destacadas */
                        'editor.findRangeHighlightBackground': '#3C3C3C75', /* Cor do fundo do intervalo de pesquisa destacado */
                        'editor.hoverHighlightBackground': '#264F7840', /* Cor do fundo dos elementos destacados ao passar o mouse */
                        'editor.lineHighlightBorder': '#282828', /* Cor da borda da linha destacada */
                        'editorLink.activeForeground': '#4E94CE', /* Cor dos links ativos */
                        'editor.rangeHighlightBackground': '#FFFFFF0B', /* Cor do fundo dos intervalos destacados */
                        'editorWhitespace.foreground': '#3B3A32', /* Cor dos espaços em branco */
                        'editorIndentGuide.background': '#404040', /* Cor do guia de indentação */
                        'editorIndentGuide.activeBackground': '#707070', /* Cor do guia de indentação ativo */
                        'editorRuler.foreground': '#5A5A5A', /* Cor da régua */
                        'editorCodeLens.foreground': '#999999', /* Cor do CodeLens */
                        'editorBracketMatch.background': '#2B2B2B', /* Cor do fundo das correspondências de parênteses */
                        'editorBracketMatch.border': '#515A6B', /* Cor da borda das correspondências de parênteses */
                        'editorOverviewRuler.border': '#282828', /* Cor da borda da régua de visão geral */
                        'editorOverviewRuler.findMatchForeground': '#d186167e', /* Cor da correspondência de pesquisa na régua de visão geral */
                        'editorOverviewRuler.rangeHighlightForeground': '#007acc99', /* Cor do intervalo destacado na régua de visão geral */
                        'editorOverviewRuler.selectionHighlightForeground': '#a0a0a0cc', /* Cor da seleção destacada na régua de visão geral */
                        'editorOverviewRuler.wordHighlightForeground': '#575757B8', /* Cor da palavra destacada na régua de visão geral */
                        'editorOverviewRuler.wordHighlightStrongForeground': '#004972B8', /* Cor da palavra fortemente destacada na régua de visão geral */
                        'editorOverviewRuler.modifiedForeground': '#880000', /* Cor do texto modificado na régua de visão geral */
                        'editorOverviewRuler.addedForeground': '#38713d', /* Cor do texto adicionado na régua de visão geral */
                        'editorOverviewRuler.deletedForeground': '#6e1e1e', /* Cor do texto excluído na régua de visão geral */
                        'editorOverviewRuler.errorForeground': '#ff1212', /* Cor dos erros na régua de visão geral */
                        'editorOverviewRuler.warningForeground': '#ff8800', /* Cor dos avisos na régua de visão geral */
                        'editorOverviewRuler.infoForeground': '#75beff', /* Cor das informações na régua de visão geral */
                        'editorGutter.background': '#2B2B2B', /* Cor do fundo da margem */
                        'editorGutter.modifiedBackground': '#dd9e2c', /* Cor do fundo do texto modificado na margem */
                        'editorGutter.addedBackground': '#81b88b', /* Cor do fundo do texto adicionado na margem */
                        'editorGutter.deletedBackground': '#c74e4e', /* Cor do fundo do texto excluído na margem */
                        'editorError.foreground': '#ff1212', /* Cor dos erros no editor */
                        'editorWarning.foreground': '#ff8800', /* Cor dos avisos no editor */
                        'editorInfo.foreground': '#75beff', /* Cor das informações no editor */
                        'editorHint.foreground': '#eeeeeeb3', /* Cor das dicas no editor */
                        'editorError.border': '#ffffff00', /* Cor da borda dos erros no editor */
                        'editorWarning.border': '#ffffff00', /* Cor da borda dos avisos no editor */
                        'editorInfo.border': '#ffffff00', /* Cor da borda das informações no editor */
                        'editorHint.border': '#ffffff00', /* Cor da borda das dicas no editor */
                        'minimapGutter.addedBackground': '#81b88b', /* Cor do fundo do texto adicionado no minimapa */
                        'minimapGutter.modifiedBackground': '#dd9e2c', /* Cor do fundo do texto modificado no minimapa */
                        'minimapGutter.deletedBackground': '#c74e4e', /* Cor do fundo do texto excluído no minimapa */
                        'minimap.findMatchHighlight': '#9F40FF', /* Cor do destaque de correspondência de pesquisa no minimapa */
                        'minimap.selectionHighlight': '#264F7840', /* Cor do destaque de seleção no minimapa */
                        'minimap.errorHighlight': '#ff1212', /* Cor do destaque de erro no minimapa */
                        'minimap.warningHighlight': '#ff8800', /* Cor do destaque de aviso no minimapa */
                        'minimap.background': '#2B2B2B', /* Cor de fundo do minimapa */
                        'minimapSlider.background': '#ffffff1b', /* Cor de fundo do controle deslizante do minimapa */
                        'minimapSlider.hoverBackground': '#ffffff28', /* Cor de fundo ao passar o mouse sobre o controle deslizante do minimapa */
                        'minimapSlider.activeBackground': '#ffffff1b', /* Cor de fundo ao clicar no controle deslizante do minimapa */
                        'minimap.foregroundOpacity': '#707070', /* Opacidade do texto no minimapa */
                        'breadcrumb.foreground': '#cccccc', /* Cor do texto do breadcrumb */
                        'breadcrumb.focusForeground': '#e0e0e0', /* Cor do texto do breadcrumb em foco */
                        'breadcrumb.activeSelectionForeground': '#e0e0e0', /* Cor do texto do breadcrumb selecionado */
                        'breadcrumbPicker.background': '#333333' /* Cor de fundo do seletor de breadcrumb */
                    }
                });

                // Aplicando o tema personalizado
                monaco.editor.setTheme('myCustomTheme');

                // Criando os editores como somente leitura
                var editorPHP = monaco.editor.create(document.getElementById('editor-php'), {
                    // value: '<' + '?php\n// Digite seu código PHP aqui...\n?>',
                    value: '/* Digite seu código PHP aqui...*/',
                    language: 'php',
                    theme: 'myCustomTheme',
                   // readOnly: true, //bloqueia a edição
                });

                var editorJS = monaco.editor.create(document.getElementById('editor-js'), {
                    value: '// Digite seu código JavaScript aqui...',
                    language: 'javascript',
                    theme: 'myCustomTheme',
                   // readOnly: true, //bloqueia a edição
                });

                var editorSQL = monaco.editor.create(document.getElementById('editor-sql'), {
                    value: '-- Digite seu código SQL aqui...',
                    language: 'sql',
                    theme: 'myCustomTheme',
                   // readOnly: true, //bloqueia a edição
                });

                var editorNode = monaco.editor.create(document.getElementById('editor-node'), {
                    value: '// Digite seu código Node.js aqui...',
                    language: 'javascript',
                    theme: 'myCustomTheme',
                   // readOnly: true, //bloqueia a edição
                });

                var editorPLSQL = monaco.editor.create(document.getElementById('editor-plsql'), {
                    value: '-- Digite seu código PL/SQL aqui...',
                    language: 'plsql',
                    theme: 'myCustomTheme',
                   // readOnly: true, //bloqueia a edição
                });

                var editorPython = monaco.editor.create(document.getElementById('editor-python'), {
                    value: '# Digite seu código Python aqui...',
                    language: 'python',
                    theme: 'myCustomTheme',
                   // readOnly: true, //bloqueia a edição
                });

                // Função para copiar o conteúdo do editor
                function copyContent(targetEditor) {
                    var model = targetEditor.getModel();
                    var fullText = model.getValue();
                    navigator.clipboard.writeText(fullText).then(function() {
                        showFlashMessage('Copiado: ' + fullText);
                    });
                }

                // Adicionando o evento de clique aos botões de cópia
                document.querySelector
                document.querySelectorAll('.copy-button').forEach(button => {
                        button.addEventListener('click', function() {
                            var targetId = this.getAttribute('data-target');
                            var targetEditor;
                            switch (targetId) {
                                case 'editor-php':
                                    targetEditor = editorPHP;
                                    break;
                                case 'editor-js':
                                    targetEditor = editorJS;
                                    break;
                                case 'editor-sql':
                                    targetEditor = editorSQL;
                                    break;
                                case 'editor-node':
                                    targetEditor = editorNode;
                                    break;
                                case 'editor-plsql':
                                    targetEditor = editorPLSQL;
                                    break;
                                case 'editor-python':
                                    targetEditor = editorPython;
                                    break;
                            }
                            copyContent(targetEditor);
                        });
                    });

                    // Função para exibir mensagem de cópia
                    function showFlashMessage(message) {
                        var flashMessage = document.getElementById('flash-message');
                        flashMessage.innerHTML = message;
                        flashMessage.style.display = 'block';

                        setTimeout(function() {
                            flashMessage.style.display = 'none';
                        }, 3000); // Esconde a mensagem após 3 segundos
                    }
                });
            });
        </script>

