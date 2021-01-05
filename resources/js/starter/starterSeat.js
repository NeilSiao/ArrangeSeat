import {
    Seat,
    roomList,
    Room
} from '../module/constructor';
import {
    updateLocalStorage
} from '../module/localStorage';
import {
    unique
} from '../module/utils';

export const createSeat = () => {
    const seatName = '1-1';
    const stuName = 'John doe';
    const stuNo = '1111';
    const id = unique();
    const pos_left = '200px';
    const pos_top = '200px';
    const rotate = 0;
    const newSeat = Seat(seatName, stuName, stuNo,
        null, id, pos_left, pos_top, rotate);
    return newSeat;
}
/** here have problem; logic errorr */
export const storeSeat = (roomId, newSeat) => {

    const selectedRoom = roomList[roomId];
    const Id = roomId;
    var seat = createSeat();
    seat.roomId = Id;
    selectedRoom.seats.push(newSeat);
    updateLocalStorage(roomList);
};

export const defaultRoom = () => {
    const RoomName = 'First Room';
    const roomId = unique();
    const newRoom = Room(RoomName, roomId);
    projectList.push(newRoom);
    defaultSeat(roomId);
};