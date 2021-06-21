const HEADER = $('header');
const HEADERSPACER = $('.headerSpace')

HEADERSPACER.height(HEADER.height())

let id = 0;
let lastScrollTop = 0;
let shown = false;
let st;
$('.mainPage').scroll(function (e) {
	HEADERSPACER.height(HEADER.height())
	id++;
	st = $(this).scrollTop()
	if (st == lastScrollTop) return
	if (st<lastScrollTop){
		if (!shown) {headerOffScreen(st)}
		doStuffIfNotScrollingAnymore(()=>{
			headerOnScreen();
		})
	} else {
		headerOffScreen(st)
	}
	lastScrollTop = st;
});
$(document).ready(()=>{
	HEADERSPACER.height(HEADER.height())
	HEADER.width(`calc(100% - ${getScrollbarWidth()}px)`)
})

function getScrollbarWidth() {

  // Creating invisible container
  const outer = document.createElement('div');
  outer.style.visibility = 'hidden';
  outer.style.overflow = 'scroll'; // forcing scrollbar to appear
  outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
  document.body.appendChild(outer);

  // Creating inner element and placing it in the container
  const inner = document.createElement('div');
  outer.appendChild(inner);

  // Calculating difference between container's full width and the child width
  const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);

  // Removing temporary elements from the DOM
  outer.parentNode.removeChild(outer);

  return scrollbarWidth;

}

function doStuffIfNotScrollingAnymore(cb){
	let thisID = id+1;
	setTimeout(() => {
		if (thisID === id){
			cb()
		}
	}, 300);
}

function headerOffScreen(st){

	let h = HEADER.height()
	shown = false;
	if (st > h){ 

		HEADER.css({
			top: -HEADER.height()
		})

	} else {
		HEADER.css({
			top: -st,
			transition: "none"
		})
		setTimeout(() => {
			HEADER.css({
				transition: "top 200ms, transform 400ms"
			})
		}, 10);
	}

}

function headerOnScreen(st){
	shown = true;
	HEADER.css({
		top: 0
	})
}
