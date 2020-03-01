<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit() {
 Helper::options()->commentsMaxNestingLevels = 999;//评论回复楼侧最高999层.这个正常设置最高只有7层
}

function themeConfig($form) {
	//Pjax加速
	$search_form = new Typecho_Widget_Helper_Form_Element_Checkbox('search_form',
	array('Pjax' => _t('【 !有Bug，慎用! 】启用Pjax加速站点, 勾上即可, 为使原生评论生效需要到设置-评论, 去掉开启垃圾评论过滤'),),array('ShowSearch'), _t('设置开启Pjax'));
	$form->addInput($search_form->multiMode());

        $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl',NULL,'','博客头像','在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO<br>可使用QQ头像链接作为LOGO https://avatar.dawnlab.me/qq/（这里填QQ）');
        $form->addInput($logoUrl);

        $background = new Typecho_Widget_Helper_Form_Element_Text('background',NULL,'','博客默认封面图','在这里填入一个图片URL地址, 给博客添加一个默认封面图');
        $form->addInput($background);

        $github = new Typecho_Widget_Helper_Form_Element_Text('github',NULL,"https://github.com",'Github','在这里填入一个Github地址, 给博客添加一个Github联系方式');
        $form->addInput($github);

        $twitter = new Typecho_Widget_Helper_Form_Element_Text('twitter',NULL,"https://twitter.com",'Twitter','在这里填入一个Twitter地址, 给博客添加一个Twitter联系方式');
        $form->addInput($twitter);

        $facebook = new Typecho_Widget_Helper_Form_Element_Text('facebook',NULL,"https://facebook.com",'Facebook','在这里填入一个Facebook地址, 给博客添加一个Facebook联系方式');
        $form->addInput($facebook);

        $youtube = new Typecho_Widget_Helper_Form_Element_Text('youtube',NULL,"https://youtube.com",'YouTube','在这里填入一个YouTube地址, 给博客添加一个YouTube联系方式');
        $form->addInput($youtube);

        $telegram = new Typecho_Widget_Helper_Form_Element_Text('telegram',NULL,"https://telegram.org",'Telegram','在这里填入一个Telegram地址, 给博客添加一个Telegram联系方式');
        $form->addInput($telegram);

        $bilibili = new Typecho_Widget_Helper_Form_Element_Text('bilibili',NULL,"https://bilibili.com",'bilibili','在这里填入一个bilibili地址, 给博客添加一个bilibili联系方式');
        $form->addInput($bilibili);
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
function image_rand_output() {
    $image_directory = __DIR__ . "/img/";
    $image_type = array(".jpg",".gif",".png");
    $dh = dir($image_directory);
    while (($image = $dh -> read()) !== false) {
        if(in_array(strtolower(strrchr($image,".")),$image_type))
        $image_array[] = $image;
    }
    $dh -> close();
    $key = array_rand($image_array);
    define("IMG", "https://cdn.jsdelivr.net/gh/D-Bood/img@latest/usr/uploads/random/");
    echo IMG.$image_array[$key];
} 
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
                $img = image_rand_output(); //"https://s1.ax1x.com/2017/11/08/BrC4I.jpg";
        }
        echo $img;
    }
}
