require("jquery-ui/ui/widgets/draggable");
import {addSeatToRoom} from './control/seatControl';
import {iterateSeats} from './DOM/seatDom';
import { getFromLocalStorage, updateLocalStorage } from './module/localStorage'
import {roomList} from './module/constructor'

$(function(){
    var btn = document.getElementById('addBtn');
    btn.onclick= addSeatToRoom;
    var saveBtn = document.getElementById('saveBtn');
    saveBtn.onclick = updateLocalStorage.bind(null, roomList);
    var db = getFromLocalStorage();
    db.forEach((room) => {
        roomList.push(room);
    });
    

    window.getFromLocalStorage = getFromLocalStorage;
    console.log('iterating')
    iterateSeats(0);
})

// function addSeat(){
//     var seatTemplate = createSeat();
//     document.querySelector('.room-wrapper').appendChild(seatTemplate);
//     console.log(seatTemplate);
// }


// function createSeat(){
//     var seat = document.createElement('div');
//     var seatImg = document.createElement('img');
//     var stuNo = document.createElement('small');
//     var stuName = document.createElement('span');
//     var noDefaultVal = document.createTextNode('B10323034');
//     var nameDefaultVal  = document.createTextNode('Neil') ;

//     seat.className =  'seat seat-center d-flex flex-column align-items-center border';
//     seatImg.className = 'w-100';
//     seatImg.style.height = '64px';
//     seatImg.src = 'https://fakeimg.pl/250x100/';
//     stuNo.className = 'w-100 h-100 no border-top border-bottom text-muted text-center';
//     stuNo.appendChild(noDefaultVal);
//     stuName.className = 'w-100 h-100 name border-top border-bottom text-center';
//     stuName.appendChild(nameDefaultVal);
//     seat.appendChild(seatImg);
//     seat.appendChild(stuNo);
//     seat.appendChild(stuName);
//     $(seat).draggable({
//         containment: '.room-wrapper'
//     });
//     return seat;
//     // <div class='seat border'>
//     // <img class="w-100" height="64px"  src="https://fakeimg.pl/250x100/" alt="">
//     // <small class="w-100 h-100 no border-top border-bottom text-muted text-center">B10323034</small>
//     // <span class="w-100 h-100 name border-top border-bottom  text-center">Neil</span>
//     // </div>
// }