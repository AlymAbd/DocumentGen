@extends('layouts.base')
@section('title', ': Шаблоны')
@section('content')
@section('javascript', '//cdn.ckeditor.com/4.15.0/full/ckeditor.js');

<script src="{{ asset('/js/templates.js') }}"></script>


<div class="ui pointing menu">
    <a class="item" href="/">
        Домашняя
    </a>
    <a class="item" href="/contracts">
        Договоры
    </a>
    <a class="item active" >
        Шаблоны
    </a>
</div>
<div class="ui segment">
    <div class="six wide field">
        <label>Договор</label>
        <input type="text" id="input_document_name">
    </div>
    <div class="ui inverted segment">
        <button class="ui inverted red button" id="insert_number" onClick="insertKey(this)">Номер договора</button>
        <button class="ui inverted primary button" id="insert_date" onClick="insertKey(this)">Дата</button>
        <button class="ui inverted orange button" id="insert_name" onClick="insertKey(this)">Название компании</button>
        <button class="ui inverted yellow button" id="insert_legal" onClick="insertKey(this)">Юридическое название</button>
        <button class="ui inverted olive button" id="insert_director" onClick="insertKey(this)">Директор</button>
        <button class="ui inverted green button" id="insert_signature" onClick="insertKey(this)">Подпись</button>
        <button class="ui inverted teal button" id="insert_bin" onClick="insertKey(this)">БИН</button>
        <button class="ui inverted blue button" id="insert_oop" onClick="insertKey(this)">Тип компании</button>
    </div>

    <textarea class="form-control" name="wysiwygeditor"></textarea>

    <div>
        <button class="ui button" id="save_document">Сохранить</button>
    </div>

</div>
<script type="text/javascript">
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.replace('wysiwygeditor');
</script>



@endsection
