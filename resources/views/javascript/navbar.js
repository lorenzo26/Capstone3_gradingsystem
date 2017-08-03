function myNavBar() {
   
    document.body.style.display="block";
    var buttonUp = document.createElement("BUTTON");
    buttonUp.setAttribute("onclick","topFunction()")
    buttonUp.className="btn btn-info";
    buttonUp.id="myBtn";

    buttonUp.setAttribute("title","Go to top");
    var buttonUpC = document.createTextNode("TOP");
    buttonUp.appendChild(buttonUpC);
    var divContainer = document.createElement("DIV");
    divContainer.className = "container";

        var divNavBar  = document.createElement("NAV");
        divContainer.className = "navbar navbar-default navbar-fixed-top";

            var divContainerFluid = document.createElement("DIV");
            divContainerFluid.className = "container-fluid";

                 var divNavBarHeader = document.createElement("DIV");
                 divNavBarHeader.className = "navbar-header";

                    var buttonCollapse = document.createElement("BUTTON");
                    buttonCollapse.className = "navbar-toggle";
                    buttonCollapse.setAttribute("data-toggle","collapse")
                    buttonCollapse.setAttribute("data-target","#button-collapse")


                        var span = document.createElement("SPAN");
                        span.className = "sr-only";
                        document.getElementsByClassName("span").innerHTML ="Toggle navigation";

                        var span2 = document.createElement("SPAN");
                        span2.className = "icon-bar";

                        var span3 = document.createElement("SPAN");
                        span3.className = "icon-bar";

                        var span4 = document.createElement("SPAN");
                        span4.className = "icon-bar";

                    buttonCollapse.appendChild(span);
                    buttonCollapse.appendChild(span2);
                    buttonCollapse.appendChild(span3);
                    buttonCollapse.appendChild(span4);

                    var aLogo =document.createElement("A");
                    aLogo.className="navbar-brand";
                    aLogo.setAttribute("href","./");
                    var imgLogo = document.createElement("IMG");
                        imgLogo.setAttribute("src","images/logo.png");

                    aLogo.appendChild(imgLogo);

                    

                var divButtonCollapse = document.createElement("DIV");
                divButtonCollapse.className = "collapse navbar-collapse";
                divButtonCollapse.id = "button-collapse";

                    var ulNav =document.createElement("ULNav"); 
                    ulNav.id = "myUL";
                    ulNav.className="nav navbar-nav navbar-right";

                           
                        var formLogIn = document.createElement("FORM");
                            formLogIn.setAttribute("action","script/login.php");
                            formLogIn.setAttribute("method","POST");

                            var inputUsername = document.createElement("INPUT");
                                inputUsername.className = "navlog";
                                inputUsername.setAttribute("name","username");
                                inputUsername.setAttribute("type","text");
                                inputUsername.setAttribute("placeholder","username");
                                inputUsername.setAttribute("name","username");
                                inputUsername.setAttribute("required","true");
                            var inputPassword = document.createElement("INPUT");
                                inputPassword.className = "navlog";
                                inputPassword.setAttribute("type","password");
                                inputPassword.setAttribute("placeholder","password")
                                inputPassword.setAttribute("name","password");
                                inputPassword.setAttribute("required","true");
                            var buttonSigIn = document.createElement("BUTTON");
                        buttonSigIn.className = "btn btn-primary btn-block btn-flat button-signin";
                        buttonSigIn.setAttribute("type","submit");
                        buttonSigIn.setAttribute("name","signin");
                            var buttonSigInText = document.createTextNode("Sign In");

                        buttonSigIn.appendChild(buttonSigInText);

                        formLogIn.appendChild(inputUsername);
                        formLogIn.appendChild(inputPassword);
                        formLogIn.appendChild(buttonSigIn);

                            
                            ulNav.appendChild(formLogIn);

                divButtonCollapse.appendChild(ulNav);
                divNavBarHeader.appendChild(aLogo);
                divNavBarHeader.appendChild(buttonCollapse);
                    
            divContainerFluid.appendChild(divNavBarHeader);
            divContainerFluid.appendChild(divButtonCollapse);

        divNavBar.appendChild(divContainerFluid);
        divContainer.appendChild(divNavBar);

    document.body.appendChild(buttonUp);
    document.body.appendChild(divContainer);

    
    
}