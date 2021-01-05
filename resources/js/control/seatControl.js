import { renderSeat, iterateSeats } from '../DOM/seatDom';
import { createSeat, storeSeat} from '../starter/starterSeat';
import { roomList, Room} from '../module/constructor';
import { updateLocalStorage, getFromLocalStorage } from '../module/localStorage';
import {getSelectedRoom, getSelectedSeat} from '../module/selectedData';

export const addSeatToRoom = (roomId) => {
    var roomOption = document.getElementById('roomOption');
    var roomVal = roomOption.value;
    var roomName = roomOption.name;
    var roomId = roomId | roomVal;
    var SelectedRoom = getSelectedRoom(roomId);
    
    /** logic error */
    if(SelectedRoom === undefined){
        SelectedRoom = Room(roomName, roomId);
        roomList.push(SelectedRoom);
    }

    var newSeat = createSeat();
    newSeat.roomId = roomId;
    storeSeat(roomId, newSeat);
    renderSeat(roomId, newSeat);
};

export const rotateSeat = (e) => {
    var target =seatTarget(e.currentTarget);
    var roomId = target.roomId;
    var seatId = target.seatId;

    var selectedSeat = getSelectedSeat(roomId, seatId)
    // window.roomList = roomList;
    // window.selectedSeat = selectedSeat;
    // window.getFromLocalStorage = getFromLocalStorage
    // console.log(roomList)

    rotate(selectedSeat);
    // updateLocalStorage(roomList);
    console.log(getFromLocalStorage())
    console.log('iterate');
    iterateSeats(roomId);
}

export const updateSeatPos = (event) => {
    var target = seatTarget(event.target);
    console.log(target);
    var selectedSeat =    getSelectedSeat(target.roomId, target.seatId);
    selectedSeat.pos_left = $('#' + target.seatId).css('left');
    selectedSeat.pos_top = $('#' + target.seatId).css('top');
    updateLocalStorage(roomList);
    console.log(selectedSeat);
};


function rotate(seat){
    seat.rotate =  (seat.rotate  % 360) + 90;

}

function seatTarget(target){
    var target = $(target);
    var roomId = target.attr('roomid');
    var seatId = target.attr('id');
    return {roomId: roomId, seatId: seatId};
}