@php
    function GetAuthor($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo $result['name'];
     $mysqli->close();
    }
    function GetPublicationType($x){
        if($x == 0) {
            return "
    <div class=\"preview-thumbnail\">
        <div class=\"preview-icon rounded-circle\">
            <i class=\"mdi mdi-file-outline text-success\"> Блог</i>
        </div>
    </div>";
        }
        else if($x == 1) {
            return "
    <div class=\"preview-thumbnail\">
        <div class=\"preview-icon rounded-circle\">
            <i class=\"mdi mdi-web text-success\"> Статья</i>
        </div>
    </div>";
        }
        else if($x == 2) {
            return "
    <div class=\"preview-thumbnail\">
        <div class=\"preview-icon rounded-circle\">
            <i class=\"mdi mdi-layers text-success\"> Новость</i>
        </div>
    </div>";
        }
    }
    function GetPublications($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM publications WHERE idAuthor = $x ORDER BY datePub DESC;";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
            echo "
                                <tr>
                                        <td>".GetPublicationType($row['typePub'])."</td>
                                        <td>".$row['titlePub']."</td>
                                        <td>".$row['shortDesc']."</td>
                                        <td>".date('d.m.Y H:i:s',$row['datePub'])."</td>
                                        <td><a data-toggle=\"modal\" data-target=\"#news".$row['id']."\" style=\"width:100%; margin-bottom:10px;\" class=\"badge badge-outline-success\">Прочитать</a></td>
                                </tr>";

    }
} else {
           echo "Публикаций нет";
}
    $mysqli->close();
    }
    function GetAllPublication($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM publications WHERE idAuthor = $x ORDER BY datePub DESC;";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
             echo "
    <div class=\"modal fade\" id=\"news".$row['id']."\" tabindex=\"-1\" role=\"news".$row['id']."\" aria-labelledby=\"news".$row['id']."\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"publicationTitle\">".GetPublicationType($row['typePub'])."</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                Название публикации: ".$row['titlePub']."<br>
                Дата публикации: ".date('d.m.Y H:i:s',$row['datePub'])."<br><br>
                ".$row['messagePub']."
</div>
</div>
</div>
</div>";
    }
} else {
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
                                        <h3 style="color:#a7d8de;" class="mb-0">Публикации</h3>
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
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1">Публикации</h4>
                        <p class="text-muted mb-1">@php GetAuthor($publication->idAuthor);@endphp</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Тип публикации</th>
                                <th>Название публикции</th>
                                <th>Краткое описание</th>
                                <th>Дата публикации</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php GetPublications($publication->idAuthor);@endphp

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><br>
            <a href="/">Вернуться на главную страницу профиля</a>
        </div>
    @php GetAllPublication(1);@endphp
@endsection
