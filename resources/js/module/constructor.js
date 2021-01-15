export const roomList = [];
export const seatList = [];


export const Room = (name, id) =>({
    name, id, seats:[]
});

export const Seat =(seatName,stuName,stuNo, roomId, id, pos_left, pos_top, rotate) => ({
    seatName,stuName,stuNo, roomId, id, pos_left, pos_top, rotate
});


