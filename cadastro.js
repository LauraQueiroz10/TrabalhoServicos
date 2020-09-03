class Validator {

    constructor(){
        this.validations = []
    }


}


let form = document.getElementById("register-form");
let submit = document.getElementById("bin-submit");

let validator = new Validator();


submit.addEventListener("click", function(e) {

    e.preventDefault();
    validator.validare(form);
    

});