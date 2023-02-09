// //dodavanje klase kako bi se na klik prikazivao padajuci menu
const showMenu = (menuId, navId) => {
    const menu = document.getElementById(menuId),
    nav = document.getElementById(navId)

    menu.addEventListener('click', ()=>{
        nav.classList.toggle('show-menu'),
        menu.classList.toggle('new-menu')
    })
}
showMenu('nav-menu', 'nav-bar')

// //omogucavam da mogu bezbroj puta da kliknem na menu i da ga zatvorim pa kasnije ponovo otvorim

// //promena boje nav-a kad krenemo da skrolujemo
const nav = document.querySelector('header')
window.addEventListener('scroll',()=>{
    if(window.scrollY>5){
        nav.classList.add('bgColor')
    }else{
        nav.classList.remove('bgColor')
    }
})

const showLog = (navLogIcon, navLog) => {
    const icon = document.getElementById(navLogIcon),
    nav = document.getElementById(navLog)

    icon.addEventListener('click', ()=>{
        nav.classList.toggle('show-user-log'),
        icon.classList.toggle('new-menu')
    })
}
showLog('user-icon', 'user-log')

const showLogAvatar = (navLogIcon, navLog) => {
    const icon = document.getElementById(navLogIcon),
    nav = document.getElementById(navLog)

    icon.addEventListener('click', ()=>{
        nav.classList.toggle('show-user-log'),
        icon.classList.toggle('new-menu')
    })
}
showLogAvatar('nav-avatar', 'user-log-logged')

const link = document.getElementById("footer-LB");
link.addEventListener('click', ()=>{
    console.log()
    document.getElementById("filter-form").submit();
})

// const showFiltered = (linkId) => {
//     var form = document.getElementById('filter-form');
//     var link = document.getElementById(linkId);

//     link.addEventListener('click', ()=>{
//         console.log("test");
//         form.submit();
//     })
// }

// document.getElementById('footer-LB').onclick = function() {
//     document.getElementById('filter-form').submit();
//     return false;
// };
// document.getElementById('footer-OB').onclick = function() {
//     document.getElementById('filter-form').submit();
//     return false;
// };
// document.getElementById('footer-B').onclick = function() {
//     document.getElementById('filter-form').submit();
//     return false;
// };
// document.getElementById('footer-PZN').onclick = function() {
//     document.getElementById('filter-form').submit();
//     return false;
// };

// showFiltered('footer-LB');