# E-Grocery – ACN Organic Food
Trabalho de conclusão da Academia [Accenture](https://www.accenture.com/br-pt) 3.0 Magento - Turma 01



_____
## :pencil2: Business Case

E-Grocery – ACN Organic Food

Com a chegada repentina e desastrosa do Covid-19 muitas empresas tiveram se reinventar
para continuar entregando alimentos aos seus clientes.
Com a ACN OF não foi diferente.
A ACN Organic Food é uma marca super conhecida pelos paulistanos que querem se
alimentar bem e de forma saudável.
Seu principal diferencial é oferecer/vender produtos selecionados, orgânicos e frescos.
Suas 20 lojas espalhadas na grande São Paulo fazem a diferença. Com produtos
organizados, atendentes super dispostos a ajudar, e com um ambiente tranquilo, amigável e
aconchegante. Nada comparado a fazer compra em um mercado tradicional.
Fazer compras na ACN OF virou hobby dos paulistanos aos sábados e domingos.
Antes a ACN OF tinha sua loja matriz em Pinheiros e outras 19 espalhadas por toda São
Paulo funcionando normalmente. Seus clientes podiam se deslocar à loja, escolher seus
produtos e programar uma recorrência para recebê-los em casa.
Agora devido ao lockdown, a ACN OF não sabe quando poderá abrir suas lojas e não tem
ideia de quando essa situação irá acabar. Precisa se reinventar e atender seus clientes de
forma online, para que as pessoas não fiquem expostas ao vírus, ao irem em sua loja física,
mas continuem desfrutando de seus produtos e não se esqueçam da sua marca.
A ACN OF vende alguns produtos orgânicos e de pequenos produtores, como:
• Verduras
• Legumes
• Ovos
• Frutas
• Temperos diferenciados
• Queijos
• Carnes e aves
• Tortas e bolos fit

A CEO da ACN OF, Julia Silva, foi nossa cliente há 3 anos atrás, com a instalação de PDVs e
ERP em sua loja, optou por fazer esse projeto com a Accenture, graças a nossa ótima
reputação de entrega com qualidade, sempre no prazo, e ótima referência em plataformas
e-commerce.
Apesar de ser uma referência e especialista em grocery, especificamente orgânicos, Julia é
nova no mundo de e-commerce e conta com a nossa experiência para o sucesso desse
projeto


---



#### O que Julia não sabe:
- [x] Não sei qual tecnologia usar e gostaria de testar duas plataformas que algumas
pessoas recomendaram: Magento e Salesforce Commerce Cloud;
- [x] Tenho dúvidas sobre quais integrações e sistemas serão necessárias para que seu e-commerce funcione, do início ao fim;
- [X] Não tenho ideia de como será a loja em termos de usabilidade e layout, mas quero
que seja de fácil uso.
#### O que Julia sabe:
- [X] O e-commerce deve estar no ar em 3 semanas, a partir da data de assinatura de
contrato;
- [X] Não tenho pessoas para ajudar durante o andamento do projeto, pois estamos
correndo com ligações e entregas do dia a dia;
- [X] Não quero muita complexidade no meu e-commerce, tanto na parte operacional,
quanto para meu usuário final.
#### O que Julia quer:
- [X] Quero que meus clientes paguem com Cartão de crédito;
- [X] Quero que meus clientes consigam achar meus produtos de forma fácil, com
categorias organizadas e estruturadas;
- [X] Meus produtos mais vendidos são verduras e legumes orgânicos;
- [X] Cliente deve escolher entre uma cesta de orgânicos grande, média ou pequena:
o Grande: 12 produtos
o Média: 8 produtos
o Pequena: 5 produtos
- [X] Cliente pode montar sua própria cesta com produto expostos na vitrine ou pode
escolher uma cesta pré-montada pela ACN OF;
- [X] Cliente pode comprar produtos separadamente, sem necessariamente montar uma
cesta;
- [X] As fotos dos produtos devem estar em ótima qualidade e os clientes podem dar
zoom para ver mais detalhes;
- [X] Na página do produto, os clientes podem ver mais informações do produto, bem
como itens que relacionados a ele, exemplos:
- [X] Sempre vendo mais de um tipo de verdura: Alface, Rúcula, Agrião;
- [X] Sempre vendo produtos juntos, como alface e tomate.





---
## 🛠 Ferramentas/Recursos

* [Github](https://github.com/)
* [PhpStorm](https://www.jetbrains.com/pt-br/phpstorm/)
* [Warden](https://docs.warden.dev/usage.html)
* [Docker](https://www.docker.com/)
* [Sistema baseado em Linux](https://www.linux.org/pages/download/)
* [Magento](https://magento.com/)




---

## 🚀 Como executar o projeto:


### ● Instalando o Docker
Abra o Terminal do Ubuntu.
Execute os comandos abaixo para configurar o repositório:

```bash
sudo apt-get update

sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```

Adicione a chave GPG oficial do Docker:

```bash
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
```

Adicione a chave GPG oficial do Docker:
```bash
sudo apt-get update

sudo apt-get install docker-ce docker-ce-cli containerd.io
```

Execute os comandos abaixo para utilizar o Docker sem o sudo:

```bash
sudo groupadd docker

sudo gpasswd -a $USER docker

newgrp docker
```
Por fim, teste o Docker sem utilizar o sudo rodando o comando abaixo:

```bash
docker --help
```

### ● Instalando o Warden
Abra o Terminal do Ubuntu.
Execute os comandos abaixo:

```bash
sudo mkdir /opt/warden
sudo chown $(whoami) /opt/warden
git clone -b master https://github.com/davidalger/warden.git /opt/warden
echo 'export PATH="/opt/warden/bin:$PATH"' >> ~/.bashrc
PATH="/opt/warden/bin:$PATH"
warden svc up
```

### ● Criando um projeto Magento com o Warden
Abra o Terminal do Ubuntu.
Com os comandos abaixo crie o diretório e dê permissão onde ficarão os projetos do Magento. Após iniciar o projeto no Warden, será criado o arquivo .env

```bash
sudo mkdir -p /var/www/html/
sudo chmod -R 777 /var/www/html/
cd /var/www/html/
mkdir magento-projeto
cd magento-projeto
warden env-init magento-projeto magento2
```
OPCIONAL: Abra o arquivo .env caso queira alterar a versão de algum serviço ou alguma outra varíável.

Assine um certificado SSL para usar com o projeto:

```bash
warden sign-certificate magento-projeto.test
```
Suba o ambiente do projeto:

```bash
warden env up -d
```

### ● Fazendo o download do Magento

Abra o Terminal do Ubuntu. Acesse o container do PHP do projeto, rodando o comando abaixo:

```bash
warden shell
```

Defina a variável de ambiente com a versão desejada do Magento:

```bash
META_PACKAGE=magento/project-community-edition META_VERSION=2.4.2
```

Faça o download do Magento usando o Composer:

```bash
composer create-project --repository-url=https://repo.magento.com/ \
    "${META_PACKAGE}" /tmp/magento "${META_VERSION}"
```

Ao rodar o comando acima, o sistema solicitará suas chaves do repositório Magento. Estas chaves podem ser geradas ou obtidas seguindos os passos
descritos na [documentação do Magento](https://devdocs.magento.com/guides/v2.3/install-gde/prereq/connect-auth.html)

Com o Magento instalado (após o término do comando acima), mova os arquivos baixados da pasta temporária para a pasta final:

```bash
rsync -a /tmp/magento/ /var/www/html/

rm -rf /tmp/magento/
```

### ● Instalando o Magento

Ainda no contanier do PHP do projeto, rode o comando abaixo para instalar o Magento:

```bash
bin/magento setup:install \
    --backend-frontname=admin \
    --amqp-host=rabbitmq \
    --amqp-port=5672 \
    --amqp-user=guest \
    --amqp-password=guest \
    --db-host=db \
    --db-name=magento \
    --db-user=magento \
    --db-password=magento \
    --search-engine=elasticsearch7 \
    --elasticsearch-host=elasticsearch \
    --elasticsearch-port=9200 \
    --elasticsearch-index-prefix=magento2 \
    --elasticsearch-enable-auth=0 \
    --elasticsearch-timeout=15 \
    --http-cache-hosts=varnish:80 \
    --session-save=redis \
    --session-save-redis-host=redis \
    --session-save-redis-port=6379 \
    --session-save-redis-db=2 \
    --session-save-redis-max-concurrency=20 \
    --cache-backend=redis \
    --cache-backend-redis-server=redis \
    --cache-backend-redis-db=0 \
    --cache-backend-redis-port=6379 \
    --page-cache=redis \
    --page-cache-redis-server=redis \
    --page-cache-redis-db=1 \
    --page-cache-redis-port=6379
```

Após isso, execute os seguintes comandos adicionais de configuração:

```bash
bin/magento config:set --lock-env web/unsecure/base_url \
    "https://${TRAEFIK_SUBDOMAIN}.${TRAEFIK_DOMAIN}/"

bin/magento config:set --lock-env web/secure/base_url \
    "https://${TRAEFIK_SUBDOMAIN}.${TRAEFIK_DOMAIN}/"

bin/magento config:set --lock-env web/secure/offloader_header X-Forwarded-Proto

bin/magento config:set --lock-env web/secure/use_in_frontend 1
bin/magento config:set --lock-env web/secure/use_in_adminhtml 1
bin/magento config:set --lock-env web/seo/use_rewrites 1

bin/magento config:set --lock-env system/full_page_cache/caching_application 2
bin/magento config:set --lock-env system/full_page_cache/ttl 604800

bin/magento config:set --lock-env catalog/search/enable_eav_indexer 1

bin/magento config:set --lock-env dev/static/sign 0

bin/magento deploy:mode:set developer

bin/magento indexer:reindex
bin/magento cache:flush
```

### ● Criando um usuário admin no Magento

Para criar um usuário administrador no Magento execute o comando abaixo e informe os dados do usuário:

```bash
bin/magento admin:user:create
```

### ● Ajustando o arquivo hosts

```bash
sudo vim /etc/hosts
```

Edite o arquivo /etc/hosts utilizando o sudo:

```bash
sudo vim /etc/hosts
```
Adicione as seguintes linhas no final do arquivo e salve-o:

```bash
127.0.0.1 dnsmasq.warden.test mailhog.warden.test 
127.0.0.1 app.magento-projeto.test rabbitmq.magento-projeto.test elasticsearch.magento-projeto.test
```

OBS: Se você alterou alguma variável relacionada ao domínio ou subdomínio no arquivo .env do Warden, sua URL local do
Magento não será a mesma do exemplo acima. Substitua-a respeitando a sua alteração.

### ● URL's Locais

Nesta etapa o ambiente está pronto para ser acessado. Você pode visualizar as URL’s dos serviços na tabela abaixo:

[Serviço Magento (storefront)](https://app.magento-projeto.test/)<br>
[Magento (painel administrativo)](https://app.magento-projeto.test/admin)<br>
[RabbitMQ](https://rabbitmq.magento-projeto.test/)<br>
[ElasticSearch](https://elasticsearch.magento-projeto.test/)<br>
[Mailhog](https://mailhog.warden.test/)

### ● Configurando o acesso de Banco de Dados

Para acessar o banco de dados usando um sistema gerenciador de banco de dados será necessário fazer um túnel SSH.

CONFIGURAÇÃO PRINCIPAL:
> Host: magento-projeto_db_1 <br>
> Port: 3306 <br>
> User: magento <br>
> Password: magento

CONFIGURAÇÃO SSH:
> Host: tunnel.warden.test <br>
> Port: 2222 <br>
> User: user <br>
> Authentication Method: Public Key <br>
> Private key: /home/magento/.warden/tunnel/ssh_key

### ● Configurando o XDebug

A configuração do XDebug vai variar de acordo com sua IDE.
[Confira mais detalhes aqui](https://docs.warden.dev/configuration/xdebug.html)

---

## 💻 Autores:

- [Amanda Carolina Lima da Silva](https://www.linkedin.com/in/amanda-silva-834b0b122/)
- [Andressa Dreher](https://www.linkedin.com/in/andressa-dreher/)
- [Daeseung Choudhury](https://www.linkedin.com/in/daeseung/)
- [Marcos Dorival Amaral Trajano](https://www.linkedin.com/in/marcos-trajano-a0849164/)




