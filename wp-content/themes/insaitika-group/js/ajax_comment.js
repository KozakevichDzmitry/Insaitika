jQuery('document').ready(function ($) {
    var commentform = $('.comment-form');
    var main = $('.main');

    commentform.submit(function (e) {
        e.preventDefault();
        var formdata = $(this).serialize();
        var commentParent = $('#comment_parent', this).val()
        var commentPostID = $('#comment_post_ID', this).val()

        $.ajax({
            type: 'POST',
            url: ajax.ajaxurl,
            data: formdata + '&action=sendcomment',
            success: function (response) {
                var post=$('#post_' + commentPostID);
                if(commentParent === '0'){
                    $('.comment-list', post).append(response)

                }else{
                    var coment =$('#comment-'+commentParent)
                    if(coment.children('.children').length > 0){
                        coment.children('.children').append(response)
                    }else{
                        coment.after( '<ol class="children">' + response + '</ol>' );
                    }
                }
                $('textarea', e.target).val('')
            },
        });
    });

    main.click(function(e){
        if($(e.target).hasClass( "comment-reply-link" )){
            e.preventDefault();
            var commentID = $(e.target).data('commentid')
            var postID = $(e.target).data('postid')
            var post=$('#post_' + postID);
            $('#comment_parent', post).val(commentID);
            var text= $(e.target).data('replyto');
            var indexGrap = text.indexOf(" ");
            text =text.substring(indexGrap);
            $('#cancel-comment-reply-link', post).html(text).css("display", "inline-block");
        }else if($(e.target).is( "#cancel-comment-reply-link" )){
            e.preventDefault();
            var comments= $(e.target).closest( '#comments')
            $('#comment_parent', comments).val('0')
            $(e.target).html('').css("display", "inline-block");
        }
    })
});
