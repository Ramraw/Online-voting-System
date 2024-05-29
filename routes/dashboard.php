<?php
    session_start();
    if(!isset($_SESSION['userdata'])) {
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status'] == 0) {
        $status = '<b style="color:red">Not voted</b>';
    }
    else {
        $status = '<b style="color:green">Voted</b>';
    }
?>


<html>
    <head>
        <title>Election Commision of India - Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>

    <body>

        <style>
            #backbtn {
                border-radius: 5px;
                padding: 10px;
                background-color: royalblue;
                color: white;
                font-size: 15px;
                float: left;
                margin:10px;
            }

            #logoutbtn {
                border-radius: 5px;
                padding: 10px;
                background-color: royalblue;
                color: white;
                font-size: 15px;
                float: right;
                margin:10px;
            }

            #Profile {
                background-color: white;
                width: 30%;
                padding: 20px;
                float: left;
                border: solid;
                border-radius: 10px;
            }

            #Group {
                background-color: white;
                width: 60%;
                padding: 20px;
                float: right;
                border: solid;
                border-radius: 10px;
            }

            #votebtn {
                border-radius: 5px;
                background-color: royalblue;
                color: white;
                font-size: 15px;
                padding: 5px;
            }

            #mainpanel {
                padding: 10px;
            }

            #voted {
                border-radius: 5px;
                background-color: green;
                color: white;
                font-size: 15px;
                padding: 5px;
            }

            #mainpanel #Profile img {
                border-radius:10px;
                border-color:grey;
            }

        </style>
        <div id="mainSection">
            <center>
            <div id="headerSection">
                <a href="../"><button id="backbtn"> back</button></a>
                <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
                <h1>Election Commision of India</h1>
            </div>
            </center>
            <div id="mainpanel">
                <div id="Profile">
                    <center><img style="border:solid"src="../uploads/<?php echo $userdata['photo']?>" height="100", width="100"></center><br><br>
                    <b>Name :</b> <?php echo $userdata['name']?><br><br>
                    <b>Mobile :</b> <?php echo $userdata['mobile']?><br><br>
                    <b>Address :</b> <?php echo $userdata['address']?><br><br>
                    <b>Status :</b> <?php echo $status?><br><br>
                </div>

                <div id="Group">
                    <?php
                        if($_SESSION['groupsdata']) {
                            for($i=0; $i<count($groupsdata); $i++) {
                            ?>
                            
                            <div>
                                    <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                                    <b>Group Name : </b><?php echo $groupsdata[$i]['name']?><br><br>
                                    <b>Votes : </b><?php echo $groupsdata[$i]['votes']?><br><br>
                                    <form action="../api/vote.php" method="post">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                        <?php
                                            if($_SESSION['userdata']['status'] == 0) {
                                                ?>
                                                    <input type="submit" name="votebtn" value="vote" id="votebtn">
                                                <?php
                                             
                                            }
                                            else {
                                                ?>
                                                    <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                                <?php
                                            }
                                        ?>
                            
                                    </form>
                                    
                            </div>
                            <hr>
                            <?php
                            }
                        }
                        else {

                        }
                    ?>
                </div>
            </div>
            
        </div>

    </body>
</html>