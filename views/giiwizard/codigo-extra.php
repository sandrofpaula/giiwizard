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
            <p>Copia o Código do botão</p>
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
            <p>Copia o Value  do botão</p>
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



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial e Editor de Código</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2, h3 {
            color: #333;
        }
        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            overflow-x: auto;
        }
        .editor-section {
            margin-bottom: 40px;
        }
        .editor {
            width: 100%;
            height: 300px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Tutorial e Editor de Código</h1>
    <p>Bem-vindo ao tutorial! Aqui você encontrará exemplos de códigos em várias linguagens de programação e editores interativos para testar seus próprios códigos.</p>

    <div class="editor-section">
        <h2>PHP</h2>
        <p>Este é um exemplo simples de um código PHP:</p>
        <pre>&lt;?php echo "Olá, mundo!"; ?&gt;</pre>
        <div id="editor-php" class="editor">// Digite seu código PHP aqui...</div>
    </div>

    <div class="editor-section">
        <h2>JavaScript</h2>
        <p>Este é um exemplo simples de um código JavaScript:</p>
        <pre>&lt;script&gt; document.write("Olá, mundo!"); &lt;/script&gt;</pre>
        <div id="editor-js" class="editor">// Digite seu código JavaScript aqui...</div>
    </div>

    <div class="editor-section">
        <h2>SQL</h2>
        <p>Este é um exemplo simples de um código SQL:</p>
        <pre>SELECT * FROM usuarios WHERE idade &gt; 18;</pre>
        <div id="editor-sql" class="editor">-- Digite seu código SQL aqui...</div>
    </div>

    <div class="editor-section">
        <h2>Node.js</h2>
        <p>Este é um exemplo simples de um código Node.js:</p>
        <pre>
const http = require('http');
const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Olá, mundo!');
});
server.listen(3000, '127.0.0.1', () => {
    console.log('Servidor rodando em http://127.0.0.1:3000/');
});
        </pre>
        <div id="editor-node" class="editor">// Digite seu código Node.js aqui...</div>
    </div>

    <div class="editor-section">
        <h2>PL/SQL</h2>
        <p>Este é um exemplo simples de um código PL/SQL:</p>
        <pre>
DECLARE
    mensagem VARCHAR2(50);
BEGIN
    mensagem := 'Olá, mundo!';
    DBMS_OUTPUT.PUT_LINE(mensagem);
