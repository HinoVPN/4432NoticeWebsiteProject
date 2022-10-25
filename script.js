function route(pageName){
    switch(pageName){
        case "registation":
            location.assign( "http://" + window.location.host + "/project/pages/signUp.php");
            break;
        case "login":
            location.assign( "http://" + window.location.host + "/project/pages/signIn.php");
            break;
        case "forget":
            location.assign( "http://" + window.location.host + "/project/pages/identify.php");
            break;

    }
}