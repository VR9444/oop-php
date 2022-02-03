<?php
session_start();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="navbar">
            <ul class="lista-horizont">
                <h4>Viktor Rackov</h4>
                <li>Home</li>
                <li>Home</li>
                <li>Home</li>
                <li>Home</li>
            </ul>
            <ul class="lista-desna-horizont">
                <?php
                if(isset($_SESSION['username'])){
                    echo"<li>".$_SESSION['username']."</li>";
                    echo"<li><a href='./includes/logout.inc.php'>Log out</a></li>";
                    }
                ?>
            </ul>
        </div>
    </section>
    <section class="wrap-search">
    <div class="search-section">
        <input id="search-main" type="text">

        <div id="pretraga">
        </div>
    </div>
        <button id="search-button">Search</button>
    </section>
    <section>
        <div id="rezultat_pretrage">

        </div>
    </section>
    <section class="signup-login">
        <div class="div-signup">
            <form action="./includes/signup.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="text" name="Password" placeholder="Password">
                <br>
                <input type="text" name="Pass-reap" placeholder="Repeat password">
                <br>
                <input type="email" name="email" placeholder="email">
                <br>
                <input type="submit" value="SIGN UP" name="submit">
            </form>
        </div>
        <div class="div-login">
            <form action="./includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="text" name="Password" placeholder="Password">
                <br>
                <input type="submit" value="LOG IN" name="submit">
            </form>
        </div>
    </section>
</body>
</html>

<script>
    document.getElementById('pretraga').style.borderWidth='0px';
    $(document).ready(()=>{
        $('#search-main').keyup(()=>{
            document.getElementById('pretraga').innerHTML="";
            let search = document.getElementById('search-main').value;
            if(search ==''){
                document.getElementById('pretraga').style.borderWidth='0px';
                return;
            }
            $.ajax(
                {
                    url: './includes/search.inc.php',
                    method: 'post',
                    data: {
                        'search': search
                    },
                    success:(response) => {

                        //console.log(response);
                        $res=JSON.parse(response);
                        if($res.length >0){
                            document.getElementById('pretraga').style.borderWidth='1px';
                            for(let i=0;i < $res.length && i < 10;i++) {
                                console.log($res[i]['username']);
                                var data = document.createElement("div");
                                data.innerHTML += "<span class='item-pretrage' onclick=\"pretraga(\'"+$res[i]['username']+"\')\">"+$res[i]['username']+"</span>";
                                $('#pretraga').append(data);


                            }
                        }

                    }

                });
        })

    });

    function pretraga($search){
        document.getElementById('search-main').value = $search;
        document.getElementById('pretraga').innerHTML="";
        document.getElementById('pretraga').style.borderWidth='0px';
    }
</script>
<script src="javascript/rezultatPretrage.javascript.js"></script>