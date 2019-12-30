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


                // childrenForms.each(function () {
                //     $(this).on('click', function () {
                //         // console.log( +(($(this).parent().attr('id')).match(/\d+/))[0]);      //TODO: 'regular expression';
                //         $.post(
                //             $('.homeCommentForm').first().attr('action'),
                //             {
                //                 parent_id: +(($(this).parent().attr('id')).match(/\d+/))[0],
                //                 comment: $(this).siblings().val()
                //             },
                //             onAjaxSuccessFunc
                //         );
                //
                //         function onAjaxSuccessFunc(data) {
                //             let jsonObj = JSON.parse(data);
                //             console.log(jsonObj);
                //             let parent_post = $('#commentId' + jsonObj.parent_id);
                //             let childPost = parent_post.clone();
                //             childPost.attr('id', 'childrenComment' + jsonObj.parent_id);
                //             childPost.children('#commentFormId' + jsonObj.parent_id).attr('id', 'childrenCommentFormId' + jsonObj.parent_id);
                //             childPost.children('p').first().text(jsonObj.now_date);
                //             childPost.children('p').last().text(jsonObj.comment);
                //             childPost.children('h5').first().text(jsonObj.author);
                //             childPost.css('margin-left', (childPost.css('margin-left') + 20) + 'px');
                //             $('input[type = text]').val('');
                //             parent_post.append(childPost);
                //             console.log(+childPost.css('margin-left').match(/\d+/)[0]);
                //             console.log(parent_post);
                //         }
                //     })
                // })


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