END;
        </pre>
        <div id="editor-plsql" class="editor">-- Digite seu código PL/SQL aqui...</div>
    </div>

    <div class="editor-section">
        <h2>Python</h2>
        <p>Este é um exemplo simples de um código Python:</p>
        <!-- <pre>print("Olá, mundo!")</pre> -->
        <pre id="campo_avulso_x">print("Olá, mundo!")</pre>
        <div id="editor-python" class="editor"># Digite seu código Python aqui...</div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs/loader.min.js"></script>
    <script>
        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs' }});
        require(['vs/editor/editor.main'], function() {
            // Definindo um tema personalizado
            /* monaco.editor.defineTheme('myCustomTheme', {
                base: 'vs-dark', // Pode ser 'vs', 'vs-dark' ou 'hc-black'
                inherit: true,
                rules: [
                    { token: 'comment', foreground: 'ffa500', fontStyle: 'italic underline' },
                    { token: 'keyword', foreground: '00ff00' },
                    { token: 'number', foreground: '00ffff' }
                ],
                colors: {
                    'editor.foreground': '#F8F8F8',
                    'editor.background': '#2B2B2B',
                    'editorCursor.foreground': '#A7A7A7',
                    'editor.lineHighlightBackground': '#3C3C3C',
                    'editorLineNumber.foreground': '#BBBBBB',
                    'editor.selectionBackground': '#88000030',
                    'editor.inactiveSelectionBackground': '#88000015'
                }
            }); */
            /* monaco.editor.defineTheme('myCustomTheme', {
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
                { token: 'parameter', foreground: 'ccccff' }
            ],
            colors: {
                'editor.foreground': '#F8F8F8',
                'editor.background': '#2B2B2B',
                'editorCursor.foreground': '#A7A7A7',
                'editor.lineHighlightBackground': '#3C3C3C',
                'editorLineNumber.foreground': '#BBBBBB',
                'editor.selectionBackground': '#88000030',
                'editor.inactiveSelectionBackground': '#88000015',
                'editor.selectionHighlightBackground': '#add6ff26',
                'editor.wordHighlightBackground': '#575757B8',
                'editor.wordHighlightStrongBackground': '#004972B8',
                'editor.findMatchBackground': '#9F40FF',
                'editor.findMatchHighlightBackground': '#EA5C004D',
                'editor.findRangeHighlightBackground': '#3C3C3C75',
                'editor.hoverHighlightBackground': '#264F7840',
                'editor.lineHighlightBorder': '#282828',
                'editorLink.activeForeground': '#4E94CE',
                'editor.rangeHighlightBackground': '#FFFFFF0B',
                'editorWhitespace.foreground': '#3B3A32',
                'editorIndentGuide.background': '#404040',
                'editorIndentGuide.activeBackground': '#707070',
                'editorRuler.foreground': '#5A5A5A',
                'editorCodeLens.foreground': '#999999',
                'editorBracketMatch.background': '#2B2B2B',
                'editorBracketMatch.border': '#515A6B'
            }
        }); */
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
        'editor.foreground': '#F8F8F8',
        'editor.background': '#2B2B2B',
        'editorCursor.foreground': '#A7A7A7',
        'editor.lineHighlightBackground': '#3C3C3C',
        'editorLineNumber.foreground': '#BBBBBB',
        'editor.selectionBackground': '#88000030',
        'editor.inactiveSelectionBackground': '#88000015',
        'editor.selectionHighlightBackground': '#add6ff26',
        'editor.wordHighlightBackground': '#575757B8',
        'editor.wordHighlightStrongBackground': '#004972B8',
        'editor.findMatchBackground': '#9F40FF',
        'editor.findMatchHighlightBackground': '#EA5C004D',
        'editor.findRangeHighlightBackground': '#3C3C3C75',
        'editor.hoverHighlightBackground': '#264F7840',
        'editor.lineHighlightBorder': '#282828',
        'editorLink.activeForeground': '#4E94CE',
        'editor.rangeHighlightBackground': '#FFFFFF0B',
        'editorWhitespace.foreground': '#3B3A32',
        'editorIndentGuide.background': '#404040',
        'editorIndentGuide.activeBackground': '#707070',
        'editorRuler.foreground': '#5A5A5A',
        'editorCodeLens.foreground': '#999999',
        'editorBracketMatch.background': '#2B2B2B',
        'editorBracketMatch.border': '#515A6B',
        'editorOverviewRuler.border': '#282828',
        'editorOverviewRuler.findMatchForeground': '#d186167e',
        'editorOverviewRuler.rangeHighlightForeground': '#007acc99',
        'editorOverviewRuler.selectionHighlightForeground': '#a0a0a0cc',
        'editorOverviewRuler.wordHighlightForeground': '#575757B8',
        'editorOverviewRuler.wordHighlightStrongForeground': '#004972B8',
        'editorOverviewRuler.modifiedForeground': '#880000',
        'editorOverviewRuler.addedForeground': '#38713d',
        'editorOverviewRuler.deletedForeground': '#6e1e1e',
        'editorOverviewRuler.errorForeground': '#ff1212',
        'editorOverviewRuler.warningForeground': '#ff8800',
        'editorOverviewRuler.infoForeground': '#75beff',
        'editorGutter.background': '#2B2B2B',
        'editorGutter.modifiedBackground': '#dd9e2c',
        'editorGutter.addedBackground': '#81b88b',
        'editorGutter.deletedBackground': '#c74e4e',
        'editorError.foreground': '#ff1212',
        'editorWarning.foreground': '#ff8800',
        'editorInfo.foreground': '#75beff',
        'editorHint.foreground': '#eeeeeeb3',
        'editorError.border': '#ffffff00',
        'editorWarning.border': '#ffffff00',
        'editorInfo.border': '#ffffff00',
        'editorHint.border': '#ffffff00',
        'minimapGutter.addedBackground': '#81b88b',
        'minimapGutter.modifiedBackground': '#dd9e2c',
        'minimapGutter.deletedBackground': '#c74e4e',
        'minimap.findMatchHighlight': '#9F40FF',
        'minimap.selectionHighlight': '#264F7840',
        'minimap.errorHighlight': '#ff1212',
        'minimap.warningHighlight': '#ff8800',
        'minimap.background': '#2B2B2B',
        'minimapSlider.background': '#ffffff1b',
        'minimapSlider.hoverBackground': '#ffffff28',
        'minimapSlider.activeBackground': '#ffffff1b',
        'minimap.foregroundOpacity': '#707070',
        'breadcrumb.foreground': '#cccccc',
        'breadcrumb.focusForeground': '#e0e0e0',
        'breadcrumb.activeSelectionForeground': '#e0e0e0',
        'breadcrumbPicker.background': '#333333'
    }
});




            // Aplicando o tema personalizado
            monaco.editor.setTheme('myCustomTheme');

            monaco.editor.create(document.getElementById('editor-php'), {
                value: '<' + '?php\n// Digite seu código PHP aqui...\n?>',
                language: 'php',
                theme: 'myCustomTheme',
                //readOnly: true,//true, bloqueia a edição
            });
            monaco.editor.create(document.getElementById('editor-js'), {
                value: '// Digite seu código JavaScript aqui...',
                language: 'javascript',
                theme: 'myCustomTheme',
                //readOnly: true,//true, bloqueia a edição
            });
            monaco.editor.create(document.getElementById('editor-sql'), {
                value: '-- Digite seu código SQL aqui...',
                language: 'sql',
                theme: 'myCustomTheme',
                //readOnly: true,//true, bloqueia a edição
            });
            monaco.editor.create(document.getElementById('editor-node'), {
                value: '// Digite seu código Node.js aqui...',
                language: 'javascript',
                theme: 'myCustomTheme',
                //readOnly: true,//true, bloqueia a edição
            });
            monaco.editor.create(document.getElementById('editor-plsql'), {
                value: '-- Digite seu código PL/SQL aqui...',
                language: 'plsql',
                theme: 'myCustomTheme',
                //readOnly: true,//true, bloqueia a edição
            });
            monaco.editor.create(document.getElementById('editor-python'), {
                value: '# Digite seu código Python aqui...',
                language: 'python',
                theme: 'myCustomTheme',
                //readOnly: true,//true, bloqueia a edição
            });
        });
    </script>

    <!-- <script>
        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs' }});
        require(['vs/editor/editor.main'], function() {
            monaco.editor.create(document.getElementById('editor-php'), {
                value: '<' + '?php\n// Digite seu código PHP aqui...\n?>',
                language: 'php',
                theme: 'vs-dark'
            });
            monaco.editor.create(document.getElementById('editor-js'), {
                value: '// Digite seu código JavaScript aqui...',
                language: 'javascript',
                theme: 'vs-dark'
            });
            monaco.editor.create(document.getElementById('editor-sql'), {
                value: '-- Digite seu código SQL aqui...',
                language: 'sql',
                theme: 'vs-dark'
            });
            monaco.editor.create(document.getElementById('editor-node'), {
                value: '// Digite seu código Node.js aqui...',
                language: 'javascript',
                theme: 'vs-dark'
            });
            monaco.editor.create(document.getElementById('editor-plsql'), {
                value: '-- Digite seu código PL/SQL aqui...',
                language: 'plsql',
                theme: 'vs-dark'
            });
            monaco.editor.create(document.getElementById('editor-python'), {
                value: '# Digite seu código Python aqui...',
                language: 'python',
                theme: 'vs-dark'
            });
        });
    </script> -->
    
</body>
</html>
