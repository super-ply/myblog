<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define( 'DB_NAME', 'mandala' );

/** MySQL数据库用户名 */
define( 'DB_USER', 'root' );

/** MySQL数据库密码 */
define( 'DB_PASSWORD', 'root' );

/** MySQL主机 */
define( 'DB_HOST', 'localhost' );

/** 创建数据表时默认的文字编码 */
define( 'DB_CHARSET', 'utf8mb4' );

/** 数据库整理类型。如不确定请勿更改 */
define( 'DB_COLLATE', '' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'QC;wX`QMx[R_RJX!>^O8F9;nIlFt~Y*z$IMU3VIGIzRd@]_^U$x}7jQ_c`wEGlM$' );
define( 'SECURE_AUTH_KEY',  'jR]7M6vrRzdZ-yMWW4ubk4{1ugAwOjEd}]2(x9D]SUfJJSI*_(0BfA5`Ys$iEVZ-' );
define( 'LOGGED_IN_KEY',    '%RLpwpJ`OChk!xNXJp[urwEW/] ?ItxAdTQ2R|-QbG^O|![($@8D#8Kj=-feo#z^' );
define( 'NONCE_KEY',        '=uS t|m23QDUsE]=<K%`q*vr9AWOK[CfUZoU~a1F8vE+d6!aXHx+S$r2+QpEwq`s' );
define( 'AUTH_SALT',        'k`laTGu[xn2+A<lO!l@XZnak`?8 gd+u>^tzLEsE9J*.=f2;p7NB+efHF}KoWqOF' );
define( 'SECURE_AUTH_SALT', '+QPnC{qlz^lH(YRo~jL EXL< m(iHZ!8K&R[AaXd$CZEAI/]^Hpi*|:i*eS}#AXN' );
define( 'LOGGED_IN_SALT',   'Wprb1]=> oLvrThn;Q?LhK:iDEc7[#pEP}aa) F1g1<2s/:j]3rSI9b(>HMG?]Z{' );
define( 'NONCE_SALT',       '1ziD qo]&.@q>J((dc|Q:i _R.i]KIF4z&E*&R-b-gql8wma{OD}hx9hF>lO!sQ/' );

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** 设置WordPress变量和包含文件。 */
require_once( ABSPATH . 'wp-settings.php' );
