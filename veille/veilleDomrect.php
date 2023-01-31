<main>
    <div class="vanta">
        <h1 class="titreVeille">DOMRect</h1>

        <p>Un DOMRect est un tableau d'objet qui indique les dimensions qu'un élément occupe dans la zone
            d'affichage (la position dans la fenêtre, appelé également la « viewport »).</p><br>

        <h2>Construction :</h2>

        <p>DOMRect {x : Nombre, y : Nombre, width : Nombre, height: Nombre, top : Nombre, right : Nombre, bottom : Nombre, left : Nombre)}</p><br>

        <h2>Propriété de l'instance</h2>
        <ul>
            <li>x : Nombre = Il s'agit de la distance entre la fenêtre et le début de l'élément en partant du côté gauche</li>
            <li>y : Nombre = Il s'agit de la distance entre la fenêtre et le début de l'élément en partant du haut</li>
            <li>width : Nombre = Il s'agit de la largeur de l'élément</li>
            <li>height : Nombre = Il s'agit de la hauteur de l'élément</li>
            <li>top : Nombre = Il s'agit de la distance entre la fenêtre et le début de l'élément en partant du haut</li>
            <li>right : Nombre = Il s'agit de la distance entre la fenêtre et la fin de l'élément en partant du côté gauche</li>
            <li>bottom : Nombre = Il s'agit de la distance entre la fenêtre et la fin de l'élément en partant du haut</li>
            <li>left: Nombre = Il s'agit de la distance entre la fenêtre et le début de l'élément en partant du côté gauche</li>
        </ul><br>
        <p>Les valeurs x et y sont équivalentes aux valeurs left et top. Pour cette raison, certains navigateurs omettent x et y et ne renvoient que left et top.</p><br>
        <p>Exemple dans une console :</p>
        <a href="./asset/domrect1.png"><img src="./asset/domrect1.png" alt="capture Ecran domrect" class="large" title="Cliquez ici pour agrandir l'image"></a>
        <br><br>
        <p>Schéma des propriétés de l'instance</p>
        <img src="./asset/domrect.png" alt="schema viewport" class="image">


    </div>

    <div class="vanta">
        <h1 class="titreVeille bounding">Element.getBoundingClientRect()</h1><br>

        <p>.getBoundingClientRect() est une méthode Javascript qui retourne un objet du DOMRect, fournissant ainsi des informations sur la dimension et la position d'un élément dans une zone d'affichage.
            Cela permet d'obtenir la position de l'élément HTML par rapport à l'ensemble de la fenêtre.
        </p><br>
        <h2>Syntaxe : </h2>
        <p>let rect = element.getBoundingClientRect();</p><br>
        <p>Exemple : </p>
        <pre><code>
let rect = barreAudio.getBoundingClientRect();
console.log(rect);
let largeur = rect.width;
console.log(largeur);
</code></pre>
<br><br>
        <!-- <img src="./asset/domrect2.png" alt="capture ecran dom rect" class="large"><br><br> -->
        <p>Résultat sur console</p>
        <a href="./asset/domrect3.png"><img src="./asset/domrect3.png" alt="capture ecran dom rect" class="large" title="Cliquez ici pour agrandir l'image"></a><br><br>
        <p>Cela permet de connaitre la largeur de l'élément barre audio.</p>
        <br>
        <p>Extrait du code source pour la veille</p>
        <pre><code>
// position sur la barre

let rect = barreAudio.getBoundingClientRect();
// console.log(rect);
let largeur = rect.width;
// console.log(largeur);
barreAudio.addEventListener("click", positionMusic);

