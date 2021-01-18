import { roomList, seatList} from '../module/constructor'
export function getSelectedRoom(roomId){
    roomId = Number(roomId);
    var index = roomList.map((room) => room.id).indexOf(roomId);
    return roomList[index];
}

export function getSelectedSeat(seatId){
    seatId= Number(seatId)
    var index = seatList.map((seat) => seat.id).indexOf(seatId);
    return seatList[index];
}