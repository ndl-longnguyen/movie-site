var showMessage = document.getElementById('show-msg');
if (showMessage != "") {
    setTimeout(() => {
        if(showMessage){
            showMessage.classList.add("hide-msg");
        }
    }, 5000);
}

var newpassword = document.getElementById('newpassword');
var collapseShow = document.getElementById('collapseShow');
if(newpassword){
    if(newpassword.value != ''){
        if(collapseShow){
            collapseShow.classList.add('show');
        }
    }
}

$(document).ready(function () {
    //slider movie hot
    $(".movie-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 1800,
        draggable: true,
        pauseOnFocus: false,
        swipeToSlide: true,
        cssEase: 'linear',
        prevArrow: `<button type='button' class='slick-prev slick-arrow'><ion-icon name="arrow-back-outline"></ion-icon></button>`,
        nextArrow: `<button type='button' class='slick-next slick-arrow'><ion-icon name="arrow-forward-outline"></ion-icon></button>`,
        dots: true,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    infinite: false,
                },
            },
        ],
        // autoplay: true,
        // autoplaySpeed: 1000,
    });
});

$(document).ready(function () {
    //slider movie trending and new
    $(".trending-movie-slider").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2600,
        draggable: true,
        pauseOnFocus: false,
        swipeToSlide: true,
        cssEase: 'linear',
        prevArrow: `<button type='button' class='slick-prev slick-arrow'><ion-icon name="arrow-back-outline"></ion-icon></button>`,
        nextArrow: `<button type='button' class='slick-next slick-arrow'><ion-icon name="arrow-forward-outline"></ion-icon></button>`,
        dots: true,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    infinite: false,
                },
            },
        ],
        // autoplay: true,
        // autoplaySpeed: 1000,
    });
});


//show hide item search
var document = document.getRootNode(document)

function hideSearchItem() {
 document.getElementById('search-item').style.display = 'none';
}

function showSearchItem() {
    document.getElementById('search-item').style.display = 'block';
   }

$('#search').on('click', ()=>showSearchItem());

document.addEventListener('click', function (event) {
   if (!$(event.target).closest(".search-model").length) {
      hideSearchItem();
   }
})
//end


