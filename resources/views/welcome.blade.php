@extends('layouts/base')
@section('title', ': Домашняя')
@section('content')

<div>
    <div class="ui divided items" style="left:30%; top:50%; position:absolute">
        <div class="item">
            <a href="/contracts" class="ui secondary button">Договоры</a>
            <div class="meta">
                <span>Просмотреть список договоров, редактировать или распечатать существующие, создать новый</span>
            </div>
        </div>
        <div class="item">
            <a href="/contracts/templates" class="ui secondary button">Шаблоны договоров</a>
            <div class="meta">
                <span>Просмотреть список шаблонов договоров, редактировать существующие, создать новый</span>
            </div>
        </div>
    </div>
</div>

@endsection
