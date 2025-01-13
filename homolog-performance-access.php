<?php
/*
Plugin Name: Homolog Performance Access Control
Description: Controle de acesso para ambiente de homologação
Version: 1.0
Author: Ricardo Christovão da Silva
*/

if (!defined('ABSPATH')) exit;

class HomologPerformanceAccess {
    private $allowed_tools = [
        'Chrome-Lighthouse',
        'PageSpeed',
        'GTmetrix',
        'WebPageTest'
    ];

    public function __construct() {
        add_action('init', array($this, 'start_session'));
        add_action('template_redirect', array($this, 'restrict_access'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('wp_footer', array($this, 'add_environment_badge'));
    }

    public function start_session() {
        if (!session_id()) {
            session_start();
        }
    }

    public function restrict_access() {
        // Ignora restrições para wp-admin e página de login
        if (is_admin() || $this->is_login_page()) {
            return;
        }

        // Permite acesso para usuários logados
        if (is_user_logged_in()) {
            return;
        }

        // Verifica se é uma ferramenta de performance
        $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $is_performance_tool = false;

        foreach ($this->allowed_tools as $tool) {
            if (strpos($user_agent, $tool) !== false) {
                $is_performance_tool = true;
                break;
            }
        }

        if (!$is_performance_tool) {
            // Redireciona para a página de login
            wp_redirect(wp_login_url(home_url($_SERVER['REQUEST_URI'])));
            exit;
        }
    }

    private function is_login_page() {
        return in_array($GLOBALS['pagenow'], ['wp-login.php', 'wp-register.php']);
    }

    public function add_environment_badge() {
        if (is_user_logged_in()) {
            ?>
            <div style="position: fixed; bottom: 10px; right: 10px; background: #ff6b6b; color: white; padding: 5px 10px; border-radius: 3px; z-index: 9999; font-family: Arial, sans-serif; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                AMBIENTE DE HOMOLOGAÇÃO
            </div>
            <?php
        }
    }

    public function add_admin_menu() {
        add_options_page(
            'Configurações de Homologação',
            'Homologação',
            'manage_options',
            'homolog-settings',
            array($this, 'settings_page')
        );
    }

    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Configurações do Ambiente de Homologação</h1>
            <div class="card">
                <h2>Status do Ambiente</h2>
                <p>Plugin ativo e funcionando</p>
                <p><strong>Desenvolvido por:</strong> Ricardo Christovão da Silva</p>
                <p><strong>Versão:</strong> 1.0</p>
            </div>
            <div class="card">
                <h2>Ferramentas Permitidas</h2>
                <ul>
                    <?php foreach ($this->allowed_tools as $tool): ?>
                        <li><?php echo esc_html($tool); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
    }
}

// Inicializa o plugin
new HomologPerformanceAccess();
