<div class="datetimepicker-wrapper">
    @if ($attributes->has('label'))
        <label class="datetimepicker-label" for="{{ $attributes->get('id') }}">{{ $attributes->get('label') }}</label>
    @endif

    <div class="input-group date" id="{{ $attributes->get('id') }}" data-target-input="nearest">
        <input
            {{ $attributes->filter(fn ($value, $key) => $key != 'label') }}
            type="text"
            class="form-control datetimepicker-input @error($attributes->get('name')) custom-is-invalid @enderror"
            data-target="{{ '#' . $attributes->get('id') }}"
            value="{{ old($attributes->get('name')) }}"
        />
        <span class="input-group-append" data-target="{{ '#' . $attributes->get('id') }}" data-toggle="datetimepicker">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
        </span>
    </div>

    @error($attributes->get('name'))
        <div class="alert datetimepicker-error-message">{{ $message }}</div>
    @enderror

    @php
        $input_id = $attributes->get('id');
    @endphp

    <script type="text/javascript">
        $(function () {
            var inputId = '#' + '{{ $input_id }}';

            $(inputId).datetimepicker({
                dayViewHeaderFormat: 'YYYY年 MMMM',
                tooltips: {
                    close: '閉じる',
                    selectMonth: '月を選択',
                    prevMonth: '前月',
                    nextMonth: '次月',
                    selectYear: '年を選択',
                    prevYear: '前年',
                    nextYear: '次年',
                    selectTime: '時間を選択',
                    selectDate: '日付を選択',
                    prevDecade: '前期間',
                    nextDecade: '次期間',
                    selectDecade: '期間を選択',
                    prevCentury: '前世紀',
                    nextCentury: '次世紀'
                },
                format: 'YYYY/MM/DD',
                locale: 'ja',
                buttons: {
                    showClose: true
                }
            });
        });
    </script>
</div>
