<?php
    /*
     * php-nav
     * Simple PHP navbar
     * Version 0.1
    */

    // Navbar Header
    $navH1 = "TRASH LOCATOR";

    /*
     * Links, Change the link you want by putting True
     * You can have more than 4 links.
     * I'll release a text tutorial on how to do that
     * Set these to either true or false (or something else :thinking:)
     * depending on what navbar link you want enabled.
    */
    $navbarLink1 = true;
    $navbarLink2 = true;
    $navbarLink3 = true;
    $navbarLink4 = true;

    /*
     * The href and text for the links.
     * These go in order. You can mix these up
     * if you really want, but ask yourself. Why?
    */

    // Link 1
    $navbarLink1href = "index.php";
    $navbarLink1text = "dashboard";

    // Link 2
    $navbarLink2href = "about.php";
    $navbarLink2text = "About";

    // Link 3
    $navbarLink3href = "upload_images.php";
    $navbarLink3text = "Upload";

    // Link 4
    $navbarLink4href = "logout.php";
    $navbarLink4text = "Logout";


    /*
     * The more geeky bits start here
     * Unless you somewhat understand what you're doing
     * possibly leave this bit alone
    */

    // Start of Navbar
    echo '<nav class="php-nav">'. "\n";

    /*
     * If $navH1 is empty then alert the user
     * If not then show $navH1
    */
    if(empty($navH1)) {
        echo "\t\t<h3>No text for &#36navH1</h3>\n";
    } else {
        echo "\t\t<h3>" . $navH1 . "</h3>\n";
    }
    // Navbar Link Container
    echo "\t\t" . '<div class="php-nav-linkContainer">' . "\n";

    // If Navbar link1 is True
    if($navbarLink1 === true) {
        echo "\t\t\t" . '<a href="' . $navbarLink1href . '" class="php-nav-btn">' . $navbarLink1text . "</a>";
    }
    if($navbarLink2 === true) {
        echo "\n\t\t\t" . '<a href="' . $navbarLink2href . '" class="php-nav-btn">' . $navbarLink2text . "</a>";
    }
    if($navbarLink3 === true) {
        echo "\n\t\t\t" . '<a href="' . $navbarLink3href . '" class="php-nav-btn">' . $navbarLink3text . "</a>";
    }
    if($navbarLink4 === true) {
        echo "\n\t\t\t" . '<a href="' . $navbarLink4href . '" class="php-nav-btn">' . $navbarLink4text . "</a>";
    }

    // If no navbar links have been set then alert the user
    if($navbarLink1 !== true && $navbarLink2 !== true && $navbarLink3 !== true && $navbarLink4 !== true) {
        echo "\t\t\t<p>All navbar links are set to <b>false</b></p>";
    }

    // End of Navbar
    echo "\n\t\t" . '</div>';
    echo "\n\t" . "</nav>" . "\n";
?>