<?php
session_start();
include('includes/config.php');
include('includes/header.php');
?>
<?php
//kontroll om sessionsvariabel finns
if (!isset($_SESSION['username']) && (!isset($_SESSION['id']))) {
    header("Location: index.php?message=2");
} else {
    // echo "<span class='loggedin'>Du är inloggad som " . $_SESSION['username'] . "</span>";
}
?>
<script src="https://cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
<section class="main">
    <?php
    // om anv ej är inloggad, redirect
    if (!isset($_SESSION['username'])) {
        header("Location: index.php?message=2");
    } else {
        //annars skriv ut
        echo "<h1>Välkommen " . $_SESSION['username'] . "!</h1>";
    }
    ?>

 
        <div class="grid">
            <a href="logout.php" class="logoutbtn">Logga ut</a>
        </div>
       

</section>
    <section class="main2">
        <h2 class="centerh2">Kurser</h2>


        <div class="table-wrapper" tabindex="0">


            <div class="course">

                <table id="paginatedTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kurs</th>
                            <th>Lärosäte</th>
                            <th>Kursstart</th>
                            <th>Kursslut</th>
                            <th>Ändra</th>
                        </tr>
                    </thead>
                    <tbody id="courses">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="formgrid">
            <div class="fillform">
                <h2 class="userh2">Lägg till kurs</h2>

                <form>
                    <label for="coursename">Kurs</label>
                    <br>
                    <input type="text" name="coursename" id="coursename" class="forminput">
                    <br>
                    <label for="school">Lärosäte</label>
                    <br>
                    <input type="text" name="school" id="school" class="forminput">
                    <br>
                    <label for="starts">Start</label>
                    <br>
                    <input type="date" name="starts" id="starts" class="forminput">
                    <br>
                    <label for="stops">Slut</label>
                    <br>
                    <input type="date" name="stops" id="stops" class="forminput">
                    <br>
                    <input type="submit" value="Lägg till kurs" id="create" class="formbtn">
                </form>
            </div>
            <div class="fillform">
                <h2 class="userh2">Uppdatera kurs</h2>

                <div id="updateform">
                    <form>
                    <input type="hidden" name="courseidUpdate" id="courseidUpdate" class="forminput">
                        <label for="coursenameUpdate">Kurs</label>
                        <br>
                        <input type="text" name="coursenameUpdate" id="coursenameUpdate" class="forminput">
                        <br>
                        <label for="schoolUpdate">Lärosäte</label>
                        <br>
                        <input type="text" name="schoolUpdate" id="schoolUpdate" class="forminput">
                        <br>
                        <label for="startsUpdate">Start</label>
                        <br>
                        <input type="date" name="startsUpdate" id="startsUpdate" class="forminput">
                        <br>
                        <label for="stopsUpdate">Slut</label>
                        <br>
                        <input type="date" name="stopsUpdate" id="stopsUpdate" class="forminput">
                        <br>
                        <input type="submit" value="Uppdatera kurs" id="update" class="formbtn">
                    </form>
                </div>

            </div>
        </div>





        <h2 class="centerh2">Arbeten</h2>
        <div class="table-wrapper" tabindex="0">
            <div class="work">
                <table id="paginatedTable2">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Arbetsplats</th>
                            <th>Titel</th>
                            <th>Stad</th>
                            <th>Land</th>
                            <th>Beskrivning</th>
                            <th>Start</th>
                            <th>Slut</th>
                            <th>Ändra</th>
                        </tr>
                    </thead>
                    <tbody id="works">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="formgrid">
            <div class="fillform">
                <h2 class="userh2">Lägg till arbete</h2>
                <form>
                    <label for="workplace">Arbetsplats</label>
                    <br>
                    <input type="text" name="workplace" id="workplace" class="forminput">
                    <br>
                    <label for="title">Titel</label>
                    <br>
                    <input type="text" name="title" id="title" class="forminput">
                    <br>
                    <label for="city">Stad</label>
                    <br>
                    <input type="text" name="city" id="city" class="forminput">
                    <br>
                    <label for="country">Land</label>
                    <br>
                    <input type="text" name="country" id="country" class="forminput">
                    <br>
                    <label for="descriptionwork">Beskrivning</label>
                    <br>
                    <input type="text" name="descriptionwork" id="descriptionwork" class="forminput">
                    <br>
                    <label for="start">Start</label>
                    <br>
                    <input type="date" name="start" id="start" class="forminput">
                    <br>
                    <label for="stop">Slut</label>
                    <br>
                    <input type="date" name="stop" id="stop" class="forminput">
                    <br>
                    <input type="submit" value="Lägg till arbete" id="createWork" class="formbtn">
                </form>


            </div>
            <div class="fillform" id="updateformwork">
                <h2 class="userh2">Uppdatera arbete</h2>
                <form>
                    <input type="hidden" name="workidUpdate" id="workidUpdate" class="forminput">
                    <label for="workplaceUpdate">Arbetsplats</label>
                    <br>
                    <input type="text" name="workplaceUpdate" id="workplaceUpdate" class="forminput">
                    <br>
                    <label for="titleUpdate">Titel</label>
                    <br>
                    <input type="text" name="titleUpdate" id="titleUpdate" class="forminput">
                    <br>
                    <label for="cityUpdate">Stad</label>
                    <br>
                    <input type="text" name="cityUpdate" id="cityUpdate" class="forminput">
                    <br>
                    <label for="countryUpdate">Land</label>
                    <br>
                    <input type="text" name="countryUpdate" id="countryUpdate" class="forminput">
                    <br>
                    <label for="descriptionworkUpdate">Beskrivning</label>
                    <br>
                    <input type="text" name="descriptionworkUpdate" id="descriptionworkUpdate" class="forminput">
                    <br>
                    <label for="startUpdate">Start</label>
                    <br>
                    <input type="date" name="startUpdate" id="startUpdate" class="forminput">
                    <br>
                    <label for="stopUpdate">Slut</label>
                    <br>
                    <input type="date" name="stopUpdate" id="stopUpdate" class="forminput">
                    <br>
                    <input type="submit" value="Uppdatera arbete" id="updateWorks" class="formbtn">
                </form>
            </div>
        </div>

        <h2 class="centerh2">Webbplatser</h2>
        <div class="table-wrapper" tabindex="0">
            <div class="website">
                <table id="paginatedTable3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titel</th>
                            <th>Beskrivning</th>
                            <th>Url</th>
                            <th>Bild</th>
                            <th>Ändra</th>
                        </tr>
                    </thead>
                    <tbody id="websites">

                    </tbody>
                </table>
            </div>
        </div>

        <div id="expander">
            <!--Aria-expended måste ändras till true med JS när article blir synlig-->
            <button class="readMore" id="button" aria-expanded="false" aria-controls="sect" onclick="myFunction()">Välj bild
                <span id="more"></span> <span id="myBtn">+</span><span id="dots"></span></button>
            <!--Här används aria-live=assertive, skärmläsaren kommer avbryta allt och läsa upp detta-->
            <article class="textExpand" id="sect" role="region" aria-live="assertive">
                <div class="centerdiv">
                    <h3 class="bookingh3">Välj bild till webbplats</h3>
                    <p>För att välja en bild till webbplatsen du vill lägga till, klicka på knappen under bilden.
                        För att se bilden i större format, klicka på bilden.
                    </p>
                </div>
                <div class="divimg">
                    <div>
                        <h4>aangens</h4>
                        <a href="img/aangens.png" data-lightbox="image-1" data-title="aangens.png">
                            <picture>
                                <img src="img/aangens.png" alt="aangens" class="img">
                            </picture>
                        </a>
                        <button id="getimgaangens" onClick="getImgAangens()" class="btninform">Åängens B&B</button>

                    </div>
                    <div>
                        <h4>gorton</h4>
                        <a href="img/gorton.png" data-lightbox="image-1" data-title="gorton.png">
                            <picture>
                                <img src="img/gorton.png" alt="gorton" class="img">
                            </picture>
                        </a>
                        <button id="getimggorton" onClick="getImgGorton()" class="btninform">Gortons portfolio</button>

                    </div>
                    <div>
                        <h4>hundbloggen</h4>
                        <a href="img/hundbloggen.png" data-lightbox="image-1" data-title="hundbloggen.png">
                            <picture>
                                <img src="img/hundbloggen.png" alt="hundbloggen" class="img">
                            </picture>
                        </a>
                        <button id="getimghundbloggen" onClick="getImgHundbloggen()" class="btninform">Hundbloggen</button>

                    </div>
                    <div>
                        <h4>merlinsfoto</h4>
                        <a href="img/merlinsfoto.png" data-lightbox="image-1" data-title="merlinsfoto.png">
                            <picture>
                                <img src="img/merlinsfoto.png" alt="merlinsfoto" class="img">
                            </picture>
                        </a>
                        <button id="getimgmerlins" onClick="getImgMerlins()" class="btninform">Merlins Foto</button>

                    </div>
                    <div>
                        <h4>roris</h4>
                        <a href="img/roris.png" data-lightbox="image-1" data-title="roris.png">
                            <picture>
                                <img src="img/roris.png" alt="roris" class="img">
                            </picture>
                        </a>
                        <button id="getimgroris" onClick="getImgRoris()" class="btninform">Röris</button>

                    </div>
                    <div>
                        <h4>skog</h4>
                        <a href="img/skog.png" data-lightbox="image-1" data-title="skog.png">
                            <picture>
                                <img src="img/skog.png" alt="skog" class="img">
                            </picture>
                        </a>
                        <button id="getimgskog" onClick="getImgSkog()" class="btninform">Skog AB</button>

                    </div>
                    <div>
                        <h4>vandringsguiden</h4>
                        <a href="img/vandringsguiden.png" data-lightbox="image-1" data-title="vandringsguiden.png">
                            <picture>
                                <img src="img/vandringsguiden.png" alt="vandringsguiden" class="img">
                            </picture>
                        </a>
                        <button id="getimgvandringsguiden" onClick="getImgVandringsguiden()" class="btninform">Vandringsguiden</button>

                    </div>
                    <div>
                        <h4>vikens</h4>
                        <a href="img/vikens.png" data-lightbox="image-1" data-title="vikens.png">
                            <picture>
                                <img src="img/vikens.png" alt="vikens" class="img">
                            </picture>
                        </a>
                        <button id="getimgvikens" onClick="getImgVikens()" class="btninform">Vikens Färdtjänst</button>

                    </div>
                    <div>
                        <h4>empty</h4>
                        <a href="img/empty.png" data-lightbox="image-1" data-title="empty.png">
                            <picture>
                                <img src="img/empty.png" alt="empty" class="img">
                            </picture>
                        </a>
                        <button id="getimgempty" onClick="getImgEmpty()" class="btninform">Empty</button>

                    </div>
                </div>
            </article>
        </div>


        <div class="formgrid">
            <div class="fillform" id="addwebsite">
                <h2 class="userh2">Lägg till webbplats</h2>
                <form>
                    <label for="websiteTitle">Titel</label>
                    <br>
                    <input type="text" name="websiteTitle" id="websiteTitle" class="forminput">
                    <br>
                    <label for="description">Beskrivning</label>
                    <br>
                    <input type="text" name="description" id="description" class="forminput">
                    <br>
                    <label for="url">Länk</label>
                    <br>
                    <input type="text" name="url" id="url" class="forminput">
                    <br>
                    <label for="image">Bild</label>
                    <br>
                    <input type="text" name="image" id="image" class="forminput">
                    <br>
                    <input type="submit" value="Lägg till webbplats" id="createWebsite" class="formbtn">
                </form>


            </div>
            <div class="fillform" id="updateformwebsite">
                <h2 class="userh2">Uppdatera webbplats</h2>
                <form>
                    <input type="hidden" name="websiteidUpdate" id="websiteidUpdate" class="forminput">
                    <label for="websiteTitleUpdate">Titel</label>
                    <br>
                    <input type="text" name="websiteTitleUpdate" id="websiteTitleUpdate" class="forminput">
                    <br>
                    <label for="descriptionUpdate">Beskrivning</label>
                    <br>
                    <input type="text" name="descriptionUpdate" id="descriptionUpdate" class="forminput">
                    <br>
                    <label for="urlUpdate">Länk</label>
                    <br>
                    <input type="text" name="urlUpdate" id="urlUpdate" class="forminput">
                    <br>
                    <label for="imageUpdate">Bild</label>
                    <br>
                    <input type="text" name="imageUpdate" id="imageUpdate" class="forminput">
                    <br>
                    <input type="submit" value="Uppdatera webbplats" id="updateWebsite" class="formbtn">
                </form>
            </div>
        </div>

    </section>

    <?php
    include('includes/footer.php');
    ?>