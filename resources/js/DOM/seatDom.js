//require("jquery-ui/ui/widgets/draggable");
import {rotateSeat, updateSeatPos} from '../control/seatControl';
import {getSelectedRoom} from '../module/selectedData';
import {seatList} from '../module/constructor';



export const renderSeat = (seat) => {
    const seatContainer = document.getElementById('room-wrapper');
    var stuNo = seat.stuNo || 'No';
    var stuName = seat.stuName || 'Name';
    
    const seatDOM = `
    <div class="seat d-flex flex-column align-items-center border" id="${seat.id}"  style="left: ${seat.pos_left}px; top: ${seat.pos_top}px; transform: rotate(${seat.rotate}deg)" >
        <img class="w-100" height="48px"  src="./img/fake.png" alt="">
        <small class="w-100 h-100 no border-top border-bottom text-muted text-center">${stuNo}</small>
        <small class="w-100 h-100 name border-top border-bottom  text-center">${stuName}</small>
    </div>`;

    const position = 'afterbegin';

    seatContainer.insertAdjacentHTML(position, seatDOM);
    var htmlSeat = $("#" + seat.id);
 
    htmlSeat.draggable({
        containment: '.room-wrapper',
        stop: function(evt, ui){
            console.log(evt, ui )
           updateSeatPos(evt.target.id);
        }
    });

    htmlSeat.dblclick(function(e){
        rotateSeat(e);
    });
};





export const iterateSeats = ()=>{
  const roomContainer = document.getElementById('room-wrapper');
  roomContainer.innerHTML = '';
    console.log(seatList);
  if(seatList.length === 0){
      let nothing;
  }else{
      seatList.forEach(seat => {
          renderSeat(seat);
      });
  }
};


