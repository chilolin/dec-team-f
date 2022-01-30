<x-app-layout>
    <div class="container">
        <h3 class="title">プログラミング言語</h3>
        <div style="padding: 50px 30px;">
            <form>
                <div id="skill-input-group" class="form-group" style="margin-bottom: 50px;">
                    <x-employee.skill-input />
                    <x-employee.level-select />
                    <x-employee.delete-skill-input-button />
                </div>

                <div id="add-button-container" class="row justify-content-md-center">
                    <button type="button" id="add-button" class="btn btn-sm btn-secondary add-button">＋</button>
                </div>

                <div class="row justify-content-md-center">
                    <button type="button" class="btn btn-warning col-lg-2">登録する</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .container {
            width: 100%;
            padding-left: 70px;
            padding-right: 70px;
            margin-left: auto;
            margin-right: auto;
        }

        .add-button {
            border-radius: 50%;
            font-size: 22px;
            padding: auto;
            margin-bottom: 50px;
        }
    </style>

    <!-- <script>
        (function($) {
            $('#add-button').click(function() {
                $('#skill-input-group').clone(false).insertBefore('#add-button-container');
            });
        })(window.jQuery);
    </script> -->
</x-app-layout>
