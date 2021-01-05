export const addRoomToDropdown = (name, id) => {
    const listRoom = document.getElementById('classOption');
    const newOption = document.createElement('option');
    newOption.text = name;
    newOption.value = id;
    listRoom.add(newOption);
};

