<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/new-styles.css">
    <link rel="stylesheet" href="css/tablecss.css">

    <title>Home | InFoReddit</title>
    <link rel="icon" type="image/x-image" href="assets/ir_logo_2_iMD_icon.ico">
</head>
    <body>
        <?php $currentPage = 'About Us'?>
        <?php require_once('navigation.php');?>

        <main>
            <div class="content">
                <h1 id="main-title" class="title">InFoReddit</h1>
                <h1 id = "underscore" class="blinking title">_</h1>
                <br>
                <p class="ab-us-p">    InFoReddit is a project we are working on as part of our group module at Cardiff University.
                    Our aim was to build a tool which allows the user to provide a link and get information regarding its spread on Reddit, including the Top Subreddits where it was posted, and the number of upvotes it has. <br>
                    We hope that you'll find this tool fun to use and be able to navigate through it easily.</p>

                <h2 class="title">Legal Disclaimer:</h2>
                <p class="ab-us-p">We, as the developing team, would like to state that neither we nor Reddit itself are liable for any harmful
                    content the users of this tool might be exposed to. For more details, see our <a href="assets/terms.pdf">Terms of Use.</a>
                    Contact us:
                    <a href="mailto:plumsteadms@cardiff.ac.uk?subject=InFoReddit%20Site">plumsteadms@cardiff.ac.uk</a></p>

                <table class="center">
                    <thead>
                    <tr>
                        <th>Picture
                        <th>Name
                        <th>About Me!
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="assets/6.png" alt="">
                        <td>Rania Christou
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/mat.jpg" alt="">
                        <td>Mathieu Chaperon
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/nick.jpg" alt="">
                        <td>Nicholas Penny
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/tayyeb.jpg" alt="">
                        <td>Tayyeb Rafique
                        <td>Back-End Lead and CS student.
                    <tr>
                        <td><img src="assets/cam.jpg" alt="">
                        <td>Cameron Williams
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/morgan.jpg" alt="">
                        <td>Morgan Plumstead
                        <td>Team Leader, Spaceflight fan, Reddit User, Scout Leader, and Soon-to-be Operations Assistant at ATS Controls. Currently a Year 2 CS Student, Cardiff University.
                    <tr>
                        <td><img src="assets/lewis.png" alt="">
                        <td>Lewis Richards
                        <td>Front-End Lead. CS Student Year 2.
                    </tbody>
                </table>
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
