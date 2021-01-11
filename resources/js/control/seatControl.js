import { renderSeat, iterateSeats } from '../DOM/seatDom';
import { createSeat, storeSeat} from '../starter/starterSeat';
import { roomList, Room} from '../module/constructor';
import { updateLocalStorage, getFromLocalStorage } from '../module/localStorage';
import {getSelectedRoom, getSelectedSeat} from '../module/selectedData';

import {getRotationegrees} from '../module/utils';

export const addSeatToRoom = () => {
    var roomOption = document.getElementById('roomOption');
    var roomVal = roomOption.value;
    var newSeat = createSeat();
    newSeat.roomId = roomVal;
    console.log('123');
    renderSeat(newSeat);
};

export const rotateSeat = (e) => {
    var target = e.currentTarget;
    var deg = getRotationegrees(seat);
    $(target).css({
        'transform': 'rotate(' + deg + 'deg)'
    })

}

export const updateSeatPos = (event) => {
    var target = seatTarget(event.target);
    console.log(target);
    //var selectedSeat =    getSelectedSeat(target.roomId, target.seatId);
    selectedSeat.pos_left = $('#' + target.seatId).css('left');
    selectedSeat.pos_top = $('#' + target.seatId).css('top');
};


function seatTarget(target){
    var target = $(target);
    //var roomId = target.attr('roomid');
    var seatId = target.attr('id');
    return {seatId: seatId};
}