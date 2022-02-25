<div {{ $attributes->merge(['class' => 'card skill-card']) }}>
    <style scoped>
        .skill-card .card {
            color: #333333;
            margin-bottom: 0px;
        }
        .skill-card .card-title {
            color: #333333;
        }
        .skill-card .to-edit-link {
            font-size: 13px;
        }
        .skill-card .list-group-item {
            padding: 11px 7px 0 10px;
            margin-bottom: -15px;
        }
    </style>


    <div class="card-header d-flex justify-content-between">
        <span class="card-title" style="margin-left: -8px; font-size: 16px; font-weight: 560;">{{ $skill_types_in_jp[$skillType] }}</span>
        @if ($listType == "practice_learning" && $is_auth)
            <a href="{{ route('employees.practice_learning_edit', ['skill_type' => $skillType]) }}" class="to-edit-link">
            <i class="bi bi-pencil-square" style="padding-left: 100%"></i>
            </a>
        @endif
        @if ($listType == "career" && $is_auth)
            <a href="{{ route('employees.career_edit', ['skill_type' => $skillType]) }}" class="to-edit-link">
            <i class="bi bi-pencil-square" style="padding-left: 100%"></i>
            </a>
        @endif
    </div>

    <div style="padding: 7px 0px;">
        <div class="form-group">
            <div class="row">
                <ul class="list-group list-group-flush">
                    @foreach ($skillList as $skill)
                        <div class="d-flex justify-content-between">
                        <li class="list-group-item">

                            <?php $practical_flag = $skill->pivot->is_practice ?>
                            @if( $practical_flag == true)
                            <div style="padding-left: 7px; font-size: 16px; float: left;">
                            {{ $skill->name }}
                            </div>
                            <div style="margin-left: 100%;">
                            <p class="badge badge-primary" style="font-size: 50%;">実務</p>
                            </div>

                            @else
                            <div style="padding-left: 7px; font-size: 16px; float: left;">
                            {{ $skill->name }}
                            </div>
                            <div style="margin-left: 100%">
                            <p class="badge badge-secondary" style="font-size: 50%;">学習</p>
                            </div>

                            @endif
                            <input
                                id="input-id"
                                name="input-name"
                                type="number"
                                class="rating rating-loading"
                                value="{{ $skill->pivot->level }}"
                                style="margin-left: -5px"
                                data-min='0'
                                data-max='5'
                                data-step='0.5'
                                data-size="xs"
                                data-readonly="true"
                                data-show-clear="false"
                                data-show-caption="false"
                            >
                        </li>
                        </div>
                    @endforeach
                </ul>
            </div>
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

