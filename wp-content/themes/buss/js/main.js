document.addEventListener('DOMContentLoaded', function () {
    console.log('document ready');
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        slidesPerView: 1,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    const swiper_el = this.querySelector('.services__swiper')
    let swiper_services = null;
    let breakpoint = window.matchMedia('(min-width:768px)');
    let breakpointChecker = function() {
        if ( breakpoint.matches === true ) {
            swiper_el.querySelectorAll(".swiper-slide:not(.slide-title)").forEach((item) => {
                item.style.backgroundImage = "url('"+item.dataset.bg+"')";
            })
            return enableSwiper();
        } else if ( breakpoint.matches === false ) {
            if (swiper_services) swiper_services.destroy( true, true );
            swiper_el.querySelectorAll(".swiper-slide:not(.slide-title)").forEach((item) => {
                item.style.backgroundImage = "url('"+item.dataset.bg+"')";
            })
            return;
        }
    };
    const enableSwiper = function() {
        swiper_services = new Swiper(swiper_el, {
            speed: 400,
            spaceBetween: 30,
            height: 600,
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
        });
    };
    breakpoint.addListener(breakpointChecker);
    breakpointChecker();

    document.querySelectorAll("input[name='tab']").forEach((input) => {
        input.addEventListener('change', function(e) {
            document.querySelector(".steps__tab.active").classList.remove('active');
            document.querySelector(".steps__tabControls .active").classList.remove('active');
            document.querySelector(".steps__tab[data-tab='"+e.target.value+"']").classList.add('active');
            document.querySelector(".steps__tabControls [for='"+e.target.value+"']").classList.add('active');
        });
    });

    document.querySelectorAll('[data-popup]').forEach((elem) => {
        elem.addEventListener('click', (e) => {
            e.preventDefault();
            setTimeout(() => {
                document.body.classList.add('show-modal');
                const content = document.querySelector('#popup__' + e.target.dataset.popup);
                content.style.display = 'block';
                if (content.dataset.src) {
                    content.querySelector('iframe').src = content.dataset.src;
                }
                if (e.target.dataset.popup == 'services') {
                    let html_content = e.target.parentElement.querySelector('.services__description').innerHTML;
                    console.log(html_content);
                    content.querySelector('.text-container').innerHTML = html_content;
                }
            }, 50);

            document.querySelectorAll('.popup__close').forEach((elem) => {
                elem.addEventListener('click', (e)  => {
                    e.preventDefault();
                    setTimeout(() => {
                        document.body.classList.remove('show-modal');
                        document.querySelectorAll('.popup .popup__wrapper .popup__content').forEach((elem) => {
                            elem.style.display = 'none';
                            if (elem.dataset.src) {
                                elem.querySelector('iframe').src = "";
                            }
                        })
                    }, 50)
                })
            })
        })
    })

    const allRanges = document.querySelectorAll(".range-wrap");
    allRanges.forEach(wrap => {
        const range = wrap.querySelector(".range");
        const bubble = wrap.querySelector(".bubble");

        range.addEventListener("input", () => {
            setBubble(range, bubble);
        });
        setBubble(range, bubble);
    });

    function setBubble(range, bubble) {
        const val = range.value;
        const min = range.min ? range.min : 0;
        const max = range.max ? range.max : 100;
        const newVal = Number(((val - min) * 100) / (max - min));
        bubble.innerHTML = val;

        // Sorta magic numbers based on size of the native UI thumb
        bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;

        const value = range.value

        range.style.background = `linear-gradient(to right, #FF3A1D 0%, #FF3A1D ${(value-min)/(max-min)*100}%, #FFE6D8 ${(value-min)/(max-min)*100}%, #FFE6D8 100%)`

        range.oninput = function() {
            this.style.background = `linear-gradient(to right, #FF3A1D 0%, #FF3A1D ${(this.value-this.min)/(this.max-this.min)*100}%, #FFE6D8 ${(this.value-this.min)/(this.max-this.min)*100}%, #FFE6D8 100%)`
        };

    }

    const calculator = document.querySelector(".calculator");
    calculator.querySelectorAll(" .cta").forEach((button) => {
        button.addEventListener('click', function (e) {
            calculator.querySelector(".calculator__result").style.display = "flex";
        })
    })
}, false);