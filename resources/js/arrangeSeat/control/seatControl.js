import { iterateSeats } from '../DOM/seatDom';
import { getSeatTemplate} from '../starter/starterSeat';
import { seatList} from '../module/constructor';
import { getSelectedSeat } from '../module/selectedData';

export const addSeatToRoom = () => {
    var newSeat = getSeatTemplate();
    seatList.push(newSeat);
    iterateSeats(newSeat);
    bindMotionEvent();
};

export const rotateSeat = (e) => {
    var seatId = e.currentTarget.id;
    var seat = getSelectedSeat(seatId);
    seat.rotate = (seat.rotate % 360) + 90;
    iterateSeats();
    bindMotionEvent();
}

export const updateSeatPos = (seatId) => {
    var target = $("#" + seatId);
    var left = target.css('left');
    var top = target.css('top');
    var selectedSeat = getSelectedSeat(seatId);
    
    selectedSeat.pos_left = left;
    selectedSeat.pos_top = top;
};

export function bindMotionEvent(){
    var seats = $(".room-wrapper .seat");
    seats.each(function(index, elem){
        $(elem).draggable({
            containment: '.room-wrapper',
            stop: function(evt, ui){
               updateSeatPos(evt.target.id);
            }
        });

        $(elem).dblclick(function(e){
            rotateSeat(e);
        });

    });
}