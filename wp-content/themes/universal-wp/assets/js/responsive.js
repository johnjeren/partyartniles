(function($) {
    "use strict";
    $(document).ready(function() {
        function responsive_menu() {

                    function universalMenu() {
                        $('.burger_universal_menu_overlay_normal').find('.menu-item-has-children > a').on('click', function(e) {
                            e.preventDefault();
                            if ($(this).next('ul').is(':visible')) {
                                $(this).removeClass('sub-active').next('ul').slideUp(250);
                            } else {
                                $('.menu-item-has-children > a').removeClass('sub-active').next('ul').slideUp(250);
                                $(this).addClass('sub-active').next('ul').slideToggle(250);
                            }
                        });
                    }

                    universalMenu();

                    function universal_burger_responsive() {
                        $('#open-button').click(function(e) {
                            e.preventDefault();

                            $(this).toggleClass('active');
                            $('body').toggleClass('show-menu');
                        });
                    }

                    universal_burger_responsive();
                    $('.burger_universal_menu_overlay_normal .share-class a').on('click', function(){$('#open-button').trigger('click')});
                };

           $(window).on('load', responsive_menu);

            });
})(jQuery);

