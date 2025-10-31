# Teste Back-end - Importação de Tabelas de Frete

## Contexto
A Testello é uma transportadora que presta serviços para múltiplos clientes, cada um com suas próprias tabelas de frete. Atualmente, a atualização dessas tabelas é manual, gerando custo de tempo significativo.

Este projeto implementa uma **solução eficiente para importação de arquivos CSV**, suportando **grande volume de dados** (até 300 mil linhas) sem causar timeout HTTP, com **notificações de status e processamento em background**.

---

## Funcionalidades Implementadas

- Upload de arquivos CSV via **Front-end** e **API REST**.
- Processamento de arquivos em **queue jobs**, evitando timeout HTTP.
- Importação de múltiplos arquivos de forma eficiente, em **lotes (batches)**.
- **Notificações** para o usuário:
  - Recebimento do arquivo
  - Conclusão do processamento
- Listagem de registros com paginação e opção de **delete**.
- Auto-login no frontend para simplicidade de uso.
- Visualização da **API Key** no dropdown do usuário (`API REST`).

---

## Tecnologias Utilizadas

- **PHP 8.4.10**
- **Laravel Framework 12.36.1**
- **MariaDB 10.6.23**
- **Composer** para gerenciamento de dependências
- **Front-end** simples integrado ao Laravel (Blade)
- **Queues** para processamento assíncrono dos CSVs
- **Notificações** customizadas

---

## Estrutura do Banco de Dados

Principais tabelas:

- `users` → usuários do sistema
- `zips` → tabela de frete, com colunas:
  - `from_postcode`, `to_postcode`
  - `from_weight`, `to_weight`
  - `cost`
  - `branch_id`
  - `user_id` (relacionamento com o usuário que importou)
  - `created_at`, `updated_at`
- `notifications` → notificações do usuário sobre status de arquivos

---

## Instalação e Configuração

1. Clone o repositório:

```bash
git clone <URL_DO_REPOSITORIO>
cd <PASTA_DO_PROJETO>
```

2. Instale dependências PHP via Composer:

```bash
composer install
```

3. Crie o banco de dados "teste_docxxxx" no MySQL/MariaDB

4. Copie o arquivo `.env.example` para `.env` e preencha com dados do banco e outras variáveis de ambiente.

5. Gere a chave da aplicação:

```bash
php artisan key:generate
```

6. Rode migrations e seeders:

```bash
php artisan migrate --seed
```

7. Inicie o servidor de desenvolvimento e o worker de queues:

```bash
composer run dev
```

> Ao abrir o frontend (http://localhost:8000), será realizado o **auto-login** do usuário para facilitar o processo de testes.

---

## Uso

### Front-end

- Upload de CSV: faça upload de um ou mais arquivos via interface.
- Lista de registros: visualize todas as entradas importadas, com opções de deletar.
- Notificações: acompanhe status de processamento em tempo real.
- API Key: clique no nome do usuário no topo e selecione `API REST`.

### API REST

- Endpoint para upload de CSV: suporta múltiplos arquivos.
- Cada arquivo é processado em um **job separado**, garantindo eficiência e evitando timeout.
- Retorna status do processamento de cada arquivo.

---

## Boas Práticas e Padrões

- Código segue **PSR-1 e PSR-12**.
- Arquitetura **SOLID**, com:
  - Controller leve
  - Service Layer para lógica de importação
  - Queue Jobs para processamento assíncrono
- **Validação** de CSV e campos antes de inserir no banco.
- Limpeza e padronização de dados, como remoção de mascaras de CEP e valores monetários.

---

## Observações

- Arquivos grandes (até 300k linhas) são processados sem risco de timeout graças às **queues** e batch insert.
- Notificações avisam o usuário sobre o status de cada arquivo.
- Sistema pode ser extendido facilmente para múltiplos clientes ou novas regras de importação.
- Este arquivo README.md e a parte visual (dashboard) do projeto foram criados com auxilio de IA.
