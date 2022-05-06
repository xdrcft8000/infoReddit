<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/new-styles.css">

    <title>Home | InFoReddit</title>
    <link rel="icon" type="image/x-image" href="assets/ir_logo_2_iMD_icon.ico">
</head>
    <body>
        <?php $currentPage = 'Home'?>
        <?php require_once('navigation.php');?>

        <main>
            <div class="content">
                <h1 id="main-title">InFoReddit</h1>
                <h1 id = "underscore" class="blinking title">_</h1>
                <br>
                <p id="main-p"> InFoReddit is a tool that allows you to enter any link in the search bar below and get various information regarding its spread around the platform Reddit. <i>Please note any use of the tool is subject to both our <a href="assets/terms.pdf">Terms of Use</a>, and Reddit's <a href="https://www.redditinc.com/policies/user-agreement">User Agreement.</a></i></p>
                <search>
                  <div id="search">
                    <div id="icon"></div>
                    <form action="cgi-bin/testapi.py" method="GET">
                    <div class="input">
                        <input type="text" name = "searchterm" placeholder="Search" id="mysearch">
                        <br>
                        <input type="range" id="timecache" name="timecache" value="120" min="60" max="600" step="60">
                    </div>
                    </form>
                    <span class="clear" onclick="document.getElementById ('mysearch').value= ''; document.getElementById('timecache').value='120'"></span>
                  </div>

                  <script>
                    const icon = document.querySelector('#icon');
                    const search = document.querySelector('#search');
                    const slider = document.querySelector('#timecache');
                    icon.onclick = function(){
                      search.classList.toggle('active')
                        slider.classList.toggle('active')
                    }
                  </script>
                </search>
                <img id="logo-main" src="assets/IR_Logo_2.PNG" alt="InFoReddit Logo. A stylised orange IR in a grey gearwheel.">
            </div>
        </main>
        <div id="foot">
            <footer>
                <div id="footer-div">
                    <h3 class="left">InFoReddit, the Mid-Fold of the Internet. <br> Created by Team 08 for the CM2305 Module.</h3>
                    <h3 class="right">Cardiff University, 2022</h3>
                </div>
            </footer>
        </div>
    </body>
</html>
