@php
    function GetAvatar($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT avatar FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo '<img height="90%" width="100%" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'"/>';
     $mysqli->close();
    }
    function GetUser($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo $result['name'];
    }
@endphp
@include('pages/functions')
@extends('core/index')
@section('title', 'Crystal')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="/publications/{{Auth::user()->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Публикации</h3>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-view-headline icon-item text-success ml-auto"></i>
                            </div>
                        </div>
                    </div></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="/maininfo/{{Auth::user()->id}}"><div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 style="color:#a7d8de;" class="mb-0">Основная информация</h3>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-account-card-details icon-item text-success ml-auto"></i>
                            </div>
                        </div>
                    </div></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="/contactinfo/{{Auth::user()->id}}"> <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Контактная информация</h3>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-contact-mail icon-item text-success ml-auto"></i>
                            </div>
                        </div>
                    </div></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="/jobinfo/{{Auth::user()->id}}"><div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Работа</h3>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-view-grid icon-item text-success ml-auto"></i>
                            </div>
                        </div>
                    </div></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div style="margin-bottom:25px;" class="card-body">
                    @php GetAvatar(Auth::user()->id);@endphp
                    <div class="@php GetLine(Auth::user()->id); @endphp">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">@php echo Auth::user()->name;@endphp @php GetVerify(Auth::user()->id,0) @endphp</h6>
                        </div>
                        <div
                                class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">@php GetLineText(Auth::user()->id); @endphp</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 style="text-transform: none;" class="card-title mb-1">Основная информация</h4>
                        <p class="text-muted mb-1">@php GetUser(Auth::user()->id)@endphp</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="preview-list">
                                <div class="preview-item">
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Фамилия</h6>
                                            <h6 class="preview-subject">Имя</h6>
                                            <h6 class="preview-subject">Дата рождения</h6>
                                            <h6 class="preview-subject">Страна, город</h6>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            @php $allName = Auth::user()->name; $name = explode(" ", $allName);@endphp
                                            <p class="text-muted">@php echo $name[1] @endphp</p>
                                            <p class="text-muted">@php echo $name[0] @endphp</p>
                                            <p class="text-muted">@php echo date('d.m.Y H:i:s',$maininfo->datebirth)@endphp</p>
                                            <p class="text-muted">@php GetCountry(Auth::user()->countryID);@endphp , @php GetCity(Auth::user()->cityID);@endphp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <h4 style="text-transform: none;" class="card-title mb-1">Информация об образовании</h4>
                            </div>
                            <div class="preview-list">
                                <div class="preview-item">
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Базовое образование</h6>
                                            <h6 class="preview-subject">Среднее образование</h6>
                                            <h6 class="preview-subject">Высшее образование</h6>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted">{{$maininfo->firstEdu}} ({{$maininfo->firstEduStartEnd}})</p>
                                            <p class="text-muted">{{$maininfo->secondEdu}} ({{$maininfo->secondEduStartEnd}})</p>
                                            <p class="text-muted">{{$maininfo->thirdEdu}} ({{$maininfo->thirdEduStartEnd}})</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/">Вернуться на главную страницу профиля</a>
    @php GetVerify(Auth::user()->id,1) @endphp
@endsection