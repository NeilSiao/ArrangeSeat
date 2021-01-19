export const seatList = [];
export const studentList = [];

export const Seat = (seatName, id, student_id, room_id ,pos_left, pos_top, rotate, isChoose) => ({
    seatName,
    id,
    student_id,
    room_id,
    pos_left,
    pos_top,
    rotate,
    isChoose
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
        ));
    });

    console.log(seatList);
}

export const Student = (id, no, name, gender, photo, user_id, isChoose) => ({
    id,
    no,
    name,
    gender,
    photo,
    user_id,
    isChoose,
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
        ))
    });

    console.log(studentList);
}

