<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-06-07
 * Time: 22:08
 */

foreach ($menus as $mk => $mv){
    foreach ($mv['subs'] as $mvk => $mvv){
        if ($mvv['selectedCondition']['m'] == 'Web') {
            $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'Web'.DIRECTORY_SEPARATOR;
            if (!file_exists($path.'Web_indexAction.class.php')) {
                unset($menus[$mk]);
            }
        }

        if(in_array($mvv['selectedCondition']['m'],$not_exist)){
            if($mvv['selectedCondition']['m'] == 'Home'){
                unset($menus[$mk]);
            }else{              //正常处理
                unset($menus[$mk]['subs'][$mvk]);
            }
        }elseif($mvv['selectedCondition']['m'] == 'Business'){
            //行业处理
            if($mvv['selectedCondition']['type'] == 'wedding') $mvv['selectedCondition']['type'] = 'buswedd';
            if(in_array(ucfirst($mvv['selectedCondition']['type']),$not_exist)){
                unset($menus[$mk]['subs'][$mvk]);
            }
        }
        //主菜单
        if($menus[$mk]['subs'] == NULL){
            unset($menus[$mk]);
        }
    }
}

$i=0;
/*把get请求组成数组*/
$parms=$_SERVER['QUERY_STRING'];
$parms1=explode('&',$parms);
$parmsArr=array();
if ($parms1){
    foreach ($parms1 as $p){
        $parms2=explode('=',$p);
        $parmsArr[$parms2[0]]=$parms2[1];
    }
}

$subMenus=array();
$t=0;
$currentMenuID=0;
$currentParentMenuID=0;
foreach ($menus as $m){
    $loopContinue=1;
    if ($m['subs']){
        $st=0;
        foreach ($m['subs'] as $s){
            $includeArr=1;
            if ($s['selectedCondition']){
                foreach ($s['selectedCondition'] as $condition){
                    if (!in_array($condition,$parmsArr)){
                        $includeArr=0;
                        break;
                    }
                }
            }

            if ($includeArr){
                if ($s['exceptCondition']){
                    foreach ($s['exceptCondition'] as $epkey=>$eptCondition){
                        if ($epkey=='a'){
                            $parm_a_values=explode(',',$eptCondition);
                            if ($parm_a_values){
                                if (in_array($parmsArr['a'],$parm_a_values)){
                                    $includeArr=0;
                                    break;
                                }
                            }
                        }else {
                            if (in_array($eptCondition,$parmsArr)){
                                $includeArr=0;
                                break;
                            }
                        }
                    }
                }
            }


            if ($includeArr){
                $currentMenuID=$st;
                $currentParentMenuID=$t;
                $loopContinue=0;
                break;
            }
            $st++;
        }

        if ($loopContinue==0){
            break;
        }
    }
    $t++;
}

foreach ($menus as $m){
   $displayStr='';
    if ($currentParentMenuID!=0||0!=$currentMenuID){
        $m['display']=0;
    }
    if (!$m['display']){
        $displayStr=' style="display:none"';
    }
    if ($currentParentMenuID==$i){
        $displayStr='';
    }
    $aClassStr='';
    if ($displayStr){
        $aClassStr=' nav-header-current';
    }

    if($i == 0){
        echo '<a class="nav-header'.$aClassStr.'" style="border-top:none !important;"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>';
    }else{
        echo '<a class="nav-header'.$aClassStr.'"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>';
    }
    if ($m['subs']){
        $j=0;
        foreach ($m['subs'] as $s){
            $selectedClassStr='subCatalogList';
            if ($currentParentMenuID==$i&&$j==$currentMenuID){
                $selectedClassStr='selected';
            }
            $newStr='';
            if ($s['test']){
                $newStr.='<span class="test"></span>';
            }else {
                if ($s['new']){
                    $newStr.='<span class="new"></span>';
                }
            }
            if ($s['name']!='微信墙'&&$s['name']!='摇一摇'&&$s['name']!='现场活动'){
                echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>';
            }else {
                switch ($s['name']){
                    case '微信墙':
                    case '摇一摇':
                    case '现场活动':
                        $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR;
                        if (file_exists($path.'WallAction.class.php')&&file_exists($path.'ShakeAction.class.php')){
                            echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>';
                        }
                        break;
                }
            }

            if ($s['name']=='模板管理'&&is_dir($_SERVER['DOCUMENT_ROOT'].'/cms')&&!strpos($_SERVER['HTTP_HOST'],'pigcms')){
                //echo '<li class="subCatalogList"> <a href="/index.php?g=User&m=AdvanceTpl&a=index">高级模板</a><span class="new"></span></li>';
                echo '<li class="subCatalogList"> <a href="/cms/manage/index.php">高级模板</a><span class="new"></span></li>';
            }
            $j++;
        }
    }
    echo '</ul>';
    $i++;
}

function mysum($a,$b,$c){
    echo $a+$b+$c;
}
