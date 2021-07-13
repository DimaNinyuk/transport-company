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
                    <li><a href="/home"><i class="icon-list-alt"></i><span>Активируются</span> </a> </li>
                    <li class="active"><a href="/product-request-process"><i class="icon-truck"></i><span>Отправлены</span> </a> </li>
                    <li><a href="/product-request-finish"><i class="icon-refresh"></i><span>В работе</span> </a></li>
                    <li><a href="/product-request-create"><i class="icon-plus-sign"></i><span>Оформить заявку</span> </a> </li>
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
                                <h3>Заявки на получение РВ</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Дата </th>
                                            <th> РВ </th>
                                            <th> Статус </th>
                                            <th> Заказчик </th>
                                            <th> Номер телефона </th>
                                            <th> Адрес </th>
                                            <th> Трек номер </th>
                                            <th class="td-actions"> Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($newRequests)
                                    @foreach ($newRequests as $newRequest)
                                    <tr>
                                            <td> {{$newRequest->date}} </td>
                                            <td> {{$newRequest->id}} </td>
                                            <td> {{$newRequest->status->name}} </td>
                                            <td> {{$newRequest->customer->name}} </td>
                                            <td> {{$newRequest->customer->phone}} </td>
                                            <td> {{$newRequest->adress}} </td>
                                            <td> {{$newRequest->package->track_number}} </td>
                                            <td class="td-actions"><a href="/edit-product-request/{{$newRequest->id}}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                                            <a class="btn btn-danger btn-small" href="{{ url('/delete-product-request') }}" onclick="event.preventDefault();
                                                     document.getElementById('customer-form').submit();"><i class="btn-icon-only icon-remove"></i> </a>
                                            <form id="customer-form" action="{{url('/delete-product-request') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$newRequest->id}}">
                                            </form>
                                        </td>
                                        </tr>
                                         
                                    @endforeach
                                    @endif
                                   
                                        
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
