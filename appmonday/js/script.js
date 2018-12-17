function ajaxPost(url, data, callback, progress) {
    var req = new XMLHttpRequest();
    req.open("POST", url);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Error fetching " + url);
    });
    if(progress !== undefined){
      req.upload.addEventListener('progress', progress);
    }
    req.setRequestHeader("Content-Type", "application/json");
    data = JSON.stringify(data);
    req.send(data);
}

document.getElementById('form').onsubmit = function(){
  var name = document.getElementById('name').value;
  var user = document.getElementById('user').value;
  var link = document.getElementById('link').value;
  if(name !== '' && user !== '' && link !== '' && /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi.test(link)) {
    var data = {
      method: "Web:submitApp()",
      name: name,
      user: user,
      link: link
    }
    ajaxPost('https://apps.nathanfallet.me/appmonday/index.php', data, function response(response) {
      var data = JSON.parse(response);
      if(data.success){
        alert('Your app have been submited! Follow us on Instragram to see it in our story.');
      }else{
        alert('We are sorry but something went wrong...');
      }
    });
  }else{
    alert('Please fill all inputs with correct values!');
  }
  return false;
}
