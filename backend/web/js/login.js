/**
 * Created by TheCodeholic on 10/30/2019.
 */
$(function () {
  'use strict';

  $('.login-wrapper').ready(function () {
    $('.login-form').submit(function () {
      window.location.href = window.location.href + "/../";
      return false;
    });
    $('.signup-form').submit(function () {
      return false;
    });
    $('.pass-forgot-form').submit(function () {
      return false;
    });
  });
  $('.btn-forgot-password').click(function (ev) {
    var $form = $(this).closest('form');
    $form.removeClass('visible');
    $form.parent().find('.pass-forgot-form').addClass('visible');
  });
  $('.btn-sign-in').click(function () {
    var $form = $(this).closest('form');
    $form.removeClass('visible');
    $form.parent().find('.login-form').addClass('visible');
  });
  $('.btn-sign-up').click(function () {
    var $form = $(this).closest('form');
    $form.removeClass('visible');
    $form.parent().find('.signup-form').addClass('visible');
  });
});
