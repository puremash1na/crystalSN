@php
    function GetLine($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT status FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
        if($result['status'] == 0) {
            echo "bg-offline d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3";
        }
        else {
            echo "bg-success d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3";
        }
     $mysqli->close();
}
    function GetLineText($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT status FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
        if($result["status"] == 0) {
            echo "Не в сети";
        }
        else if($result["status"] == 1){
            echo "В сети";
        }
     $mysqli->close();
}
    function GetCountry($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT title_ru FROM countries WHERE country_id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo $result['title_ru'];
}
    function GetCity($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT title_ru FROM cities WHERE city_id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo $result['title_ru'];
}
    function GetVerify($x,$y){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT verify,name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     if ($y == 0){
         if($result['verify'] == 0){
         echo "";
     }
     else{
         echo "<i class=\"mdi mdi-check\" aria-hidden=\"true\" data-toggle=\"modal\" data-target=\"#verify\"></i>";
     }
}
     else if($y == 1){
         if($result['verify'] == 0){ echo "";}
         else if($result['verify'] == 1 && $x == 1){
             echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированная страница</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Страница ".$result['name']."<br>была подтверждена администрацией Crystal<br>Разработчик / Основатель Crystal
</div>
</div>
</div>
</div>";}
         else if($result['verify'] == 1 && $x == 2){
             echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированная страница</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Страница ".$result['name']."<br>была подтверждена администрацией Crystal<br>Единственная леди Crystal
</div>
</div>
</div>
</div>";}
         else if($result['verify'] == 1){
             echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированная страница</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Страница ".$result['name']."<br>была подтверждена администрацией Crystal
</div>
</div>
</div>
</div>";}
     }
}
    function GetGroupVerify($x,$y){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT verify,name FROM community WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     if ($y == 0){
         if($result['verify'] == 0){
         echo "";
     }
     else{
         echo "<i class=\"mdi mdi-check\" aria-hidden=\"true\" data-toggle=\"modal\" data-target=\"#verify\"></i>";
     }
}
     else if($y == 1){
         if($result['verify'] == 0){ echo "";}
         else if($result['verify'] == 1){echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированное сообщество</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Сообщество ".$result['name']."<br>было подтверждена администрацией Crystal
</div>
</div>
</div>
</div>";}
     }
}
function GetVerifyFriend($x,$y){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT verify,name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     if ($y == 0){
         if($result['verify'] == 0){
         return "";
     }
     else{
         return "<i class=\"mdi mdi-check\" aria-hidden=\"true\" data-toggle=\"modal\" data-target=\"#verify\"></i>";
     }
}
     else if($y == 1){
         if($result['verify'] == 0){ echo "";}
         else if($result['verify'] == 1 && $x == 1){
             echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированная страница</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Страница ".$result['name']."<br>была подтверждена администрацией Crystal<br>Разработчик / Основатель Crystal
</div>
</div>
</div>
</div>";}
         else if($result['verify'] == 1 && $x == 2){
             echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированная страница</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Страница ".$result['name']."<br>была подтверждена администрацией Crystal<br>Единственная леди Crystal
</div>
</div>
</div>
</div>";}
         else if($result['verify'] == 1){
             echo "
    <div class=\"modal fade\" id=\"verify\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"verify\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"verifyTitle\">Верифицированная страница</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span style=\"color:#fff;\" aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    Страница ".$result['name']."<br>была подтверждена администрацией Crystal
</div>
</div>
</div>
</div>";}
     }
}
@endphp
