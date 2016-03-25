
// ========================
// Loading functions
// ========================	
$(document).ready(function(){

    // Navigation
    // -------------------
    $('#nav').onePageNav({
        currentClass: 'active',
        changeHash: true,
        scrollSpeed: 750
     });


    // Masonry
    // -------------------
    var $grid = $('.grid, .grid-home').imagesLoaded( function() {
        $grid.masonry({
            itemSelector: '.item-portafolio',
            percentPosition: true
        });
    });


    // Lightbox
    // -------------------
    $('.grid').magnificPopup({
        type:'image',
        delegate: 'a',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1]
        }
    });


});
