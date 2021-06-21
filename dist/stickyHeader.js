"use strict";

var HEADER = $('header');
var HEADERSPACER = $('.headerSpace');
HEADERSPACER.height(HEADER.height());
var id = 0;
var lastScrollTop = 0;
var shown = false;
var st;
$('.mainPage').scroll(function (e) {
  HEADERSPACER.height(HEADER.height());
  id++;
  st = $(this).scrollTop();
  if (st == lastScrollTop) return;

  if (st < lastScrollTop) {
    if (!shown) {
      headerOffScreen(st);
    }

    doStuffIfNotScrollingAnymore(function () {
      headerOnScreen();
    });
  } else {
    headerOffScreen(st);
  }

  lastScrollTop = st;
});
$(document).ready(function () {
  HEADERSPACER.height(HEADER.height());
  HEADER.width("calc(100% - ".concat(getScrollbarWidth(), "px)"));
});

function getScrollbarWidth() {
  // Creating invisible container
  var outer = document.createElement('div');
  outer.style.visibility = 'hidden';
  outer.style.overflow = 'scroll'; // forcing scrollbar to appear

  outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps

  document.body.appendChild(outer); // Creating inner element and placing it in the container

  var inner = document.createElement('div');
  outer.appendChild(inner); // Calculating difference between container's full width and the child width

  var scrollbarWidth = outer.offsetWidth - inner.offsetWidth; // Removing temporary elements from the DOM

  outer.parentNode.removeChild(outer);
  return scrollbarWidth;
}

function doStuffIfNotScrollingAnymore(cb) {
  var thisID = id + 1;
  setTimeout(function () {
    if (thisID === id) {
      cb();
    }
  }, 300);
}

function headerOffScreen(st) {
  var h = HEADER.height();
  shown = false;

  if (st > h) {
    HEADER.css({
      top: -HEADER.height()
    });
  } else {
    HEADER.css({
      top: -st,
      transition: "none"
    });
    setTimeout(function () {
      HEADER.css({
        transition: "top 200ms, transform 400ms"
      });
    }, 10);
  }
}

function headerOnScreen(st) {
  shown = true;
  HEADER.css({
    top: 0
  });
}