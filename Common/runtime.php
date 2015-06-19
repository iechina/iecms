<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * ThinkPHP
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 */
defined('THINK_PATH') or exit();
if(version_compare(PHP_VERSION,'5.2.0','<'))  die('require PHP > 5.2.0 !');

//  version of Thinkphp
define('THINK_VERSION', '3.1');

//   version  get_magic_quotes_gpc
if(version_compare(PHP_VERSION,'5.3.0','<')) {
    set_magic_quotes_runtime(0);
    define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?True:False);
}else{
    define('MAGIC_QUOTES_GPC',True);
}

define('IS_CGI',substr(PHP_SAPI, 0,3)=='cgi' ? 1 : 0 );
define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);

// APP_NAME defined
defined('APP_NAME') or define('APP_NAME', basename(dirname($_SERVER['SCRIPT_FILENAME'])));

if(!IS_CLI) {
    // 当前文件名
    if(!defined('_PHP_FILE_')) {
        if(IS_CGI) {
            //CGI/FASTCGI模式下
            $_temp  = explode('.php',$_SERVER['PHP_SELF']);
            define('_PHP_FILE_',    rtrim(str_replace($_SERVER['HTTP_HOST'],'',$_temp[0].'.php'),'/'));
        }else {
            define('_PHP_FILE_',    rtrim($_SERVER['SCRIPT_NAME'],'/'));
        }
    }
    if(!defined('__ROOT__')) {
        // 网站URL根目录
        if( strtoupper(APP_NAME) == strtoupper(basename(dirname(_PHP_FILE_))) ) {
            $_root = dirname(dirname(_PHP_FILE_));
        }else {
            $_root = dirname(_PHP_FILE_);
        }
        define('__ROOT__',   (($_root=='/' || $_root=='\\')?'':$_root));
    }

    define('URL_COMMON',      0);
    define('URL_PATHINFO',    1);
    define('URL_REWRITE',     2);
    define('URL_COMPAT',      3);
}

defined('CORE_PATH')    or define('CORE_PATH',      THINK_PATH.'Lib/');
defined('EXTEND_PATH')  or define('EXTEND_PATH',    THINK_PATH.'Extend/');
defined('MODE_PATH')    or define('MODE_PATH',      EXTEND_PATH.'Mode/');
defined('ENGINE_PATH')  or define('ENGINE_PATH',    EXTEND_PATH.'Engine/');
defined('VENDOR_PATH')  or define('VENDOR_PATH',    EXTEND_PATH.'Vendor/');
defined('LIBRARY_PATH') or define('LIBRARY_PATH',   EXTEND_PATH.'Library/');
defined('COMMON_PATH')  or define('COMMON_PATH',    APP_PATH.'Common/');
defined('LIB_PATH')     or define('LIB_PATH',       APP_PATH.'Lib/');
defined('CONF_PATH')    or define('CONF_PATH',      APP_PATH.'Conf/');
defined('LANG_PATH')    or define('LANG_PATH',      APP_PATH.'Lang/');
defined('TMPL_PATH')    or define('TMPL_PATH',      APP_PATH.'Tpl/');
defined('HTML_PATH')    or define('HTML_PATH',      APP_PATH.'Html/');
defined('LOG_PATH')     or define('LOG_PATH',       RUNTIME_PATH.'Logs/');
defined('TEMP_PATH')    or define('TEMP_PATH',      RUNTIME_PATH.'Temp/');
defined('DATA_PATH')    or define('DATA_PATH',      RUNTIME_PATH.'Data/');
defined('CACHE_PATH')   or define('CACHE_PATH',     RUNTIME_PATH.'Cache/');
// 为了方便导入第三方类库 设置Vendor目录到include_path
set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);

// 加载运行时所需要的文件 并负责自动目录生成
function load_runtime_file() {
    // 加载系统基础函数库
    require THINK_PATH.'Common/common.php';
    // 读取核心编译文件列表
    $list = array(
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',
        CORE_PATH.'Core/Behavior.class.php',
    );
    // 加载模式文件列表
    foreach ($list as $key=>$file){
        if(is_file($file))  require_cache($file);
    }
    // 加载系统类库别名定义
    alias_import(include THINK_PATH.'Conf/alias.php');

    // 检查项目目录结构 如果不存在则自动创建
    if(!is_dir(LIB_PATH)) {
        // 创建项目目录结构
        build_app_dir();
    }elseif(!is_dir(CACHE_PATH)){
        // 检查缓存目录
        check_runtime();
    }elseif(APP_DEBUG){
        // 调试模式切换删除编译缓存
        if(is_file(RUNTIME_FILE))   unlink(RUNTIME_FILE);
    }
}

