<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit() {
 Helper::options()->commentsMaxNestingLevels = 999;//评论回复楼侧最高999层.这个正常设置最高只有7层
}

function themeConfig($form) {
	//Pjax加速
	$search_form = new Typecho_Widget_Helper_Form_Element_Checkbox('search_form',
	array('Pjax' => _t('启用Pjax加速站点, 勾上即可, 为使原生评论生效需要到设置-评论, 去掉开启垃圾评论过滤'),),array('ShowSearch'), _t('设置开启Pjax'));
	$form->addInput($search_form->multiMode());

}

//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}
//输出评论内容
function get_filtered_comment($coid){
    $db   = Typecho_Db::get();
    $rs=$db->fetchRow($db->select('text')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $content=$rs['text'];
    echo $content;
}
//一言
function hitokoto(){
    $path = dirname(__FILE__);
    $file = file($path."/hitokoto");
    //随机读取一行
    $arr = mt_rand( 0, count( $file ) - 1 );
    $content = trim($file[$arr]);
    //输出
    echo $content;
}
//随机输出图片
//判断首页图片展示
function index_pic($thiz){
    if (array_key_exists('img',unserialize($thiz->___fields()))){
        $thiz->fields->img();
    }else{
        preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $thiz->content, $matches);
        $imgCount = count($matches[0]);
        if($imgCount >= 1){
                $img = $matches[2][0];
        }else{
                $img = "https://s1.ax1x.com/2017/11/08/BrC4I.jpg";
        }
        echo $img;
    }
}
