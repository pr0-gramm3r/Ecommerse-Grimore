const content   = document.getElementById('contentPanel');
const panelBody = document.getElementById('panelBody');
const profile   = document.querySelector('.my-profile');
const orders    = document.querySelector('.my-orders');
const wishlist  = document.querySelector('.my-wishlist');
const payment   = document.querySelector('.my-payment');
const setting   = document.querySelector('.my-setting');
// merchant specials
const products  = document.querySelector('.my-products');
const wallet    = document.querySelector('.my-wallet');
const earnings  = document.querySelector('.earnings')

document.querySelectorAll(".sidebar a").forEach(link => {
    link.addEventListener("click", e => {
        e.preventDefault();
        const attriBute = link.querySelector("span").textContent.trim().toLowerCase().replace(/ /g, "");
        const valUe = attriBute === 'myprofile'     ? profile  :
                      attriBute === 'myorder'       ? orders   :
                      attriBute === 'wishlist'      ? wishlist :
                      attriBute === 'payment&refund'? payment  :
                      attriBute === 'setting'       ? setting  :
                      attriBute === 'earnings'      ? earnings : 
                      attriBute === 'myproducts'    ? products :
                      attriBute === 'mywallet'      ? wallet   : null; 

        if (valUe) {
            panelBody.innerHTML = valUe.innerHTML;
            content.classList.add('open');
        }

    });

});

document.getElementById('closePanel').addEventListener('click', () => {
    
    content.classList.remove("open");

});



// const mainBtn = document.querySelector('.contain');
// const btnList = document.querySelector('.bx-menu');
// const overLay = document.querySelector('.overlay');
// const content = document.getElementById('contentPanel');
// const panelBody = document.getElementById('panelBody');
// const profile  = document.querySelector('.profile');
// const orders   = document.querySelector('.orders');
// const wishlist = document.querySelector('.wishlist');
// const setting  = document.querySelector('.setting');
// // const user = document.querySelector('.userData').dataset;

 

// // btnList.addEventListener("click",()=>{
// //     mainBtn.classList.toggle("tran");
// // });

// // document.addEventListener("click",()=>{
// //     mainBtn.classList.toggle("tran");
// // })


// // const data = {
// //     profile: `<h2>My Profile</h2>
// //     <p><strong>Avatar:</strong><img src="${user.avatar}" alt="Avatar" style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin-left: 20px;"></p>
// //     <p><strong>Name:</strong> ${user.name}</p>
// //     <a href = "">Change Name</a>
// //     <p><strong>Email:</strong> ${user.email}</p>
// //     <a href = "">Change Email</a>
// //     <p><strong>Password:</strong> ${user.password}</p>
// //     <a href = "">Change Password</a>`,
// //     orders: `<h2>My Orders</h2><p>Order #1042 - Pahuch Gya bhai</p>`,
// //     wishlist: `<h2>Wishlist</h2><p>Item 1 - Chappal Lal Wala</p><p>Item 2 - Mileage Badahne wala Tel</p>`,
// //     payment: `<h2>Payment & Refund</h2><p>Default: UPI</p><p>Pending Refund: Ghanta Refund </p>`,
// //     setting: `<h2>Settings</h2><p>Notifications: On</p><p>Language: Jisme krna Kr le</p>`,
// // };

// // panelBody.innerHTML = data.profile;
// // content.classList.add('open');


// document.querySelectorAll(".sidebar a").forEach(link => {
//     link.addEventListener("click",e =>{
//         panelBody.innerHTML = "";
//         e.preventDefault();
//         const attriBute = link.querySelector("span").textContent.trim().toLowerCase().replace(/ /g,"");
//         // const valUe = attriBute === 'myprofile'? "profile" : attriBute === 'myorder'? 'orders': attriBute === 'wishlist'? 'wishlist' :
//         // attriBute === 'payment&refund'? 'payment': attriBute ==='setting'? 'setting' : attriBute;
//         // if (data[valUe]){
//         //     panelBody.innerHTML = data[valUe];
//         //     content.classList.add('open');
//         // }

//         const valUe = attriBute === 'myprofile'? profile : attriBute === 'myorder'? orders : attriBute === 'wishlist'? wishlist :
//         attriBute === 'payment&refund'? payment: attriBute ==='setting'? setting : attriBute;

//         if(valUe){
//             panelBody.innerHTML = valUe.innerHTML;
//             content.classList.add('open');
//         }
//     });
//     // document.getElementById('closePanel').addEventListener('click',()=>{
//     //     content.classList.remove("open");
//     // })
//  });

document.getElementById('panelBody').addEventListener('change', function (e) {
    if (e.target && e.target.id === 'avatarInput') {
        if (e.target.files[0]) {
            // find the form WITHIN panelBody, not the hidden original
            document.getElementById('panelBody').querySelector('#avatarForm').submit();
        }
    }
});