function positionMusic(e) {
  let x = e.clientX - rect.left; //permet de recuperer la position X du clic
  // console.log(e.clientX, rect.left,x);

  let widthPercent = x / largeur;
  // console.log(widthPercent);
  audio.currentTime = audio.duration * widthPercent;
}
</code></pre>
        <!-- <img src="./asset/domrect4.png" alt="capture ecran dom rect" class="image"> -->

    </div>
    <div class="vanta">
        <h1 class="titreVeille bounding">Mise en application sur un projet</h1><br>
        <p>Lors de la création de mon lecteur audio, j'ai eu besoin d'utiliser DOMRect et element.getBoundinClient() pour pouvoir me déplacer sur la barre de progression musicale.

            Sans cela, Il n'était pas possible de se déplacer. La musique était lancée. On voyait l'avancée de celle-ci sur la barre, mais impossible de s'avancer ou reculer sur la musique.
        </p><br>
        <img src="./asset/domrect5.png" alt="capture lecteur audio" class="large"><br><br>
        <p>Grâce à l'utilisation du DOMRect, j'ai su que ma barre audio mesurait :</p>
        <ul>
            <li>300px de large (width)</li>
            <li>7px de hauteur (height)</li>
        </ul><br>
        <p>Et qu'elle se trouvait : </p>
        <ul>
            <li>à 618px entre la fenêtre à gauche et le début de la barre (x et left)</li>
            <li>à 468 px entre le haut de la fenêtre et le début de la barre (y et top)</li>
            <li>à 918px entre la fenêtre à gauche et la fin de la barre (right)</li>
            <li>à 475px entre le haut de la fenêtre et la fin de la barre (bottom)</li>
        </ul>

        <a href="./asset/domrect6.png"><img src="./asset/domrect6.png" alt="capture ecran dimension lecteur" class="large" title="Cliquez ici pour agrandir l'image"></a><br><br>
        <a href="./asset/domrect7.png"><img src="./asset/domrect7.png" alt="capture dimension console" class="large" title="Cliquez ici pour agrandir l'image"></a><br><br>
        <p>J'ai donc utilisé ces informations pour créer ma fonction positionMusic pour connaitre ma position sur la barre de musique.</p><br>
        <pre><code>
// position sur la barre

let rect = barreAudio.getBoundingClientRect();
// console.log(rect);
let largeur = rect.width;
// console.log(largeur);
barreAudio.addEventListener("click", positionMusic);

function positionMusic(e) {
  let x = e.clientX - rect.left; //permet de recuperer la position X du clic
  // console.log(e.clientX, rect.left,x);

  let widthPercent = x / largeur;
  // console.log(widthPercent);
  audio.currentTime = audio.duration * widthPercent;
}
</code></pre><br>
        <!-- <img src="./asset/domrect4.png" alt="capture ecran dom rect" class="large"><br><br> -->
        <p>Prenons un exemple d'un clic sur la barre. Ci-dessous le résultat sur la console :</p>
        <img src="./asset/domrect8.png" alt="capture dimension console" class="large">

        <p>e. correspond à l'évènement soit au clic sur la barre audio.</p>
        <p>e.clientX correspond à la distance entre la fenêtre à gauche et la position du clic sur la barre ( ici 738px)</p>
        <p>rect.width correspondant à la largeur de la barre ( ici 618 px)</p>
        <p>X est égal à e.clientX - rect width = soit 738-618 = donc à 120px.</p>
        <br>
        <p>A partir de x, je vais calculer son pourcentage « widthPercent » par rapport à la barre :</p>
        <p>X=120 largeur=300</p>
        <p>X/largeur = 120/300 = 0.40 ;(0.40*100 = 40%)</p>
        <p>Mon clic se trouve donc à 40% sur la barre de progression.</p>

        <p>Je veux maintenant connaitre la position sur la musique :</p>
        <p>Audio.currentTime = audio.duration * widthPercent >
            Le temps de la musique en cours = la durée totale de la musique * le pourcentage du clic >
            1:45 = 105sec = 263 x 0.4
        </p>

        <p>Mon clic se trouvera donc à 1:45 de la musique.</p>
        <br>
        <p>Ci-dessous le résultat final :</p>

        <img src="./asset/domrect9.png" alt="capture lecteur audio" class="large">
    </div>

</main>