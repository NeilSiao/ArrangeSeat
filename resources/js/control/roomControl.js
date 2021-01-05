import {Room, roomList} from '../module/constructor';
import {addRoomToDropdown} from '../DOM/roomDom';
 
export const renderRooms = () =>{
    const rooList = JSON.parse(localStorage.get('classRoomList'));
    roomList.foreach((room => {
        addRoomToDropdown(room.name, room.id);
    }));
};

export const addRoomToList = (projectInput) => {
    
};