import { roomList} from '../module/constructor'
export function getSelectedRoom(roomId){
    roomId = Number(roomId);
    var index = roomList.map((room) => room.id).indexOf(roomId);
    return roomList[index];
}

export function getSelectedSeat(roomId, seatId){
    var selectedRoom = getSelectedRoom(roomId);
    console.log('show selected data');
    console.log(roomId, seatId);
    console.log(selectedRoom);
    var seats = selectedRoom.seats
    var index = seats.map((seat) => seat.id).indexOf(seatId);
    return seats[index];
}