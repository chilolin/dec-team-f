<div>
    <style scoped>
        .title {
            font-weight: 500;
            color: #333333;
        }
        .skill-card-row {
            margin: 0px;
            margin-bottom: 10px;
        }
        .skill-card-row div:nth-child(1n) {
            margin-left: 0px;
            margin-right: 5px;
        }
        .skill-card-row div:nth-child(2n) {
            margin-left: 5px;
            margin-right: 5px;
        }
        .skill-card-row div:nth-child(3n) {
            margin-left: 5px;
            margin-right: 0px;
        }
    </style>

    <h4 class="title">{{ $listTypes[$listType]["title"] }}</h4>
    @foreach($listTypes[$listType]["skillTypeList"] as $index => $skillType)
        @if ($loop->first || $index % 3 == 0)
            <div class="row skill-card-row">
        @endif
        <x-employees.skill-card class="col-md" :list-type="$listType" :skill-type="$skillType" :uid="$uid" />
        @if ($index % 3 == 2)
            </div>
        @endif

        @if ($loop->last && $index % 3 != 2)
                @for ($i = 0; $i < 2-$index % 3; $i++)
                    <div class="col-md"></div>
                @endfor
            </div>
        @endif
    @endforeach
</div>
