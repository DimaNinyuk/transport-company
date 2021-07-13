@extends('layouts.app')

@section('content')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="/home"><i class="icon-envelope"></i><span>Заявки на получение РВ</span> </a> </li>
                <li><a href="/maintenance"><i class="icon-envelope"></i><span>Заявки на тех. обслуживание</span> </a> </li>
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
                <li><a  href="/home"><i class="icon-list-alt"></i><span>Активируются</span> </a> </li>
                <li><a href="/product-request-process"><i class="icon-truck"></i><span>Отправлены</span> </a> </li>
                <li><a href="/product-request-finish"><i class="icon-refresh"></i><span>В работе</span> </a></li>
                <li class="active"><a href="/product-request-create"><i class="icon-plus-sign"></i><span>Оформить заявку</span> </a> </li>
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
                                <form id="edit-profile" action="{{ url('/product-request-create') }}" method="POST" class="form-horizontal">
                                @csrf
                                    <fieldset>

                                        <div class="control-group">
                                            <label class="control-label" for="date" >Дата</label>
                                            <div class="controls">
                                                <input type="date" class="span6" name="Date" >
                                                <p class="help-block">Укажите дату офорления заявки</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label" for="address">Адрес</label>
                                            <div class="controls">
                                                <input type="text" class="span6" name="address" >
                                                <p class="help-block">Укажите адрес доставки</p>
                                            </div> <!-- /controls -->

                                        </div> <!-- /control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Продукт</label>

                                            <div class="controls">
                                                <select class="span6" name="IdProduct">
                                                    @foreach ($products as $product)
                                                    <option value="{{$product->id}}" >
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
                                                        <option value="{{$customer->id}}"  >
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
                                            <label class="control-label">Трек-номер</label>

                                            <div class="controls">
                                                <div class="input-append">
                                                    <select class="span4 m-wrap" name="IdPackage">
                                                        @foreach ($packages as $package)
                                                        <option value="{{$package->id}}">
                                                            {{$package->track_number}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <a href="/package" class="btn">Добавить новый трек-номер</a>
                                                </div>
                                            </div> <!-- /controls -->
                                            <div class="controls">

                                                <p class="help-block">Выберите трек номер.

                                                </p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label">Номер телефона</label>
                                            <div class="controls">
                                                <input type="text" class="span6" name="Phone" >
                                                <p class="help-block">Укажите номер телефона</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label">Адрес электронной почты</label>
                                            <div class="controls">
                                                <input type="text" class="span6" name="Email" >
                                                <p class="help-block">Укажите адрес электронной почты</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label">Комментарий</label>
                                            <div class="controls">
                                                <textarea class="span6" name="Comment" >
                                                
                                                </textarea>
                                                <p class="help-block">Укажите комментарий к заявке</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">
                                            <label class="control-label">Статус</label>

                                            <div class="controls">
                                                <select class="span6" name="IdStatus">
                                                    @foreach ($statuses as $status)
                                                    <option value="{{$status->id}}"  >
                                                        {{$status->name}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                <p class="help-block">Укажатите статус заявки</p>
                                            </div> <!-- /controls -->

                                        </div> <!-- /control-group -->
                                        <br />

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