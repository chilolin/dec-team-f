<x-app-layout>
    <x-slot name="title">
        社員詳細
    </x-slot>

    <style scoped>
        .container {
            width: 100%;
            padding-left: 120px;
            padding-right: 120px;
            padding-bottom: 80px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <div class="content">
        <div class="container">
            <div class="card card-user">
                <div class="card-body row">
                    <div class="col-4 py-3 px-6">
                        <img class="avatar border-gray" src="{{asset('img/dinosaur.jfif')}}" alt="dinosaur">
                    </div>
                    <div class="col-7 py-3">
                        <h4 class="title">{{ $user->name }}</h4>
                        <p>github: </p><p></p>
                        <p>twitter: </p>
                    </div>
                </div>
            </div>

            <x-employees.skill-card-list list-type="practice_learning" uid="{{ $uid }}" />
            <x-employees.skill-card-list list-type="career" uid="{{ $uid }}" />
        </div>
    </div>
</x-app-layout>
