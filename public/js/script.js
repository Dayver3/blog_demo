$(function () {

    let forms = $('.homeCommentForm');
    let getCommentsInput = $('.homeCommentSubmit');
    let post;
    let post_id;
    let childrenForms;


    forms.each(function () {
        $(this).children('[type = button]').on('click', function () {
            // console.log($(this).siblings().val());
            $.post(
                $(this).parent().attr("action"),
                {
                    comment: $(this).siblings().val(),
                    parent_id: 0
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
                // forms.css('display', 'block');
                // $('#homeCommentDiv').css('display', 'block');

                commentCollection.last().append(username, fullDate, text, '<br>');
                $('input[type = text]').val('');
            }

        })
    });

    getCommentsInput.each(function () {
        $(this).on('click', function () {
            // console.log($(this).parent().attr('action'));
            //   console.log($(this).parent().parent().attr('id'));
            post = $(this).parent().parent();
            post_id = post.attr('id');
            $.post(
                $(this).parent().attr('action'),
                {},
                onAjaxSuccess
            );

            function onAjaxSuccess(data) {
                post.children('#homeCommentDiv').css('display', 'block');
                post.children('#displayCommentsButton' + post_id).css('display', 'none');
                post.children('.homeCommentDiv').html(data);
                childrenForms = $(".homeChildCommentSubmit");
                // console.log(childrenForms);

                childrenForms.each(function () {
                    $(this).on('click', function () {
                        // console.log( +(($(this).parent().attr('id')).match(/\d+/))[0]);
                        $.post(
                            $('.homeCommentForm').first().attr('action'),
                            {
                                parent_id: +(($(this).parent().attr('id')).match(/\d+/))[0],
                                comment: $(this).siblings().val()
                            },
                            onAjaxSuccess()
                        );

                        function onAjaxSuccess(data) {
                            console.log(data);
                        }
                    })
                })


                // childrenForms.each(
                //     $(this).on('click', function () {
                // console.log($(this).parent().attr('id'));
                // $.post(
                //     $(this).parent().attr("action"),
                //     {parent_id: },
                //     onAjaxSuccess()
                // );

                // function onAjaxSuccess() {
                //
                // }
                // })
                // );

            }
        })
    });


});

