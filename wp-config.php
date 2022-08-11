<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'insaitika_group' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'aIgdY$=:([7mCt::w|?~pQk$=qoTP/4j)qk #R-A;rGV[JM/]PqnB7/#T5jUtA+l' );
define( 'SECURE_AUTH_KEY',  '1iK/z&oY?L(?KexgO0k$rJns43_dNsCYLX^HTK{4M]SQ9he)X$$bmn(4mfz#cmqp' );
define( 'LOGGED_IN_KEY',    '06atdR>]w^]ZS&muy:HnOCw9hGC.g=GZ`r)|L$6:F-%hmz(`oH3X<qNzls[XC^nZ' );
define( 'NONCE_KEY',        '^ypT[FPmr]qk)`gn}$w9T(mn@&f}zt=i/$K<Z[Sn!M|~7alC8CdeE[kjl1WBnF6^' );
define( 'AUTH_SALT',        'gL^`n34wG`>Rm~<ScZ^A^@.T=@f5 KUay!:K[Wa?fLUT4@7N)KzWNC5KYyJ#W0}{' );
define( 'SECURE_AUTH_SALT', 'oKshB?aGB^FuKmAe?r_$,K%uH>&u><g_Iv=]W/zIP]5{,AH})3H9Fs/g=3Rh@1;i' );
define( 'LOGGED_IN_SALT',   'JiZ-qI:jO,.%Fv~lt sM.(*jCz[8leA8Mp,d2W^F|WvzF1K[gZ&ZD6]3:x1*S6)W' );
define( 'NONCE_SALT',       'drDrfQ$.-3|XU fuvvR9bU;.H!^q7).MM<A-{eRG{9TfI=1J]4BiwD6)QD:zxCK)' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
