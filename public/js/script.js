$(function () {

    let forms = $('.homeCommentForm');

    forms.each(function () {
        $(this).children('[type = button]').on('click', function () {

            $.post(
                $(this).parent().attr("action"),
                {
                    comment: $(this).siblings().val(),
                },
                onAjaxSuccess
            );

            function onAjaxSuccess(data) {
                let json = JSON.parse(data);
                let post = $("#" + json.post_id);
                let commentCollection = post.children('.homeCommentDiv');
                let username = $('<h5></h5>').text(json.author + ':');
                let fullDate = $('<p class="addedDate"></p>').text(json.now_date);
                let text = $('<p></p>').text(json.comment);

                commentCollection.last().append(username, fullDate, text, '<br>');
                $('input[type = text]').val('');
            }


        })
    });

});

