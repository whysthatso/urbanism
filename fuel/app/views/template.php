<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>U</title>
  <?php echo Asset::css('bootstrap.css'); ?>

  <?php echo Asset::css('base.css'); ?>
  <?php echo Asset::css('layout.css'); ?>
  <?php echo Asset::css('skeleton.css'); ?>  
    <?php echo Asset::css('u.css'); ?>
    <?php echo Asset::js(array(
    'jquery.min.js',
    'slides.jquery.js',
    'jquery.cycle.all.latest.js',
    'u.js')); ?>
<link rel="stylesheet" href="http://f.fontdeck.com/s/css/ztizLcpXY96pMPqC/s/lM7UN2Ro/u.cenotaph.org/26895.css" type="text/css" />   
<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37404427-1']);

  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>
  <div class="container">
  <div class="header clearfix">
    <div class="header_control">
      <div class="one column alpha left">
        <a href="/"><?php echo Asset::img('u_header.png'); ?></a>
      </div>
      <div class="right">
        <div style="float:right;">
          <div class="lang">
            <?php if (preg_match('/\/ee\//', Uri::current())) { ?>
              <a href="<?php echo preg_replace('/\/ee\//', '/en/', Uri::current()); ?>">ENG</a>
              <?php }  else if ( (preg_match('/\/en\//', Uri::current())) || preg_match('/\/en$/', Uri::current())) { ?>
                <span class="active_lang">ENG</span>
              <?php }  else { ?>
                <a href="/issues/en">ENG</a> 
              <?php  }


                  if (preg_match('/\/en\//', Uri::current()))  { ?>
                <a href="<?php echo preg_replace('/\/en\//', '/ee/', Uri::current()); ?>">EST</a>
              <?php } else if (preg_match('/\/en$/', Uri::current())) { ?>
                <a href="<?php echo preg_replace('/\/en$/', '', Uri::current()); ?>">EST</a>
              <?php } else { ?>
                <span class="active_lang">EST</span>
              <?php }  
              if (Auth::check()) { ?>
              <?php echo Html::anchor('/admin/issues', 'Admin');
            } ?><br />
            <span style="float:right;font-size:8pt;line-height:8pt;"><a href="#"></a><strong>ABOUT</strong></span>
          </div>

        </div>

        <div class="title">
          
           <?php if (preg_match('/\/ee\//', Uri::current()) || Uri::string() == '') { ?>
           urbanistide väljaanne U
           <?php } else if (!isset($locale)) { ?>
           Estonian Urbanists´ Review U
           <?php } else { ?>
           Estonian Urbanists´ Review U
          <?php  } ?>
        </div>

      <?php if (!preg_match('/\/issue\//', Uri::current())) { ?>
        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup">
        <?php if (preg_match('/\/ee\//', Uri::current()) || Uri::string() == '') { ?>
            <form action="http://urban.us4.list-manage.com/subscribe/post?u=8ca824e2252482fe0cd04801e&amp;id=8805fe525b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>          
              <div class="mc-field-group">
                <input type="email" name="EMAIL" class="required email" id="mce-EMAIL"
                 onblur="if (this.value == '') {this.value = 'LIITU UUDISKIRJAGA';}" onfocus="if (this.value == 'LIITU UUDISKIRJAGA') {this.value = '';}" value="LIITU UUDISKIRJAGA">
              </div> 
              <div>
                <input type="submit" value="LIITU" name="subscribe" id="mc-embedded-subscribe" class="button">
              </div>
           </form>
         <?php } else { ?>
          <form action="http://urban.us4.list-manage.com/subscribe/post?u=8ca824e2252482fe0cd04801e&amp;id=8805fe525b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>          
            <div class="mc-field-group">
              <input type="email" name="EMAIL" class="required email" id="mce-EMAIL"
               onblur="if (this.value == '') {this.value = 'SUBSCRIBE TO U';}" onfocus="if (this.value == 'SUBSCRIBE TO U') {this.value = '';}" value="SUBSCRIBE TO U">
            </div> 
            <div>
              <input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="button">
            </div>
          </form>
         <?php } ?>
         </div>
        <!--End mc_embed_signup-->
      <?php  } ?>
      </div>
    
  <?php if (Session::get_flash('success')): ?>
        <div class="alert-message success">
          <p>
          <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
          </p>
        </div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
        <div class="alert-message error">
          <p>
          <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
          </p>
        </div>
<?php endif; ?>
  </div>
</div>
  <div id="content">
    <?php echo $content; ?>
  </div>

    <footer>
    </footer>
  </div>

</body>
</html>
