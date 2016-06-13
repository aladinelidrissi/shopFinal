// Mostrar boto i descripcio:

$(".producte .intro").hide();

$(".info").on('click', function() {

    $(this).closest(".producte").find(".intro").show();

});
// Confirmació eliminar:

$(".eliminar").on('click', function() {

    if (confirm("Segur que ho vols eliminar?")) {
    }

});
// Confirmació amagar:

$(".amagar").on('click', function() {

    var thisName = $(this).closest('.producte').find('.panel-heading').text();
    if (confirm("Segur que vols amagar " + thisName + "?")) {
        $(this).closest('.producte').fadeOut();
    }

});
//Restaurar productes amagats.
$(".restaurar").on('click', function() {

    $('.producte').slideDown();

});


$(".dropdown").hover(
    function() {
        $(this).click();
    },
    function() {
        $(this).click();
    });


$(function() {

    $(".sortable").sortable({
        placeholder: "placeholder",
    });

});