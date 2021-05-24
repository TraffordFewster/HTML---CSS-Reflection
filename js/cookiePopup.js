const POPUPBOX = $("#cookiePopup");
let acceptedCookied = localStorage.getItem('netmatters_cookiesAccept');
if (!acceptedCookied) {
    POPUPBOX.removeClass("d-none")
}
const cookieAcceptButton = $(".cookieButHolder .acceptButton")

cookieAcceptButton.click(()=>{
    localStorage.setItem('netmatters_cookiesAccept', true)
    POPUPBOX.addClass("d-none")
})