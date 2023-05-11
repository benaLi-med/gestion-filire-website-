
$('#btn-slider').click(function(){
    if($('#sliders').hasClass('active')){
        $('#sliders').removeClass('active');
        $('#sliders-background').removeClass('active');
    } else {
        $('#sliders').addClass('active');
        $('#sliders-background').addClass('active');
    }
});


$('#sliders-background').click(function(){
    $('#sliders').removeClass('active');
    $('#sliders-background').removeClass('active');
});

$(document).ready(function(){
    // Add an event listener to the search input
    $("#search-input").on("keyup", function() {
        // Get the value of the search input
        var value = $(this).val().toLowerCase();
        // Filter the table rows based on the search input
        $("#mytable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

