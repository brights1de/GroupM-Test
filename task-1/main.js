$(function () {

    $('.item button').on('click', function () {

        var nextButton;
        var limit = parseInt($(this).text());
        var offset = parseInt($(this).text() - $(this).attr('id'));
        var counter = parseInt($(this).attr('id'));
        var prevButton = $(this).clone(true);

        if (offset < 0 || offset == 0) {

            limit = offset == 0 ? 1 : limit;

            for (counter; counter > limit; counter--) {

                nextButton = $('#' + counter);
                $(nextButton).text($(nextButton).parent().prev('.item').children('button').text());
                $(nextButton).parent().prev('.item').children('button').text(prevButton.text());
                prevButton = $(nextButton).parent().prev('.item').clone(true);

            }

        } else if (offset > 0) {

            for (counter; counter < limit; counter++) {

                nextButton = $('#' + counter);
                $(nextButton).text($(nextButton).parent().next('.item').children('button').text());
                $(nextButton).parent().next('.item').children('button').text(prevButton.text());
                prevButton = $(nextButton).parent().next('.item').clone(true);

            }

        }


    });

});
