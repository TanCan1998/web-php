	<?php  echo"
	<script src=\"../js/jquery.min.js\"></script>
    <script type=\"text/javascript\">

        $(function () {

            var speed = 800;//滚动速度

			var h=document.body.clientHeight;



            //回到顶部

            $(\"#toTop\").click(function () {

			  	$('html,body').animate({

					scrollTop: '0px'

				},

				speed);

            });

            //回到底部

            var windowHeight = parseInt($(\"body\").css(\"height\"));//整个页面的高度

            $(\"#toBottom\").click(function () {

				//alert(h);

                $('html,body').animate({

					scrollTop: h+'px'

				},

				speed);

            });

        });

    </script>
    <div id=\"scroll\">

        <div class=\"scrollItem\" id=\"toTop\" title=\"↑回到顶端ヾ(@^▽^@)ノ\">∧</div>

        <div class=\"scrollItem\" id=\"toBottom\" title=\"↓下面更精彩哦\">∨</div>

    </div>
"; ?>