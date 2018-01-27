$(document).ready(function() {

    $('#searchForm').on('keyup', function(e) {
        e.preventDefault();
        let search = $('#search').val();

        let url = $(this)[0].action + '?search=' + search;
        if (search.length >= 2) {
            $.ajax(url, {
                method: 'get',
                data: search
            }).done(function(response) {
                $('.group-panel').empty();
                $('.group-panel').prepend(response);


            });
        }


    })

    $('#searchForm').submit('click', function(e) {
        e.preventDefault();
        let search = $('#search').val();

        let url = $(this)[0].action + '?search=' + search;
        $.ajax(url, {
            method: 'get',
            data: search
        }).done(function(response) {
            $('.group-panel').empty();
            $('.group-panel').prepend(response);
            $('#search').val('');
        })

    })

});