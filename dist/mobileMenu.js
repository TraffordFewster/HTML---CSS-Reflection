"use strict";

var mobileMenuElements = [{
  element: $(".menu"),
  toggle: "menuTog"
}, {
  element: $(".sideMenu"),
  toggle: "sMExpanded"
}, {
  element: $(".mainPage"),
  toggle: "mPExpanded"
}, {
  element: $(".mainPageCover"),
  toggle: "mPCExpanded"
}];

var toggleMobileMenu = function toggleMobileMenu() {
  console.log("GETY");
  mobileMenuElements.forEach(function (v, i) {
    console.log(v);
    v.element.toggleClass(v.toggle);

    if (v.toggle === "mPCExpanded") {
      if (v.element.hasClass("d-none")) {
        v.element.toggleClass("d-none");
      } else {
        setTimeout(function () {
          v.element.toggleClass("d-none");
        }, 200);
      }
    }
  });
};

$(".menu").click(toggleMobileMenu);
$(".mainPageCover").click(toggleMobileMenu);
$(document).click(function (e) {
  console.log(e);
});