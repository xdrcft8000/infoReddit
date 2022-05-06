<header class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <nav>
            <img src="assets/IR_Logo_2.PNG" alt="InFoReddit Logo. A stylised orange IR in a grey gearwheel." class="left">
            <ul class="nav navbar-nav navbar-right">
                <?php
                // Define each name associated with a URL
                $urls = array(
                    'Home' => '/dashboard/team-site/',
                    'About Us' => '/dashboard/team-site/abootus.php',
                    'Results' => '/dashboard/team-site/Results.php',
                    // …
                );

                foreach ($urls as $name => $url) {
                    print '<li '.(($currentPage === $name) ? ' class="active" ': '').
                        '><a href="'.$url.'"><h2>'.$name.'</h2></a></li>';
                }
                ?>
            </ul>
            <img src="assets/IR_Logo_2.PNG" alt="InFoReddit Logo. A stylised orange IR in a grey gearwheel." class="right">
        </nav>
    </div>
</header>
