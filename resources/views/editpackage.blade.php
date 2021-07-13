@extends('layouts.app')
@section('content')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="/home"><i class="icon-envelope"></i><span>Заявки на получение РВ</span> </a> </li>
                <li><a href="/maintenance"><i class="icon-envelope"></i><span>Заявки на тех. обслуживание</span> </a> </li>
                <li><a href="/client"><i class="icon-user"></i><span>Заказчики</span> </a></li>
                <li><a href="/product"><i class="icon-tag"></i><span>Товары</span> </a> </li>
                <li class="active"><a href="/package"><i class="icon-globe"></i><span>Отправления</span> </a> </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Документ с инструкцией по активации</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="/export">Скачать</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li ><a><i class="icon-plus-sign"></i><span>Добавить отправление</span> </a> </li>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget-content">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <!-- <li>
						    <a href="#formcontrols" data-toggle="tab">Form Controls</a>
						  </li>
						-->
                            <li class="active"><a href="#jscontrols" data-toggle="tab">Данные</a></li>
                        </ul>

                        <br>

                        <div class="tab-content">
                            <div class="tab-pane" id="formcontrols">

                            </div>

                            <div class="tab-pane active" id="jscontrols">
                                <form id="edit-profile" action="{{ url('/edit-package') }}" method="POST" class="form-horizontal">
                                @csrf
                                    <fieldset>

                                        <div class="control-group">
                                            <label class="control-label">Наименование</label>
                                            <div class="controls">
                                                <input type="text" class="span6" name="Name" value="{{$package->name}}">
                                                <p class="help-block">Добавьте наименование к отправлению</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label">Трек-номер</label>
                                            <div class="controls">
                                                <input type="text" class="span6" name="TrackNumber" value="{{$package->track_number}}">
                                                <p class="help-block">Добавьте трек-номер к товару</p>
                                            </div> <!-- /controls -->


                                            <div class="control-group">
                                                <label class="control-label">Транспортная компания</label>

                                                <div class="controls">
                                                    <select class="span6" name="IdTransportCompany">
                                                        @foreach ($companies as $company)
                                                        <option value="{{$company->id}}" @if ($package->transport_company_id==$company->id)
                                                            selected="selected"
                                                            @endif >
                                                            {{$company->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                    <p class="help-block">Укажатите транспортную компанию</p>
                                                </div> <!-- /controls -->

                                            </div> <!-- /control-group -->
                                            <br />
                                            <input type="hidden" name="package_id" value="{{$package->id}}">
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                            </div> <!-- /form-actions -->
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- /widget-content -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->

@endsection