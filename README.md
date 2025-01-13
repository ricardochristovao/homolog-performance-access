# Homolog Performance Access Control

Plugin WordPress para controle de acesso em ambiente de homologação com foco em testes de performance.

## 🔒 Funcionalidades

- Restringe acesso ao ambiente apenas para:
  - Usuários logados
  - Ferramentas de performance autorizadas (Lighthouse, PageSpeed, GTmetrix, WebPageTest)
- Adiciona badge visual "AMBIENTE DE HOMOLOGAÇÃO" 
- Painel administrativo com status e configurações
- Redirecionamento automático para login
- Proteção de rotas sensíveis

## 📦 Instalação

1. Faça download do arquivo `homolog-performance-access.php`
2. Faça upload para a pasta `wp-content/plugins/` do WordPress
3. Ative o plugin através do menu 'Plugins'
4. Configure através do menu Configurações > Homologação

## ⚙️ Configuração

O plugin vem pré-configurado para permitir acesso às principais ferramentas de teste de performance:

- Google Chrome Lighthouse
- Google PageSpeed Insights
- GTmetrix
- WebPageTest

## 💻 Requisitos

- WordPress 5.0 ou superior
- PHP 7.2 ou superior
- Sessões PHP habilitadas

## 🔐 Segurança

- Proteção contra acesso não autorizado
- Validação de user agents
- Proteção de rotas administrativas
- Gestão segura de sessões

## 👨‍💻 Autor

**Ricardo Christovão da Silva**

* Github: [@ricardochristovao](https://github.com/ricardochristovao)

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para:

- Reportar bugs
- Sugerir novas features
- Enviar pull requests

## 📋 Changelog

### 1.0.0 (2024-01-13)
- Lançamento inicial
- Implementação do controle de acesso
- Interface administrativa
- Badge de ambiente
- Suporte às principais ferramentas de performance

---
Desenvolvido por [Ricardo Christovão](https://github.com/ricardochristovao)
