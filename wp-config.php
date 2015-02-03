<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'dataporto');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'dataporto');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'dataporto14');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'M5nw`Z|_$jb7>fXF+BE~yAPzX]FN_Z!fUI3w/O}VgL|(o8J3BMRa$,6c,dEY7[lX');
define('SECURE_AUTH_KEY',  'RXko{Iaq3<Rx5BAn)Lo*G8@mlNDJ4|; 9~~p?(+)fCpOGr*TmE)Rpak6Wfb-uPDN');
define('LOGGED_IN_KEY',    '${V-dW^GOS  N}Q>)3~Pwc_ygXTju,^-!F+{5=60PJReFswK1JvA&dHU;s:d[{gn');
define('NONCE_KEY',        'iT|UX?;^>ZhZ.*>B--YOAZIcP3~~_r;-PX$RhGo,BvKxN RQ}60f1bCd&7SC/h|6');
define('AUTH_SALT',        'L<O&ft EMiRi#/bE&CoH3%+$PkA,?B~/M^R-pZ5BkT,(2Pi6gLOeVu_;6oF$c(T>');
define('SECURE_AUTH_SALT', 'o4O/(xTq#]ncw3^rIDQk-[qIShh,3k,9U=r/_iK Cd_=:&qe,>5-d[hPmMaZVWd}');
define('LOGGED_IN_SALT',   'juS{s&OFC7_n.hqNgi|.kxuTjjSHXy;X+yXu|1L-701 -j.zZqTWa57n`c+-DkN ');
define('NONCE_SALT',       'O?k0kMx5VYA$`Uvr;L}.kv/>GUz1E|mKnk>x{T-FAmoEpfLLi.fd/O^!D81IS]|v');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = '1qg84i_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
