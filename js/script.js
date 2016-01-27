$(document).on("click", "[id^=navbar-]", function() {
    if (!($(this).hasClass('active'))) {
        $('.nav-sidebar .active').removeClass('active');
        $('.dropdown-menu .active').removeClass('active');
        $(this).addClass('active');

        $clicked = $(this);
        
        $('.placeholders').fadeOut('slow', function() {
            $('.placeholders').remove();    
            if ($clicked.attr('id') == 'navbar-playable') {
                $('#sidebar-playable').addClass('active');
                load_characters();
            }
            else if ($clicked.attr('id') == 'navbar-npcs'){
                $('#sidebar-npcs').addClass('active');
                load_npcs();
            }
            else if ($clicked.attr('id') == 'navbar-statistics') {
                $('#sidebar-npcs').addClass('active');
                load_statistics();
            }
            else if ($clicked.attr('id') == 'navbar-compare') {
                $('#sidebar-npcs').addClass('active');
                load_compare();  
            }
        });
    }
});

$(document).on("click", "[id^=sidebar-]", function() {
    if (!($(this).hasClass('active'))) {
        $('.nav-sidebar .active').removeClass('active');
        $('.dropdown-menu .active').removeClass('active');
        $(this).addClass('active');

        $clicked = $(this);
        
        $('.placeholders').fadeOut('slow', function() {
            $('.placeholders').remove();    
            if ($clicked.attr('id') == 'sidebar-playable') {
                $('#navbar-playable').addClass('active');
                load_characters();
            }
            else if ($clicked.attr('id') == 'sidebar-npcs'){
                $('#navbar-npcs').addClass('active');
                load_npcs();
            }
            else if ($clicked.attr('id') == 'sidebar-statistics') {
                $('#navbar-npcs').addClass('active');
                load_statistics();
            }
            else if ($clicked.attr('id') == 'sidebar-compare') {
                $('#navbar-npcs').addClass('active');
                load_compare();  
            }
        });
    }
});

function load_characters() {
    $.ajax({
      url: 'load_characters.php',
      type: 'POST',
      dataType: 'html'
    }).done(function ( data ) {
        $('.main').append(data);
        $('.characterModule').addClass('moduleIn');
        $('.character').each(function(index) {
            $(this).delay(120*index).queue(function() { $(this).addClass('in').dequeue(); });
        });
    });
}

function load_npcs() {
    $.ajax({
      url: 'load_npcs.php',
      type: 'POST',
      dataType: 'html'
    }).done(function ( data ) {
        $('.main').append(data);
        $('.npcModule').addClass('moduleIn');
        $('.character').each(function(index) {
            $(this).delay(120*index).queue(function() { $(this).addClass('in').dequeue(); });
        });
    });
}

function load_statistics() {
    alert('Statistics');
}

function load_compare() {
    alert('Compare Characters');
}

$(document).on("click", ".character", function() {

    $selector = $(this).children( 'h4' ).text();
    if ($selector == 'Fernando')
        $('#characterDetailsLabel').text('Fernando Miguel Dominguez III'); 
    else   
        $('#characterDetailsLabel').text($selector);
    $('#character-detail-body').html('');

    if ($(this).hasClass('character-playable')) {
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
    }
    else if ($(this).hasClass('character-npc')) {
        $.ajax({
          url: 'generate_npc_stats.php',
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
    }
    
});

$(document).on("click", "#search-button", function() {

    $(".character-grid").fadeOut(350, function() { $(this).remove(); });
    setTimeout(populateGrid, 350);
});

$(document).on("click", "#search-button-npcs", function() {

    $(".character-grid").fadeOut(350, function() { $(this).remove(); });
    setTimeout(populateGridNPC, 350);
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
        $(this).delay(120*index).queue(function() { $(this).addClass('in').dequeue(); });
        });
    });
}

function populateGridNPC() {
    $.ajax({
      url: 'search_generate_grid_npc.php',
      type: 'POST',
      dataType: 'html',
      data: {select_gender: $('#select-gender option:selected').text(),
                 select_nation: $('#select-nation option:selected').text(),
                     select_location: $('#select-location option:selected').text()}
    }).done(function ( data ) {
      $('#character-grid-container').append(data);
      $('.character').each(function(index) {
        $(this).delay(120*index).queue(function() { $(this).addClass('in').dequeue(); });
        });
    });
}