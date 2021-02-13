@extends('layouts.base')
@section('title', ': Шаблоны')
@section('content')
@section('javascript', '//cdn.ckeditor.com/4.15.0/full/ckeditor.js');

<script src="{{ asset('js/create_template.js') }}" defer></script>

<div class="ui pointing menu">
    <a class="item" href="/contracts">
        Договоры
    </a>
    <a class="item active">
        Шаблоны
    </a>
    <a class="item" href="/registry">
        Реестр
    </a>
</div>

<div class="ui segment">
    <div class="six wide field">
        <input type="text" value="" hidden id="template_id">
        <div class="ui input">
            <input type="text" id="input_document_name" placeholder="*Название шаблона">
        </div>
        <div class="ui input selection dropdown" id="doc_type">
            <input type="hidden" id="input_document_type" name="gender">
            <i class="dropdown icon"></i>
            <div class="default text">*Тип</div>
            <div class="menu">
                <div class="item" data-value="contract">Договор</div>
                <div class="item" data-value="annex">Приложение</div>
                <div class="item" data-value="add_aggr">Доп. соглашение</div>
            </div>
        </div>
        <div class="ui input">
            <div class="ui input left icon">
              <i class="calendar icon"></i>
              <input type="text" placeholder="Срок действия" id="due_date">
            </div>
        </div>
    </div>
    <div class="ui inverted segment" id="tags_list_bar">
    </div>

    <textarea class="form-control" name="wysiwygeditor"></textarea>

    <div>
        <button class="ui button" id="save_document">Сохранить</button>
    </div>

</div>
<script type="text/javascript">
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.replace('wysiwygeditor');

    $('.ui.dropdown')
        .dropdown()
    ;

    $('#due_date').calendar();
</script>

@endsection