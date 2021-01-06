require("jquery-ui/ui/widgets/draggable");
import {rotateSeat, updateSeatPos} from '../control/seatControl';
import {getSelectedRoom} from '../module/selectedData';



export const renderSeat = ( roomID, seat) => {
    const seatContainer = document.getElementById('room-wrapper');
    //seatName,stuName,stuNo, id, pos_left, pos_top, rotate
    console.log(seat.rotate);
    const seatDOM = `
    <div class="seat d-flex flex-column align-items-center border" id="${seat.id}" roomid=${roomID} style="left: ${seat.pos_left}; top: ${seat.pos_top}; transform: rotate(${seat.rotate}deg)" >
        <img class="w-100" height="48px"  src="./img/fake.png" alt="">
        <small class="w-100 h-100 no border-top border-bottom text-muted text-center">${seat.stuNo}</small>
        <small class="w-100 h-100 name border-top border-bottom  text-center">${seat.stuName}</small>
    </div>`;

    const position = 'afterbegin';

    seatContainer.insertAdjacentHTML(position, seatDOM);
    var htmlSeat = $("#" + seat.id);
 
    htmlSeat.draggable({
        containment: '.room-wrapper',
        stop: function(evt, ui){
            console.log(evt, ui)
           updateSeatPos(evt);
        }
    });

    htmlSeat.dblclick(function(e){
        rotateSeat(e);
    });
};





export const iterateSeats = (roomId)=>{
  const roomContainer = document.getElementById('room-wrapper');
  roomContainer.innerHTML = '';
    var selectedRoom = getSelectedRoom(roomId);
    console.log(selectedRoom);
  if(selectedRoom === undefined){
      let nothing;
  }else{
      selectedRoom.seats.forEach(seat => {
          renderSeat(roomId, seat);
      });
  }
};

