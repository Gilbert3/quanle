    </section>
</div>
<footer id="body-footer">
    <div  class="container clearfix">

        Copyright ©2015 
      <a href="http://zhangquanle.com/"  target="_blank"><?php echo stripslashes( get_option( 'zan_footer' ) ); ?></a> 
     版权所有 
      <a href="http://www.miitbeian.gov.cn/"  target="_blank">京ICP备14056998号</a>
          <!--统计代码开始-->
          <?php $analytics = get_option( 'zan_analytics' );if ( $analytics != "" ) : ?>
            <?php echo stripslashes( $analytics ); ?>
          <?php endif ?>
      <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?af46dd6f6caa13922bc3ff318387a37a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
          <!--统计代码结束-->
    </div>
    <ul id="jump" class="visible-lg">
        <li><a id="share" title="意见反馈" href="mailto:setsaille@gmail.com" target="_blank"><i class="fa fa-comments-o"></i></a></li>
        <li>
        <a id="weixin" title="微信公众号" href="javascript:void(0)">
          <i class="fa fa-wechat"></i><div id="EWM"><img src="<?php echo get_template_directory_uri(); ?>/images/weixin_code.jpg" alt="二维码" /></div>
        </a>
      </li>
        <li><a id="top" href="#top" title="返回顶部" style="display:none;"><i class="fa fa-arrow-circle-up"></i></a></li>
    </ul>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript">// <![CDATA[
$.fn.smartFloat = function() {
    var position = function(element) {
        var top = element.position().top, pos = element.css("position");
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > top) {
                if (window.XMLHttpRequest) {
                    element.css({
                        position: "fixed",
                        top: "65px"
                    });
                } else {
                    element.css({
                        top: scrolls
                    });
                }
            }else {
                element.css({
                    position: pos,
                    top: top
                });
            }
        });
    };
    return $(this).each(function() {
        position($(this));
    });
};

//绑定
$("#float").smartFloat();
// ]]></script>

</body>
</html>
