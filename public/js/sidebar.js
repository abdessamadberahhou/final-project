var arrowArray = ['arrow1','arrow2','arrow3','arrow4','arrow5','arrow6'];
var boxArray = ['box1','box2','box3','box4','box5','box6'];
function openMenu(boxId, arrowId){
    document.getElementById(boxId).style.display ='block';
    document.getElementById(arrowId).style.transform ='rotate(90deg)';
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
document.addEventListener('mouseup',function (){
    for (var i=0;i<boxArray.length;i++){
        var box = document.getElementById(boxArray[i]);
        var arr = document.getElementById(arrowArray[i]);
        if(event.target != box && event.target.parentNode != box ){
                box.style.display = 'none';
                arr.style.transform = 'rotate(0deg)';
        }
    }
});
closeM = document.querySelector('.sidebar');
icon = document.querySelector('.icon_hov');
icon.addEventListener('mouseover',function(){
    for(i=1;i<=6;i++){
        var box = document.getElementById('box'+i);
        if(closeM.classList.contains('close')){
            box.style.display = 'block';
        }
    }
});




