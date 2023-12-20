export const modalFunctions = {
    openModal: function () {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('modal').style.display = 'block';
    },
    closeModal: function () {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('modal').style.display = 'none';
    }
}
