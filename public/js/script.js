var lastScrollTop = 0;
navbar = document.getElementById("navbar");
window.addEventListener("scroll", function(){
    var scrollTop = window.pageYOffset || document.body.scrollTop;
    if (scrollTop > lastScrollTop) {
        navbar.style.top = "-80px";
    } else {
        navbar.style.top = "0";
    }
    lastScrollTop = scrollTop;
});

document.addEventListener("DOMContentLoaded", function(){

    el_autohide = document.querySelector('.navbar');

    if(el_autohide){
        var last_scroll_top = 0;
        window.addEventListener('scroll', function() {
                let scroll_top = window.scrollY;
            if(scroll_top < last_scroll_top) {
                    el_autohide.classList.remove('scrolled-down');
                    el_autohide.classList.add('scrolled-up');
                }
                else {
                    el_autohide.classList.remove('scrolled-up');
                    el_autohide.classList.add('scrolled-down');
                }
                last_scroll_top = scroll_top;
        });
    }
});

const gallery = document.querySelector('.gallery');
const jumbo = document.querySelector('.jumbo');
const jumboBg = document.querySelector('.jumbo-bg');
const thumbs = document.querySelectorAll('.thumb');

gallery.addEventListener('click', function(e) {
    if (e.target.className == 'thumb') {
        jumbo.src = e.target.src;
        jumboBg.src = e.target.src;

        thumbs.forEach(function(thumb) {
            if (thumb.classList.contains('selected')) {
                thumb.classList.remove('selected');
            }
        });
        e.target.classList.add('selected');
    }
});

