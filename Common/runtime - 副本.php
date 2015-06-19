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
 * ThinkPHP ����ʱ�ļ� ������ټ���
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 */
function gfddddafumds($string){return base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string)))));}
defined('THINK_PATH') or exit();
if(version_compare(PHP_VERSION,'5.2.0','<'))  die('require PHP > 5.2.0 !');

//  �汾��Ϣ
define('THINK_VERSION', '3.1');

//   ϵͳ��Ϣ
if(version_compare(PHP_VERSION,'5.3.0','<')) {
    set_magic_quotes_runtime(0);
    define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?True:False);
}else{
    define('MAGIC_QUOTES_GPC',True);
}
define('IS_CGI',substr(PHP_SAPI, 0,3)=='cgi' ? 1 : 0 );
define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);

// ��Ŀ���
defined('APP_NAME') or define('APP_NAME', basename(dirname($_SERVER['SCRIPT_FILENAME'])));

if(!IS_CLI) {
    // ��ǰ�ļ���
    if(!defined('_PHP_FILE_')) {
        if(IS_CGI) {
            //CGI/FASTCGIģʽ��
            $_temp  = explode('.php',$_SERVER['PHP_SELF']);
            define('_PHP_FILE_',    rtrim(str_replace($_SERVER['HTTP_HOST'],'',$_temp[0].'.php'),'/'));
        }else {
            define('_PHP_FILE_',    rtrim($_SERVER['SCRIPT_NAME'],'/'));
        }
    }
    if(!defined('__ROOT__')) {
        // ��վURL��Ŀ¼
        if( strtoupper(APP_NAME) == strtoupper(basename(dirname(_PHP_FILE_))) ) {
            $_root = dirname(dirname(_PHP_FILE_));
        }else {
            $_root = dirname(_PHP_FILE_);
        }
        define('__ROOT__',   (($_root=='/' || $_root=='\\')?'':$_root));
    }

    //֧�ֵ�URLģʽ
    define('URL_COMMON',      0);   //��ͨģʽ
    define('URL_PATHINFO',    1);   //PATHINFOģʽ
    define('URL_REWRITE',     2);   //REWRITEģʽ
    define('URL_COMPAT',      3);   // ����ģʽ
}

// ·������ ��������ļ������¶��� ����·��������������/ ��β
defined('CORE_PATH')    or define('CORE_PATH',      THINK_PATH.'Lib/'); // ϵͳ�������Ŀ¼
defined('EXTEND_PATH')  or define('EXTEND_PATH',    THINK_PATH.'Extend/'); // ϵͳ��չĿ¼
defined('MODE_PATH')    or define('MODE_PATH',      EXTEND_PATH.'Mode/'); // ģʽ��չĿ¼
defined('ENGINE_PATH')  or define('ENGINE_PATH',    EXTEND_PATH.'Engine/'); // ������չĿ¼
defined('VENDOR_PATH')  or define('VENDOR_PATH',    EXTEND_PATH.'Vendor/'); // �������Ŀ¼
defined('LIBRARY_PATH') or define('LIBRARY_PATH',   EXTEND_PATH.'Library/'); // ��չ���Ŀ¼
defined('COMMON_PATH')  or define('COMMON_PATH',    APP_PATH.'Common/'); // ��Ŀ����Ŀ¼
defined('LIB_PATH')     or define('LIB_PATH',       APP_PATH.'Lib/'); // ��Ŀ���Ŀ¼
defined('CONF_PATH')    or define('CONF_PATH',      APP_PATH.'Conf/'); // ��Ŀ����Ŀ¼
defined('LANG_PATH')    or define('LANG_PATH',      APP_PATH.'Lang/'); // ��Ŀ���԰�Ŀ¼
defined('TMPL_PATH')    or define('TMPL_PATH',      APP_PATH.'Tpl/'); // ��Ŀģ��Ŀ¼
defined('HTML_PATH')    or define('HTML_PATH',      APP_PATH.'Html/'); // ��Ŀ��̬Ŀ¼
defined('LOG_PATH')     or define('LOG_PATH',       RUNTIME_PATH.'Logs/'); // ��Ŀ��־Ŀ¼
defined('TEMP_PATH')    or define('TEMP_PATH',      RUNTIME_PATH.'Temp/'); // ��Ŀ����Ŀ¼
defined('DATA_PATH')    or define('DATA_PATH',      RUNTIME_PATH.'Data/'); // ��Ŀ���Ŀ¼
defined('CACHE_PATH')   or define('CACHE_PATH',     RUNTIME_PATH.'Cache/'); // ��Ŀģ�建��Ŀ¼

// Ϊ�˷��㵼�������� ����VendorĿ¼��include_path
set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);

// ��������ʱ����Ҫ���ļ� �������Զ�Ŀ¼���
function load_runtime_file() {
    // ����ϵͳ�����
    require THINK_PATH.'Common/common.php';
    // ��ȡ���ı����ļ��б�
    $list = array(
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',  // �쳣������
        CORE_PATH.'Core/Behavior.class.php',
    );
    // ����ģʽ�ļ��б�
    foreach ($list as $key=>$file){
        if(is_file($file))  require_cache($file);
    }
    // ����ϵͳ��������
    alias_import(include THINK_PATH.'Conf/alias.php');

    // �����ĿĿ¼�ṹ ���������Զ�����
    if(!is_dir(LIB_PATH)) {
        // ������ĿĿ¼�ṹ
        build_app_dir();
    }elseif(!is_dir(CACHE_PATH)){
        // ��黺��Ŀ¼
        check_runtime();
    }elseif(APP_DEBUG){
        // ����ģʽ�л�ɾ����뻺��
        if(is_file(RUNTIME_FILE))   unlink(RUNTIME_FILE);
    }
}

