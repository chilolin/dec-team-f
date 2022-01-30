<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header">
        <span class="card-title">{{ $skillTypeTranslator[$skillType] }}</span>
        @if ($listType != "practice" && $is_auth)
            <a href="dfff" style="font-size: 15px; color:orange" onclick="event.preventDefault(); this.closest('form').submit();">
                編集する
            </a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-full-width">
            <table class="table skill-list">
                <tbody>
                    @foreach ($skillList as $skill)
                        <tr>
                            <td>&#9675;</td>
                            <td>{{ $skill->name }}</td>
                            <td>
                                @if ($listType != "practice")
                                    <input
                                        id="input-id"
                                        name="input-name"
                                        type="number"
                                        class="rating rating-loading"
                                        data-min='0'
                                        data-max='5'
                                        data-step='0.5'
                                        data-size="xs"
                                        data-readonly="true"
                                        data-show-clear="false"
                                        data-show-caption="false"
                                    >
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
        }
        .skill-list,.skill-list td{
            border: none !important;
        }
    </style>

    <script>
        $("#input-id").rating({
            starCaptions: {
                0.5: 'level 0.5',
                1: 'level 1',
                1.5: 'level 1.5',
                2: 'level 2',
                2.5: 'level 2.5',
                3: 'level 3',
                3.5: 'level 3.5',
                4: 'level 4',
                4.5: 'level 4.5',
                5: 'level 5',
            },
        });
    </script>
</div>

