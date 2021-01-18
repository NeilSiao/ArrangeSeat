import { iterateSeats } from '../DOM/seatDom';
import { getSeatTemplate, storeSeat} from '../starter/starterSeat';
import { seatList} from '../module/constructor';
import { getSelectedSeat } from '../module/selectedData';

export const addSeatToRoom = () => {
    var newSeat = getSeatTemplate();
    seatList.push(newSeat);
    iterateSeats(newSeat);
};

export const rotateSeat = (e) => {
    var seatId = e.currentTarget.id;
    var target = $('#' + seatId);
    //var deg = getRotationDegrees(target);
    var seat = getSelectedSeat(seatId);
    seat.rotate = (seat.rotate % 360) + 90;
    iterateSeats();
}

export const updateSeatPos = (seatId) => {
    var target = $("#" + seatId);
    var left = target.css('left');
    var top = target.css('top');
    var selectedSeat = getSelectedSeat(seatId);
    console.log(seatId);
    console.log(selectedSeat, seatList)
    console.log(target);
    selectedSeat.pos_left = left;
    selectedSeat.pos_top = top;
    console.log(seatList);
};


function seatTarget(target){
    var target = $(target);
    //var roomId = target.attr('roomid');
    var seatId = target.attr('id');
    return {seatId: seatId};
}
