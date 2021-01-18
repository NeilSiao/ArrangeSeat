export const seatList = [];


export const Seat =(seatName,stuName,stuNo, roomId, id, pos_left, pos_top, rotate) => ({
    seatName,stuName,stuNo, roomId, id, pos_left, pos_top, rotate
});


export function setSeatList(input){
    console.log(input)
    input.forEach(element => {
        seatList.push(element)
    });
    
    console.log(seatList);
}
