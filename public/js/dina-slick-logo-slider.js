// (function($) {
$('.dina_logo_slider-container').each(function() {
    const settings = $(this).data('settings');

    $(this).slick(settings);

    const parent = $(this).find('.slick-list');
    parent.css({
        margin: `0 -${settings.spaceBetween}`,
    });

    const child = $(this).find('.slick-list .dina_logo_slider_child');
    child.css({
        margin: `0 ${settings.spaceBetween}`,
    });
});
