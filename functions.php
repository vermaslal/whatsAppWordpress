<?php
/* ---------------------------------------------------------
  Add Script in Footer For Whatsapp Share Button
  -------------------------------------------------------- */
add_action('wp_footer', 'sham_whatsapp_script');

function sham_whatsapp_script() {
  ?>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(document).on("click", '.whatsapp-share', function () {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          var text = $(this).attr("title");
          var url = $(this).attr("data-link");
          var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
          var whatsapp_url = "whatsapp://send?text=" + message;
          window.location.href = whatsapp_url;
        } else {
          alert("Please share this article in mobile device");
        }

      });
    });
  </script>
<?php
}

/* ---------------------------------------------------------
  Add CSS in Footer For Whatsapp Share Button
  -------------------------------------------------------- */
add_action('wp_footer', 'sham_whatsapp_css');

function sham_whatsapp_css() {
  ?>
  <style>
    .whatsapp-share, a.whatsapp-share {
      background-image: url('<?php bloginfo('template_url'); ?>/images/icon.png');
      background-repeat: no-repeat;
      background-position:18px;
      font-family: Georgia;
      color: #ffffff;
      font-size: 14px;
      background-color: #5cbe4a;
      padding: 10px 18px 10px 35px;
      text-decoration: none;
    }
    .whatsapp-share:hover, a.whatsapp-share:hover {
      background-color: #49b334;
      color: #ffffff;
      text-decoration: none;
    }
  </style>
<?php
}

/* ---------------------------------------------------------
  Shortcode Function For Whatsapp Share Button
  -------------------------------------------------------- */

function sham_whatsapp_share() {
  return '<a class="whatsapp-share sham-whatsapp-share" title="' . get_the_title() . '" data-link="' . get_the_permalink() . '">Share</a>';
}

add_shortcode('whatsapp-share', 'sham_whatsapp_share');
