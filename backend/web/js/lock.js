/**
 * Created by TheCodeholic on 10/30/2019.
 */
$(function () {
  'use strict';
  var CONFIG = window.LobiAdminConfig;
  $('.lock-screen-form').submit(function (ev) {
    window.location.href = window.location.origin + window.location.pathname.replace('lock.html', "index.html");
    return false;
  });
  //Initialize time on lock screen and timeout for show slideshow
  (function () {
    var monthNames = CONFIG.monthNames;
    var weekNames = CONFIG.weekNames;
    setInterval(function () {
      var d = new Date();
      var h = d.getHours();
      var m = d.getMinutes();
      $('.lock-screen-time').html((Math.floor(h / 10) === 0 ? "0" : "") + h + ":" + (Math.floor(m / 10) === 0 ? "0" : "") + m);
      $('.lock-screen-date').html(weekNames[d.getDay()] + ", " + monthNames[d.getMonth()] + " " + d.getDate());
    }, CONFIG.updateTimeForLockScreen);

  })();
  //Initialize carousel and catch form submit
  (function () {
    var $lock = $('.lock-screen');
    var $car = $lock.find('.carousel');
    $car.click(function () {
      $car.parent().addClass('slideOutUp').removeClass('slideInDown');
      setTimeout(function () {
        $('.lock-screen .carousel-wrapper').removeClass('slideOutUp').addClass('slideInDown');
      }, CONFIG.showLockScreenTimeout);
    });
    $car.carousel({
      pause: false,
      interval: 8000
    });
  })();
});
