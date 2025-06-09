  # **API de Cadastro de Clientes com Validação de CEP**

API para cadastro de clientes com validação de CPF e CEP.

---

## **Funcionalidades**

- Criar um cliente
- Editar um cliente
- Excluir um cliente
- Listar clientes 

---

## **Tecnologias**
- **PHP 8.x**
- **Laravel 10.x**
- **Banco de Dados**: MySQL
- **Docker**

---

## Instalação e Execução

1. Clonar o repositório:

```bash
git clone <url-do-seu-repo>
cd <nome-do-repo>
```

2. Copiar o arquivo de ambiente:
```bash
cp .env.example .env
```

3. Subir containers Docker e instalar as dependências:
```bash
docker-compose up -d

docker exec -it laravel_app composer install
```

4. Executar as migrations:
```bash
docker exec -it laravel_app php artisan migrate
```

---

## API

#### URL
```
http://localhost:8181
```

### Endpoints
**1. Criar cliente** (**POST** `/api/clientes`)

**Body:**
```json
{
  "nome_completo": "Nome completo",
  "cpf": "98765432100",
  "email": "nomecompleto@email.com",
  "telefone": "48999998888",
  "cep": "88058340"
}
```

**Resposta:**
```json
{
    "message": "Cliente criado com sucesso.",
    "cliente": {
        "id": "1",
        "nome_completo": "Nome completo",
        "cpf": "98765432100",
        "email": "nomecompleto@email.com",
        "telefone": "48999998888",
        "cep": "88058340",
        "logradouro": "Servidão Netuno",
        "bairro": "Ingleses do Rio Vermelho",
        "cidade": "Florianópolis",
        "estado": "SC"
    }
}
```

**2. Editar cliente** (**PUT** `/api/clientes/{id}`)

**Body:**
```json
{
  "nome_completo": "Nome completo",
  "cpf": "98765432100",
  "email": "nomecompleto@email.com",
  "telefone": "48999998888",
  "cep": "88058340"
}
```

**Resposta:**
```json
{
    "message": "Cliente editado com sucesso.",
    "cliente": {
        "id": "1",
        "nome_completo": "Nome completo",
        "cpf": "98765432100",
        "email": "nomecompleto@email.com",
        "telefone": "48999998888",
        "cep": "88058340",
        "logradouro": "Servidão Netuno",
        "bairro": "Ingleses do Rio Vermelho",
        "cidade": "Florianópolis",
        "estado": "SC"
    }
}
```

**3. Excluir cliente** (**POST** `/api/clientes/{id}`)

**Resposta:**
```json
{
  "message": "Cliente excluído com sucesso."
}
```

**4. Listar clientes** (**GET** `/api/clientes`)

**Resposta:**
```json
{
    "data": [
        {
          "id": "1",
          "nome_completo": "Nome completo",
          "cpf": "98765432100",
          "email": "nomecompleto@email.com",
          "telefone": "48999998888",
          "cep": "88058340",
          "logradouro": "Servidão Netuno",
          "bairro": "Ingleses do Rio Vermelho",
          "cidade": "Florianópolis",
          "estado": "SC"
        },
    ]
}
```

---

## Testes

Para testar os endpoints pode ser utilizado o Postman.