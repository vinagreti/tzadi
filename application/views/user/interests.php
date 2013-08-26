<h3><?=lang('tmpt_interests')?></h3>
<p>Defina abaixo as características do programa de intercâmbio desejado. Quanto mais informações você disponibilizar melhor os agenciadores poderão lhe auxiliar.</p>

<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#regularProduct"><?=lang('pdt_basic')?></a></li>
	<li><a href="#course"><?=lang('pdt_course')?></a></li>
	<li><a href="#ensurance"><?=lang('pdt_ensurance')?></a></li>
	<li><a href="#accommodation"><?=lang('pdt_accommodation')?></a></li>
	<li><a href="#pass"><?=lang('pdt_pass')?></a></li>
	<li><a href="#work"><?=lang('pdt_work')?></a></li>
	<li><a href="#tourism"><?=lang('pdt_tourism')?></a></li>
	<li><a href="#transfer"><?=lang('pdt_transfer')?></a></li>
</ul>
 
<div class="tab-content">

  <div class="tab-pane active" id="regularProduct">
		<div class="row-fluid">
			<div class="span24 well well-mini">
				<div class="row-fluid">
				  <div class="span8">
				    <label><?=lang('pdt_minPrice')?>
				      <div class="control-group">
				        <input type="text" class="input-block-level miniPrice"/>
				      </div>
				    </label>
				  </div>
				  <div class="span8">
				    <label><?=lang('pdt_maxPrice')?>
				      <div class="control-group">
				        <input type="text" class="input-block-level maxPrice"/>
				      </div>
				    </label>
				  </div>
				  <div class="span8">
				    <label><?=lang('pdt_currency')?>
				      <select class="input-block-level currency">
				        <option value="USD">dollar (US$)</option>
				        <option value="EUR">euro (€)</option>
				        <option value="GBP">pound (£)</option>
				        <option value="BRL" selected>real (R$)</option>
				      </select>
				    </label>
				  </div>
				</div>
				<div class="row-fluid">
				  <div class="span24">
				    <label><?=lang('pdt_interestPlaces')?>
				      <div class="control-group">
				        <input id="campusAddress" class="input-block-level" type="text" size="50">
				      </div>
				    </label>
					</div>
				</div>
				<div class="row-fluid">
				  <div class="span24">
				  	<label>informações complementares
					    <div class="control-group">
					      <textarea class="detail input-block-level" rows="5"></textarea>
					    </div>
					  </label>
					</div>
				</div>
		  </div>
		</div>
  </div>

  <div class="tab-pane" id="course">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_course')?></h4>
				<div class="row-fluid">
				  <div class="span8">
				    <label><?=lang('pdt_courseDuration')?>
				    	<div class="row-fluid">
				    		<div class="span12">
						      <div class="control-group">
						        <input type="text" class="input-block-level courseDurationValue" />
						      </div>
						    </div>
							  <div class="span12">
							    <select class="input-block-level courseDurationScale"> 
							      <option value="days"><?=lang('pdt_days')?></option>
							      <option value="weeks"><?=lang('pdt_weeks')?></option>
							      <option value="months"><?=lang('pdt_months')?></option>
							      <option value="years"><?=lang('pdt_years')?></option>
							    </select>
							  </div>
						  </div>
				    </label>
				  </div>
				  <div class="span16">
				    <label><?=lang('pdt_courseLanguage')?>
				      <div class="control-group">
				        <input type="text" class="input-block-level courseLanguage" />
				      </div>
				    </label>
				  </div>
				</div>
				<div class="row-fluid">
				  <div class="span8">
				    <p><label><?=lang('pdt_courseKind')?></p>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_language')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_profissional')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_highSchool')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_3degree')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_mba')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_pos3degree')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_master')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_doctor')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_posDoc')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_vacation')?>
							</label>
				    </label>
				  </div>
				  <div class="span8">
				    <p><label><?=lang('pdt_modality')?></p>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_classroom')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_online')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_semiClassroom')?>
							</label>
				    </label>
				  </div>
				  <div class="span8">
				    <p><label><?=lang('pdt_period')?></p>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_mPeriod')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_aPeriod')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_ePeriod')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_maPeriod')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_aePeriod')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_mePeriod')?>
							</label>
							<label class="checkbox">
							    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_maePeriod')?>
							</label>
				    </label>
				  </div>
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="ensurance">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_ensurance')?></h4>
				<div class="row-fluid">
				  <div class="span8">
						<label><?=lang('pdt_duration')?>
					    <div class="row-fluid">
					      <div class="span12">
				        	<div class="control-group">
				          	<input type="text" class="input-block-level ensuranceDurationValue" />
				        	</div>
					      </div>
					      <div class="span12">
					        <select class="input-block-level ensuranceDurationScale">
					          <option value="days"><?=lang('pdt_days')?></option>
					          <option value="weeks"><?=lang('pdt_weeks')?></option>
					          <option value="months"><?=lang('pdt_months')?></option>
					          <option value="years"><?=lang('pdt_years')?></option>
					        </select>
					      </div>
					    </div>
						</label>
					</div>
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="accommodation">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_accommodation')?></h4>
				<div class="row-fluid">
				  <div class="span5">
				  	<p><label><?=lang('pdt_accommodationKind')?></p>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_familly')?>
						</label>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_hotel')?>
						</label>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_hostel')?>
						</label>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_school')?>
						</label>
				  </div>
				  <div class="span4">
				  	<p><label><?=lang('pdt_accommodationFood')?></p>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_bFood')?>
						</label>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_lFood')?>
						</label>
						<label class="checkbox">
						    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_dFood')?>
						</label>
				  </div>
				  <div class="span8">
				    <label><?=lang('pdt_duration')?>
				      <div class="row-fluid">
				        <div class="span12">
				          <div class="control-group">
				            <input type="text" class="input-block-level accommodationDurationValue"/>
				          </div>
				        </div>
				        <div class="span12">
				          <select class="input-block-level accommodationDurationScale" >
				            <option value="days"><?=lang('pdt_days')?></option>
				            <option value="weeks"><?=lang('pdt_weeks')?></option>
				            <option value="months"><?=lang('pdt_months')?></option>
				            <option value="years"><?=lang('pdt_years')?></option>
				          </select>
				        </div>

				      </div>
				    </label>
				  </div>
				  <div class="span6">
				    <label><?=lang('pdt_accommodationPeopleNumber')?>
				      <div class="control-group">
				        <input type="text" class="input-block-level accommodationPeopleNumber"/>
				      </div>
				    </label>
				  </div>
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="pass">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_pass')?></h4>
				<div class="row-fluid">
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_busTransportKind')?>
					</label>
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_shipTransportKind')?>
					</label>
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_flightTransportKind')?>
					</label>
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_railTransportKind')?>
					</label>
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="work">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_work')?></h4>
				<div class="row-fluid">
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_workFreeKind')?>
					</label>
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_workKind')?>
					</label>
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_traineeFreeKind')?>
					</label>
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> <?=lang('pdt_traineeKind')?>
					</label>
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="tourism">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_tourism')?></h4>
				<div class="row-fluid">
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> atividades turísticas como visitar museus, cidades, fazer trilhas, escaladas
					</label>
					atividades de interesse
					<input type="text" class="input-block-level" />
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="transfer">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_transfer')?></h4>
				<div class="row-fluid">
					<label class="checkbox">
					    <input type="checkbox" value="option2" id="inlineCheckbox2"> translado do aeroporto ou da rodoviária para minhas acomodações
					</label>
				</div>
			</div>
		</div>
  </div>
</div>