<div class="row">
    <div class="col-md-10">
        <button type="button" id="delete-button" class="btn btn-danger btn-sm">削除する</button>
    </div>

    <script>
        (function($) {
            $("#delete-button").click(function(event) {
                event.preventDefault();
                $(this).closest('#skill-input-group').remove();
            });
        })(window.jQuery);
    </script>
</div>
