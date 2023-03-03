@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_title', __('voyager::generic.' . (!empty($hero) ? 'edit' : 'add')) . ' Héro')

@section('page_header')
    <h1 class="page-title">
        {{ __('voyager::generic.' . (!empty($hero) ? 'edit' : 'add')) . ' Héro' }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form" class="form-edit-add"
                          action="{{ !empty($hero) ? route('voyager.heroes.update', $hero->id) : route('voyager.heroes.store') }}"
                          method="{{ !empty($hero) ? 'PUT' : 'POST' }}" enctype="multipart/form-data">

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Fields -->
                            <div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="control-label" for="name">
                                    Nom
                                </label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="{{ $hero->name ?? '' }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('aka') ? 'has-error' : '' }}">
                                <label class="control-label" for="aka">
                                    Aka
                                </label>
                                <input type="text" id="aka" name="aka" class="form-control"
                                       value="{{ $hero->aka ?? '' }}">
                                @if ($errors->has('aka'))
                                    @foreach ($errors->get('aka') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('biography') ? 'has-error' : '' }}">
                                <label class="control-label" for="biography">
                                    Biographie
                                </label>
                                <textarea class="form-control richTextBox" name="biography"
                                          id="biography">
                                    {!! $hero->biography ?? '' !!}
                                </textarea>
                                @if ($errors->has('biography'))
                                    @foreach ($errors->get('biography') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('civilization') ? 'has-error' : '' }}">
                                <label class="control-label" for="civilization">
                                    Civilisation
                                </label>
                                <select class="form-control select2" name="civilization"
                                        id="civilization">
                                    <option value="">{{__('voyager::generic.none')}}</option>
                                    @foreach($civilizations as $civilization)
                                        <option value="{{ $civilization->id }}"
                                                @if($hero->civilization_id === $civilization->id) selected @endif>
                                            {{ $civilization->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('civilization'))
                                    @foreach ($errors->get('civilization') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('statistics') ? 'has-error' : '' }}">
                                <label class="control-label">
                                    Statistiques
                                </label>
                                <div class="bg-slate-50 rounded-xl overflow-hidden border">
                                    <div class="rounded-xl overflow-auto">
                                        <div class="shadow-sm overflow-hidden my-8">
                                            <table class="border-collapse table-auto w-full text-sm">
                                                <thead>
                                                <tr>
                                                    <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">
                                                        Nom
                                                    </th>
                                                    <th class="border-b font-medium p-4 pt-0 pb-3 text-slate-400 text-left">
                                                        Valeur
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                @if(empty($hero->statistics->all()))
                                                    <tr class="bg-white">
                                                        <td class="p-4 pl-8 text-slate-500">
                                                            Aucune statistique
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                                @foreach($hero->statistics->all() as $statistic)
                                                    <tr>
                                                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                                            <img src="{{ $statistic->icon }}"
                                                                 class="w-6 h-6 object-cover">
                                                            {{ $statistic->name }}
                                                        </td>
                                                        <td class="border-b border-slate-100 p-4 text-slate-500">
                                                            <input type="hidden" value="{{ $statistic->id }}"
                                                                   name="statistics[id]">
                                                            <input type="text" value="{{ $statistic->pivot->value }}"
                                                                   name="statistics[value]">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('statistics'))
                                    @foreach ($errors->get('statistics') as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Statistics -->
                            <div class="form-group col-md-12">

                            </div>
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit"
                                        class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                        </div>
                    </form>

                    <div style="display:none">
                        <input type="hidden" id="upload_url" value="{{ route('voyager.upload') }}">
                        <input type="hidden" id="upload_type_slug" value="heroes">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'
                    </h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger"
                            id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            var additionalConfig = {
                selector: 'textarea.richTextBox[name="biography"]',
                min_height: 100,
            }
            tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));
        });
    </script>
@endsection
