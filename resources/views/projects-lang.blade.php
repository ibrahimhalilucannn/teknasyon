@extends('master')

@section('content')
    <div class="row gutter-xs">
        <div class="col-md-12 pull-right">
            <button class="btn btn-info btn-sm btn-labeled pull-right"  data-toggle="modal" data-target="#addModal" type="button">
                <span class="btn-label">
                  <span class="icon icon-plus icon-fw"></span>
                </span> Lokalizasyonlar
            </button>
            <br>
            <br>
        </div>
    </div>
    <div class="row gutter-xs">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Lokalizasyon Verileri</strong>
                </div>
                <div class="card-body">
                    <table id="demo-datatables-fixedheader-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Version</th>
                            <th>Language</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->project->name}}</td>
                                <td>{{$item->version->name}}</td>
                                <td>{{$item->language->code}}</td>
                                <td>{{$item->key}}</td>
                                <td>{{$item->value}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-icon sq-24 editItem"  data-toggle="modal" data-target="#editModal-{{$item->id}}"> <span class="icon icon-pencil"></span> </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div id="addModal" tabindex="-1" role="dialog" class="modal fade" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Lokalizasyon Ekle</h4>
                </div>
                <form data-toggle="validator" method="post" action="{{action('ProjectsController@lokalizasyon_insert')}}" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                    <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Proje</label>
                                <select id="demo-select2-1" name="project_id" class="form-control" data-rule-required="true" data-msg-required="Lütfen Proje Seçiniz.">
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dil</label>
                                <select id="demo-select2-1" name="language_id" class="form-control" data-rule-required="true" data-msg-required="Lütfen Dil Seçiniz.">
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Version</label>
                                <select id="demo-select2-1" name="version_id" class="form-control" data-rule-required="true" data-msg-required="Lütfen Version Seçiniz.">
                                    @foreach($versions as $version)
                                        <option value="{{$version->id}}">{{$version->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Key</label>
                                <input class="form-control" type="text" name="key" spellcheck="false" autocomplete="off" data-rule-required="true" data-msg-required="Lütfen Key Giriniz.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Value</label>
                                <input class="form-control" type="text" name="value" spellcheck="false" autocomplete="off" data-rule-required="true" data-msg-required="Lütfen Value Değeri Giriniz.">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger btn-sm btn-labeled" type="button" data-dismiss="modal">
                            <span class="btn-label">
                                <span class="icon icon-remove icon-lg icon-fw"></span>
                            </span>Kapat
                        </button>
                        <button class="btn btn-primary btn-sm btn-labeled" type="submit">
                            <span class="btn-label">
                                <span class="icon icon-check icon-lg icon-fw"></span>
                            </span>Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($items as $item)
        <div id="editModal-{{$item->id}}" tabindex="-1" role="dialog" class="modal fade" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Lokalizasyon Düzenle</h4>
                    </div>
                    <form data-toggle="validator" method="post" action="{{action('ProjectsController@lokalizasyon_update',$item->id)}}" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Proje</label>
                                    <select id="demo-select2-1" name="project_id" class="form-control" data-rule-required="true" data-msg-required="Lütfen Proje Seçiniz.">
                                        @foreach($projects as $project)
                                            <option value="{{$project->id}}" {{ $item->project_id == $project->id ? 'selected="selected' : '' }}>{{$project->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Dil</label>
                                    <select id="demo-select2-1" name="language_id" class="form-control" data-rule-required="true" data-msg-required="Lütfen Dil Seçiniz.">
                                        @foreach($languages as $language)
                                            <option value="{{$language->id}}" {{ $item->language_id == $language->id ? 'selected="selected' : '' }}>{{$language->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Version</label>
                                    <select id="demo-select2-1" name="version_id" class="form-control" data-rule-required="true" data-msg-required="Lütfen Version Seçiniz.">
                                        @foreach($versions as $version)
                                            <option value="{{$version->id}}" {{ $item->version_id == $version->id ? 'selected="selected' : '' }}>{{$version->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Key</label>
                                    <input class="form-control" type="text" name="key" value="{{$item->key}}" spellcheck="false" autocomplete="off" data-rule-required="true" data-msg-required="Lütfen Key Giriniz.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Value</label>
                                    <input class="form-control" type="text" name="value" value="{{$item->value}}" spellcheck="false" autocomplete="off" data-rule-required="true" data-msg-required="Lütfen Value Giriniz.">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-sm btn-labeled" type="button" data-dismiss="modal">
                            <span class="btn-label">
                                <span class="icon icon-remove icon-lg icon-fw"></span>
                            </span>Kapat
                            </button>
                            <button class="btn btn-primary btn-sm btn-labeled" type="submit">
                            <span class="btn-label">
                                <span class="icon icon-check icon-lg icon-fw"></span>
                            </span>Kaydet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection