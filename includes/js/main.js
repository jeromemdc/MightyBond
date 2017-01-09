$(document).ready(function(){
    $('#mycarousel').jcarousel({scroll:1, visible:700});
    $(".prod-info").organicTabs();

    if(code){
        $('#flag').removeClass('flag-ph').addClass('flag-'+code);
        $('.dp_menu_option li.' + code).hide();
        $('#cname').html(country);
    }else{
       $('#flag').addClass('flag-ph');
        $('#cname').html('Philippines');    
    }

    $('.fancybox-media').attr('rel', 'media-gallery').fancybox({
        openEffect : 'none',
        closeEffect : 'none',
        prevEffect : 'none',
        nextEffect : 'none',
        arrows : false,
        helpers : {
          media : {},
          buttons : {}
        }
    });

    $('ul.items-1 li').click( function() {
        var mat1 = $.trim($(this).text());
        $('ul.items-1 li .mat-name').removeClass('active');
        $(this).children('.mat-name').addClass('active');
        $('#material1').val(mat1);
        $('.items-2').children('.mat').addClass('disabled');
        $('ul.items-2 li .mat-name').removeClass('active');
        
        $.post( BASE_URL + 'fixit/equation_link', { mat1: mat1}, function(data) {
            var obj = $.parseJSON( data );

            $('#image_equation_one').attr('src', BASE_URL + 'uploads/materials/' + obj.image);
            $.each(obj.materials, function (index, value){
                $('.'+ value).removeClass('disabled');
            });    
        });
    });

    $('ul.items-2 li').click( function() {
        if(!$('.mat-cont-2').hasClass('disabled')){
            $('ul.items-2 li .mat-name').removeClass('active');
            $(this).children('.mat-name').addClass('active');
            
            var mat1 = $.trim($('ul.items-1 li .active').text());
            var mat2 = $.trim($('ul.items-2 li .active').text());


            $('#material1').val(mat1);
            $('#material2').val(mat2);

            $('#choices').html('<div class="ef-choice active" rel="1">None</div>');
     

            //revision by hercival 01-16-2014
            $('.ext-fac').removeClass('disabled');
            $('#submit').removeAttr('disabled');
            var ef_title_src = $('#ef-title').attr('src');
            ef_title_src_new = ef_title_src.replace('-disabled', '');
            $('#ef-title').attr('src', ef_title_src_new);
            
            $('.ef-btn ').attr('alt','yes');
            var left_src = $('.ef-btn.left img').attr('src');
            left_src_new = left_src.replace('-disabled', '');
            $('.ef-btn.left img').attr('src', left_src_new);

            var right_src = $('.ef-btn.right img').attr('src');
            right_src_new = right_src.replace('-disabled', '');
            $('.ef-btn.right img').attr('src', right_src_new);
            
            $.post( BASE_URL + 'fixit/equation_link2', { mat1: mat1, mat2: mat2 }, function(data) {
                var obj = $.parseJSON( data );
                $('#image_equation_two').attr('src', BASE_URL + 'uploads/materials/' + obj.image);
                var i = 2;
                $.each(obj.external, function (index, value){
                    $("#choices" ).append('<div class="ef-choice inactive" rel="'+i+'">'+ value +'</div>');
                    i++;
                });

            });
            
        }
        
    });

    var $ef = 1;
    
    $('.ef-btn.left').click( function() {
       var count = $("#choices div").length;
        
        
        var clickable = $(this).attr('alt'); //revision by hercival 01-16-2014
        if(clickable == 'yes'){ //revision by hercival 01-16-2014
            $ef--;
            if($ef <= 0) { $ef = count; console.log('test'); }
             console.log($ef+' '+count);

            //console.log($ef);

            $('#choices').children('.ef-choice').addClass('inactive').removeClass('active');
            $('#choices').children('div[rel="'+$ef+'"]').addClass('active').removeClass('inactive');
            var factor = $('#choices').children('div[rel="'+$ef+'"]').text();
            factor = $.trim(factor);
            $('#ex_factor').val(factor);
            $('#equation_factors').text(factor);
        }
        
    });

    $('.ef-btn.right').click( function() {
        var count = $("#choices div").length;
        var clickable = $(this).attr('alt'); //revision by hercival 01-16-2014
        if(clickable == 'yes'){ //revision by hercival 01-16-2014
            $ef++;
            if($ef > count) { $ef = 1; }

            $('#choices').children('.ef-choice').addClass('inactive').removeClass('active');
            $('#choices').children('div[rel="'+$ef+'"]').addClass('active').removeClass('inactive');
            var factor = $('#choices').children('div[rel="'+$ef+'"]').text();
            factor = $.trim(factor);
            $('#ex_factor').val(factor);
            $('#equation_factors').text(factor);
            
        }
    });

    $('.multiple-items').slick(slickCarousel());
    $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
        $('.multiple-items').slick('unslick').slick(slickCarousel());
    });

 


});

function slickCarousel(){
    
    return {
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        prevArrow: '<span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="left: -3%;"></span>',
        nextArrow: '<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="right: -3%;"></span>'
      }

}