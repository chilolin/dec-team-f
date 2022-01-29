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
</div>

