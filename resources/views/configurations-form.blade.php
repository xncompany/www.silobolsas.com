				<form class="form-horizontal" method="post" action="/configurations">
					<div class="card">
                      <div class="card-heading bg-blue-900">
                        <div class="card-title">{{ $title }}</div>
                      </div>
                      <div class="card-body pv">
                        @foreach ($list as $item)

                          @if ($item['id'] < $id || $item['id'] >= ($id + 100))
                            @continue
                          @endif

                          @if ($item['configuration_type']['id'] == 2)
                            @continue
                          @endif

                          <fieldset>
                              <div class="form-group">
                              <label class="col-sm-12">{{ ucfirst($item['status']['description']) }}</label>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">DESDE</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="{{ $item['id'] }}_from" value="{{ $item['rangeA'] }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">HASTA</span>
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="{{ $item['id'] }}_to" value="{{ $item['rangeB'] }}">
                                </div>
                              </div>
                            </div>
                          </fieldset>

                        @endforeach

                        @foreach ($list as $item)

                          @if ($item['id'] < $id || $item['id'] >= ($id + 100))
                            @continue
                          @endif

                          @if ($item['configuration_type']['id'] == 2)

                            <fieldset class="last-child">
                              <div class="form-group">
                                <label class="col-sm-12">Delta</label>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                    <div class="input-group-btn">
                                      <button class="btn btn-default" type="button" data-toggle="dropdown" aria-expanded="false" id="btn-dropdown-{{ strtolower($title) }}">{{ $item['rangeA'] == 0 ? 'Bajada' : 'Subida' }}&nbsp;<span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="javascript:setDeltaAction(0, '{{ strtolower($title) }}');">Bajada</a></li>
                                        <li><a href="javascript:setDeltaAction(1, '{{ strtolower($title) }}');">Subida</a></li>
                                      </ul>
                                    </div>
                                    <input type="hidden" name="{{ $item['id'] }}_from" id="delta-action-{{ strtolower($title) }}" value="{{ $item['rangeA'] }}">
                                    <input class="form-control" type="text" placeholder="{{ $placeholder }}" name="{{ $item['id'] }}_to" value="{{ $item['rangeB'] }}">
                                  </div>
                                </div>
                              </div>
                            </fieldset>

                            @break
                          
                          @endif

                        @endforeach
                      </div>
                      <div class="card-footer">
                        <button class="btn btn-flat btn-primary" type="submit">Guardar</button>
                      </div>
                    </div>
                </form>