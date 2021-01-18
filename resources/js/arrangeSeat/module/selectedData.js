import {
    seatList
} from './constructor'

export function getSelectedSeat(seatId) {
    seatId = String(seatId);
    var idArray = seatList.map((seat) => String(seat.id));
    var index = idArray.indexOf(seatId);
    console.log(seatId, idArray, index);
    return seatList[index];
}
