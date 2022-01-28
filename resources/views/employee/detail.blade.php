<x-app-layout>
    <x-slot name="title">
        社員詳細
    </x-slot>

    <div class="content">
        <div class="container">
            <div class="card card-user">
                <div class="card-body row">
                    <div class="col-md-4">
                        <img class="avatar border-gray" src="{{asset('img/dinosaur.jfif')}}" alt="dinosaur">
                    </div>
                    <div class="col-md-8">
                        <h4 class="title">Mike Andrew</h4>
                        <p class="description">
                            michael24
                        </p>
                    </div>
                </div>
            </div>

            <x-employee.skill-card-list list-type="practice" uid=1 />
            <x-employee.skill-card-list list-type="learning" uid=1 />
            <x-employee.skill-card-list list-type="career" uid=1 />
        </div>
    </div>

    <style>
        .container {
            width: 100%;
            padding-left: 50px;
            padding-right: 50px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</x-app-layout>
