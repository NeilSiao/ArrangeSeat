//require("jquery-ui/ui/widgets/draggable");
import {
    rotateSeat,
    updateSeatPos
} from '../control/seatControl';
import {
    seatList,
    studentList
} from '../module/constructor';
import {
    getSelStudent
} from '../module/selectedData';


export const renderSeat = (seat) => {
    const seatContainer = document.getElementById('room-wrapper');
    var student = getSelStudent(seat.student_id);
    var stuNo, stuName, photo;
    
    console.log(student);
    if(student === null){
        stuNo = 'No';
        stuName = 'Name';
        photo = './img/fake.png';
    }else{
        stuNo = student.no;
        stuName = student.name;
        photo = student.photo;
    }

    
    const seatDOM = `
    <div class="seat d-flex flex-column align-items-center border" id="${seat.id}"  style="left: ${seat.pos_left}; top: ${seat.pos_top}; transform: rotate(${seat.rotate}deg)" >
        <img class="w-100" height="48px"  src="${photo}" alt="">
        <small class="w-100 h-100 no border-top border-bottom text-muted text-center">${stuNo}</small>
        <small class="w-100 h-100 name border-top border-bottom  text-center">${stuName}</small>
    </div>`;

    const position = 'afterbegin';

    seatContainer.insertAdjacentHTML(position, seatDOM);

};





export const iterateSeats = () => {
    const roomContainer = document.getElementById('room-wrapper');
    roomContainer.innerHTML = '';
    console.log(seatList);
    if (seatList.length === 0) {
        let nothing;
    } else {
        seatList.forEach(seat => {
            renderSeat(seat);
        });
    }
};
