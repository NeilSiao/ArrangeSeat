const updateLocalStorage = (arr) => {
    window.localStorage.setItem('classRoom', JSON.stringify(arr));
};

const getFromLocalStorage = () => {
   return JSON.parse(window.localStorage.getItem('classRoom'));
}
module.exports = {
    updateLocalStorage, getFromLocalStorage, default: updateLocalStorage
};