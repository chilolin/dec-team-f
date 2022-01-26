<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header">
        <h5 class="card-title">{{ $skillTypeTranslator[$skillType] }}</h5>
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
        .skill-list,.skill-list td{
            border: none !important;
        }
    </style>
</div>

