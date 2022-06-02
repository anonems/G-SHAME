function show() {
    let x = document.getElementById("pwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function copy(tipe,user){
    //copyfile.js
    const fs = require('fs');

    // destination will be created or overwritten by default.
    fs.copyFile('../data/g-shame/'+tipe+'', '../data/'+user+'/'+tipe+'', (err) => {
      if (err) throw err;
      console.log('File was copied to destination');
    });
  }