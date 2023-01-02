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
     function GetJobCountry($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT title_ru FROM countries WHERE country_id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['title_ru'];
     }
     function GetJobCity($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT title_ru FROM cities WHERE city_id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['title_ru'];
     }
    function GetJobs($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM jobinfo WHERE idUser = $x ORDER BY datestart DESC";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
     $y = 0;
     $now = date('d.m.Y');
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
            $y++;
                        echo "
                                    <div class=\"preview-item border-bottom\">
                                        <div class=\"preview-thumbnail\">
                                            <div class=\"preview-icon bg-success\">
                                              ".$y."
                                            </div>
                                        </div>
                                        <div class=\"preview-item-content d-sm-flex flex-grow\">
                                            <div class=\"flex-grow\">
                                                <h6 class=\"preview-subject\">".$row['nameCompany']."</h6>
                                                <p class=\"text-muted mb-0\">".GetJobCountry($row['countryID'])." , ".GetJobCity($row['cityID'])."</p>
                                            </div>
                                            <div class=\"mr-auto text-sm-right pt-2 pt-sm-0\">
                                                <p class=\"text-muted\">".date('d.m.Y',$row['datestart'])." по ".date('d.m.Y',$row['dateend'])."</p>
<p class=\"text-muted mb-0\">".$row['jTitle']."</p>
</div>
</div>
</div>            ";

            }
} else {
           echo "Работ нет";
}
    $mysqli->close();
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
                                        <h3 class="mb-0">Основная информация</h3>
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
                                        <h3 style="color:#a7d8de;" class="mb-0">Работа</h3>
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 style="text-transform: none;" class="card-title mb-1">Работа</h4>
                            <p class="text-muted mb-1">@php GetUser(Auth::user()->id)@endphp</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @php GetJobs(Auth::user()->id); @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/">Вернуться на главную страницу профиля</a>
@endsection