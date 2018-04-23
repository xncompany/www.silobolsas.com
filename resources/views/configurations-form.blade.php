				<form class="form-horizontal" method="post" action="/configurations">
					<input type="hidden" name="metric_type" value="{{ strtolower($title) }}">
					<div class="card">
                      <div class="card-heading bg-green-800">
                        <div class="card-title">{{ $title }}</div>
                      </div>
                      <div class="card-body pv">
                          <fieldset>
                            <div class="form-group">
                              <label class="col-sm-12">Normal</label>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">DESDE</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="normal.from">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">HASTA</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="normal.to">
                                </div>
                              </div>
                            </div>
                          </fieldset>
                          <fieldset>
                            <div class="form-group">
                              <label class="col-sm-12">Warning</label>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">DESDE</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="warning.from">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">HASTA</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="warning.to">
                                </div>
                              </div>
                            </div>
                          </fieldset>
                          <fieldset>
                            <div class="form-group">
                              <label class="col-sm-12">Critical</label>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">DESDE</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="critical.from">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">HASTA</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="critical.to">
                                </div>
                              </div>
                            </div>
                          </fieldset>
                          <fieldset class="last-child">
                            <div class="form-group">
                              <label class="col-sm-12">Delta</label>
                              <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-toggle="dropdown" aria-expanded="false" id="btn-dropdown-{{ strtolower($title) }}">Bajada&nbsp;<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="javascript:setDeltaAction(0, '{{ strtolower($title) }}');">Bajada</a></li>
                                      <li><a href="javascript:setDeltaAction(1, '{{ strtolower($title) }}');">Subida</a></li>
                                    </ul>
                                  </div>
                                  <input type="hidden" name="delta-action" id="delta-action-{{ strtolower($title) }}" value="0">
                                  <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="delta">
                                </div>
                              </div>
                            </div>
                          </fieldset>
                      </div>
                      <div class="card-footer">
                        <button class="btn btn-flat btn-primary" type="submit">Guardar</button>
                      </div>
                    </div>
                </form>