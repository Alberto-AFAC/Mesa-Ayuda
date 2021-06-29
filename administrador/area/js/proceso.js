    function getTimeAJAX() {

        //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

        var time = $.ajax({

            url: '../php/noti.php', //indicamos la ruta donde se genera la hora
                dataType: 'text',//indicamos que es de tipo texto plano
                async: false     //ponemos el parámetro asyn a falso
        }).responseText;


        //actualizamos el div que nos mostrará la hora actual


        document.getElementById("conteo").innerHTML = ""+time;

    }

    //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
    setInterval(getTimeAJAX,1000);


    function getTimeOPIPAJAX() {

        //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

        var time = $.ajax({

            url: '../php/notiopip.php', //indicamos la ruta donde se genera la hora
                dataType: 'text',//indicamos que es de tipo texto plano
                async: false     //ponemos el parámetro asyn a falso
        }).responseText;


        //actualizamos el div que nos mostrará la hora actual


        document.getElementById("not").innerHTML = ""+time;

    }

    //con esta funcion llamamos a la función getTimeOPIPAJAX cada segundo para actualizar el div que mostrará la hora
    setInterval(getTimeOPIPAJAX,1000);
