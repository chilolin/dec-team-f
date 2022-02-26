<x-app-layout>
    <x-slot name="title">
        社員詳細
    </x-slot>

    <style scoped>
        .container {
            width: 100%;
            padding-left: 80px;
            padding-right: 80px;
            padding-bottom: 80px;
            margin-left: auto;
            margin-right: auto;
        }

        .employee-detail .custom-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 1px solid gray;
        }
        .employee-detail .card-user .card-body {
            min-height: auto;
        }
        .employee-detail .matter-row {
            cursor: pointer;
        }
        .employee-detail .matter-row:hover {
            opacity: 0.6;
        }
    </style>

        <div class="container employee-detail">
            <div class="card card-user">
                <div class="card-body row">
                    <div class="col-2" style="margin: auto;">
                        <img class="custom-avatar" src="{{asset('img/dinosaur.jfif')}}" alt="dinosaur">
                    </div>
                    <div class="col-7 py-3">
                        <h4>{{ $user->name }}</h4>
                        <table class="table">
                            <thead>
                                <th scope="row" style="font-size: 1rem">
                                    進行中案件
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($user->matters as $matter)
                                    @if ($matter->start_at <= date("Y-m-d") && date("Y-m-d") <= $matter->end_at)
                                        <tr id="user-matter-{{ $matter->id }}" class="matter-row" href={{ route('matters.show', ['id' => $matter->id]) }}>
                                            <td>{{ $matter->start_at }} ～ {{ $matter->end_at }}</td>
                                            <td>{{ $matter->name }}</td>
                                        </tr>

                                        <script>
                                            (function($) {
                                                const matterId = @json($matter->id);
                                                const matterUrl = @json(route('matters.show', ['id' => $matter->id]));
                                                $(`#user-matter-${matterId}`).click(function() {
                                                    window.location.href = matterUrl;
                                                });
                                            })(window.jQuery);
                                        </script>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <x-employees.skill-card-list list-type="practice_learning" uid="{{ $uid }}" />
            <x-employees.skill-card-list list-type="career" uid="{{ $uid }}" />
        </div>
</x-app-layout>
