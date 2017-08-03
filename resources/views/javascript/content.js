function content(){

	var content =document.createElement("DIV");
    content.className="container";

        var divider = document.createElement("DIV")
            divider.className ="col-lg-6 col-md-6  col-sm-6";


        	var divAboutUs = document.createElement("DIV");
        		
        		var h3 = document.createElement("H3");
        			var h3C = document.createTextNode("ABOUT ONLINE LEARNING SYSTEM");
        		
        		var p = document.createElement("P");
        			var pC = document.createTextNode("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor  reprehenderit  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur st occaecat cupidatat non proident, sunt  culpa qui officia deserunt mollit anim id est laborum."); 
    			

    			p.appendChild(pC);
        		h3.appendChild(h3C);	
        	
        	divAboutUs.appendChild(h3);
        	divAboutUs.appendChild(p);
        divider.appendChild(divAboutUs);

        var divider2 = document.createElement("DIV")
            divider2.className ="col-lg-6 col-md-6 col-sm-6";

        	var divContactUS = document.createElement("DIV");

        		var h3 = document.createElement("H3");
        			var h3C = document.createTextNode("CONTACT US");

        		var form = document.createElement("FORM");
                form.setAttribute("method","POST");
                form.setAttribute("action","script/sendemail.php");
        			var name = document.createElement("INPUT");
        			name.className = "form-control";
        			name.setAttribute("name","name");
        			name.setAttribute("type","text");
        			name.setAttribute("placeholder","Name")
        			var email = document.createElement("INPUT");
        			email.className = "form-control";
        			email.setAttribute("name","email");
        			email.setAttribute("type","email");
        			email.setAttribute("placeholder","Email Address");
                    email.setAttribute("required","true");
        			var message = document.createElement("TEXTAREA");
        			message.className = "form-control";
        			message.setAttribute("name","message");
        			message.setAttribute("placeholder","Write A Message");
                    message.setAttribute("required","true");
        			var button = document.createElement("INPUT");
                    button.className = "pull-right btn btn-default";
        			button.setAttribute("name","sendemail");
        			button.setAttribute("type","submit");
        			button.setAttribute("value","SEND");

        		form.appendChild(name);
        		form.appendChild(email);
        		form.appendChild(message);
        		form.appendChild(button);

        		h3.appendChild(h3C);

        	divContactUS.appendChild(h3);
        	divContactUS.appendChild(form);
    	
        divider2.appendChild(divContactUS);
    content.appendChild(divider);
    content.appendChild(divider2);
document.body.appendChild(content);
	
}