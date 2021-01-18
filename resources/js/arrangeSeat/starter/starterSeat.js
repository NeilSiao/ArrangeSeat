import {
    Seat,
    seatList,
} from '../module/constructor';
import {
    unique
} from '../module/utils';

export const getSeatTemplate = () => {
    const seatName = 'seatName';
    const stuName = 'Name';
    const stuNo = 'No';
    const id = unique();
    const pos_left = '200px';
    const pos_top = '200px';
    const rotate = 0;
    const newSeat = Seat(seatName, stuName, stuNo,
        null, id, pos_left, pos_top, rotate);
    return newSeat;
}

export const storeSeat = (newSeat) => {
        seatList.push(newSeat);
};