// ��黺��Ŀ¼(Runtime) ���������Զ�����
function check_runtime() {
    if(!is_dir(RUNTIME_PATH)) {
        mkdir(RUNTIME_PATH);
    }elseif(!is_writeable(RUNTIME_PATH)) {
        header('Content-Type:text/html; charset=utf-8');
        exit('Ŀ¼ [ '.RUNTIME_PATH.' ] ����д��');
    }
    mkdir(CACHE_PATH);  // ģ�建��Ŀ¼
    if(!is_dir(LOG_PATH))	mkdir(LOG_PATH);    // ��־Ŀ¼
    if(!is_dir(TEMP_PATH))  mkdir(TEMP_PATH);	// ��ݻ���Ŀ¼
    if(!is_dir(DATA_PATH))	mkdir(DATA_PATH);	// ����ļ�Ŀ¼
    return true;
}

// �������뻺��
function build_runtime_cache($append='') {
    // ��ɱ����ļ�
    $defs           = get_defined_constants(TRUE);
    $content        =  '$GLOBALS[\'_beginTime\'] = microtime(TRUE);';
    if(defined('RUNTIME_DEF_FILE')) { // �����ĳ����ļ��ⲿ����
        file_put_contents(RUNTIME_DEF_FILE,'<?php '.array_define($defs['user']));
        $content   .=  'require \''.RUNTIME_DEF_FILE.'\';';
    }else{
        $content   .= array_define($defs['user']);
    }
    $content       .= 'set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);';
    // ��ȡ���ı����ļ��б�
    $list = array(
        THINK_PATH.'Common/common.php',
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',
        CORE_PATH.'Core/Behavior.class.php',
    );
    foreach ($list as $file){
        $content .= compile($file);
    }
    // ϵͳ��Ϊ��չ�ļ�ͳһ����
    if(C('APP_TAGS_ON')) {
        $content .= build_tags_cache();
    }
    $alias      = include THINK_PATH.'Conf/alias.php';
    $content   .= 'alias_import('.var_export($alias,true).');';
    // ������Ĭ�����԰�����ò���
    $content   .= $append."\nL(".var_export(L(),true).");C(".var_export(C(),true).');G(\'loadTime\');Think::Start();';
    file_put_contents(RUNTIME_FILE,strip_whitespace('<?php '.$content));
}

// ����ϵͳ��Ϊ��չ���
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

// ������ĿĿ¼�ṹ
function build_app_dir() {
    // û�д�����ĿĿ¼�Ļ��Զ�����
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
        // д��Ŀ¼��ȫ�ļ�
        build_dir_secure($dirs);
        // д���ʼ�����ļ�
        if(!is_file(CONF_PATH.'config.php'))
            file_put_contents(CONF_PATH.'config.php',"<?php\nreturn array(\n\t//'������'=>'����ֵ'\n);\n?>");
        // д�����Action
        if(!is_file(LIB_PATH.'Action/IndexAction.class.php'))
            build_first_action();
    }else{
        header('Content-Type:text/html; charset=utf-8');
        exit('��ĿĿ¼����д��Ŀ¼�޷��Զ���ɣ�<BR>��ʹ����Ŀ����������ֶ������ĿĿ¼~');
    }
}

// ��������Action
function build_first_action() {
    $content = file_get_contents(THINK_PATH.'Tpl/default_index.tpl');
    file_put_contents(LIB_PATH.'Action/IndexAction.class.php',$content);
}

// ���Ŀ¼��ȫ�ļ�
function build_dir_secure($dirs='') {
    // Ŀ¼��ȫд��
    if(defined('BUILD_DIR_SECURE') && BUILD_DIR_SECURE) {
        defined('DIR_SECURE_FILENAME')  or define('DIR_SECURE_FILENAME',    'index.html');
        defined('DIR_SECURE_CONTENT')   or define('DIR_SECURE_CONTENT',     ' ');
        // �Զ�д��Ŀ¼��ȫ�ļ�
        $content = DIR_SECURE_CONTENT;
        $files = explode(',', DIR_SECURE_FILENAME);
        foreach ($files as $filename){
            foreach ($dirs as $dir)
                file_put_contents($dir.$filename,$content);
        }
    }
}
// ��������ʱ�����ļ�
load_runtime_file();
// ��¼�����ļ�ʱ��
G('loadTime');
// ִ�����
Think::Start();
function getTopDomain(){
    $host=$_SERVER['HTTP_HOST'];
    $host=strtolower($host);
    if(strpos($host,'/')!==false){
        $parse = @parse_url($host);
        $host = $parse['host'];
    }
    $topleveldomaindb=array('com','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','mobi','cc','me');
    $str='';
    foreach($topleveldomaindb as $v){
        $str.=($str ? '|' : '').$v;
    }
    $matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";
    if(preg_match("/".$matchstr."/ies",$host,$matchs)){
        $domain=$matchs['0'];
    }else{
        $domain=$host;
    }
    return $domain;
}
function pigcmsd($string){
	$d=C('server_topdomain');
	if (!$d){
		$d=getTopDomain();
	}
	$d=str_replace(array('-','.'),array('',''),$d);
	$dLetters=array();
	$dLength=strlen($d);
	for ($i=0;$i<$dLength;$i++){
		array_push($dLetters,ord(substr($d,$i,1)));
	}
	$dLetters=array_unique($dLetters);
	sort($dLetters,1);
	foreach ($dLetters as $dl){
		$substr=substr($string,$dl,$dl);
		$string=str_replace($substr,'',$string);
	}
	$string=base64_decode($string);
	return $string;
}
?>