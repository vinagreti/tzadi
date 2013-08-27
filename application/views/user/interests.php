<h3><?=lang('tmpt_interests')?></h3>
<p>Defina abaixo as características do programa de intercâmbio desejado. Quanto mais informações você disponibilizar melhor os agenciadores poderão lhe auxiliar.</p>

<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#regularProduct"><?=lang('pdt_basic')?></a></li>
	<li><a href="#course"><?=lang('pdt_course')?></a></li>
	<li><a href="#ensurance"><?=lang('pdt_ensurance')?></a></li>
	<li><a href="#accommodation"><?=lang('pdt_accommodation')?></a></li>
	<li><a href="#pass"><?=lang('pdt_pass')?></a></li>
	<li><a href="#work"><?=lang('pdt_work')?></a></li>
	<li><a href="#tourismTab"><?=lang('pdt_tourism')?></a></li>
	<li><a href="#transferTab"><?=lang('pdt_transfer')?></a></li>
</ul>
<div class="tab-content">

	Deseja receber propostas?

  <div class="tab-pane active" id="regularProduct">
		<div class="row-fluid">
			<div class="span24 well well-mini">
				<div class="row-fluid">
				  <div class="span8">
				    <label><?=lang('pdt_minPrice')?>
				      <div class="control-group">
				        <input id="minPrice" type="text" class="interests input-block-level"/>
				      </div>
				    </label>
				  </div>
				  <div class="span8">
				    <label><?=lang('pdt_maxPrice')?>
				      <div class="control-group">
				        <input id="maxPrice" type="text" class="interests input-block-level"/>
				      </div>
				    </label>
				  </div>
				  <div class="span8">
				    <label><?=lang('pdt_currency')?>
				      <select id="currency" class="interests input-block-level">
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
				    <label><?=lang('pdt_interestPlaces')?>interestPlaces
				      <div class="control-group">
				        <input id="interestPlaces" class="interests input-block-level" type="text" size="50">
				      </div>
				    </label>
					</div>
				</div>
				<div class="row-fluid">
				  <div class="span24">
				  	<label>informações complementares
					    <div class="control-group">
					      <textarea id="detail" class="interests input-block-level" rows="5"></textarea>
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
						        <input id="courseDurationValue" type="text" class="interests input-block-level" />
						      </div>
						    </div>
							  <div class="span12">
							    <select id="courseDurationScale" class="interests input-block-level"> 
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
				        <input id="courseLanguage" type="text" class="interests input-block-level" />
				      </div>
				    </label>
				  </div>
				</div>
				<div class="row-fluid">
				  <div class="span8">
				    <p><label><?=lang('pdt_courseKind')?></p>
							<label class="checkbox">
							    <input id="language" class="interests" type="checkbox" value="language"> <?=lang('pdt_language')?>
							</label>
							<label class="checkbox">
							    <input id="profissional" class="interests" type="checkbox" value="profissional"> <?=lang('pdt_profissional')?>
							</label>
							<label class="checkbox">
							    <input id="highSchool" class="interests" type="checkbox" value="highSchool"> <?=lang('pdt_highSchool')?>
							</label>
							<label class="checkbox">
							    <input id="3degree" class="interests" type="checkbox" value="3degree"> <?=lang('pdt_3degree')?>
							</label>
							<label class="checkbox">
							    <input id="mba" class="interests" type="checkbox" value="mba"> <?=lang('pdt_mba')?>
							</label>
							<label class="checkbox">
							    <input id="pos3degree" class="interests" type="checkbox" value="pos3degree"> <?=lang('pdt_pos3degree')?>
							</label>
							<label class="checkbox">
							    <input id="master" class="interests" type="checkbox" value="master"> <?=lang('pdt_master')?>
							</label>
							<label class="checkbox">
							    <input id="doctor" class="interests" type="checkbox" value="doctor"> <?=lang('pdt_doctor')?>
							</label>
							<label class="checkbox">
							    <input id="posDoc" class="interests" type="checkbox" value="posDoc"> <?=lang('pdt_posDoc')?>
							</label>
							<label class="checkbox">
							    <input id="vacation" class="interests" type="checkbox" value="vacation"> <?=lang('pdt_vacation')?>
							</label>
				    </label>
				  </div>
				  <div class="span8">
				    <p><label><?=lang('pdt_modality')?></p>
							<label class="checkbox">
							    <input id="classroom" class="interests" type="checkbox" value="classroom"> <?=lang('pdt_classroom')?>
							</label>
							<label class="checkbox">
							    <input id="online" class="interests" type="checkbox" value="online"> <?=lang('pdt_online')?>
							</label>
							<label class="checkbox">
							    <input id="semiClassroom" class="interests" type="checkbox" value="semiClassroom"> <?=lang('pdt_semiClassroom')?>
							</label>
				    </label>
				  </div>
				  <div class="span8">
				    <p><label><?=lang('pdt_period')?></p>
							<label class="checkbox">
							    <input id="mPeriod" class="interests" type="checkbox" value="mPeriod"> <?=lang('pdt_mPeriod')?>
							</label>
							<label class="checkbox">
							    <input id="aPeriod" class="interests" type="checkbox" value="aPeriod"> <?=lang('pdt_aPeriod')?>
							</label>
							<label class="checkbox">
							    <input id="ePeriod" class="interests" type="checkbox" value="ePeriod"> <?=lang('pdt_ePeriod')?>
							</label>
							<label class="checkbox">
							    <input id="maPeriod" class="interests" type="checkbox" value="maPeriod"> <?=lang('pdt_maPeriod')?>
							</label>
							<label class="checkbox">
							    <input id="aePeriod" class="interests" type="checkbox" value="aePeriod"> <?=lang('pdt_aePeriod')?>
							</label>
							<label class="checkbox">
							    <input id="mePeriod" class="interests" type="checkbox" value="mePeriod"> <?=lang('pdt_mePeriod')?>
							</label>
							<label class="checkbox">
							    <input id="maePeriod" class="interests" type="checkbox" value="maePeriod"> <?=lang('pdt_maePeriod')?>
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
				          	<input id="ensuranceDurationValue" type="text" class="interests input-block-level" />
				        	</div>
					      </div>
					      <div class="span12">
					        <select id="ensuranceDurationScale" class="interests input-block-level">
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
						    <input id="familly" class="interests" type="checkbox" value="familly"> <?=lang('pdt_familly')?>
						</label>
						<label class="checkbox">
						    <input id="hotel" class="interests" type="checkbox" value="hotel"> <?=lang('pdt_hotel')?>
						</label>
						<label class="checkbox">
						    <input id="hostel" class="interests" type="checkbox" value="hostel"> <?=lang('pdt_hostel')?>
						</label>
						<label class="checkbox">
						    <input id="school" class="interests" type="checkbox" value="school"> <?=lang('pdt_school')?>
						</label>
				  </div>
				  <div class="span4">
				  	<p><label><?=lang('pdt_accommodationFood')?></p>
						<label class="checkbox">
						    <input id="bFood" class="interests" type="checkbox" value="bFood"> <?=lang('pdt_bFood')?>
						</label>
						<label class="checkbox">
						    <input id="lFood" class="interests" type="checkbox" value="lFood"> <?=lang('pdt_lFood')?>
						</label>
						<label class="checkbox">
						    <input id="dFood" class="interests" type="checkbox" value="dFood"> <?=lang('pdt_dFood')?>
						</label>
				  </div>
				  <div class="span8">
				    <label><?=lang('pdt_duration')?>
				      <div class="row-fluid">
				        <div class="span12">
				          <div class="control-group">
				            <input id="accommodationDurationValue" type="text" class="interests input-block-level"/>
				          </div>
				        </div>
				        <div class="span12">
				          <select id="accommodationDurationScale" class="interests input-block-level" >
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
				        <input id="accommodationPeopleNumber" type="text" class="interests input-block-level"/>
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
					    <input id="busTransportKind" class="interests" type="checkbox" value="busTransportKind"> <?=lang('pdt_busTransportKind')?>
					</label>
					<label class="checkbox">
					    <input id="shipTransportKind" class="interests" type="checkbox" value="shipTransportKind"> <?=lang('pdt_shipTransportKind')?>
					</label>
					<label class="checkbox">
					    <input id="flightTransportKind" class="interests" type="checkbox" value="flightTransportKind"> <?=lang('pdt_flightTransportKind')?>
					</label>
					<label class="checkbox">
					    <input id="railTransportKind" class="interests" type="checkbox" value="railTransportKind"> <?=lang('pdt_railTransportKind')?>
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
					    <input id="workFreeKind" class="interests" type="checkbox" value="workFreeKind"> <?=lang('pdt_workFreeKind')?>
					</label>
					<label class="checkbox">
					    <input id="workKind" class="interests" type="checkbox" value="workKind"> <?=lang('pdt_workKind')?>
					</label>
					<label class="checkbox">
					    <input id="traineeFreeKind" class="interests" type="checkbox" value="traineeFreeKind"> <?=lang('pdt_traineeFreeKind')?>
					</label>
					<label class="checkbox">
					    <input id="traineeKind" class="interests" type="checkbox" value="traineeKind"> <?=lang('pdt_traineeKind')?>
					</label>
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="tourismTab">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_tourism')?></h4>
				<div class="row-fluid">
					<label class="checkbox">
					    <input id="tourism" class="interests" type="checkbox" value="tourism" > atividades turísticas como visitar museus, cidades, fazer trilhas, escaladas
					</label>
					atividades de interesse
					<input id="tourismDetails" type="text" class="interests input-block-level" />
				</div>
			</div>
		</div>
  </div>

  <div class="tab-pane" id="transferTab">
		<div class="row-fluid">
		  <div class="span24 well well-mini">
		  	<h4><?=lang('pdt_transfer')?></h4>
				<div class="row-fluid">
					<label class="checkbox">
					    <input id="transfer" class="interests" type="checkbox" value="transfer"> translado do aeroporto ou da rodoviária para minhas acomodações
					</label>
				</div>
			</div>
		</div>
  </div>
</div>