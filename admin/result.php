

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgb(218, 218, 249);
            padding: 20px;
        }
        .cards{
            display: flex;
            flex-direction: column;
            background-color: rgb(192, 255, 243);
            width: 700px;
            padding: 30px;
            justify-content: center;
            align-items: center;
            border: 1px solid rgb(0, 87, 71);
            gap: 30px;
        }
        .card{
            background-color: rgb(89, 165, 237);
            border: 1px solid rgb(0, 64, 255);
            height: 200px;
            width: 350px;
            padding: 10px;
        }
        .btn{
            display: flex;
            gap: 20px;
        }
        .btn h2{
            color: rgb(34, 33, 33);
            background-color: rgb(98, 102, 107);
        }
        .btn h2:hover{
            cursor: pointer;
        }
        #winnersList{
            display: flex;
            /* flex-direction: column; */
            gap: 20px;
        }
        .reset{
            background-color: white;
            border-radius: 10px;
            font-size: 2rem;
            position: absolute;
            left: 10px;
            top: 40px;
            max-width: 200px;
        }
        .r{
            color: red;
        }
        .button2 {
            width: 190px;
            height: 50px;
            font-size: 2rem;
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
    cursor: pointer;
  background-color: #008CBA;
  color: white;
}
    </style>
</head>
<body>
<div class="reset">
    <p class="r"><span style="color"> Important:</span> <br> Reset all information of candidate from clicking below</p>
        <a href="reset.php"><button class="button button2">Reset <i class="fa fa-arrow-right"></i> </button></a>   
        </div>
    <div class="container">
        <div class="btn">
            <h2>Winners</h2>
            <h2>Details</h2>
        </div>
        <?php
        require("../forms/_dbconnect.php");
            echo '<div class="winners cards">';
            $query = "select votecount from candidates";
            $result = mysqli_query($conn,$query);
            $heighest = 0;
            while($row = mysqli_fetch_assoc($result)){
                if($heighest <= $row["votecount"]){
                    $heighest = $row["votecount"];
                }
            }
            //  MANAGE THE CASE WHEN THERE IS MULTIPLE POST

            $query = "select * from candidates";
            $result = mysqli_query($conn,$query);
            $winner = array();
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                if($heighest == $row["votecount"]){
                    $winner[$i] = $row;
                    $i = $i+1;
                }
            }

            // print_r($winner);
            echo '<div id="winnersList" style="display:none">';
            while($i-->0)
            echo '
                <div class="card">
                    <h3> Post : '.$winner[$i]["Post"].'</h3>
                    <div>
                    <h4> Name: '.$winner[$i]["Name"].'</h4>
                    <p>votes: '.$winner[$i]["votecount"].'</p>
                    </div>
                </div>
            ';
            echo '</div>';

            ?>

            <div id="DetailedList" style="display:none">
            <?php
            $q = "select * from candidates";
            $res = mysqli_query($conn,$q);
            while($row = mysqli_fetch_assoc($res)){
                echo '
                <div class="card">
                    <h3> Post : '.$row["Post"].'</h3>
                    <div>
                    <h4> Name: '.$row["Name"].'</h4>
                    <p>votes: '.$row["votecount"].'</p>
                    </div>
                </div>
                ';
            }
            ?>
            </div>

    </div>
</body>

<script>
    let deletes = document.getElementsByClassName("btn");
    Array.from(deletes).forEach((element)=>{
        element.addEventListener("click",(e)=>{
            node = e.target;
            text = node.innerText;
            node.style.textDecoration = "underline overline";
            console.log(text);
            if(text == "Winners"){
                window.location = `./result.php?winners`;
            }
            if(text == "Details"){
                window.location = `./result.php?details`;
            }
        })  
    });

</script>
<script>
        st = window.location.href;
        if(st.includes("winners")){
            y = document.getElementById("winnersList");
            y.style.display = "block";
        }else{
            y = document.getElementById("winnersList");
            y.style.display = "none";
        }
        if(st.includes("details")){
            y = document.getElementById("DetailedList");
            y.style.display = "block";
        }else{
            y = document.getElementById("DetailedList");
            y.style.display = "none";
        }
    </script>
</html>