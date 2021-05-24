"use strict";

var POPUPBOX = $("#cookiePopup");
var acceptedCookied = localStorage.getItem('netmatters_cookiesAccept');

if (!acceptedCookied) {
  POPUPBOX.removeClass("d-none");
}

var cookieAcceptButton = $(".cookieButHolder .acceptButton");
cookieAcceptButton.click(function () {
  localStorage.setItem('netmatters_cookiesAccept', true);
  POPUPBOX.addClass("d-none");
});