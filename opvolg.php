<!DOCTYPE html>
<html lang="en">

<head>


    <title> opd1</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>


<body>
    <div class="container">

    <div class="title">welkom</div>
        <!--<div class="title"><?/* echo "welkom " . $_SESSION['username'] . ".<br>";*/?></div>-->
        
        <div class="menulijn">
            
            role: 
            <button onclick="contact()">contact</button>
            <button onclick="loguit()">log uit</button>

        </div>
        <div class="middenstuk" style="display: flex">
            <div class="ctrlbar"></div>
            <aside id="asideleft" style="background-color: grey;" class="open"></aside>
            <div id="leftcollapse" style="background-color: rgb(107, 95, 95);" onclick="klikMij()">&harr; </div>
            <section style="flex:1;">
                
            </section>
            <aside id="asideright" style="background-color:grey ;" class="open"></aside>
            <div id="asideright" style="background-color: grey;" onclick="klikMij()"></div>
        </div>
        <div class="onderkant">footer</div>
    </div>
    <script>
        function klikMij() {
            if (document.getElementById("asideleft").className == "open") {
                document.getElementById("asideleft").className = "close";
                document.getElementById("asideright").className = "close"

            } else {
                document.getElementById("asideleft").className = "open";
                document.getElementById("asideright").className = "open";

            }
        }
        function showPopup(popupObject) {
            let popup = document.getElementById("popup");
            let content = popup.getElementsByClassName('popupMessage')[0];
            let title = popup.getElementsByClassName('popupTitle')[0];
            title.innerHTML = popupObject.title;
            title.className = `popupTitle ${popupObject.class}`;
            content.innerHTML = popupObject.message;
            popup.className = "backgroundpop open"
        }
        function showLogin() {
            let popup = document.getElementById("formpopup");
            popup.className = "backgroundpop open"
            document.getElementById("popupContent").innerHTML = '<div class="popupTitle popupblue">Inloggen</div><div class="popupBody"><form action="index.php" method="post"><input type="text" name="username" placeholder="Username"><br><input type="password" name="password" placeholder="Password"><br><button onclick="opvolger()">Submit</button></form><button style="position: absolute; bottom: 10px; right: 10px" onclick="hideLogin()">x</button></div>';
        }
        function showContact() {
            let popup = document.getElementById("formpopup");
            popup.className = "backgroundpop open"
            document.getElementById("popupContent").innerHTML = '<div class="popupContact"><div class="popupTitle popupred">Contact</div><div class="popupBody"><div class="popupMessage"></div>Contact us via:<br> 97096470@st.deltion.nl </div><button style="position: absolute; bottom: 10px; right: 10px" onclick="hideLogin()">x</button></div>';
        }
        function hideLogin() {
            let popup = document.getElementById("formpopup");
            popup.className = "backgroundpop";
        }
        function hidePopup() {
            let popup = document.getElementById("popup");
            popup.className = "backgroundpop";
        }
        function contact() {
            showContact();
        }
        function login() {
            showLogin();
        }
        function opvolger() {
            window.location.href = "opvolg.html";
        }
        function loguit() {
            window.location.href = "login.html";
            session_unset();
            session_destroy();
        }
        function myalert() {
        alert("je bent succsesvol ingelogd");}
        
        myalert()
        

    </script>
    <div class="backgroundpop" id="popup">
        <div class="popupContent">
            <div class="popupTitle">Inloggen</div>
            <button style="position: absolute; bottom: 10px; right: 10px" onclick="hidePopup()">x</button>
        </div>
    </div>


    <div class="backgroundpop" id="formpopup">
        <div class="popupContent" id="popupContent">


            


            


        </div>
    </div>
</body>

</html>