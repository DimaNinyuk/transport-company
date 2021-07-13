@extends('layouts.app')

@section('content')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="/home"><i class="icon-envelope"></i><span>Заявки на получение РВ</span> </a> </li>
                <li class="active"><a href="/maintenance"><i class="icon-envelope"></i><span>Заявки на тех. обслуживание</span> </a> </li>
                <li><a href="/client"><i class="icon-user"></i><span>Заказчики</span> </a></li>
                <li><a href="/product"><i class="icon-tag"></i><span>Товары</span> </a> </li>
                <li><a href="/package"><i class="icon-globe"></i><span>Отправления</span> </a> </li>
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
                <li><a><i class="icon-plus-sign"></i><span>Оформить заявку</span> </a> </li>
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
                                <form id="edit-profile"  action="{{ url('/edit-maintenance') }}" method="POST" class="form-horizontal">
                                @csrf
                                    <fieldset>

                                        <div class="control-group">
                                            <label class="control-label" for="date">Дата</label>
                                            <div class="controls">
                                                <input type="date" class="span6" name="Date" value="{{$maintenanceRequest->date}}">
                                                <p class="help-block">Укажите дату офорления заявки</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Продукт</label>

                                            <div class="controls">
                                                <select class="span6" name="IdProduct">
                                                    @foreach ($products as $product)
                                                    <option value="{{$product->id}}" @if ($maintenanceRequest->product_id==$product->id)
                                                        selected="selected"
                                                        @endif >
                                                        {{$product->name}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                <p class="help-block">Выберите продукт. </p>
                                            </div> <!-- /controls -->

                                        </div> <!-- /control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Клиент</label>
                                            <div class="controls">
                                                <div class="input-append">
                                                    <select class="span4 m-wrap" name="IdCustomer">
                                                        @foreach ($customers as $customer)
                                                        <option value="{{$customer->id}}" @if ($maintenanceRequest->customer_id==$customer->id)
                                                            selected="selected"
                                                            @endif >
                                                            {{$customer->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <a href="/client" class="btn">Добавить нового клиента</a>
                                                </div>
                                                <p class="help-block">Выберите клиента.

                                                </p>
                                            </div> <!-- /controls -->

                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label">Комментарий</label>
                                            <div class="controls">
                                                <textarea class="span6" name="Comment">
                                                {{$maintenanceRequest->comment}}

                                                </textarea>
                                                <p class="help-block">Укажите комментарий к заявке</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Статус</label>

                                            <div class="controls">
                                                <select class="span6" name="IdStatus">
                                                    @foreach ($statuses as $status)
                                                    <option value="{{$status->id}}" @if ($maintenanceRequest->status_id==$status->id)
                                                        selected="selected"
                                                        @endif >
                                                        {{$status->name}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                <p class="help-block">Укажатите статус заявки</p>
                                            </div> <!-- /controls -->

                                        </div> <!-- /control-group -->

                                        <br />

                                        <input type="hidden" name="maintenanceRequest_id" value="{{$maintenanceRequest->id}}">
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