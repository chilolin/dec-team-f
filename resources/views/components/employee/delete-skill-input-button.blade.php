<div class="row">
    <div class="col-md-10">
        <button type="button" id="delete-skill-input-button" class="btn btn-danger btn-sm">削除する</button>
    </div>

    <script>
        (function($) {
            $(document).on('click', '#delete-skill-input-button', function(event) {
                if ($(this).closest('form').children('#skill-input-group').length == 1) {
                    return;
                }
                event.preventDefault();
                $(this).closest('#skill-input-group').remove();
            });
        })(window.jQuery);
    </script>
</div>
