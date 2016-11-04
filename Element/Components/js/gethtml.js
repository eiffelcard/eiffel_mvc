
      function gethtml(id,folder,file) {
            var changeplace = document.getElementById(id);

                  console.log('sf通った1');
                  console.log(id);
                  console.log(folder);
                  console.log(changeplace);
        if (id.length == 0) {
            changeplace.innerHTML = "";
            return;
          } else {
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                      changeplace.innerHTML = xmlhttp.responseText;
                                console.log('sf通った2');

                  }
              };
              xmlhttp.open("GET","../../Logic/"+folder+"/"+file,true);
              xmlhttp.send();
        }
      }


    function getpage(id,file) {
          var changeplace = document.getElementById(id);

                console.log('sf通った1');
                console.log(id);

                console.log(changeplace);
      if (id.length == 0) {
          changeplace.innerHTML = "";
          return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    changeplace.innerHTML = xmlhttp.responseText;
                              console.log('sf通った2');

                }
            };
            xmlhttp.open("GET","./"+file,true);
            xmlhttp.send();
      }
    }

    function formaction(formname,folder,filename){
      console.log(formname);
document.getElementById(formname).action = "../../Logic/"+folder+"/"+filename;
    }
