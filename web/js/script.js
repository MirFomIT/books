
$(document).ready(function () {

    // $('#comment_form').css('visibility','hidden');
    // $('#new_register').css('visibility','hidden');

    var wh = $('#register_li').css('width');
    $('#login_li').css('width',wh);
    $('#login_li').css('text-align','center');
    // $('.select-quote-text-author').css('visibility', 'hidden');
    //var marginTop =$('.select-quote-text-author').height();
    //  $('.crud').css('margin-top',- marginTop);
    $('.select-quote-text-author').css({'visibility':'hidden','height':'0'});
    /*button contract*/
    $('.btn-contract').on('click', function () {
        $('.about-me-description').css('display','none');
    });
    $('.buy_pdf').on('click', function () {
        $('.contract').css('display','none');
        $('.about-me-description').css('display','inline-block');
    });
    /*end button contract*/

    /*ADMIN*/
    /*select quote*/

    $('.update-quote-author').on('click',function (e) {
        e.preventDefault();
        $('.blockquote-reverse').attr('contentEditable','true');
        var border = {"border-width":"1px","border-style":"solid", "border-color":"red"};
        $('.blockquote-reverse').css(border);
    });
    $('.save-quote-author').on('click',function (e) {
        e.preventDefault();
        var border = {"border-width":"0px","border-style":"none", "border-color":"transparent"};
        $('.blockquote-reverse').css(border);
        $('.blockquote-reverse').attr('contentEditable','false');
    });
    /*end select author text*/

    /*END ADMIN*/

    if($('#date span').text() == 0){
        $('#date').css('display','none');
    }
    if($('#year span').text() == 0){
        $('#year').css('display','none');
    }
    if($('#pubhouse span').text() == 0){
        $('#pubhouse').css('display','none');
        $('#add_text').text('Книга существует в формате рукописи, готовится к изданию');
    }
    if($('#site-count span').text() == 0){
        $('#site-count').css('display','none');
    }
    if($('#img-count span').text() == 0){
        $('#img-count').css('display','none');
    }
    if($('#style span').text() == 0){
        $('#style').css('display','none');
    }
    if($('#alt span').text() == 0){
        $('#alt').css('display','none');
    }
    if($('#price span').text() == 0){
        $('#price').css('display','none');
        $('.buy').addClass('btn-disable');
    }
    if($('#price_pdf span').text() == 0){
        $('#price_pdf').css('display','none');
        $('.buy_pdf').addClass('btn-disable');
    }


    // показать мод. окно основное
    jQuery('#w0').modal({"show":true});

    /*typed text*/
    var typed = new Typed('#example', {
        strings: ['','<p>Привет, друзья!</p>' +
        '<p>От чистого сердца приглашаю Вас</p> ' +
        '<p>совершить вместе со мной путешествие в Антресолевую страну ' +
        'и лично познакомиться с ее загадочными жителями!</p> ' +
        '<p>Дверь в мои сказки открыта для всех -'+
        ' и для малышей, и для взрослых.</p>'+
        ' <p>P.S.</p>'+
        '<p>По секрету делюсь волшебным кодом к Двери:</p> '+
        '<p>Абра-ар, Бурундун, Вьюга-Вьюн, Гагатун, Дзинь-да-да!</p> '+
        '<p>Только тс-с...</p>'+
        '<p>Никому!!!</p>'
        ],
        typeSpeed: 40,
        backSpeed: 0,

        cursorChar: '',
        // shuffle: true,
        smartBackspace: false,
        loop: false
    });
    $('#example').show();

});
function closeModal() {
    $('#w0').modal('toggle');
}


setTimeout(closeModal, 30200);

/*carousel*/
$(".owl-carousel").owlCarousel({
    nav:true,
    loop:true,
});
/*end carousel*/
/*IE scroll*/
$(document).ready(function () {
    if (!$.browser.webkit) {
        $('body').jScrollPane();
    }
});

/*carousel speed*/
$('.carousel').carousel({
    interval: 800
});

//если сессия есть то окно не показывать
// To Store
$(function() {
    $.session.set("myVar", "value");
});

// To Read
var session_var =  $(function() {
    ($.session.get("myVar"));
    jQuery('#w0').modal({"show":false});
});

jQuery(window).scroll(function() {
    // проверка на докрутку до определbенного элемента
    var bottom_block_advertising = $('.bottom-block-advertising').offset().top;
    // console.log(bottom_block_advertising) ;// выводим в консоль смещение  элемента пицца

    //если мы докрутили до нужного элемента
    if ($(window).scrollTop() > '100') {
        // создаем эффекты и анимацию
        $('.right_section').css('display','none');

    }else{
        $('.right_section').css('background-color','red');

    }
    // если докрутил до низа страницы
    if(jQuery(window).scrollTop()+jQuery(window).height()>=jQuery(document).height()){
        jQuery(".bottom_float_menu").hide();
    }
});


/*slider*/

$(".variable").slick({
    dots: true,
    infinite: true,
    variableWidth: true
});


var slideWidth=300;
var sliderTimer;
$(function(){
    $('.slidewrapper').width($('.slidewrapper').children().size()*slideWidth);
    sliderTimer=setInterval(nextSlide,200);
    $('.viewport').hover(function(){
        clearInterval(sliderTimer);
    },function(){
        sliderTimer=setInterval(nextSlide,200);
    });
});

function nextSlide(){
    var currentSlide=parseInt($('.slidewrapper').data('current'));
    currentSlide++;
    if(currentSlide>=$('.slidewrapper').children().size())
    {
        currentSlide=0;
    }
    $('.slidewrapper').animate({left: -currentSlide*slideWidth},300).data('current',currentSlide);
}
/*end slider*/




