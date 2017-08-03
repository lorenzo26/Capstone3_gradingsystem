function mybanner() {

	var content =document.createElement("DIV");
    content.className="contents";
    content.id="idcontent";

        var divBanners = document.createElement("DIV");
        divBanners.className="banner";

            var header = document.createElement("HEADER");
            header.id="mybanner";
            header.className="carousel slide";
            header.setAttribute("data-ride","carousel");

                var divCarouselInner =document.createElement("DIV")
                divCarouselInner.className="carousel-inner";

                    var item =document.createElement("DIV") 
                    item.className="item active";

                        var img=document.createElement("IMG");
                        img.setAttribute("src","images/banner.jpg");
                        img.setAttribute("alt","item0"); 
                    item.appendChild(img);

                    var item2 =document.createElement("DIV") 
                    item2.className="item";

                        var img=document.createElement("IMG");
                        img.setAttribute("src","images/banner2.jpg");
                        img.setAttribute("alt","item1"); 
                    item2.appendChild(img);

                    var item3 =document.createElement("DIV") 
                    item3.className="item";

                        var img=document.createElement("IMG");
                        img.setAttribute("src","images/banner3.jpg");
                        img.setAttribute("alt","item2"); 
                    item3.appendChild(img);

                    var item4 =document.createElement("DIV") 
                    item4.className="item";

                        var img=document.createElement("IMG");
                        img.setAttribute("src","images/banner4.jpg");
                        img.setAttribute("alt","item3"); 
                    item4.appendChild(img);                    

                    var left = document.createElement("A");
                    left.className="left carousel-control";
                    left.setAttribute("href","#mybanner");
                    left.setAttribute("data-slide","prev");
                   
                    var spanleft = document.createElement("SPAN");
                    spanleft.className="glyphicon glyphicon-chevron-left";
                    
                    var spanleft2 = document.createElement("SPAN");
                    spanleft2.className="sr-only";
                    left.appendChild(spanleft);
                    left.appendChild(spanleft2);

                    var right = document.createElement("A");
                    right.className="right carousel-control";
                    right.setAttribute("href","#mybanner");
                    right.setAttribute("data-slide","next");
                    
                    var spanright = document.createElement("SPAN");
                    spanright.className="glyphicon glyphicon-chevron-right";
                   
                    var spanright2 = document.createElement("SPAN");
                    spanright2.className="sr-only";
                    right.appendChild(spanright);
                    right.appendChild(spanright2);

                divCarouselInner.appendChild(item);
                divCarouselInner.appendChild(item2);
                divCarouselInner.appendChild(item3);
                divCarouselInner.appendChild(item4);                
                divCarouselInner.appendChild(left);
                divCarouselInner.appendChild(right);     
            header.appendChild(divCarouselInner);
        divBanners.appendChild(header);    
       

    content.appendChild(divBanners);
    

     

    document.body.appendChild(content);

     



}