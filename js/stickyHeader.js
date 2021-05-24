const HEADER = $("header");

let id = 0
let lastScrollTop = 0;
let shown = false;
let st;
$(".mainPage").scroll(function(e) {
    id++
    let thisID = id
    st = $(this).scrollTop();
    if (!shown && st < lastScrollTop) {
        setTimeout(() => {
            // console.log(thisID, id,st,thisID == id) I really should use the debugger
            if (thisID !== id) {return}
            HEADER.css({
                'transform':'translateY('+(st-200)+'px)'
            })
            HEADER.addClass("haveTransition")
            setTimeout(() => {
                HEADER.removeClass("haveTransition")
            }, 200);
            HEADER.css({
                'transform':'translateY('+st+'px)'
            })
            shown = true;
        }, 100);
    } else if (st < lastScrollTop) {
        HEADER.css({
            'transform':'translateY('+st+'px)'
        })
    } else if (st > 200) {
        if (shown) {
            HEADER.addClass("haveTransition")
            HEADER.css({
                'transform':'translateY('+(st-200)+'px)'
            })
            setTimeout(() => {
                HEADER.removeClass("haveTransition")
                HEADER.css({
                    'transform':'translateY(0px)'
                })
            }, 200);
        }
        shown = false;
    } else {

    }
    lastScrollTop = st;
})