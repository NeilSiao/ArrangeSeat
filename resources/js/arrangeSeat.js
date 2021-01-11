import {addSeatToRoom} from './control/seatControl';
import $ from 'jquery';

$(function(){
    var btn = document.getElementById('addBtn');
    var saveBtn = document.getElementById('saveBtn');
    btn.onclick= function(event){
        event.preventDefault();
        addSeatToRoom();
    }
})

