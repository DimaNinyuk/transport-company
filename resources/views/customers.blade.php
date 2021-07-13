@extends('layouts.app')
@section('content')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="/home"><i class="icon-envelope"></i><span>Заявки на получение РВ</span> </a> </li>
                <li><a href="/maintenance"><i class="icon-envelope"></i><span>Заявки на тех. обслуживание</span> </a> </li>
                <li class="active"><a href="/client"><i class="icon-user"></i><span>Заказчики</span> </a></li>
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
                <li><a href="/add-client"><i class="icon-plus-sign"></i><span>Зарегистрировать заказчика</span> </a> </li>
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
                <div class="span12">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>Заказчики</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> Имя</th>
                                        <th> Номер телефона </th>
                                        <th> Email </th>
                                        <th class="td-actions"> Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td> {{$customer->name}} </td>
                                        <td> {{$customer->phone}} </td>
                                        <td> {{$customer->email}} </td>
                                        <td class="td-actions"><a href="/edit-client/{{$customer->id}}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                                            
                                            <a class="btn btn-danger btn-small" href="{{ url('/delete-customer') }}" onclick="event.preventDefault();
                                                     document.getElementById('customer-form').submit();"><i class="btn-icon-only icon-remove"></i> </a>
                                            <form id="customer-form" action="{{url('/delete-customer') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->

                </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->
@endsection