function Doge(){
    alert('DOGE ALERT!!!');Array.prototype.slice.call(document.getElementsByTagName('*')).forEach(function(f){f.style.backgroundImage='url(//goo.gl/SsmE4o)';f.style.fontFamily='Comic Sans MS,Verdana,Helvetica';});
}
function IsmailBuenuel(){
//Ismail.büül
}

/**
 * Adds a class to all elements loaded on the page Try ir out with: "addUniversalClass('xD');"
 * @param string class to add
 */
function addUniversalClass(string){
        Array.prototype.slice.call(document.getElementsByTagName('*')).forEach(function(f){f.classList.add(string);});
}

/**
 * Checks if a user exists by the given parameter string
 * @param str to check
 */
function checkUserExists(str){
    if (str === "") {
        document.getElementById("alert").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("alert").innerHTML = (this.responseText);
                document.getElementById("alert").style.color=(this.responseText==="Username was found in Database" ? "green" : "red");

            }
        };
        xmlhttp.open("GET","/user/usernameCheck?q="+str,true);
        xmlhttp.send();
    }
}

/**
 * checks if the user likes that post and sets the icon accordingly.
 * @param str
 */
function checkLike(str){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                //document.getElementById("likeImg").innerHTML = (this.responseText);
                document.getElementById("likeImg").src=(this.responseText.indexOf("yes")> -1 ? "https://png.icons8.com/color/50//like.png" : "https://png.icons8.com/ios/50//like.png");
            }
        };
        xmlhttp.open("GET","/BonziBlog/checkLike?blog="+str,true);
        xmlhttp.send();
        getLikes(str);
}

/**
 * likes a blog if it has not yet been liked by that user, if it has been then it will unlike that blog.
 * @param str
 */
function like(str){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        }
    };
    xmlhttp.open("GET","/BonziBlog/like?blog="+str,true);
    xmlhttp.send();

    checkLike(str);
}

/**
 * sets the likes paragraph with amount of likes of that blog
 * @param str
 */
function getLikes(str){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("likes").innerHTML = (this.responseText);
        }
    };
    xmlhttp.open("GET","/BonziBlog/getLikes?blog="+str,true);
    xmlhttp.send();
}

function customMessage(title, content, good){

    document.getElementById("alertBox").style.visibility="visible";
    document.getElementById("alertBoxTitle").innerHTML=title;
    document.getElementById("alertBoxContent").innerHTML=content;
    if(good===false){
        document.getElementById("alertBoxTitle").style.color="red";
    }
}
