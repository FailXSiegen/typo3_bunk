/**
 * Created by gbisurgi on 28.08.18.
 */
window.requestParallaxFrame = function () {
  return (
    window.requestAnimationFrame       ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame    ||
    window.oRequestAnimationFrame      ||
    window.msRequestAnimationFrame     ||
    function (callback) {
      window.setTimeout(callback, 1000 / 60);
    }
  );
}();

var inViewport = function (rect) {
  return (rect.top + rect.height >= 0 && rect.bottom - rect.height <= window.innerHeight);
};

window.addEventListener('load', function () {
  var elements = Array.prototype.slice.call(document.querySelectorAll('[data-parallax]'));
  elements.forEach(function (e) {
    setParallax(e);
  });
  window.addEventListener('scroll', function () {
    window.requestParallaxFrame(function () {
      elements.forEach(function (e) {
        setParallax(e);
      });
    });
  });
});
function setParallax(e) {
  var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
  var attributes = e.getAttribute('data-parallax').replace(/\s/g,'').split(',');
  var y = Number(attributes[0]) || 0;
  var startCondition = attributes[1] || 'visible';
  var rect = e.getBoundingClientRect();
  var offsetTop = rect.top + scrollTop;
  var move = startCondition === 'asap' ? scrollTop : (scrollTop - offsetTop + window.innerHeight);
  if (inViewport(rect)) {
    e.setAttribute('style', '-webkit-transform: translateY('+ move * y + 'px); -ms-transform: translateY(' + move * y + 'px); transform: translateY(' + move * y + 'px);');
  }
}