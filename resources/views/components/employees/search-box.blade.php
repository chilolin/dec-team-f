<div {{ $attributes->merge(['class' => 'search-box']) }} >
    <style>
        .search-box .col-10 {
            padding: 0px;
        }
        .search-box .row {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>

    <form method='POST' action='{{ route('employees.search') }}'>
        @csrf
        <div class="row">
            <x-forms.skill-select skill_type="all" id="accordion-search-tagsinput" class="col-10" name="skills" />
            <button type="submit" class="col-2 btn btn-fill btn-warning btn-sm">検索する</button>
        </div>
    </form>
    <div class="row mt-3">
        <x-employees.search-accordion skill_type="language" class="col-3 upper"/>
        <x-employees.search-accordion skill_type="framework" class="col-3 upper"/>
        <x-employees.search-accordion skill_type="design_pattern" class="col-3 upper"/>
        <x-employees.search-accordion skill_type="process" class="col-3 upper"/>
    </div>
    <div class="row">
        <x-employees.search-accordion skill_type="proceeding" class="col"/>
        <x-employees.search-accordion skill_type="engineer_type" class="col"/>
        <x-employees.search-accordion skill_type="position" class="col"/>
        <x-employees.search-accordion skill_type="database" class="col"/>
        <x-employees.search-accordion skill_type="infrastructure" class="col"/>
    </div>

    <script>
        (function($) {
            const oldSkills = @json(session('old_skills'));

            $(function() {
                if(oldSkills && oldSkills.length) {
                    oldSkills.forEach((oldSkill) => {
                        $('#accordion-search-tagsinput').tagsinput('add', oldSkill);
                    });
                }
            })
        })(window.jQuery);
    </script>

</div>
