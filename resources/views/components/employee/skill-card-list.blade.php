<div>
    <h4 class="title">{{ $listTypes[$listType]["title"] }}</h4>
    @foreach($listTypes[$listType]["skillTypeList"] as $index => $skillType)
        @if ($loop->first || $index % 3 == 0)
            <div class="row card-row">
        @endif
        <x-employee.skill-card class="col-md" :list-type="$listType" :skill-type="$skillType" :uid="$uid" />
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

    <style>
        .card-row {
            margin-top: 0px;
        }
        .card-row div:nth-child(1n) {
            margin-right: 10px;
        }
        .card-row div:nth-child(2n) {
            margin-left: 5px;
            margin-right: 5px;
        }
        .card-row div:nth-child(3n) {
            margin-left: 10px;
        }
    </style>
</div>
