/* COMEÇO slides */
$("#slideshow > div:gt(0)").hide();

setInterval(function () {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);
/* FIM slides */

/*COMEÇO smooth scroll */
$(document).on('click', '.menu a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});
/*FIM smooth scroll */




$(function() {
    $('.error').hide();
    if($('div#cad_comentario:visible').length != 0){
      $("button.button").click(function() {
        // validate and process form here
        $('.error').hide();
        var nota = $('input[name="nota"]:checked').val();
        if (nota == null || $('div#cad_comentario:visible').length == 0) {
        $("label#nota_error").show();
        $("ul#stars").focus();
        return false;
        }
      });
    }
  });
