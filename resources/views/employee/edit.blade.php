<x-app-layout>
    <div class="container">
        <h3 class="title">プログラミング言語</h3>
        <div style="padding: 50px 30px;">
            <form>
                <div class="row justify-content-md-center">
                    <button type="button" id="add-new-skill-button" class="btn btn-sm btn-secondary">＋</button>
                </div>

                <div class="row justify-content-md-center">
                    <button type="submit" class="btn btn-warning col-lg-2">登録する</button>
                </div>
            </form>

            <div style="display: none;" id="default-skill-input-group">
                <div id="skill-input-group" class="form-group" style="margin-bottom: 50px;">
                    <x-employee.skill-input />
                    <x-employee.level-select />
                    <x-employee.delete-skill-input-button />
                </div>
            </div>
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

        #add-new-skill-button {
            border-radius: 50%;
            font-size: 22px;
            padding: auto;
            margin-bottom: 50px;
        }
    </style>

    <script>
        const addNewSkillButton = document.getElementById("add-new-skill-button");
        addNewSkillButton.addEventListener("click", (event) => {
            const parentsForm = event.target.closest("form");
            const cloneSkillInputGroup =  document.getElementById('default-skill-input-group').firstElementChild.cloneNode(true);

            parentsForm.insertBefore(cloneSkillInputGroup, event.target.parentNode);
        })
    </script>
</x-app-layout>
