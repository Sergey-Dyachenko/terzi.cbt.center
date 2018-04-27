$(document).ready(function() {
    /* FULL PAGE SCROLL */
    $('#fullpage').fullpage({
        menu: '#menu',
        anchors:['firstPage', 'secondPage', 'thirdPage'],
        navigation: true,
        navigationPosition: 'right',
        navigationTooltips: ['First', 'Second', 'Third']

    });

    /* MAGNIFIC POPUP */
    $('.popup-with-form').magnificPopup({
        tClose: 'Закрыть (Esc)',
        type: 'inline',
        preloader: false,
        focus: '#name',
        removalDelay: 160,
        fixedContentPos: true,

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });

    /* MASKED INPUT */
    $(function () {
        $("[name='phone']").mask("+7(999) 999-99-99");
    });

    /*ANIMATION*/
    $('.first-img-box__img').addClass('hidden').viewportChecker({
        classToAdd: 'visible move'
    });

    var $form = $('form#test-form');
    // var $form = $(this).serialize();
    var url = 'https://script.google.com/macros/s/AKfycbz19XYUusz6_q1kHNHoJ9r3imHYyooBKCqCx6AgX2g5Tnmxcw/exec';

    $('#submit-form').on('click', function(e){
      console.log($form);
        e.preventDefault();
       $.ajax({
          url: url,
          method: "GET",
          dataType: "json",
          data: $form.serialize(),
          success: function(){
              console.log('done');
          }
      })

    });

});