$(document).on("click", ".character", function() {

    $selector = $(this).children( 'h4' ).text();
    if ($selector == 'Fernando')
        $('#characterDetailsLabel').text('Fernando Miguel Dominguez III'); 
    else   
        $('#characterDetailsLabel').text($selector);
    $('#character-detail-body').html('');
    $.ajax({
      url: 'generate_character_stats.php',
      type: 'POST',
      dataType: 'html',
      data: {character_name: $selector}
    }).done(function ( data ) {
        $('#character-detail-body').append(data);
        if ($('#character-modal-gender').attr('value') == 'M')
            $('#character-modal-gender').text('Male');
        if ($('#character-modal-gender').attr('value') == 'F')
            $('#character-modal-gender').text('Female');
        if ($('#character-modal-gender').attr('value') == '?')
            $('#character-modal-gender').text('???');
    });
});

$(document).on("click", "#search-button", function() {

    $(".character-grid").fadeOut(400, function() { $(this).remove(); });
    setTimeout(populateGrid, 400);
});

function populateGrid() {

    $.ajax({
      url: 'search_generate_grid.php',
      type: 'POST',
      dataType: 'html',
      data: {select_gender: $('#select-gender option:selected').text(),
                 select_nation: $('#select-nation option:selected').text(),
                     select_location: $('#select-location option:selected').text(),
                         sort_by: $('#sort-by option:selected').text()},
    }).done(function ( data ) {
      $('#character-grid-container').append(data);
      $('.character').each(function(index) {
        $(this).delay(150*index).queue(function() { $(this).addClass('in').dequeue(); });
        });
    });

    
}