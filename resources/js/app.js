/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const deleteButtons = document.querySelectorAll('.deleteButton');
const valueId = document.getElementById('deleteId');

deleteButtons.forEach((elm) => {
    elm.addEventListener('click', function() {
        valueId.value = this.getAttribute('data-id');
    })
});

const deleteButtonsOrder = document.querySelectorAll('.deleteButtonOrder');
const valueIdOrder = document.getElementById('deleteIdOrder');

deleteButtonsOrder.forEach((elm) => {
    elm.addEventListener('click', function() {
        valueIdOrder.value = this.getAttribute('data-order');
    })
});