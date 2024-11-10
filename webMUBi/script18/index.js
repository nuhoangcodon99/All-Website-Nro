async function login(secret_key){
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
  let status = JSON.parse(await _post('Api/Account' , {"username" : username , "password" : password , "secret_key" : secret_key , "type" : "login"}));
  if (status.error == 0){
     if (status.data.error_code == 0){
        cuteToast({
             type: 'success',
             message: status.data.error,
             timer: 5000
         });
         setTimeout(function() {
               window.location.href = "../trang-chu";
          }, 2000);
     } else {
         cuteToast({
             type: 'error',
             message: status.data.error,
             timer: 5000
         });
     }
  }
}

async function active(secret_key){
    let status = JSON.parse(await _post('Api/Account' , {"secret_key" : secret_key , "type" : "active"}));
   if (status.error == 0){
     if (status.data.error == 0){
       cuteToast({
             type: 'success',
             message: status.data.error,
             timer: 5000
         });
     } else {
         cuteToast({
             type: 'error',
             message: status.data.error,
             timer: 5000
         });
     }
  }
}


async function transaction(secret_key){
    let status = JSON.parse(await _post('Api/Account' , {"secret_key" : secret_key , "type" : "transaction"}));
    document.getElementById("ListTraDe").innerHTML = `<tr>
               <td class="text-danger fw-bold"><div class="spinner"></div></td>
               <td class="text-danger fw-bold"><div class="spinner"></div></td>
               <td class=text-danger fw-bold"><div class="spinner"></div></td>
               <td class=text-danger fw-bold"><div class="spinner"></div></td>
               </tr>`;
   var bxhSM = "";
   if (status.error == 0){
      if (status.data.error_code == 0){
          for (const item of status.data['data']) {
            bxhSM += `<tr>
               <td class="text-danger fw-bold">${item.player1}</td>
               <td class="text-danger fw-bold">${item.player2}</td>
               <td class=text-danger fw-bold">${item.item_player_1}</td>
               <td class=text-danger fw-bold">${item.item_player_2}</td>
               </tr>`;
       }
     } else {
         cuteToast({
              type: 'error',
              message: status.data.error,
              timer: 5000
         });
     }
   }
   setTimeout(function() {
        document.getElementById("ListTraDe").innerHTML = bxhSM;
   } , 2000);
}

async function ChangePassword(secret_key){
    const current_password = document.getElementById('current_password').value;
    const newpassword = document.getElementById('newpassword').value;
    const newpassword_confirm = document.getElementById('newpassword_confirm').value;
  let status = JSON.parse(await _post('Api/Account' , {"current_password" : current_password , "newpassword" : newpassword , "newpassword_confirm" : newpassword_confirm, "secret_key" : secret_key , "type" : "Change"}));
  if (status.error == 0){
     if (status.data.error_code == 0){
        cuteToast({
             type: 'success',
             message: status.data.error,
             timer: 5000
         });
     } else {
         cuteToast({
             type: 'error',
             message: status.data.error,
             timer: 5000
         });
     }
  }
}

async function GetInfo(secret_key){
     document.getElementById('uid').innerHTML = "<div class='spinner'></div>";
     document.getElementById('username').innerHTML = "<div class='spinner'></div>";
     document.getElementById('vnd').innerHTML = "<div class='spinner'></div>";
     document.getElementById('tongnap').innerHTML = "<div class='spinner'></div>";
     document.getElementById('active').innerHTML = "<div class='spinner'></div>";
     let status = JSON.parse(await _post('Api/Account' , {"secret_key" : secret_key , "type" : "info"}));
     setTimeout(function() {
         if (status.error == 0){
             document.getElementById('uid').innerHTML = status.data.id;
             document.getElementById('username').innerHTML = status.data.username;
             document.getElementById('vnd').innerHTML = status.data.vnd;
             document.getElementById('tongnap').innerHTML = status.data.tongnap;
             document.getElementById('active').innerHTML = status.data.active;
             document.getElementById('active').style.color = `#${status.data.cool}`;
               }
          }, 1000);
      }

async function Register(secret_key){
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const RePasswordword = document.getElementById('RePasswordword').value
  let status = JSON.parse(await _post('Api/Account' , {"username" : username , "password" : password , "RePasswordword" : RePasswordword , "secret_key" : secret_key , "type" : "regis"}));
    if (status.error == 0){
     if (status.data.error_code == 0){
        cuteToast({
             type: 'success',
             message: status.data.error,
             timer: 5000
         });
         setTimeout(function() {
               window.location.href = "../trang-chu";
          }, 2000);
     } else {
         cuteToast({
             type: 'error',
             message: status.data.error,
             timer: 5000
         });
     }
  }
}
async function loadBXH(type){
    let bxh = JSON.parse(await _post('/Api/GetBXH' , {"type" : type}));
    var bxhSM = "";
    var index = 0;
    if (bxh.error == 0){
        for (const item of bxh.data) {
           index ++;
           bxhSM += `<tr style="color : #${item.isPl == 0 ? '000000' : '00FF00'}" class="border-solid border-2 bg-orange-200">
                   <th class="border-solid border-2">${index}</th>
                   <th class="border-solid border-2">${item.name}</th>
                   <th class="border-solid border-2">${formatNumber(item.sm)}</th>
              </tr>`;
        }
    document.getElementById('ListBxh').innerHTML = `<tr class="border-solid border-2 bg-orange-200">
                   <th class="border-solid border-2"><div class="spinner"></div></th>
                   <th class="border-solid border-2"><div class="spinner"></div></th>
                   <th class="border-solid border-2"><div class="spinner"></div></th>
               </tr>`;
     setTimeout(function() {
         document.getElementById('ListBxh').innerHTML = bxhSM;
     } , 2000);
   }
}

async function loadBXH_(type , ganHtml){
    let bxh = JSON.parse(await _post('/Api/GetBXH' , {"type" : type}));
    var bxhSM = "";
    var index = 0;
    console.log(bxh);
    if (bxh.error == 0){
        for (const item of bxh.data) {
           index ++;
           bxhSM += `<tr>
               <td class="${item.isPl == 0 ? 'text-danger fw-bold' : 'text-success fw-bold'}">${index}</td>
               <td class="${item.isPl == 0 ? 'text-danger fw-bold' : 'text-success fw-bold'}">${item.name}</td>
               <td class="${item.isPl == 0 ? 'text-danger fw-bold' : 'text-success fw-bold'}">${item.task}</td>
               </tr>`;
        }
     document.getElementById(ganHtml).innerHTML = `<tr>
               <td class="text-danger fw-bold"><div class="spinner"></div></td>
               <td class="text-danger fw-bold"><div class="spinner"></div></td>
               <td class=text-danger fw-bold"><div class="spinner"></div></td>
               </tr>`;
     setTimeout(function() {
       document.getElementById(ganHtml).innerHTML = bxhSM;
    } , 2000);
   }
}