// 检查缓存目录(Runtime) 如果不存在则自动创建
function check_runtime() {
    if(!is_dir(RUNTIME_PATH)) {
        mkdir(RUNTIME_PATH);
    }elseif(!is_writeable(RUNTIME_PATH)) {
        header('Content-Type:text/html; charset=utf-8');
        exit('目录 [ '.RUNTIME_PATH.' ] 不可写！');
    }
    mkdir(CACHE_PATH);   // 模板缓存目录
    if(!is_dir(LOG_PATH))	mkdir(LOG_PATH);    // 日志目录
    if(!is_dir(TEMP_PATH))  mkdir(TEMP_PATH);	// 数据缓存目录
    if(!is_dir(DATA_PATH))	mkdir(DATA_PATH);	// 数据文件目录
    return true;
}

// 创建编译缓存 只有在部署模式下才会执行 在调试模式下不执行
function build_runtime_cache($append='') {
    // 生成编译文件
    $defs           = get_defined_constants(TRUE);
    $content        =  '$GLOBALS[\'_beginTime\'] = microtime(TRUE);';
    if(defined('RUNTIME_DEF_FILE')) { // �����ĳ����ļ��ⲿ����
        file_put_contents(RUNTIME_DEF_FILE,'<?php '.array_define($defs['user']));
        $content   .=  'require \''.RUNTIME_DEF_FILE.'\';';
    }else{
        $content   .= array_define($defs['user']);
    }
    $content       .= 'set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);';
    // 读取核心编译文件列表
    $list = array(
        THINK_PATH.'Common/common.php',
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',
        CORE_PATH.'Core/Behavior.class.php',
    );
    foreach ($list as $file){
        $content .= compile($file);
    }
    // 系统行为扩展文件统一编译
    if(C('APP_TAGS_ON')) {
        $content .= build_tags_cache();
    }
    $alias      = include THINK_PATH.'Conf/alias.php';
    $content   .= 'alias_import('.var_export($alias,true).');';
    //编译框架默认语言包和配置参数
    $content   .= $append."\nL(".var_export(L(),true).");C(".var_export(C(),true).');G(\'loadTime\');Think::Start();';
    file_put_contents(RUNTIME_FILE,strip_whitespace('<?php '.$content));
}

// 编译系统行为扩展类库
function build_tags_cache() {
    $tags = C('extends');
    $content = '';
    foreach ($tags as $tag=>$item){
        foreach ($item as $key=>$name) {
            $content .= is_int($key)?compile(CORE_PATH.'Behavior/'.$name.'Behavior.class.php'):compile($name);
        }
    }
    return $content;
}

// 编译系统行为扩展类库
function build_app_dir() {
    // 没有创建项目目录的话自动创建
    if(!is_dir(APP_PATH)) mkdir(APP_PATH,0755,true);
    if(is_writeable(APP_PATH)) {
        $dirs  = array(
            LIB_PATH,
            RUNTIME_PATH,
            CONF_PATH,
            COMMON_PATH,
            LANG_PATH,
            CACHE_PATH,
            TMPL_PATH,
            TMPL_PATH.C('DEFAULT_THEME').'/',
            LOG_PATH,
            TEMP_PATH,
            DATA_PATH,
            LIB_PATH.'Model/',
            LIB_PATH.'Action/',
            LIB_PATH.'Behavior/',
            LIB_PATH.'Widget/',
            );
        foreach ($dirs as $dir){
            if(!is_dir($dir))  mkdir($dir,0755,true);
        }
        // 写入目录安全文件
        build_dir_secure($dirs);
        // 写入初始配置文件
        if(!is_file(CONF_PATH.'config.php'))
            file_put_contents(CONF_PATH.'config.php',"<?php\nreturn array(\n\t//'配置项'=>'配置值'\n);\n?>");
        // 写入测试Action
        if(!is_file(LIB_PATH.'Action/IndexAction.class.php'))
            build_first_action();
    }else{
        header('Content-Type:text/html; charset=utf-8');
        exit('项目目录不可写，目录无法自动生成！<BR>请使用项目生成器或者手动生成项目目录~');
    }
}
//生成目录安全文件
function build_dir_secure($dirs='') {
    // 目录安全写入
    if(defined('BUILD_DIR_SECURE') && BUILD_DIR_SECURE) {
        defined('DIR_SECURE_FILENAME')  or define('DIR_SECURE_FILENAME','index.html');
        defined('DIR_SECURE_CONTENT')   or define('DIR_SECURE_CONTENT','');
        // 自动写入目录安全文件
        $content = DIR_SECURE_CONTENT;
        $files = explode(',', DIR_SECURE_FILENAME);
        foreach ($files as $filename){
            foreach ($dirs as $dir)
                file_put_contents($dir.$filename,$content);
        }
    }
}
// 加载运行时所需文件
load_runtime_file();
// 记录加载文件时间
G('loadTime');
// 执行入口
Think::Start();
?>