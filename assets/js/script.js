const registrationForm = document.querySelector('#registration-form');
const loginForm = document.querySelector('#login-form');
const emailPattern = /(^[a-z]+[0-9\._a-zA-Z]+)@{1}([a-zA-Z]+)\.{1}([a-zA-Z]{2,4}$)/;
const usernamePattern = /^[a-z]+[0-9a-z_\-\.]+$/;

registrationForm.addEventListener('submit', function(e) {
    e.preventDefault();
    let email = document.getElementById('email');
    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let confirmPassword = document.getElementById('confirm-password');
    if(email.value == '') {
        alert('Your email id is required !!');
        email.focus();
    } else if(!emailPattern.test(email.value)) {
        alert('Your email id is in invalid format !! Ex. abc@aspiresys.com');
        email.focus();
    } else if(username.value == '') {
        alert('Username is required !')
        username.focus();
    } else if(usernamePattern.test(username)) {
        alert('Username is in invalid format !! Ex. yogesh2513')
        username.focus();
    } else if(password.value == '') {
        alert('Password is required !');
        password.focus();
    } else if(password.value.length < 6 ) {
        alert('Minimum password length is six !');
        password.focus();
    } else if(password.value != confirmPassword.value) {
        alert('Password and confirm password does not match !');
        password.focus();
    } else {
        registrationForm.submit();
    }
});

loginForm.addEventListener('submit', function(e){
    e.preventDefault();
    let username = document.getElementById('username');
    let password = document.getElementById('password');
    if(username.value == '') {
        alert('Username is required !')
        username.focus();
    } else if(usernamePattern.test(username)) {
        alert('Username is in invalid format !! Ex. yogesh2513')
        username.focus();
    } else if(password.value == '') {
        alert('Password is required !');
        password.focus();
    } else {
        loginForm.submit();
    }
});