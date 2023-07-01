# Typing Game - Fill it Up

O projeto refere-se a um sistema de jogo de digitação com um simples sistema de login de usuário e senha em conjunto a integração a um banco de dados.

##  Getting Started

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **[Implantação](#-implanta%C3%A7%C3%A3o)** para saber como implantar o projeto.

Consulte também **[Autores](#-implanta%C3%A7%C3%A3o)** para identificar o nome do desenvolvedor.

##  Implantação

Notas para a utilização do sistema de forum da forma correta:

1 - Baixe o arquivo .zip do repositório completo (incluindo arquivo readme.md) e faça o descompactamento do mesmo.

2 - Após descompactar, ative a ferramenta Xampp nos modos "Apache" e "MySQL" para ativar o serviço de Banco de dados.

3 - Após a ativação do banco de dados, acesse o link: "http://localhost/phpmyadmin/" e entre com username: 'root' e password: 'admin' para poder visualizar o banco de dados.

3 - Após a o login no phpMyAdmin, vá para o link: "http://localhost/trabweb1/paginalogin.php" para abrir a aba inicial de login do jogo.

4 - Crie um usuário e senhas desejados e aproveite o jogo!

DESCRIÇÕES EXTRAS:

5 - Após o login, você será enviado para a pagina de menu do jogo, contendo as opções:
a)  "START" (use para iniciar o jogo) ; 
b) "LEADERBOARD" (acesso a tabela de classificação com a atualização da ultima pontuação jogada); 
c) "OPTIONS" (--DESATIVADO--); 
d) "CREDITS" (--DESATIVADO--); 
e) "QUIT SESSION" (para sair da sessão atual e entrar com outro usuario e senha, caso desejado);

##  Explicação das funcionalidades

Aqui será analisado os arquivos dispostos apresentando as funções de cada linha apresentada de maneira resumida.

 * paginalogin.php =
Responsável por iniciar a sessão conectando ao banco de dados, cria as tabelas inicias necessárias para armazenar os dados do usuário, caso não existam, e faz verificação de campos.

* menudojogo.php =
Area de manuseio do usuário para redirecionar-se as áreas funcionais do jogo, tabelas de pontuação e sair da sessão atual.

* leaderboard.php =
Apresenta uma pagina com a tabela de pontuação atualizada com o ultimo jogo concluído.

* fillitupgame.php =
Dinamica de funcionamento do jogo, com a implementação de timer (contador invertido); funções de aletoridade de palavras, função de pontuação com base na identação das palavras inseridas pelo usuário com as palavras apresentadas na tela.

##  Construído com

* [Visual Studio Code (2023)](https://code.visualstudio.com/) - O editor de texto.
* [Xampp] (https://www.apachefriends.org/pt_br/download.html) - Ferramenta de criação de servidor MySQL, Apache e multiplas funcionalidades. 

##  Versão

Neste protótipo foi utilizado VSCODE 2023, com PHP 7. 

## Autores

* **Carlos Eduardo Camargo Viana** - *Trabalho Prático de construção de jogo de digitação* - [@CJarlos](https://github.com/CJarlos)

Agradeço desde já a visita!
---
