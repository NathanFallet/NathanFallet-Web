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

function submitForm() {
  var data = {
    method: "Web:submitApp()",
    name: '',
    user: '',
    link: ''
  }
  ajaxPost('https://apps.nathanfallet.me/appmonday/index.php', data, function response(response) {

  });
}
