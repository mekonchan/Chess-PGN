<?php
use AmyBoyd\PgnParser\Game;
use AmyBoyd\PgnParser\PgnParser;
use AmyBoyd\PgnParser\Util;

          $data = $_SESSION['data'];
          $name = $data['upload_data']['orig_name'];

          $file = 'assets/pgnfiles/'.$name;
          $parser = new PgnParser($file);
          $count = $parser->countGames();

          //get game data and convert it to JSON format
          $game = $parser->getGame($count-1);
          $json = $game->toJSON();

          //convert JSON format into array
          $array = json_decode($json);

          $moveCount = $array->movesCount;
          $t = explode(" ",$array->moves);
          $count = 1;

          for ($x = 0; $x <= $moveCount-1/2; $x++) {
            if($x%2 == 0){
              @$move[$x] = ($count++).".".$t[$x]." ".$t[$x+1]; 
            }
          } 
          $moveString = implode(" ",$move);
?>
    <html>
    <style>
        #table {
            border-collapse: collapse;
            width: 300px;
        }
        
        #table td,
        #table th {
            border: 1px solid black;
            padding: 8px;
        }
        
        #table tr:nth-child(even) {}
        
        #table th:hover {}
        
        #table th,
        td {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: white;
            color: black;
        }
        
        #loader {
            position: absolute;
            left: 51.5%;
            top: 53%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 100px;
            height: 100px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }
        
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        /* Add animation to "page content" */
        
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }
        
        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }
            to {
                bottom: 0px;
                opacity: 1
            }
        }
        
        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }
            to {
                bottom: 0;
                opacity: 1
            }
        }
        
        #myDiv {
            display: none;
            text-align: center;
        }
        
        #wait {
            text-align: center;
        }
    </style>

    <head>
        <title>gg</title>
        <script src="
            <?php echo base_url("assets/js/ajax.js"); ?>">
        </script>
        <script src="
            <?php echo base_url("assets/js/ltpgnviewer.js"); ?>">
        </script>
    </head>

    <body>
        <div>
            <table id="table" border: 1px solid black; align="center">
                <tr>
                    <th>Range (%)</th>
                    <th>Rank</th>
                </tr>
                <tr>
                    <th>70 - 100</th>
                    <td>PRO</td>
                </tr>
                <tr>
                    <th>60 - 69</th>
                    <td>SEMI PRO</td>
                </tr>
                <tr>
                    <th>50 - 59</th>
                    <td>GOOD</td>
                </tr>
                <tr>
                    <th>0-49</th>
                    <td>MEH...</td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <script>
            window.onbeforeunload = function() {
                return "Data will be lost if you leave the page, are you sure?";
            };

            window.onload = function() {
                pgn2fen();
            };

            var linemove = [];
            var move = "<?php echo $moveString; ?>";
            var moveOnly = <?php echo json_encode($t); ?>;
            var j = 0;
            // var lengtharr = 0;

            function pgn2fen() {

                var startfen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";

                Init(startfen);
                SetPgnMoveText(move);
                var str = "";
                var ff = [],
                    ff_new = "",
                    ff_old;
                do {
                    ff_old = ff_new;
                    MoveForward(1);
                    ff_new = GetFEN();
                    if (ff_old != ff_new) ff.push(ff_new);
                }
                while (ff_old != ff_new);
                ff.unshift(startfen);

                console.log("DATA for FF");
                console.log(ff);
                // lengtharr = ff.length;
                // console.log(ff.length);
                console.log(move);
                console.log(moveOnly);
                loopThroughLine(ff);

            }

            var z = 0;
            var score = 0;
            var countTotal = 0;
            var lastscore = 0;

            function loopThroughLine(ff) {

                var found = "false";
                var q = 100;

                setTimeout(function() {
                    console.log("FEN: " + ff[j]);
                    setRequest(ff[j]);
                    setTimeout(function() {
                        var splitted = content.split(",");
                        console.log("Move White from PGN: " + moveOnly[z]);
                        console.log("Move suggested from engine: ");
                        console.log(splitted);

                        for (var i = 0; i < splitted.length - 1; i++) {
                            if (moveOnly[z].includes(splitted[i]) == true) {
                                score += q;
                                found = "true";
                                break;
                            }
                            q -= 10;
                        }
                        if (found == "false") {
                            score += 50;
                        }
                        z += 2;
                        console.log("Total score obtain by player: " + score);
                        console.log(countTotal * 100);
                        lastscore = score / (countTotal * 100) * 100;
                        var final = lastscore.toFixed(2);
                        document.getElementById('score').innerHTML = final + "%";
                        console.log("White total score as of now: " + lastscore + "%");
                    }, 1900);
                    j += 2;
                    countTotal++;
                    console.log((ff.length - 1));
                    console.log(j);
                    var ratecompletion = j / (ff.length - 1) * 100;
                    var finalrate = ratecompletion.toFixed(2);
                    document.getElementById('ratecompletion').innerHTML = finalrate + "%";
                    if (j < ff.length - 1 && ratecompletion < 100) {
                        loopThroughLine(ff);
                    } else {
                        setTimeout(showPage, 2000);
                        return;
                    }                    
                }, 1900);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
                document.getElementById("wait").style.display = "none";
                document.getElementById("ratecompletion").style.display = "none";

            }
        </script>
        <center>
            <form>
                <div id="loader"></div>
                <div style="display:none;" id="myDiv" class="animate-bottom">
                    <font size="10">
                    <tr align="center">
                        <td>Your Score</td>
                        <br>
                            <span  id="score" align="center"></span>
                        </td>
                    </font>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div id="ratecompletion"></div>
                <br>
                <div id="wait">Please wait your score is being calculated</div>
                </tr>
            </form>
        </center>
    </body>

    </html>