// JavaScript Document
var min=12;
 var max=30;
  function increaseFontSize() {
	     var p = document.getElementsByTagName('p');
   for(i=0;i<p.length;i++) { 
   
     if(p[i].style.fontSize) {
		  var s = parseInt(p[i].style.fontSize.replace("px",""));
		   }
	  else {  
	   var s = 12;
	    }
		 if(s!=max)
		  {   s += 1;
		   } 
		   p[i].style.fontSize = s+"px" 
		     }
			  }
	  
	   function decreaseFontSize() { 
	   var p = document.getElementsByTagName('p');
	    for(i=0;i<p.length;i++) { 
		
		  if(p[i].style.fontSize) { 
		  var s = parseInt(p[i].style.fontSize.replace("px",""));
		   } else {  
		    var s = 12; 
			}
			 if(s!=min) {  
			  s -= 1; 
			  } p[i].style.fontSize = s+"px" 
			    } 
				} //www.white-hat-web-design.co.uk/blog/controlling-font-size-with-javascript/#sthash.R83aK4JN.dpuf