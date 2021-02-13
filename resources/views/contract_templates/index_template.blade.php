@extends('layouts.base')
@section('title', ': Шаблоны')
@section('content')

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
  <div class="ui grid">
    <div class="seven wide column">
      <div class="ui top attached segment">
        <div class="ui list">
          <div class="item">
            <i class="users icon"></i>
            <div class="content">
              Semantic UI
            </div>
          </div>
          <div class="item">
            <i class="users icon"></i>
            <div class="content">
              Semantic UI
            </div>
          </div>
          <div class="item">
            <i class="users icon"></i>
            <div class="content">
              Semantic UI
            </div>
          </div>
        </div>
        <div class="ui top attached label">
          <a href="/templates/create/">
            <i data-content="Copy code" class="plus circle icon"></i>
          </a>
          Список существующих шаблонов
        </div>
      </div>
    </div>
    <div class="six wide column">
      <div class="ui top attached segment">
        <div class="ui bulleted list">
          <div class="item">Gaining Access</div>
          <div class="item">Inviting Friends</div>
          <div class="item">
            <div>Benefits</div>
            <div class="list">
              <a class="item" href="#">Link to somewhere</a>
              <div class="item">Rebates</div>
              <div class="item">Discounts</div>
            </div>
          </div>
          <div class="item">Warranty</div>
        </div>
        <div class="ui top attached label">
          Управление прочими данным
        </div>
      </div>
    </div>
  </div>
</div>
@endsection