export const seatList = [];
export const studentList = [];

export const Seat = (seatName, id, student_id, room_id 
    ,pos_left, pos_top, rotate, isChoose, team_id, studentInfo) => ({
    seatName,
    id,
    student_id,
    room_id,
    pos_left,
    pos_top,
    rotate,
    isChoose,
    team_id,
    studentInfo
});

export function setSeatList(input) {
    console.log(input)
    input.forEach(elem => {
        seatList.push(new Seat(
            'seatName',
            elem.id,
            elem.student_id,
            elem.room_id,
            elem.pos_left,
            elem.pos_top,
            elem.rotate,
            false,
            elem.team_id,
            elem.student
        ));
    });
}

export const Student = (id, no, name, gender, photo, user_id, isChoose, team_id) => ({
    id,
    no,
    name,
    gender,
    photo,
    user_id,
    isChoose,
    team_id,
})

export function setStuList(input) {
    input.forEach(elem => {
        studentList.push(new Student(
            elem.id,
            elem.no,
            elem.name,
            elem.gender,
            elem.photo,
            elem.user_id,
            false,
            elem.team_id,
        ))
    });
}

export const storeSeat = (newSeat) => {
    seatList.push(newSeat);
};


