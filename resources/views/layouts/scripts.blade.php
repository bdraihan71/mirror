<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script src="/frontend/vendor/jquery/popper.min.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Scripts for WOW -->
<script src="/frontend/vendor/animate/wow.min.js"></script>
<!-- Scripts for OWL -->
<script src="/frontend/vendor/owl/js/owl.carousel.min.js"></script>
<!-- Scripts for Fullpage -->
<script src="/frontend/vendor/fullpage/fullpage.min.js"></script>
<!-- Custom scripts -->
<script src="/frontend/js/script.js"></script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

<script>
    $(".filter").change(function () {
        var filterValue = $(this).val();
        var row = $('.filter-row');

        row.hide()
        row.each(function (i, el) {
            if ($(el).attr('data-type') == filterValue) {
                $(el).show();
            }
        })

    });
</script>

<script>
$('.navbar-toggler-icon').on('click', function () {
    if ($('.menu').is(":visible")) {
        $('.menu').hide();
    } else {
        $('.menu').show();
    }
});
$( '.menu a' ).on("click", function(){
    $('.menu').hide();
});

</script>

<script>
    $(document).ready(function(){
        $(".mouse-hover").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });
    });
</script>

<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

<script>
    $(document).ready(function() {
        $('#fullpage').fullpage({
        anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
        css3: true,
        scrollingSpeed: 1000,
        navigation: true,
        slidesNavigation: true,
        responsiveHeight: 330,
        dragAndMove: true,
        dragAndMoveKey: 'YWx2YXJvdHJpZ28uY29tX0EyMlpISmhaMEZ1WkUxdmRtVT0wWUc=',
        controlArrows: false,
        autoScrolling:false
        });
    });
    
    (function($){
        window.onbeforeunload = function(e){    
            window.name += ' [' + location.pathname + '[' + $(window).scrollTop().toString() + '[' + $(window).scrollLeft().toString();
        };
        $.maintainscroll = function() {
            if( parts[parts.length - 3] == location.pathname ){ window.scrollTo(parseInt(parts[parts.length - 1]), parseInt(parts[parts.length - 2])); }   
        };  
        $.maintainscroll();
    })(jQuery);
    
    
    $(document).ready(function(){

        $('.partners-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false,
                autoplay:true
            },
            600:{
                items:3,
                nav:false,
                autoplay:true
            },
            1000:{
                items:6,
                nav:true,
                autoplay:true
            }
        }
    });

});
</script>

<script>
    $(document).ready(function(){

        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');
            
            if(value == "all")
            {
                //$('.filter').removeClass('hidden');
                $('.filter').show('1000');
            }
            else
            {
        //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
        //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');
                
            }
        });

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");

    });
</script>

<script>
		
    $(function() {
            var selectedClass = "";
            $(".fil-cat").click(function(){ 
            selectedClass = $(this).attr("data-rel"); 
         $("#portfolio").fadeTo(100, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
          $("."+selectedClass).fadeIn().addClass('scale-anm');
          $("#portfolio").fadeTo(300, 1);
        }, 300); 
            
        });
    });





</script>

<script>
    $(document).ready(function() {
        $('#fullpage').fullpage({
        anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
        css3: true,
        scrollingSpeed: 1000,
        navigation: true,
        slidesNavigation: true,
        responsiveHeight: 330,
        dragAndMove: true,
        dragAndMoveKey: 'YWx2YXJvdHJpZ28uY29tX0EyMlpISmhaMEZ1WkUxdmRtVT0wWUc=',
        controlArrows: false,
        autoScrolling:false
        });
    });
    
    
    
    
    $(document).ready(function(){

        $('.partners-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false,
                autoplay:true
            },
            600:{
                items:3,
                nav:false,
                autoplay:true
            },
            1000:{
                items:6,
                nav:true,
                autoplay:true
            }
        }
    });

});


$(document).ready(function () {
      // Hide the div
      $("#div1").hide();
      // Show the div after 5s
      $("#div1").delay(500).fadeIn(300);  
  });
</script>

<script>
    $(document).ready(function(){

$(".filter-button").click(function(){
    var value = $(this).attr('data-filter');
    
    if(value == "all")
    {
        //$('.filter').removeClass('hidden');
        $('.filter').show('1000');
    }
    else
    {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.'+value).hide('3000');
        $('.filter').filter('.'+value).show('3000');
        
    }
});

if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

<script>
    
    $(function() {
            var selectedClass = "";
            $(".fil-cat").click(function(){ 
            selectedClass = $(this).attr("data-rel"); 
         $("#portfolio").fadeTo(100, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
          $("."+selectedClass).fadeIn().addClass('scale-anm');
          $("#portfolio").fadeTo(300, 1);
        }, 300); 
            
        });
    });





</script>