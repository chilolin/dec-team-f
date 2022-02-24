<div>
	<style>
		.modal-content {
			padding: 30px 60px 60px;
		}
        .modal-content .nav-item {
            background: #f2f2f2;
        }
        .modal-content .nav-link {
            color: #333333;
        }
		.modal-body {
			padding: 30px 10px 20px;
		}
		.modal-body th {
			padding: 20px 10px;
			width: 145px;
			background: #EEEEEE;
			font-size: 14px;
			border: 1px solid #E1E1E1;
		}
		.modal-body td {
			padding: 20px 30px 3px!important;
			font-size: 14px;
		}
		.modal-body .modal-text {
			padding-bottom: 17px!important;
			font-size: 16px;
		}
        .modal-body .custom-control-label::before,.custom-control-label::after {
            top: 0.2px;
            width: 1.25rem;
            height: 1.25rem;
        }
		.modal-body .custom-control-input,.custom-control-label {
			cursor: pointer;
		}
	</style>

	<div class="modal fade" id="myMatterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<ul class="nav nav-tabs" id="modalTab" role="tablist">
					@foreach ($matters as $index => $matter)
						<li class="nav-item">
							<a class="nav-link {{ $index === 0 ? 'active' : '' }}" id="{{ $matter['name'] }}_{{ $matter['id'] }}-tab" data-toggle="tab" href="#{{ $matter['name'] }}_{{ $matter['id'] }}" role="tab" aria-controls="{{ $matter['name'] }}_{{ $matter['id'] }}" aria-selected="true">{{ $matter['name'] }}</a>
						</li>
					@endforeach
				</ul>

				<div class="tab-content" id="modalTabContent">
					@foreach ($matters as $index => $matter)
						<div class="tab-pane fade show {{ $index === 0 ? 'active' : '' }}" id="{{ $matter['name'] }}_{{ $matter['id'] }}" role="tabpanel" aria-labelledby="{{ $matter['name'] }}_{{ $matter['id'] }}-tab">
							<form method="POST" action="{{ route('modal.store') }}">
								@csrf
								<div class="modal-body">
									<table class="table table-bordered">
										<tbody>
                                            <tr>
                                                <th scope="row">案件名</th>
                                                <td class="modal-text">{{ $matter['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">開始日 / 終了日</th>
                                                <td class="modal-text">{{ $matter['start_at'] }}～{{ $matter['end_at'] }}</td>
                                            </tr>
											@foreach ($matter['skills'] as $skill_type => $specific_skills)
												<tr>
													<th scope="row">{{ $skill_types_in_jp[$skill_type] }}</th>
													<td>
														<div class="row ml-2">
															@foreach ($specific_skills as $index => $skill)
																<div class="col-6 row mb-3">
																	<div class="custom-control custom-checkbox mr-2">
																		<input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="custom-check-{{ $matter['id'] }}-{{ $index }}"
                                                                            name="skills[{{ $skill_type }}][{{ $index }}][checked]"
                                                                            {{ $skill['disabled'] ? 'disabled' : '' }}
                                                                            {{ $skill['disabled'] ? 'checked' : '' }}
																		>
																		<label class="custom-control-label" for="custom-check-{{ $matter['id'] }}-{{ $index }}">{{ $skill['name'] }}</label>
																	</div>
																	<input
                                                                        id="level-select"
                                                                        name="skills[{{ $skill_type }}][{{ $index }}][level]"
                                                                        class="rating rating-loading"
                                                                        data-min='0'
                                                                        data-max='5'
                                                                        data-step='0.5'
                                                                        data-size='xs'
                                                                        data-show-clear="false"
                                                                        value="{{ $skill['disabled'] ? $skill['level'] : '' }}"
                                                                        data-readonly="{{ $skill['disabled'] ? "true" : '' }}"
																	>
																	<input
                                                                        type="hidden"
                                                                        name="skills[{{ $skill_type }}][{{ $index }}][id]"
                                                                        value="{{ $skill['id'] }}"
																	>
																</div>
															@endforeach
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>

								<div id="modal-fotter" class="row justify-content-center">
									<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">キャンセル</button>
									<button type="submit" class="btn btn-fill btn-warning ml-2">スキルを登録する</button>
								</div>
							</form>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<script>
		$(".rating").rating({
			starCaptions: {
				0.5: '0.5',
				1: '1.0',
				1.5: '1.5',
				2: '2.0',
				2.5: '2.5',
				3: '3.0',
				3.5: '3.5',
				4: '4.0',
				4.5: '4.5',
				5: '5.0',
			},
			hoverChangeCaption: false,
		});
	</script>
</div>
