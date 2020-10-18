@extends('layouts.base')
@section('title', ': Договоры')
@section('content')
@section('javascript', '');

<script src="{{ asset('js/contracts.js') }}" defer></script>

<div class="ui pointing menu">
    <a class="item" href="/">
        Домашняя
    </a>
    <a class="item active">
        Договоры
    </a>
    <a class="item" href="/contracts/templates">
        Шаблоны
    </a>
</div>

<div class="ui segment">
    <div class="ui grid">
        <div class="eleven wide column">
            <div class="ui card" style="width:100%">
                <div class="content">
                    <div class="ui form" id="form_inputs">
                        <input id="doc_id" hidden>
                        <div class="six wide field">
                            <label>Название компании</label>
                            <input type="text" id="input_company_name">
                        </div>
                        <div class="six wide field">
                            <label>Юридическое название компании</label>
                            <input type="text" id="input_legal_name">
                        </div>
                        <div class="six wide field">
                            <label>Директор</label>
                            <input type="text" id="input_director">
                        </div>
                        <div class="ui slider checkbox">
                            <input type="checkbox" name="newsletter" id="input_singature_type">
                            <label>Подпись на основании устава</label>
                        </div>
                        <div class="six wide field">
                            <label>БИН</label>
                            <input type="text" id="input_bin">
                        </div>
                        <div class="field">
                            <label>Договора</label>
                            <div class="ui selection dropdown">
                                <input type="hidden" id="input_document_type" name="gender">
                                <i class="dropdown icon"></i>
                                <div class="default text">Договор</div>
                                <div class="menu">
                                    @foreach($templates as $tmp)
                                        <div class="item" data-value={{ $tmp['id'] }}>{{ $tmp['type'] }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Тип компании</label>
                            <div class="ui selection dropdown">
                                <input type="hidden" id="input_company_oop" name="gender">
                                <i class="dropdown icon"></i>
                                <div class="default text">ОПФ</div>
                                <div class="menu">
                                    <div class="item" data-value="1">ИП</div>
                                    <div class="item" data-value="2">ТОО</div>
                                    <div class="item" data-value="3">АО</div>
                                    <div class="item" data-value="4">ООО</div>
                                </div>
                            </div>
                        </div>
                        <div class="ui buttons">
                            <div id="save_document" class="ui button">Сохранить</div>
                                <div id="get_pdf" class="ui button disabled">Скачать</div>
                            <div id="destroy_form" class="ui button">Очистить</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="four wide column">
            <div class="ui card" style="width:100%">
                <div class="content">
                    <span>Договоры:</span>
                    <div class="ui divided items">
                        @foreach($docs as $key)
                            <div class="item">
                                <div class="middle aligned content">
                                    <a value={{ $key["id"] }}>Номер: {{ $key["number"] }}, компания: {{ $key["company_name"] }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.ui.dropdown')
        .dropdown()
    ;
</script>

@endsection
