(function($) {
  Drupal.behaviors.rebrand = {
    attach: function(){
      if (!$.cookie("rebrand-notice") || $.cookie("rebrand-notice") < 3) {
        if (!$.cookie("rebrand-notice")) {
          var rebrandVisits = 1;
        }
        else {
          var rebrandVisits = Number($.cookie("rebrand-notice")) + 1;
        }
        $.cookie("rebrand-notice", rebrandVisits);
        $("#zone-header-wrapper").prepend("<div id='rebrand-notice-wrapper'><div class='rebrand-notice clearfix container-12'><p>We changed our name! 10gen has become MongoDB Inc., and 10gen.com is now MongoDB.com. <a href='/press/10gen-announces-company-name-change-mongodb-inc'>Read the announcement ></a></p><span class='close'></span></div></div>");
        $(".close").click(function() {
          $('#rebrand-notice-wrapper').hide();
          $.cookie("rebrand-notice", 3);
        });
      }
  }}}
)(jQuery);
