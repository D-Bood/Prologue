<?php
    /**
    * t
    *
    * @package custom
    */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <?php if (!$this->user->hasLogin()):
         $this->need('404.php'); //header("Location: /404"); 
         exit;
    endif; ?>

<div id="main">
<section class="one dark cover">
  <div class="container">
        <h2><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
  </div>
</section>

<?php
$GLOBALS['z']  = $this->options->CDNURL;
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>

<li data-no-instant id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

    <div id="<?php $comments->theId(); ?>">
        <?php
            $host = '//cdn.v2ex.com';
            $url = '/gravatar/';
            $size = '80';
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
        ?>

        <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
        <div class="comment-main">
            <p class="comment-at"><?php AjaxComment_Plugin::get_comment_at($comments->coid); ?></p>
            <?php $comments->content(); ?>
            <div class="comment-meta">
                <span class="comment-author"><?php echo $author; ?></span>
                <time class="comment-time"><?php $comments->date(); ?></time>
                <span class="comment-reply"><?php $comments->reply(); ?></span>
            </div>
        </div>
    </div>
 

    <?php if ($comments->children) { ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div>
    <?php } ?>
    
</li>
<?php } ?>

<section class="four">
<div class="container">
<?php //print_r($this);?>
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无碎语'), _t('仅有一条碎语'), _t('已有 %d 条碎语')); ?></h3>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="response"><?php _e('添加新碎语'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">
          <div class="row">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
            <div class="6u 12u$(mobile)">
    			<input type="text" name="author" placeholder="称呼" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
            </div>
            <div class="6u$ 12u$(mobile)">
    			<input type="email" name="mail" placeholder="电子邮箱" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
            </div>
            <div class="6u 12u$(mobile)">
    			<input type="url" name="url" placeholder="网站" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </div>
            <div class="6u$ 12u$(mobile)" id="recaptcha">
            <?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>
            <div class="g-recaptcha" data-sitekey="6Le8yigUAAAAANf5EpB5kLb49-ZHcGpKw_w1HbaS"></div>
            <?php else: ?>
            <?php reCAPTCHA_Plugin::output(); ?>
            <?php endif; ?>
            </div>
            <?php endif; ?>
    		<div class="12u$">
                <textarea rows="8" cols="50" name="text" placeholder=<?php _e('碎语内容　(本站使用reCAPTCHA作为验证码)'); ?> id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </div>
    		<div class="12u$">
                <input type="submit" class="submit" value="提交碎语"></input>

            </div>
          </div>
    	</form>
    </div>
</div>
</section>


<script>
(function () {
    window.TypechoComment = {
        dom : function (id) {
            return document.getElementById(id);
        },
        create : function (tag, attr) {
            var el = document.createElement(tag);
            for (var key in attr) {
                el.setAttribute(key, attr[key]);
            }
            return el;
        },
        reply : function (cid, coid) {
            var comment = this.dom(cid), parent = comment.parentNode,
                response = this.dom('<?php echo $this->respondId(); ?>'),
                input = this.dom('comment-parent'),
                form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                textarea = response.getElementsByTagName('textarea')[0];
            if (null == input) {
                input = this.create('input', {
                    'type' : 'hidden',
                    'name' : 'parent',
                    'id'   : 'comment-parent'
                });
                form.appendChild(input);
            }
            input.setAttribute('value', coid);
            if (null == this.dom('comment-form-place-holder')) {
                var holder = this.create('div', {
                    'id' : 'comment-form-place-holder'
                });
                response.parentNode.insertBefore(holder, response);
            }
            comment.appendChild(response);
            this.dom('cancel-comment-reply-link').style.display = '';
            if (null != textarea && 'text' == textarea.name) {
                textarea.focus();
            }
            return false;
        },
        cancelReply : function () {
            var response = this.dom('<?php echo $this->respondId(); ?>'),
            holder = this.dom('comment-form-place-holder'),
            input = this.dom('comment-parent');
            if (null != input) {
                input.parentNode.removeChild(input);
            }
            if (null == holder) {
                return true;
            }
            this.dom('cancel-comment-reply-link').style.display = 'none';
            holder.parentNode.insertBefore(response, holder);
            return false;
        }
    };
})();
</script>
<?php if(!empty($this->options->search_form) && in_array('Pjax', $this->options->search_form)): ?>
<script type = "text/javascript" data-no-instant>
(function() {
    var event = document.addEventListener ? {
        add: 'addEventListener',
        focus: 'focus',
        load: 'DOMContentLoaded'
    } : {
        add: 'attachEvent',
        focus: 'onfocus',
        load: 'onload'
    };
    document[event.add](event.load, function() {
        var r = document.getElementById('<?php echo $this->respondId(); ?>');
        if (null != r) {
            var forms = r.getElementsByTagName('form');
            if (forms.length > 0) {
                var f = forms[0],
                    textarea = f.getElementsByTagName('textarea')[0],
                    added = false;
                if (null != textarea && 'text' == textarea.name) {
                    textarea[event.add](event.focus, function() {
                        if (!added) {
                            var input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = '_';
                            input.value = (function() {
                                var _a8C5A = //'xr'
                                    '8d0' + //'vI'
                                    'vI' + /* 'mj'//'mj' */ '' + //'P'
                                    '06' + 'd' //'chS'
                                    + //'wo'
                                    '0ef' + '41' //'9G'
                                    + '8c8' //'R'
                                    + //'p1'
                                    'd0' + //'mi'
                                    'mi' + 'baf' //'lu'
                                    + 'c' //'dm'
                                    + //'ED'
                                    '1a9' + //'Lh'
                                    'd9' + '6' //'luM'
                                    + //'xH'
                                    'f1' + //'W'
                                    '2c7' + 'f' //'f'
                                    + //'9'
                                    '9' + //'Nd'
                                    'Nd' + /* '8ys'//'8ys' */ '' + '' ///*'6Yc'*/'6Yc'
                                    + //'H'
                                    '0',
                                    _LceE8M = [
                                        [3, 5],
                                        [16, 18],
                                        [31, 32],
                                        [31, 32],
                                        [31, 33]
                                    ];
                                for (var i = 0; i < _LceE8M.length; i++) {
                                    _a8C5A = _a8C5A.substring(0, _LceE8M[i][0]) + _a8C5A.substring(_LceE8M[i][1]);
                                }
                                return _a8C5A;
                            })();
                            f.appendChild(input);
                            added = true;
                        }
                    });
                }
            }
        }
    });
})();
</script>
<?php else : ?>
<?php endif; ?>

<!-- end #main-->
<?php $this->need('footer.php'); ?>
