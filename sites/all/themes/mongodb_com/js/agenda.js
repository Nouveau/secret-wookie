(function($) {
  Drupal.behaviors.agenda = {
    attach: function(){
      $('.single .summary').each(function() {
        $(this).each(close);
        function open() {
          var $div = $(this).closest('.session > div'),
              position = $div.position();
              
          $div.data('height', $div.height()).css({
            height:'auto',
            position:'absolute',
            top: position.top,
            left: position.left,
            overflow: 'visible',
            width: $div.width()
          }).addClass('active');
          $div.find('.summary').css({height: 'auto'});
          
          $div.find('.more').replaceWith("<a class='hide'>Hide</a>");
          $div.children().click(close);
        }
        function close() {
          var $div = $(this).closest('.session > div');
          var maxHeight = 300 - $div.find('h4').height() - $div.find('.speakers').height();
          var textHeight = $div.height();

          if (textHeight > 330) {
            var moreLink = $("<a class='more'>… Read More</a>").click(open);
            $div.find('.summary').after(moreLink);
          }
          
          $div.css({
            height:$div.data('height'),
            width: $div.width(),
            position:'static'
          }).removeClass('active');

          $div.find('.summary').css({overflow: 'hidden'});

          $div.find('.hide').remove();
          
          $div.css({overflow: 'hidden'});
          $div.find('.summary').height(maxHeight);
          $div.height(340);
        }
      });
    }}}
)(jQuery);
