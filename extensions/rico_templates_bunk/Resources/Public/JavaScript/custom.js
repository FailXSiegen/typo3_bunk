var animationObject

$(window).on('load', function () {
  animationObject = $('.animatecss')
  addAnimations()
  $(window).scroll()
})
$(window).scroll(function () {
  addAnimations()
})
$(function () {
  $('.count').each(function () {
    let $this = $(this)
    $this.inViewport(function (px) {
      if (px > 250 && !this.initNumAnim) {
        this.initNumAnim = true
        jQuery({Counter: 0}).animate({Counter: $this.data('countto')}, {
          duration: 1000,
          easing: 'swing',
          step: function () {
            $this.text(Math.ceil(this.Counter))
          },
          complete: function () {
            $this.text(this.Counter)
          }
        })
      }
    })
  })

  $('a[href*="#"]')
    .not('[href="#"]')
    .not('.accordion-toggle')
    .not('[href="#0"]')
    .click(function(event) {
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - 85
          }, 800, function() {
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              return false;
            } else {
              $target.attr('tabindex','-1');
              $target.focus();
            };
          });
        }
      }
    });
  changeHeader($(window).scrollTop())
})
function addAnimations () {
  if (typeof animationObject !== 'undefined' && animationObject.length > 0) {
    animationObject.each(function (index, element) {
      var $currentElement = $(element),
        animationType = $currentElement.data('animatecss')
      if (checkElementVisible($currentElement)) {
        $currentElement.removeClass('invisible').addClass('animated ' + animationType)
      }
    })
  }
}

function checkElementVisible (element) {
  var windowBottomEdge = $(window).scrollTop() + $(window).height()
  var elementTopEdge = element.offset().top
  var offset = 150
  return elementTopEdge + offset <= windowBottomEdge
}

function changeHeader (scrollPos) {
  if (scrollPos > 15) {
    $('#head').addClass('not-scroll-top').removeClass('scroll-top')
  } else {
    $('#head').addClass('scroll-top').removeClass('not-scroll-top')
  }
}
$(function ($, win) {
  $.fn.inViewport = function (cb) {
    return this.each(function (i, el) {
      function visPx () {
        var H = $(this).height(),
          r = el.getBoundingClientRect(), t = r.top, b = r.bottom
        return cb.call(el, Math.max(0, t > 0 ? H - t : (b < H ? b : H)))
      }
      visPx()
      $(win).on('resize scroll', visPx)
    })
  }
}(jQuery, window))
