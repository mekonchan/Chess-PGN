<?php

$security_code = "1534";
$pfad_stockfish  = "C:/xampp/htdocs/Chess/assets/stockfish/Windows/stockfish_10_x64.exe";
$thinking_time = 1000; # milliseconds

$_SESSION['code'] = $security_code;
?>

    <!doctype html>
    <html>

    <head>
        <br>
        <br>
        <br>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <link rel="stylesheet" href="<?php echo base_url("assets/css/chessboard.css"); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style type="text/css">
            <!-- .center {
                margin: auto;
                width: 60%;
                padding: 10px;
            }
            
            body,
            td,
            th {
                font-family: Arial, Helvetica, sans-serif;
            }
            
            #hideme {
                display: none;
            }
            
            .Stil1 {
                font-size: 12px
            }
            
            .Stil2 {
                font-size: 12
            }
            
            .Stil3 {
                color: #FFFFFF
            }
            
            .Stil4 {
                font-size: 12px;
                color: #FFFFFF;
            }
            
            -->
        </style>
        <script src="<?php echo base_url("assets/js/chess.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/json3.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery-1.10.1.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/chessboard.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/ajax.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/board.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/captured_pieces.js"); ?>"></script>

    </head>

    <body>
        <table width="100%" border="0" class="center">
            <tr>
                <td width="53%" rowspan="8" valign="top">
                    <div id="board" style="width: 450px"></div>
                    <p><span id="captured_pieces_w"></span>
                        <br>
                        <br>
                    </p>
                    <span id="captured_pieces_b"></span>

                    <hr align="left" width="450" size="1" /> </td>
                <td width="62%">

                </td>
            </tr>
            <tr>
                <td align="left" valign="top">
                    <h1>Play with Stockfish!</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Sound:
                        <input type="checkbox" id="soundcheck" onClick="soundcheck()" value="checkbox" checked> Stockfish vs. Stockfish:<span id="result_box" class="short_text" lang="en"> </span>
                        <input type="checkbox" id="stockfcheck" onClick="stockfcheck()" value="checkbox">
                    </p>
                    <p><strong>Thinktime: <?php echo $thinking_time ?> milliseconds</strong></p>
                    <p><strong> Movetime: 1 seconds</strong></p>
                    <p>
                        <br/>
                        <input type="button" id="flipOrientationBtn" value="Flip orientation" />
                        <p>
                            <input type="button" value="Download PGN" id="download">
                        </p>
                    </p>
                </td>

            </tr>
            <tr>
                <td height="0" valign="top">
                    <p>
                        <input type="button" id="move" value="MOVE" />
                    </p>
                    <p>
                        <input type="button" id="bestmove" value="BESTMOVE" />
                    </p>
                    <form name="form1" method="post" action="">
                        <input type="submit" name="Submit" value="Clear Board">
                    </form>
                </td>
            </tr>
            <tr>
                <td>Engine moved:
                    <span id="content"></span></td>
            </tr>
            <tr>
                <td>Recommended moved:
                    <span id="content2"></span></td>
            </tr>
            <tr>
                <td height="0">Status: <span id="status"></span></td>
            </tr>
            <tr>
                <td height="0">FEN: <span id="fen"></span></td>
            </tr>
            <tr>
                <td>PGN: <span id="pgn"></span></td>
            </tr>
            <tr>
                <td></td>
                <td>&nbsp;</td>
            </tr>
        </table>

        <div id="hideme">
            <span id="sound"></span>
        </div>

    </body>

    </html>