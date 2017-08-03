function myFooter() {
	var footer = document.createElement("DIV");
	footer.className="footer";
	footer.id="idfooter";
		var pFooter = document.createElement("P");
		var pFooterC = document.createTextNode("Copyright 2017")
		pFooter.appendChild(pFooterC);

		var fig =document.createElement("FIGCAPTION");
		var figC = document.createTextNode("ONLINE LEARNING SYSTEM")

		fig.appendChild(figC);

		footer.appendChild(pFooter);

		footer.appendChild(figC);

	 document.body.appendChild(footer);
}