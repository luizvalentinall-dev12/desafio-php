  # **Teste para Desenvolvedor: API de Cadastro de Clientes com Validação de CEP**

O objetivo deste teste é desenvolver uma **API Rest** para o cadastro de clientes, garantindo que o cliente esteja em um CEP valido.

---

## **Descrição do Projeto**

### **Backend (API Laravel)**

#### **Cadastro de Clientes**
- Criar um cliente com as seguintes informações:
  - Nome completo
  - CPF (validado, único no banco)
  - E-mail (validado, único no banco)
  - Telefone
  - CEP 
  - Endereço (logradouro, bairro, cidade, estado)

- Editar um cliente
- Excluir um cliente
- Listar clientes (paginação, filtro por nome, CPF e CEP)

---

### **Migrations**
- Utilize migrations do Laravel para definir a estrutura do banco de dados, garantindo uma boa organização e facilidade de manutenção.

---

### **Requisitos**
- **Validar CPF** (formato correto e não permitir duplicação).
- **Validar e-mail** (formato correto e não permitir duplicação).
- **Validar endereço automaticamente** via [BrasilAPI](https://brasilapi.com.br/docs#tag/CEP-V2) ou qualquer outro endpoint público ao inserir ou atualizar um cliente.


---

## **Critérios de Avaliação**
- **Adesão aos requisitos funcionais e técnicos**
- **Qualidade do código** (organização, padrões)
- **Uso adequado do Laravel (migrations, validações, etc.)**
- **README bem estruturado** com instruções de instalação e uso

---

## **Tecnologias a serem utilizadas**
- **PHP 8.x**
- **Laravel 10.x**
- **Banco de Dados**: MySQL

---

## **Extra**
- **Implementação de cache** para otimizar o desempenho 

---

## **Entrega**
1. Faça um **fork** deste repositório.
2. Crie uma **branch** com o seu nome.
3. Altere o **README.md** com as instruções para rodar o projeto (comandos necessários, migrations, seeds, etc.).
4. Após finalizar, envie um **pull request** para avaliação.

---


Boa sorte! 🚀
