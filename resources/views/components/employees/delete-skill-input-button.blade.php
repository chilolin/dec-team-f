<div class="row" style="margin-top: -9px;">
    <div class="col-md-10">
        <button type="button" id="delete-skill-input-button" class="btn btn-danger btn-sm">削除する</button>
    </div>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete-skill-input-button', function(event) {
                if ($(this).closest('form').children('#skill-input-group').length == 1) {
                    return;
                }
                event.preventDefault();
                $(this).closest('#skill-input-group').remove();
            });
        });
    </script>
</div>
