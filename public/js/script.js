// $('button').on('click', function () {
//         let button = $(this);
//
//
//         $.ajax({
//             method: "POST",
//             url: "comment/addComment",
//             dataType: "json",
//             data: {
//                 "name": btn.val(),
//                 'input': $('input').val()
//             },
//             success: function(data) {
//                 console.log(data);
//             },
//             error: function(er) {
//                 console.log(er);
//             }
//         });
//     });

// var App = function () {
//     var $html,
//         $body,
//         $form;
//
//     var init = function () {
//         $html = $('html');
//         $body = $('body');
//         $form = $('#form');
//     };
//
//     var loader = function ($mode) {
//         var $loader = $('#loader');
//
//         if ($mode === 'show') {
//             if ($loader.length) {
//                 $loader.fadeIn(250);
//             } else {
//                 $body.prepend('<div id="loader"></div>');
//             }
//         } else if ($mode === 'hide') {
//             if ($loader.length) {
//                 $loader.fadeOut(250);
//             }
//         }
//
//         return false;
//     };
//
//     return {
//         init: function () {
//             init();
//             loader('hide');
//         },
//         loader: function ($mode) {
//             loader($mode);
//         },
//         send: function () {
//             $.ajax({
//                 url: $form.attr('action'),
//                 type: 'post',
//                 dataType: 'json',
//                 data: decodeURIComponent($form.serialize()),
//                 beforeSend: function () {
//                     loader.time = Date.now();
//                     loader('show');
//                 },
//                 complete: function () {
//                     if (Date.now() - loader.time < 500) {
//                         setTimeout(function () {
//                             loader('hide');
//                         }, 500);
//                     } else {
//                         loader('hide');
//                     }
//                 },
//                 success: function (json) {
//                     $('.alert-dismissible').remove();
//                     if (json['error']) {
//                         $('#content').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
//                     }
//                     if (json['redirect']) {
//                         window.location = json['redirect'];
//                     }
//                 },
//                 error: function (xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//     };
// }();
//
// $(document).ready(function () {
//     App.init();
// });

