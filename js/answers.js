function getBotResponse(input) {
    //respuestas segun preguntas
    if (input == "si" || input == "mas" || input == "ayuda" ) {
        return "1) ¿Donde encuentro los productos? 2) Informacion de la tienda 3) ¿Como creo una cuenta?" ;
    } else if (input == "no") {
        return "Hasta luego, disfrute la pagina Retro Groove";
        ;
    } else if (input == "1") {
        return "Sección 'Productos"+ "  |  " + "si tiene otra duda ingrese 'mas'";
        ;
    } else if (input == "2") {
        return "Sección 'Nosotros'";
    } else if (input == "3") {
        return "Login/Registrese" + "  |  " + "si tiene otra duda ingrese 'mas'";
    }else if (input == "gracias") {
        return "De nada, espero haber ayudado";
    }

    if (input == "hola") {
        return "Hola, bienvenid@ a la tienda Retro Groove";
    } else if (input == "adios") {
        return "Hasta luego";
    } else {
        return "Ingrese 'ayuda'";
    }
}