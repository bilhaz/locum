$('.select2').select2();



		function calculate(){
			var normal = document.getElementById("ord_normal_hrs").value;
			var normal = parseInt(normal, 10);
			var call = document.getElementById("ord_on_call_hrs").value;
			var call = parseInt(call, 10);
			var total = normal + call;
			document.getElementById("total").value = total;
		}
		// Print Section
		function printSection(el){

			var getFullContent = document.body.innerHTML;
			var printsection = document.getElementById(el).innerHTML;
			document.body.innerHTML = printsection;
			window.print();
			document.body.innerHTML = getFullContent;
		  }

		//   sideBar Active function

		  $(function () {
			var url = window.location;
			// for single sidebar menu
			$('ul.main-menu a').filter(function () {
				return this.href == url;
				}).parent().addClass("mm-active active");
			
				$('ul.main-menu a').filter(function () {
					return this.href == url;
					}).parent().parent().parent().addClass("active");

		  });

		  
		  function copyLink() {
			var flashMessage = document.getElementById("flash-message");
			var link = document.querySelector("#tocopy").href;
			
			navigator.clipboard.writeText(link);
			flashMessage.innerHTML = "Link Copied!";
			flashMessage.style.display = "block";
    setTimeout(()=>{
		flashMessage.style.display = "none";

    }, 3000);
		  }
		  		
		  function CopyToClipboard() {

			var copyBoxElement = document.getElementById('email');
			var flashMessage = document.getElementById("flash-message");
			copyBoxElement.contenteditable = true;
			copyBoxElement.focus();
			document.execCommand('selectAll');
			document.execCommand("copy");
			copyBoxElement.contenteditable = false;
			// alert("Text has been copied")
			flashMessage.innerHTML = "Text Copied!";
    flashMessage.style.display = "block";
    setTimeout(()=>{
    flashMessage.style.display = "none";

    }, 3000);
		}

		


			  