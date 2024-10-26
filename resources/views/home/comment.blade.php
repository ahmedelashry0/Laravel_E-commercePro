<div class="comment-section my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="comment-form">
                    <h4 class="mb-4">Leave a Reply</h4>
                    <form method="POST" action="">
                        @csrf
                        <textarea class="form-control mb-3" rows="4" name="comment" placeholder="Your comment here"
                                  required></textarea>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="comment-list my-5 mr-4">--}}
{{--        <h2 class="mb-4">All Comments</h2>--}}
{{--        <div class="comment-item mb-3">--}}
{{--            <b class="comment-author">ahmed</b>--}}
{{--            <p class="comment-text">comment</p>--}}
{{--            <a href="javascript:void(0);" onclick="reply(this)" class="comment-reply">Reply</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-4 " style="display: none">--}}
{{--        <textarea class="form-control mb-3" rows="4" name="comment" placeholder="Your replay here" required></textarea>--}}
{{--        <button type="submit" class="btn btn-primary">Post replay</button>--}}
{{--    </div>--}}
</div>
