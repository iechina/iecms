<?php
/**
 *网站后台
 *@package
 *@author
 **/
class SystemAction extends BackAction{
	public $server_url;
	public $key;
	public $topdomain;
	public $dirtype;
	public function _initialize() {
		parent::_initialize();
		$this->server_url=trim(C('server_url'));
		if (!$this->server_url){
			$this->server_url='http://udd.pigcms.cn/';
		}

		$this->key=trim(C('server_key'));
		$this->topdomain=trim(C('server_topdomain'));
		if (!$this->topdomain){
			$this->topdomain=$this->getTopDomain();
		}
		if (file_exists($_SERVER['DOCUMENT_ROOT'].'/Lib')&&is_dir($_SERVER['DOCUMENT_ROOT'].'/Lib')){
			$this->dirtype=2;
		}else {
			$this->dirtype=1;
		}
		$Model = new Model();
		//检查system表是否存在
		$Model->query("CREATE TABLE IF NOT EXISTS `".C('DB_PREFIX')."system_info` (`lastsqlupdate` INT( 10 ) NOT NULL ,`version` VARCHAR( 10 ) NOT NULL) ENGINE = MYISAM CHARACTER SET utf8");
		$Model->query("CREATE TABLE IF NOT EXISTS `".C('DB_PREFIX')."update_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(600) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8");

		$firstNode=M('Node')->where(array('name'=>'Function','title'=>'功能模块'))->find();
        $nodeExist=M('Node')->where(array('name'=>'aboutus'))->find();
        if (!$nodeExist){
            $row2=array(
            'name'=>'Aboutus',
            'title'=>'关于我们',
            'status'=>1,
            'remark'=>'0',
            'pid'=>$firstNode['id'],
            'level'=>2,
            'sort'=>0,
            'display'=>2
            );
            M('Node')->add($row2);
        }
        //
        $siteConfigNode=M('Node')->where(array('title'=>'站点设置'))->find();
        $platformConfigNode=M('Node')->where(array('title'=>'平台支付配置'))->find();
        if (!$platformConfigNode){
        	$row=array(
            'name'=>'platform',
            'title'=>'平台支付配置',
            'status'=>1,
            'remark'=>'',
            'pid'=>$siteConfigNode['id'],
            'level'=>3,
            'sort'=>0,
            'display'=>2
            );
        	M('Node')->add($row);
        }
        $extNode=M('Node')->where(array('title'=>'扩展管理'))->find();
        $platformPayNode=M('Node')->where(array('title'=>'平台支付'))->find();
        if (!$platformPayNode){
        	$row=array(
            'name'=>'Platform',
            'title'=>'平台支付',
            'status'=>1,
            'remark'=>'',
            'pid'=>$extNode['id'],
            'level'=>2,
            'sort'=>0,
            'display'=>2
            );
        	$platFormID=M('Node')->add($row);
        	//
        	$row=array(
            'name'=>'index',
            'title'=>'平台对账',
            'status'=>1,
            'remark'=>'',
            'pid'=>$platFormID,
            'level'=>3,
            'sort'=>0,
            'display'=>2
            );
           M('Node')->add($row);
        }
	}
	public function index(){
		$where['display']=1;
		$where['status']=1;
		$order['sort']='asc';
		$nav=M('Node')->where($where)->order($order)->select();
		$this->assign('nav',$nav);

		$notice_record_lists = M('notice_record')->field('id,n_id')->where(array('userid'=>$_SESSION['userid']))->select();
		if(!empty($notice_record_lists)){
			$n_id = array();
			foreach($notice_record_lists as $key=>$val){
				$n_id[] = $val['n_id'];
			}
			$data['n_id'] = implode(',',$n_id);
		}
		$url = 'http://uddp.pigcms.cn/oa/admin.php?m=notice&c=view&a=get_list';
		if(isset($data['n_id']) && !empty($data['n_id'])){
			$url .= '&'.http_build_query($data);
		}
		if(function_exists('curl_init')){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$content = curl_exec($ch);
			curl_close($ch);
		}else{
			$content = file_get_contents($url);
		}
		$content = json_decode($content,true);
		$this->assign('content',$content);

		$this->display();
	}
	public function closeAD(){
		if(IS_GET){
			$id = $this->_get('id','intval');
			if($id){
				M('notice_record')->add(array('n_id'=>$id,'userid'=>$_SESSION['userid']));
			}
		}
	}

