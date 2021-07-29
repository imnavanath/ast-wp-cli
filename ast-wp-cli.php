<?php
/**
 * Plugin Name:     Astra WP_CLI
 * Description:     <code><strong>wp astra update_auto_version</strong></code> Command will update 'theme-auto-version' from Astra Settings to 3.4.5.
 * Author:          Navanath Bhosale
 * Text Domain:     'ast-wp-cli'
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Ast_WP_CLI
 */

if ( ! class_exists( 'Astra_Update_Auto_Version_WP_CLI' ) && class_exists( 'WP_CLI_Command' ) ) {

    class Astra_Update_Auto_Version_WP_CLI extends WP_CLI_Command {

        /**
         * Use: Update 'theme-auto-version' from 'astra-settings'.
         *
         * @since x.x.x
         * @param  array $args       Arguments.
         * @param  array $assoc_args Associated Arguments.
         * @return void.
         */
        public function update_auto_version( $args = array(), $assoc_args = array() ) {

            $astra_settings = get_site_option( 'astra-settings' );

            if( isset( $astra_settings['theme-auto-version'] ) ) {
                WP_CLI::line( 'Before update - ' . $astra_settings['theme-auto-version'] );

                // Updating theme-auto-version here = 3.4.5.
                $astra_settings['theme-auto-version'] = '3.4.5';

                WP_CLI::line( 'After update - ' . $astra_settings['theme-auto-version'] );

                update_site_option( 'astra-settings', $astra_settings );
            }
        }

        /**
         * Just confirming the command.
         */
        public function confirm( $args, $assoc_args ) {      
            WP_CLI::line( 'Great! CLI command is working!' );
        }
    }

    WP_CLI::add_command( 'astra', 'Astra_Update_Auto_Version_WP_CLI' );
}