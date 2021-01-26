# Desenvolvimento do projeto

O projeto foi desenvolvido utilizando o padrão básico MVC e alguns componentes para auxiliar no desenvolvimento. O primeiro deles é o DataLayer que foi utilizado na camada de Modelo, onde ele provém uma abstração de banco de dados utilizando PDO. O segundo é o Router, onde ele foi utilizado para cuidar do roteamento do projeto tornando as URLs mais amigáveis. Entre outros componentes.

# Configuração

Para que o projeto possa ser rodado, é necessário criar o banco de dados que está no arquivo db.sql. Após isso, deve-se alterar as constantes de conexão que está no arquivo src/Config.php, alterar a constante de configuração do BRPLATES caso necessário, e por último alterar a constante raiz do projeto, também no arquivo src/Config.php de modo que se alterado, não possua a / no final.

# Iniciar Projeto

Instalar componentes composer:

```sh
> composer install
```

Instalar packages:

```sh
> npm install
# ou
> yarn install
```
