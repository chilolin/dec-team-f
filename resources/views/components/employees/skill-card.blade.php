<div {{ $attributes->merge(['class' => 'card']) }}>
    <style scoped>
        .card-header {
            display: flex;
            justify-content: space-between;
        }
        .skill-list,.skill-list td{
            border: none !important;
        }
    </style>

    <div class="card-header">
        <span class="card-title">{{ $skill_types_in_jp[$skillType] }}</span>
        @if ($listType == "learning" && $is_auth)
            <a href="{{ route('employees.learning_edit', ['skill_type' => $skillType]) }}" style="font-size: 13px;">
                編集
            </a>
        @endif
        @if ($listType == "career" && $is_auth)
            <a href="{{ route('employees.career_edit', ['skill_type' => $skillType]) }}" style="font-size: 13px;">
                編集
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
                                        value="{{ $skill->pivot->level }}"
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

    <script type="text/javascript">
        $("#input-id").rating({
            starCaptions: {
                0.5: '0.5',
                1: '1',
                1.5: '1.5',
                2: '2',
                2.5: '2.5',
                3: '3',
                3.5: '3.5',
                4: '4',
                4.5: '4.5',
                5: '5',
            },
        });
    </script>
</div>

