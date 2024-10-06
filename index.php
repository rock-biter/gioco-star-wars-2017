<?php 
$home = "";

$title = "Gianluca Lomarco - Star Wars - esercizio Mind";
$description = "Diventa un pilota di X-Wing - abbatti i Tie e raggiungi il punteggio più alto";

//include('../header.php');
?>
      
<?php 
include('../logo.php');
?>

<!DOCTYPE html>
<html lang="it">
     <head>
      <meta charset="utf-8">
      <meta content="IE-edge" http-equiv="X-UA-Compatibible">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <title><?php if(!isset($title) || $title == ""){ echo "esempio titolo"; } else { echo $title; } ?></title>
      <meta name="description" content="<?php if(!isset($description) || $description == "") { echo "esempio descrizione"; } else { echo $description; } ?>" >
      <meta content="LOMARCO GIANLUCA" name="author">
      <meta content="Copyright 2018 - LOMARCO GIANLUCA" name="copyright">

      <link href="../img/favicon.png" rel="icon" type="image/png">
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="../js/jquery-ui.min.js"></script>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="../js/bootstrap.min.js"></script>

      <link href="../css/lomarco.css" rel="stylesheet">
      <link href="../css/responsive.css" rel="stylesheet">

      <link rel="stylesheet" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <link rel="stylesheet" href="css/jquery-ui.min.css">

    <script>

    $(document).ready(function() {

    var xWing = $('#x-wing-traslazione').offset();
    var leftWing = xWing.left;
    //alert (leftWing);

    var topWing =xWing.top;
    //alert (topWing);

    /*punteggio iniziale*/

    var punti = $('.punti');
    var puntiIniziali = 10000;
    var colpito = 5000;
    var mancato = 500;
    var secondi = 50;

    /*inserisco nel testo i valori degli incrementi*/ 
    $('.secondi').text(secondi);
    $('.mancato').text(mancato);
    $('.colpito').text(colpito);

    /*diminuzione del punteggio ogni secondo*/

    $('.punti').text(puntiIniziali);

    //setTimeout(function(){ alert("Hello"); }, 3000);

    var descore = setInterval(function() {
        var puntiAttuali = parseInt(punti.text());
        puntiAttuali -= secondi;
        $('.punti').text(puntiAttuali);
        }, 1000);

    var caccia1Rot = $('.caccia_rotazione_1');
    var caccia2Rot = $('.caccia_rotazione_2');
    var caccia3Rot = $('.caccia_rotazione_3');
    var caccia5Rot = $('.caccia_rotazione_5');
    var caccia6Rot = $('.caccia_rotazione_6');
    var caccia7Rot = $('.caccia_rotazione_7');

    /*impostiamo le condizioni di sconfitta*/

    var haiPerso = setInterval(function(){
        var puntiAttuali = parseInt(punti.text());
        if (puntiAttuali <= 0) {

            $('<div class="vittoria"><p>Oh no! Il tuo punteggio è sceso sotto lo zero</p><h2>you lose</h2></div>').prependTo('#spazio_3d');
            $('.vittoria').not('.vittoria:last').remove();
            clearInterval(haiPerso);
            clearInterval(descore);

            $('#x-wing-traslazione').css({'top' : 'calc(50% - 300px)', 'left' : 'calc(50% - 300px)', 'width' : '600px', 'height' : '600px'}).children().animate({margin : '3000px'}, 1000).children().animate({margin : '3000px'}, 1000).children().animate({margin : '3000px'}, 1000).children().animate({margin : '3000px'}, 1000);

            $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('#x-wing-traslazione');

            }else {}
        }, 10);



    /*mirini continui*/

    /*creazione mirini*/

    var mirini = function() {

        /*creo le variabili relative alle coordinate del caccia 1*/

    if( /*caccia1Rot.css('opacity') == 1*/ $('.caccia_traslazione_1').length) {	
        var caccia1 = $(".caccia_traslazione_1");
        /*leggo il valore trasnform*/
        var transformCaccia1 = caccia1.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform1 = transformCaccia1.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia1TranslateX = parseInt(arreyTransform1[12]);
        var caccia1TranslateY = parseInt(arreyTransform1[13]);
        var caccia1TranslateZ = parseInt(arreyTransform1[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro1Y = parseInt(caccia1.css('top'));
        var centro1X = parseInt(caccia1.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie1Top = centro1Y + caccia1TranslateY - 5;
        var tie1Bottom = centro1Y + caccia1TranslateY + 10;
        var tie1Left = centro1X + caccia1TranslateX - 5;
        var tie1Right = centro1X + caccia1TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 2*/

    if( /*caccia2Rot.css('opacity') == 1*/ $('.caccia_traslazione_2').length) {
        var caccia2 = $(".caccia_traslazione_2");
        /*leggo il valore trasnform*/
        var transformCaccia2 = caccia2.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform2 = transformCaccia2.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia2TranslateX = parseInt(arreyTransform2[12]);
        var caccia2TranslateY = parseInt(arreyTransform2[13]);
        var caccia2TranslateZ = parseInt(arreyTransform2[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro2Y = parseInt(caccia2.css('top'));
        var centro2X = parseInt(caccia2.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie2Top = centro2Y + caccia2TranslateY - 5;
        var tie2Bottom = centro2Y + caccia2TranslateY + 10;
        var tie2Left = centro2X + caccia2TranslateX - 5;
        var tie2Right = centro2X + caccia2TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 3*/

    if( /*caccia3Rot.css('opacity') == 1*/ $('.caccia_traslazione_3').length) {
        var caccia3 = $(".caccia_traslazione_3");
        /*leggo il valore trasnform*/
        var transformCaccia3 = caccia3.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform3 = transformCaccia3.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia3TranslateX = parseInt(arreyTransform3[12]);
        var caccia3TranslateY = parseInt(arreyTransform3[13]);
        var caccia3TranslateZ = parseInt(arreyTransform3[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro3Y = parseInt(caccia3.css('top'));
        var centro3X = parseInt(caccia3.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie3Top = centro3Y + caccia3TranslateY - 5;
        var tie3Bottom = centro3Y + caccia3TranslateY + 10;
        var tie3Left = centro3X + caccia3TranslateX - 5;
        var tie3Right = centro3X + caccia3TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 5*/

    if( /*caccia5Rot.css('opacity') == 1*/ $('.caccia_traslazione_5').length) {
        var caccia5 = $(".caccia_traslazione_5");
        /*leggo il valore trasnform*/
        var transformCaccia5 = caccia5.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform5 = transformCaccia5.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia5TranslateX = parseInt(arreyTransform5[12]);
        var caccia5TranslateY = parseInt(arreyTransform5[13]);
        var caccia5TranslateZ = parseInt(arreyTransform5[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro5Y = parseInt(caccia5.css('top'));
        var centro5X = parseInt(caccia5.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie5Top = centro5Y + caccia5TranslateY - 5;
        var tie5Bottom = centro5Y + caccia5TranslateY + 10;
        var tie5Left = centro5X + caccia5TranslateX - 5;
        var tie5Right = centro5X + caccia5TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 6*/

    if( /*caccia6Rot.css('opacity') == 1*/ $('.caccia_traslazione_6').length) {
        var caccia6 = $(".caccia_traslazione_6");
        /*leggo il valore trasnform*/
        var transformCaccia6 = caccia6.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform6 = transformCaccia6.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia6TranslateX = parseInt(arreyTransform6[12]);
        var caccia6TranslateY = parseInt(arreyTransform6[13]);
        var caccia6TranslateZ = parseInt(arreyTransform6[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro6Y = parseInt(caccia6.css('top'));
        var centro6X = parseInt(caccia6.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie6Top = centro6Y + caccia6TranslateY - 5;
        var tie6Bottom = centro6Y + caccia6TranslateY + 10;
        var tie6Left = centro6X + caccia6TranslateX - 5;
        var tie6Right = centro6X + caccia6TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 7*/

    if( /*caccia7Rot.css('opacity') == 1*/ $('.caccia_traslazione_7').length) {
        var caccia7 = $(".caccia_traslazione_7");
        /*leggo il valore trasnform*/
        var transformCaccia7 = caccia7.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform7 = transformCaccia7.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia7TranslateX = parseInt(arreyTransform7[12]);
        var caccia7TranslateY = parseInt(arreyTransform7[13]);
        var caccia7TranslateZ = parseInt(arreyTransform7[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro7Y = parseInt(caccia7.css('top'));
        var centro7X = parseInt(caccia7.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie7Top = centro7Y + caccia7TranslateY - 5;
        var tie7Bottom = centro7Y + caccia7TranslateY + 10;
        var tie7Left = centro7X + caccia7TranslateX - 5;
        var tie7Right = centro7X + caccia7TranslateX + 10;
    }


    /*calcolo la posizione z dei cacchia - misura che poi assegnerò alla linea di profondità nella modalità mira semplificata*/

        var linea1 = Math.abs(caccia1TranslateZ);
        var linea2 = Math.abs(caccia2TranslateZ);
        var linea3 = Math.abs(caccia3TranslateZ);
        var linea5 = Math.abs(caccia5TranslateZ);
        var linea6 = Math.abs(caccia6TranslateZ);
        var linea7 = Math.abs(caccia7TranslateZ);

        $('.mirino-1').css({
            transform : 'translateX(' + caccia1TranslateX + 'px) translateY(' + caccia1TranslateY + 'px)'
        }).children().css({'width' : linea1});


        $('.mirino-2').css({
            transform : 'translateX(' + caccia2TranslateX + 'px) translateY(' + caccia2TranslateY + 'px)'
        }).children().css({'width' : linea2});


        $('.mirino-3').css({
            transform : 'translateX(' + caccia3TranslateX + 'px) translateY(' + caccia3TranslateY + 'px)'
        }).children().css({'width' : linea3});

        $('.mirino-5').css({
            transform : 'translateX(' + caccia5TranslateX + 'px) translateY(' + caccia5TranslateY + 'px)'
        }).children().css({'width' : linea5});

        $('.mirino-6').css({
            transform : 'translateX(' + caccia6TranslateX + 'px) translateY(' + caccia6TranslateY + 'px)'
        }).children().css({'width' : linea6});

        $('.mirino-7').css({
            transform : 'translateX(' + caccia7TranslateX + 'px) translateY(' + caccia7TranslateY + 'px)'
        }).children().css({'width' : linea7});

    };


    var miraFacile = setInterval(mirini, 10);

    $('.attiva').click(function() {
            $('.mirino-1, .mirino-2, .mirino-3, .mirino-5, .mirino-6, .mirino-7').css('opacity' , 1);
            $(this).addClass('cliccato');
            $(this).children('h3').css('opacity' , '0.5').siblings().css({'color' : '#D0362E', 'font-size' : '17px'});
            /*dimnezzo il punteggio di partenza*/
            var puntiAttuali = parseInt(punti.text());
            var puntiDimezzati = (puntiAttuali/2);
            $('.punti').text(puntiDimezzati);
            $('.punti, #score p span').css('color' , '#D0362E');
            /*dimnezzo gli incrementi del punteggio*/
            colpito -= 2500;
            mancato -= 250;
            secondi -= 25;

            /*inserisco nel testo i nuovi valori degli incrementi*/ 
            $('.secondi').text(secondi);
            $('.mancato').text(mancato);
            $('.colpito').text(colpito);


            /*rimuovo la classe .attiva dal pulsante in modo da non poterlo più cliccare. Ps. non funziona*/
            $(this).removeClass('attiva');
        });


    /*muovere la x-wing con il movimento del mouse*/

    $("#spazio_3d").mousemove(function(e){

                var height = $('#spazio_3d').css('height');
                var width = $('#spazio_3d').css('width');

                var pageX = e.pageX - (parseInt(width) / 2);
                var pageY = e.pageY - (parseInt(height) / 2);

                $('#x-wing-traslazione').css({ transform : 'translateX('+(pageX*0.7)+'px) translateY('+(pageY*1)+'px)'});
    });

    /*sparo con il clic del mouse - associo il click sulla finstra al tasto invio della tastiera*/

    var e = jQuery.Event("keydown");
    e.which = 13; // # keycode invio

    $(window).click(function() {
        $('#spazio_3d').trigger(e);
        });


    /*tutto questo codice viene eseguito ogni volta viene premuto un tasto della tastiera*/

    $('body').keydown(function(event) {



    /*creo le variabili relative alle coordinate del caccia 1*/

    if( /*caccia1Rot.css('opacity') == 1*/ $('.caccia_traslazione_1').length) {	
        var caccia1 = $(".caccia_traslazione_1");
        /*leggo il valore trasnform*/
        var transformCaccia1 = caccia1.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform1 = transformCaccia1.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia1TranslateX = parseInt(arreyTransform1[12]);
        var caccia1TranslateY = parseInt(arreyTransform1[13]);
        var caccia1TranslateZ = parseInt(arreyTransform1[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro1Y = parseInt(caccia1.css('top'));
        var centro1X = parseInt(caccia1.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie1Top = centro1Y + caccia1TranslateY - 5;
        var tie1Bottom = centro1Y + caccia1TranslateY + 10;
        var tie1Left = centro1X + caccia1TranslateX - 5;
        var tie1Right = centro1X + caccia1TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 2*/

    if( /*caccia2Rot.css('opacity') == 1*/ $('.caccia_traslazione_2').length) {
        var caccia2 = $(".caccia_traslazione_2");
        /*leggo il valore trasnform*/
        var transformCaccia2 = caccia2.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform2 = transformCaccia2.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia2TranslateX = parseInt(arreyTransform2[12]);
        var caccia2TranslateY = parseInt(arreyTransform2[13]);
        var caccia2TranslateZ = parseInt(arreyTransform2[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro2Y = parseInt(caccia2.css('top'));
        var centro2X = parseInt(caccia2.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie2Top = centro2Y + caccia2TranslateY - 5;
        var tie2Bottom = centro2Y + caccia2TranslateY + 10;
        var tie2Left = centro2X + caccia2TranslateX - 5;
        var tie2Right = centro2X + caccia2TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 3*/

    if( /*caccia3Rot.css('opacity') == 1*/ $('.caccia_traslazione_3').length) {
        var caccia3 = $(".caccia_traslazione_3");
        /*leggo il valore trasnform*/
        var transformCaccia3 = caccia3.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform3 = transformCaccia3.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia3TranslateX = parseInt(arreyTransform3[12]);
        var caccia3TranslateY = parseInt(arreyTransform3[13]);
        var caccia3TranslateZ = parseInt(arreyTransform3[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro3Y = parseInt(caccia3.css('top'));
        var centro3X = parseInt(caccia3.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie3Top = centro3Y + caccia3TranslateY - 5;
        var tie3Bottom = centro3Y + caccia3TranslateY + 10;
        var tie3Left = centro3X + caccia3TranslateX - 5;
        var tie3Right = centro3X + caccia3TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 5*/

    if( /*caccia5Rot.css('opacity') == 1*/ $('.caccia_traslazione_5').length) {
        var caccia5 = $(".caccia_traslazione_5");
        /*leggo il valore trasnform*/
        var transformCaccia5 = caccia5.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform5 = transformCaccia5.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia5TranslateX = parseInt(arreyTransform5[12]);
        var caccia5TranslateY = parseInt(arreyTransform5[13]);
        var caccia5TranslateZ = parseInt(arreyTransform5[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro5Y = parseInt(caccia5.css('top'));
        var centro5X = parseInt(caccia5.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie5Top = centro5Y + caccia5TranslateY - 5;
        var tie5Bottom = centro5Y + caccia5TranslateY + 10;
        var tie5Left = centro5X + caccia5TranslateX - 5;
        var tie5Right = centro5X + caccia5TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 6*/

    if( /*caccia6Rot.css('opacity') == 1*/ $('.caccia_traslazione_6').length) {
        var caccia6 = $(".caccia_traslazione_6");
        /*leggo il valore trasnform*/
        var transformCaccia6 = caccia6.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform6 = transformCaccia6.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia6TranslateX = parseInt(arreyTransform6[12]);
        var caccia6TranslateY = parseInt(arreyTransform6[13]);
        var caccia6TranslateZ = parseInt(arreyTransform6[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro6Y = parseInt(caccia6.css('top'));
        var centro6X = parseInt(caccia6.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie6Top = centro6Y + caccia6TranslateY - 5;
        var tie6Bottom = centro6Y + caccia6TranslateY + 10;
        var tie6Left = centro6X + caccia6TranslateX - 5;
        var tie6Right = centro6X + caccia6TranslateX + 10;
    }

    /*creo le variabili relative alle coordinate del caccia 7*/

    if( /*caccia7Rot.css('opacity') == 1*/ $('.caccia_traslazione_7').length) {
        var caccia7 = $(".caccia_traslazione_7");
        /*leggo il valore trasnform*/
        var transformCaccia7 = caccia7.css('transform');
        /*modifico la stringa transform in modo da ottenere un arrey con solo i valori della matride 3D*/
        var arreyTransform7 = transformCaccia7.replace("matrix3d(", " ").replace(")", " ").split(",");
        /*estraggo dall'arrey gli elementi relativi alle traslazioni X Y e Z*/
        var caccia7TranslateX = parseInt(arreyTransform7[12]);
        var caccia7TranslateY = parseInt(arreyTransform7[13]);
        var caccia7TranslateZ = parseInt(arreyTransform7[14]);
        /*trovo il centro verticale e orizzontale del caccia*/
        var centro7Y = parseInt(caccia7.css('top'));
        var centro7X = parseInt(caccia7.css('left'));
        /*calcolo i limiti del caccia: superiore, inferiore, sinistro e destro*/
        var tie7Top = centro7Y + caccia7TranslateY - 5;
        var tie7Bottom = centro7Y + caccia7TranslateY + 10;
        var tie7Left = centro7X + caccia7TranslateX - 5;
        var tie7Right = centro7X + caccia7TranslateX + 10;
    }

    /*calcolo la posizione z dei cacchia - misura che poi assegnerò alla linea di profondità nella modalità mira semplificata*/

        var linea1 = Math.abs(caccia1TranslateZ);
        var linea2 = Math.abs(caccia2TranslateZ);
        var linea3 = Math.abs(caccia3TranslateZ);
        var linea5 = Math.abs(caccia5TranslateZ);
        var linea6 = Math.abs(caccia6TranslateZ);
        var linea7 = Math.abs(caccia7TranslateZ);

    /*coordinate missili*/

        var xWing = $('#x-wing-traslazione');
        //alert(xwing);
        var xWingTop = xWing.position().top -40;
        var xWingBottom = xWingTop + 130;
        var xWingLeft = xWing.position().left -125;
        var xWingRight = xWingLeft + 300;


        /*creo l'elemento missili che poi successivamente appendero al DOM*/

        var missili = '<div class="missili"><audio src="media/laser.mp3" controls autoplay></audio><div class="missile top-dx"></div><div class="missile top-sx"></div><div class="missile bottom-dx"></div><div class="missile bottom-sx"></div></div>';


        switch (event.which) {

            case 65: // LEFT tasto A

                var left = $('#x-wing-traslazione').css('left');
                /*blocco il movimento oltre il bordo sinistro della finestra*/
                if (parseInt(left) >= 100) {

                    $('#x-wing-traslazione').animate({'left': '-=100px'},{duration:70, specialEasing: { left: "easeInOutCubic" }});
                    } else {}			
            break;
            case 87: // TOP tasto W

                var top = $('#x-wing-traslazione').css('top');
                /*blocco il movimento oltre il bordo superiore della finestra*/
                if (parseInt(top) >= 100) {

                    $('#x-wing-traslazione').animate({ 'top': '-=100px' },{duration:70, specialEasing: {left: "easeInOutCubic"}});
                } else {}
            break;
            case 68: // RIGHT tasto D

                var left = $('#x-wing-traslazione').css('left');
                var width = $('#spazio_3d').css('width');
                var right = parseInt(width) - 100;
                /*blocco il movimento oltre il bordo destro della finestra*/
                if (parseInt(left) <= right) {

                    $('#x-wing-traslazione').animate({ 'left': '+=100px' },{duration:70, specialEasing: {left: "easeInOutCubic"}});
                } else {}
             break;
            case 83: // BOTTOM tasto S

                var top = $('#x-wing-traslazione').css('top');
                var height = $('#spazio_3d').css('height');
                var bottom = parseInt(height) - 100;

                if (parseInt(top) <= bottom) {

                    $('#x-wing-traslazione').animate({ 'top': '+=100px' },{duration:70, specialEasing: {left: "easeInOutCubic"}});
                } else {}
            break;

            case 77: //modalità mirino tasto M

                $('.attiva').trigger('click');

            break;

            case 13: //sparo tasto INVIO

                /*faccio scomparire il messaggio informativo e auguro buon divertimento all'utente*/

                //$('.sparo').slideUp(300);
                //$('<h3 id="messaggio">Buon divertimento</h3>').appendTo('#pulsanti');		


                /*appendo l'elemento missili nello spazio 3D in corrispondenza della posizione della mia x-wing*/
                $('#pulsanti').slideUp(500);

                /*se il punteggio scende sotto lo zero la navicella esplode e quindi non può sparare*/
                if ( parseInt(punti.text()) >= 0 ) {				
                    $(missili).css({
                        top : xWingTop + 40 - 50,
                        left : xWingLeft + 40 - 40
                        }).prependTo('#spazio_3d');
                    $('.missili:nth-child(5)').remove();
                } else {}

                /*prendo le coordinate dei missili al momento dello sparo*/
                var missili = $('.missili:first-child');
                var missiliTop = parseInt(missili.css('top'));
                var missiliBottom = missiliTop + parseInt(missili.css('height'));
                var missiliLeft = parseInt(missili.css('left'));
                var missiliRight = missiliLeft + parseInt(missili.css('width'));

                /*ad ogni sparo a vuoto perdo 70 punti*/

                var puntiAttuali = parseInt(punti.text());
                puntiAttuali -= mancato;
                $('.punti').text(puntiAttuali);

                /*evento collisione missili caccia 1*/

                    if (tie1Top > missiliTop && missiliBottom > tie1Bottom &&  tie1Left > missiliLeft && missiliRight > tie1Right) { 

                    $('.caccia_rotazione_1').css('opacity' , '0');
                    $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('.caccia_traslazione_1');

                    /*rimuovo il caccia dal DOM*/
                    setTimeout(function(){ $('.caccia_traslazione_1').remove(); }, 1000);

                    /*ad ogni caccia abbatturo guadagni 5000 punti*/
                    var puntiAttuali = parseInt(punti.text());
                    puntiAttuali += (colpito+mancato) ;
                    $('.punti').text(puntiAttuali);

                }else {}

                /*evento collisione missili caccia 2*/

                if (tie2Top > missiliTop && missiliBottom > tie2Bottom &&  tie2Left > missiliLeft && missiliRight > tie2Right) { 

                    $('.caccia_rotazione_2').css('opacity' , '0');
                    $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('.caccia_traslazione_2');

                    /*rimuovo il caccia dal DOM*/
                    setTimeout(function(){ $('.caccia_traslazione_2').remove(); }, 1000);

                    /*ad ogni caccia abbatturo guadagni 5000 punti*/
                    var puntiAttuali = parseInt(punti.text());
                    puntiAttuali += colpito;
                    $('.punti').text(puntiAttuali);

                }else {}

                /*evento collisione missili caccia 3*/

                if (tie3Top > missiliTop && missiliBottom > tie3Bottom &&  tie3Left > missiliLeft && missiliRight > tie3Right) { 

                    $('.caccia_rotazione_3').css('opacity' , '0');
                    $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('.caccia_traslazione_3');

                    /*rimuovo il caccia dal DOM*/
                    setTimeout(function(){ $('.caccia_traslazione_3').remove(); }, 1000);

                    /*ad ogni caccia abbatturo guadagni 5000 punti*/
                    var puntiAttuali = parseInt(punti.text());
                    puntiAttuali += colpito;
                    $('.punti').text(puntiAttuali);

                }else {}

                /*evento collisione missili caccia 5*/

                if (tie5Top > missiliTop && missiliBottom > tie5Bottom &&  tie5Left > missiliLeft && missiliRight > tie5Right) { 

                    $('.caccia_rotazione_5').css('opacity' , '0');
                    $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('.caccia_traslazione_5');

                    /*rimuovo il caccia dal DOM*/
                    setTimeout(function(){ $('.caccia_traslazione_5').remove(); }, 1000);

                    /*ad ogni caccia abbatturo guadagni 5000 punti*/
                    var puntiAttuali = parseInt(punti.text());
                    puntiAttuali += colpito;
                    $('.punti').text(puntiAttuali);

                }else {}

                /*evento collisione missili caccia 6*/

                if (tie6Top > missiliTop && missiliBottom > tie6Bottom &&  tie6Left > missiliLeft && missiliRight > tie6Right) { 

                    $('.caccia_rotazione_6').css('opacity' , '0');
                    $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('.caccia_traslazione_6');

                    /*rimuovo il caccia dal DOM*/
                    setTimeout(function(){ $('.caccia_traslazione_6').remove(); }, 1000);

                    /*ad ogni caccia abbatturo guadagni 5000 punti*/
                    var puntiAttuali = parseInt(punti.text());
                    puntiAttuali += colpito;
                    $('.punti').text(puntiAttuali);

                }else {}

                /*evento collisione missili caccia 7*/

                if (tie7Top > missiliTop && missiliBottom > tie7Bottom &&  tie7Left > missiliLeft && missiliRight > tie7Right) { 

                    $('.caccia_rotazione_7').css('opacity' , '0');
                    $('<div class="esplosione"><audio src="media/boom.mp3" controls autoplay></div>').appendTo('.caccia_traslazione_7');

                    /*rimuovo il caccia dal DOM*/
                    setTimeout(function(){ $('.caccia_traslazione_7').remove(); }, 1000);

                    /*ad ogni caccia abbatturo guadagni 5000 punti*/
                    var puntiAttuali = parseInt(punti.text());
                    puntiAttuali += colpito;
                    $('.punti').text(puntiAttuali);

                }else {}

            break;
        }

        /*faccio comparire la scritta YOU WIN con il punteggio totalizzato dal giocatore*/

        if( caccia1Rot.css('opacity') == 0 && caccia2Rot.css('opacity') == 0  && caccia3Rot.css('opacity') == 0 && caccia5Rot.css('opacity') == 0 && caccia6Rot.css('opacity') == 0 && caccia7Rot.css('opacity') == 0) {
            $('<div class="vittoria"><p>hai totalizzato ' + punti.text() + ' punti</p><h2>you win</h2></div>').prependTo('#spazio_3d');
            $('.vittoria').not('.vittoria:last').remove();
            clearInterval(descore);		
            }
    });	

    });

    </script>

    </head>
    <!-- fine head -->
    <body>
      <header> 
        <div id="menu">
          <ul >
            <li class="<?php if(!isset($home) || $home == ""){ echo ""; } else { echo $home; } ?>"><a href="../index.php">home</a></li>
            <li class="<?php if(!isset($servizi) || $servizi == ""){ echo ""; } else { echo $servizi; } ?>"><a href="../servizi.php">servizi</a></li>
            <li class="<?php if(!isset($chisono) || $chisono == ""){ echo ""; } else { echo $chisono; } ?>"><a href="../chi-sono.php">chi sono</a></li>
            <li class="<?php if(!isset($portfolio) || $portfolio == ""){ echo ""; } else { echo $portfolio; } ?>"><a href="../portfolio.php">portfolio</a></li>
          </ul>
        </div>
      </header>
      <!-- fine header -->
   


    <div id="ambiente">
        <!--<div id="x_wing">
            <div id="x_wing_immagine"></div>
            <div id="armamenti">
                <div class="laser sx-top-animation" id="sx-top"></div>
                <div class="laser dx-top-animation" id="dx-top"></div>
                <div class="laser dx-bottom-animation" id="dx-bottom"></div>
                <div class="laser sx-bottom-animation" id="sx-bottom"></div>
            </div>
        </div>-->
        <div id="cielo-centro">

        </div>

        <div id="spazio_3d">

            <div id="score">
                <p>al secondo <span>-</span><span class="secondi">20</span> p.ti</p>
                <p>mancato <span>-</span><span class="mancato">70</span> p.ti</p>
                <p>colpito <span>+</span><span class="colpito">5000</span> p.ti</p>
                <h2 class="punti"></h2><h3>score</h3> 
            </div>


            <div id="stelle">
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
            <div class="stella"></div>
        </div>

            <div id="attiva-mira" class="attiva">
                <h3>Attiva Modalità Mira Facilitata (M)</h3>
                <p>i punti verranno dimezzati</p>
            </div>

            <div class="mirino-1">
                <div class="linea-mirino"></div>
            </div>

            <div class="mirino-2">
                <div class="linea-mirino"></div>
            </div>

            <div class="mirino-3">
                <div class="linea-mirino"></div>
            </div>

            <div class="mirino-5">
                <div class="linea-mirino"></div>
            </div>

            <div class="mirino-6">
                <div class="linea-mirino"></div>
            </div>

            <div class="mirino-7">
                <div class="linea-mirino"></div>
            </div>


           <div id="pulsanti">
                <div class="frecce">
                    <h3>Usa i mouse o i tasti A S W D per muovere la tua X-WING</h3>
                    <p><img class="aswd" src="img/move.png" alt="Muovi l'astronave con i tasti A S W D"> <span>/</span> <img class="move" src="img/mouse-move.png" alt="Muovi l'astronave con il mouse"></p>
                </div>
                <div class="sparo">
                    <h3>Usa il CLICK del mouse o il tasto INVIO per sparare</h3>
                    <p><img src="img/invio-grande.png" alt="Spara con il tasto INVIO"> <span>/</span> <img src="img/maouse-click.png" alt="spara con il click del mouse">
                    </p>
                </div>
                <div class="mira-facile">
                    <h3>Premi il tasto "M" per passare alla modalità 'Mira Facilitata'</h3>
                    <p><img src="img/tasto-m.png" alt="attiva mira facilitata"></p>
                </div>
                <div>
                    <h3 id="messaggio">Buon divertimento</h3>
                </div>
           </div>

            <!-- x-wing tridimensionale -->
            <div id="x-wing-traslazione">
                <div id="x-wing-rotazione" class="x-wing-3d">
                    <div id="carena_fondo">
                    </div>
                    <!-- carena superiore -->
                    <div id="carena_top_1">
                    </div>
                    <div id="carena_top_2">
                    </div>
                    <!-- carena finachi -->
                    <div id="fianco-destro-sup">
                    </div>
                    <div id="fianco-sinistro-sup">
                    </div>
                    <div id="fianco-destro-inf">
                    </div>
                    <div id="fianco-sinistro-inf">
                    </div>
                    <!-- carena inferiore -->

                    <!-- ALI SUPERIORI-->
                    <!-- destra superiore-->
                    <div class="wing-superiore wing-destra-sup">
                        <div class="reattore-retro">
                            <div class="fiamme-fronte">
                            </div>
                            <div class="fiamme-lato">
                            </div>
                            <div class="fiamme-lato fuoco-perp">
                            </div>
                        </div>
                        <div class="cannone">
                        </div>
                        <div class="cannone perp">
                        </div>
                    </div>
                    <!-- sinistra superiore-->
                    <div class="wing-superiore wing-sinistra-sup">
                        <div class="reattore-retro">
                            <div class="fiamme-fronte">
                            </div>
                            <div class="fiamme-lato">
                            </div>
                            <div class="fiamme-lato fuoco-perp">
                            </div>
                        </div>
                        <div class="cannone">
                        </div>
                        <div class="cannone perp">
                        </div>
                    </div>

                    <!-- ALI INFERIORI-->
                    <!-- destra inferiore-->
                    <div class="wing-inferiore wing-destra-inf">
                        <div class="reattore-retro">
                            <div class="fiamme-fronte">
                            </div>
                            <div class="fiamme-lato">
                            </div>
                            <div class="fiamme-lato fuoco-perp">
                            </div>
                        </div>
                        <div class="cannone">
                        </div>
                        <div class="cannone perp">
                        </div>
                    </div>
                    <!-- sinistra inferiore-->
                    <div class="wing-inferiore wing-sinistra-inf">
                        <div class="reattore-retro">
                            <div class="fiamme-fronte">
                            </div>
                            <div class="fiamme-lato">
                            </div>
                            <div class="fiamme-lato fuoco-perp">
                            </div>
                        </div>
                        <div class="cannone">
                        </div>
                        <div class="cannone perp">
                        </div>
                    </div>
                </div>
            </div>

            <!-- caccia imperiali tridimensionali -->
            <!--caccia 1-->
            <div id="" class="cacia-position-1 caccia_traslazione_1">
                <div id="" class="caccia_3d caccia_rotazione_1">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>
            <!--caccia 2-->
            <div id="" class="cacia-position-2 caccia_traslazione_2">
                <div id="" class="caccia_3d caccia_rotazione_2">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>
            <!--caccia 3-->
            <div id="" class="cacia-position-3 caccia_traslazione_3">
                <div id="" class="caccia_3d caccia_rotazione_3">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>
            <!--caccia 5-->
            <div id="" class="cacia-position-5 caccia_traslazione_5">
                <div id="" class="caccia_3d caccia_rotazione_5">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>
            <!--caccia 6-->
            <div id="" class="cacia-position-6 caccia_traslazione_6">
                <div id="" class="caccia_3d caccia_rotazione_6">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>
            <!--caccia 7-->
            <div id="" class="cacia-position-7 caccia_traslazione_7">
                <div id="" class="caccia_3d caccia_rotazione_7">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>


            <!--
            <div id="caccia_traslazione_0" class="caccia-position-0">
                <div id="caccia_rotazione_0" class="caccia_3d">
                    <div class="oblo">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>

                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
            </div>
            -->

            <div id="incrociatore">

             </div>

        </div>

        <div id="" class="caccia_traslazione_4">
                <div id="" class="caccia_3d enemy caccia_rotazione_4">
                    <div class="oblo">
                    </div>
                    <div class="retro-0">
                    </div>
                    <div class="retro-1">
                    </div>
                    <div class="retro-2">
                    </div>
                    <div class="ala ala-destra">
                    </div>
                    <div class="ala ala-sinistra">
                    </div>
                    <div class="giunti giunti_fronte" >
                    </div>
                    <!--<div class="giunti giunti_retro">
                    </div>-->
                    <div class="ghiera ghiera_destra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                    <div class="ghiera ghiera_sinistra">
                        <div class="denti_ghiera">
                        </div>
                    </div>
                </div>
                <div id="descrizione">
                    <h3>TIE fighters</h3>
                    <p><span>Fazione:</span> Primo Ordine</p>
                    <p><span>Classe Velocità:</span> Molto Veloce</p>
                    <p><span>Potenza di Fuoco:</span> Bassa</p>
                    <p><span>Armamenti:</span> Cannoni Frontali n° 2</p>
                    <p><span>Iperspazio:</span> Si</p>
                </div>
            </div>


    </div>

<!--Qui ci metto il jquery personalizzato per ogni pagina prima della chiusura del body -->


<?php 
include('../endbody.php');
?>