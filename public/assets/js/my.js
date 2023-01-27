$('.select2').select2();



		function calculate(){
			var normal = document.getElementById("ord_normal_hrs").value;
			var normal = parseInt(normal, 10);
			var call = document.getElementById("ord_on_call_hrs").value;
			var call = parseInt(call, 10);
			var total = normal + call;
			document.getElementById("total").value = total;
		}
		function printSection(el){

			var getFullContent = document.body.innerHTML;
			var printsection = document.getElementById(el).innerHTML;
			document.body.innerHTML = printsection;
			window.print();
			document.body.innerHTML = getFullContent;
		  }

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
			var link = document.querySelector("#tocopy").href;
			navigator.clipboard.writeText(link);
		  }
		  		
		  function CopyToClipboard() {

			var copyBoxElement = document.getElementById('email');
			copyBoxElement.contenteditable = true;
			copyBoxElement.focus();
			document.execCommand('selectAll');
			document.execCommand("copy");
			copyBoxElement.contenteditable = false;
			alert("Text has been copied")
		}
		


			  