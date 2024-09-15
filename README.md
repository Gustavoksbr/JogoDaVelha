Um site para criar salas onde se joga jogo da velha

 1. Instale e configure o php e o composer
 2. Clone o projeto
 3. No cmd da raiz do projeto, execute "php artisan migrate"
 4. Pressione "yes" se pedir pra criar um novo banco de dados
 5. execute "php artisan serve"

Aí vc cria uma conta e depois pode criar a sala e esperar outra pessoa entrar

Ainda tem bastantes defeitos, como
* Não utiliza WebSocket, então vai ter que ficar recarregando a página o tempo todo para esperar a resposta do adversário
*  Interface muito feia
* falta bastante funcionalidades, como excluir salas
* arquitetura de código não é das melhores e tem muito comentário lixo

Enfim, é mais um desafio próprio de projeto que tentei fazer com menos ajuda externa possível