<?php
require 'dados/credentials.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layoutofgame.css">
    <title>Fill It Up</title>
</head>
<body>
    <div id="gamelogo">
        <a href="https://pt.cooltext.com"><img src="https://images.cooltext.com/5661287.png" alt="Fill it Up" /></a>
    </div>
    <div id="overbox">
        <div id="timer">00:00:00</div>
        <h1 id="scorebox" name="scorebox"> SCORE: </h1>
        <h1 id="wordsdisplay"></h1>
        <div id="typingbox">
            <form id="scoreform" method="POST" action="leaderboard.php">
                <textarea id="inputtext"></textarea>
                <input type="hidden" name="pontuacao" id="pontuacao" value="">
                <input type="button" id="submitButton" value="Enviar Pontuação" style="display: none;">
            </form>
        </div>
    </div>
    <div id="crdslogo">
        @Image by <a href="https://pt.cooltext.com">Cool Text: Logo and Button Generator</a> - <a href="https://pt.cooltext.com/Edit-Logo?LogoID=4376996491">Create Your Own Logo</a>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var matrizFrases = [
                ['who', 'let', 'him', 'cook', 'cowboy', 'otorrinolaringologista', 'trem', 'bao'],
                ['testando', '1', '2', '3', '4', 'quanto é 2*7?', 'nem eu sei paizao', 'goodoldtimes'],
                ['tres', 'pratos', 'de', 'trigo', 'para', 'tres', 'triges', 'tigres', 'tristes', 'tistres'],
                ['mario', 'luigi', 'super', 'peach', 'bros', 'tartaruga espinhosa', 'coroa', 'bandeira'],
                ['guarapari', 'buzios', 'minha arte', 'armandinho', 'terror', 'bah', 'tubarao']
            ];

            var indiceAleatorio = Math.floor(Math.random() * matrizFrases.length);
            var variavelArray = matrizFrases[indiceAleatorio];

            var valoresAleatorios = [];
            for (var i = 0; i < 20; i++) {
                var indiceAleatorioValor = Math.floor(Math.random() * variavelArray.length);
                var valorAleatorio = variavelArray[indiceAleatorioValor];
                valoresAleatorios.push(valorAleatorio);
            }

            var wordsDisplay = document.getElementById("wordsdisplay");
            wordsDisplay.innerHTML = "";

            for (var i = 0; i < valoresAleatorios.length; i++) {
                var valor = valoresAleatorios[i];
                wordsDisplay.innerHTML += valor + " ";
            }

            strTimer();
        });

        function comparaStr() {
            var palavras = document.getElementById('inputtext');
            var scoreBox = document.getElementById('scorebox');

            var trimWords = palavras.value.trim().toLowerCase().split(" ");
            var dispWords = document.getElementById("wordsdisplay").textContent.trim().toLowerCase().split(" ");
            var contador = 0;

            for (var i = 0; i < Math.min(trimWords.length, dispWords.length); i++) {
                if (trimWords[i] === dispWords[i]) {
                    contador++;
                }
            }

            var pontuacao = contador * 60;
            scoreBox.textContent = "Score: " + pontuacao;
            palavras.setAttribute("readonly", "readonly");

            var submitButton = document.getElementById("submitButton");
            submitButton.style.display = "block";
            document.getElementById("pontuacao").value = pontuacao;
        }

        function strTimer() {
            var timer = document.getElementById("timer");
            var timerInic = Date.now();
            var tempInic = 5;
            var intervaloTimer;

            attTimer();

            function attTimer() {
                var tempoAtual = Date.now();
                var tempoDecorr = Math.floor((tempoAtual - timerInic) / 1000);
                var tempoRest = tempInic - tempoDecorr;

                var hours = Math.floor(tempoRest / 3600);
                var minutes = Math.floor((tempoRest % 3600) / 60);
                var seconds = tempoRest % 60;

                var tempoFormato = formatTime(hours) + ":" + formatTime(minutes) + ":" + formatTime(seconds);

                timer.textContent = tempoFormato;

                if (tempoRest <= 0) {
                    clearInterval(intervaloTimer);
                    comparaStr();
                    palavras.setAttribute("readonly", "readonly");
                }
            }

            intervaloTimer = setInterval(attTimer, 1000);
        }

        function formatTime(time) {
            return time < 10 ? "0" + time : time.toString();
        }

        window.addEventListener('DOMContentLoaded', function() {
            var submitButton = document.getElementById("submitButton");
            submitButton.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById("scoreform").submit();
            });
        });
    </script>
</body>
</html>