	public function menu(){
		if(empty($_GET['pid'])){
			$where['display']=2;
			$where['status']=1;
			$where['pid']=2;
			$where['level']=2;
			$order['sort']='asc';
			$nav=M('Node')->where($where)->order($order)->select();
			$this->assign('nav',$nav);
		}
		$this->display();
	}
	// 清除缓存	
	protected function deldir($dir){
		$result = true;
		$dh = opendir($dir);
		while($file=readdir($dh)){
			if($file!="." && $file!=".."){
				$fullpath=$dir."/".$file;
				if(!is_dir($fullpath)){
					$result = unlink($fullpath);					
				}else{
					$this->deldir($fullpath);
				}
			}
			rmdir($fullpath);
		}
		closedir($dh);
		return $result;
	}
	
	public function clear(){
		$this->display();
	}
	
	public function del(){
		$dir = './Conf/logs';
		$r = $this->deldir($dir);
		if($r){
			$this->success('缓存清除成功！',U('index'));
		}else{
			$this->error('清除失败，请检查目录权限',U('index'));
		}
	}

	public function main(){
		$firstNode=M('Node')->where(array('pid'=>1,'title'=>'站点管理'))->order('id ASC')->find();
		$nodeExist=M('Node')->where(array('pid'=>$firstNode['id'],'title'=>'后台首页'))->find();
		if (!$nodeExist){
			$submenu=array(
			'name'=>'SystemIndex',
			'title'=>'后台首页',
			'status'=>1,
			'remark'=>'0',
			'pid'=>$firstNode['id'],
			'level'=>2,
			'sort'=>0,
			'display'=>2
			);
			$submenuRowID=M('Node')->add($submenu);
		
		}
		/*
		require_once('test.php');
		if (!class_exists('test')){
		$canEnUpdate=0;
		}else {
		$canEnUpdate=1;
		}
		*/
		$canEnUpdate=1;
		$this->assign('canEnUpdate',$canEnUpdate);

		//
		//
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		if ($updateRecord['lastsqlupdate']>$updateRecord['version']){
			$updateRecord['version']=$updateRecord['lastsqlupdate'];
		}
		$this->assign('updateRecord',$updateRecord);
		$this->display();
	}
	public function repairTable(){
		$Model = new Model();
		error_reporting(0);
		@mysql_query('REPAIR TABLE `'.C('DB_PREFIX').'behavior`');
		@mysql_query('REPAIR TABLE `'.C('DB_PREFIX').'requestdata`');
		$this->success('成功删除缓存',U('System/main'));
	}
	
	//
	public function _needUpdate(){
		
		return $rt;
	}
	public function _needSqlUpdate(){
		
		return $rt;
	}
	public function checkUpdate(){
		
		$this->display();
	}
	public function doUpdate(){
		
		
		
		/*
		require_once('test.php');
		if (!class_exists('test')){
		$this->success('检查更新',U('System/doSqlUpdate'));
		}
		*/

		//
	
	}
	public function doSqlUpdate(){
		
	}
	function rollback(){
		//20140312
		
	}
	function curlGet($url){
		
		return $temp;
	}
	function getTopDomain(){
		
	}
}
function recurse_copy($src,$dst) {  // 原目录，复制到的目录
	
}
function deletedir($dirname){
	
	return $result;
}
function pigcms_getcontents($url){
	
}