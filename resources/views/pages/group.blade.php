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
    function GetCommunityAvatar($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT logo FROM community WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo '<img style="width:90%;height:100%" src="data:image/jpeg;base64,'.base64_encode( $result['logo'] ).'"/>';
     $mysqli->close();
    }
    function GetAuthor($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo $result['name'];
     $mysqli->close();
    }
@endphp
@include('pages/functions')
@extends('core/index')
@section('title', ''.$group->name.' - Crystal')
@section('community', 'active')
@section('content')
    <div class="content-wrapper">
        <!-- next-->
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div style="margin-bottom:75px;" class="card-body">
                        @php GetCommunityAvatar($group->id) @endphp
                        <div
                            class="bg-success d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">{{$group->name}} @php GetGroupVerify($group->id,0) @endphp</h6>
                                <p class="text-md mb-0">@php echo number_format($group->users, 0, '.', '.');@endphp
                                    участников</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Публикации</h4>
                            <p class="text-muted mb-1">{{$group->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <a href="">
                        <div class="card-body">
                            <h5>Подписчики</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">0</h2>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-account-check icon-item text-success ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <a href="">
                        <div class="card-body">
                            <h5>Администрация</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">0</h2>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-account-minus icon-item text-success ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <a href="">
                        <div class="card-body">
                            <h5>Контакты</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">0</h2>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-view-headline icon-item text-success ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @php GetGroupVerify($group->id,1) @endphp
@endsection
