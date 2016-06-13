// Mostrar boto i descripcio:

$(".producte .comprar").hide();

$(".producte").hover(
    function() {
        $(this).find('.comprar').slideToggle(500);
    },
    function() {
        $(this).find('.comprar').slideToggle(500);
    });

$(".producte .descrip").hide();

$(".producte").hover(
    function() {
        $(this).find('.descrip').slideToggle(500);
    },
    function() {
        $(this).find('.descrip').slideToggle(500);
    });
// Confirmació eliminar:

$(".eliminar").on('click', function() {

    if (confirm("Segur que ho vols eliminar?")) {
    }

});

