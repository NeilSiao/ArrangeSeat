import {iterateSeats} from '../arrangeSeat/DOM/seatDom';
import {setSeatList, setStuList} from '../arrangeSeat/module/constructor';
import {init, bindModalEvent, renderUnChooseStudent } from './event'

window.iterateSeats = iterateSeats;
window.setSeatList = setSeatList;
window.setStuList = setStuList;
window.bindModalEvent = bindModalEvent;
window.renderUnChooseStudent = renderUnChooseStudent;
$(init);