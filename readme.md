## Sobre o projeto

O Projeto foi desenvolvido para um teste de emprego como desenvolvedor, onde foi solicitado a criação de um simples CRUD. Visto que um CRUD é simples, utilizei o VueJS para ficar melhor e mais rápido e com um código simples, onde qualquer site poderá ter acesso aos estados cadastrados por meio de API.

## Instalação
Deverá ser feito a criação do banco de dados e logo, a configuração do arquivo .env com as informações do banco de dados e depois, executar o comando: php artisan migrate, para a criação das tabelas e logo, php artisan db:seed para a criação do conteúdo de exemplo e das contas de acesso.

## Contas do site
Usuário admin: admin@admin.com
Senha admin: 123456

Usuário autor: autor@autor.com
Senha autor: 123456

## Informe sobre o ACL
O ACL poderá ser customizado no futuro, devido a falta das telas, não há como relacionar as permissões: visualizar, criar, editar e deletar a alguma regra: admin ou autor. Defini no banco de dados diretamente as permissões para o autor, onde ele poderá somente criar estados.

Em diante, irei lançar a tela de relacionamento das regras e permissões, e usuários e regras.

Encontra-se funcional o ACL, onde é verificado as permissão de acordo com cada regra e usuário relacionado.