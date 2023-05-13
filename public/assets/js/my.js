$('.select2').select2();


// Total Hours Calculate
		function calculate(){
			var normal = document.getElementById("ord_normal_hrs").value;
			var normal = parseFloat(normal, 10);
			var call = document.getElementById("ord_on_call_hrs").value;
			var call = parseFloat(call, 10);
      var off = document.getElementById("ord_off_site_hrs").value;
			var off = parseFloat(off, 10);
      var week = document.getElementById("ord_bh_week_hrs").value;
			var week = parseFloat(week, 10);
			var total = normal + call + off + week;
			document.getElementById("total").value = total.toFixed(2);
		}
// Calculating total paying to employee
    // function calculateTp() {
    //   var norm = parseFloat(document.getElementById("ord_normal_hrs").value);
    //   var onc = parseFloat(document.getElementById("ord_on_call_hrs").value);
    //   var off = parseFloat(document.getElementById("ord_off_site_hrs").value);
    //   var week = parseFloat(document.getElementById("ord_bh_week_hrs").value);
    //   var normr = parseFloat(document.getElementById("ord_normal_hrs_rt").value);
    //   var oncr = parseFloat(document.getElementById("ord_ocall_rt").value);
    //   var offr = parseFloat(document.getElementById("ord_osite_rt").value);
    //   var weekr = parseFloat(document.getElementById("ord_bhw_rt").value);
     
    //   var tp = norm * normr + onc * oncr + off * offr + week * weekr;
    // document.getElementById("totpay").value = tp.toFixed(2);  
      
    // }
//  Calculating Total admin charges

function calculateTa() {
  var hosp = parseFloat(document.getElementById("ord_hosp_earn").value);
  var admin = parseFloat(document.getElementById("ord_admin_charges").value);
 
  var ta = hosp * admin / 100;
document.getElementById("Tadmin").value = ta.toFixed(2);  
  
}
// Calculate diff + profit
function calculateDiff() {
  var hosp = parseFloat(document.getElementById("ord_hosp_earn").value);
  var tadmin = parseFloat(document.getElementById("Tadmin").value);
  var dr = parseFloat(document.getElementById("totpay").value);
  
  var diff = hosp + tadmin - dr;
  document.getElementById("diff").value = diff.toFixed(2);
}
// Paying to doctor 
function payingdoc() {
  var totalh = parseFloat(document.getElementById("total").value);
  var p2d = parseFloat(document.getElementById("ord_pay_to_dr").value);
 
  var pay = totalh * p2d;
  document.getElementById("ord_paying_to_dr").value = pay.toFixed(2);
}

// Vat Calculate
function calculatevat() {
  var vs = parseFloat(document.getElementById("ord_vat_sale").value);
  var vp = parseFloat(document.getElementById("ord_vat_purch").value);
  var vat = vs - vp;
  document.getElementById("vat").value = vat.toFixed(2);
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

		
		function printSection() {
			var section = document.getElementById("print-section");
			window.print();
		}
	

  $(function() {
      
       window.ParsleyValidator
        .addValidator('fileextension', function (value, requirement) {
        		var tagslistarr = requirement.split(',');
            var fileExtension = value.split('.').pop();
						var arr=[];
						$.each(tagslistarr,function(i,val){
   						 arr.push(val);
						});
				// 		console.log(arr);
            if(jQuery.inArray(fileExtension, arr)!='-1') {
            //   console.log("is in array");
              return true;
            } else {
            //   console.log("is NOT in array");
              return false;
            }
        }, 32)
        .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');
      $('#forma').parsley().on('field:validated', function() {
          var ok = $('.parsley-error').length === 0;
          $('.bs-callout-info').toggleClass('hidden', !ok);
          $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
          return true; // Don't submit form for this demo
        });
    });
    window.Parsley.addValidator('maxFileSize', {
      validateString: function(_value, maxSize, parsleyInstance) {
        if (!window.FormData) {
          alert('You are making all developpers in the world cringe. Upgrade your browser!');
          return true;
        }
        var files = parsleyInstance.$element[0].files;
        return files.length != 1 || files[0].size <= maxSize * 1024;
      },
      requirementType: 'integer',
      messages: {
        en: 'This file should not be larger than %s Kb',
        fr: 'Ce fichier est plus grand que %s Kb.'
      }
    });

			  