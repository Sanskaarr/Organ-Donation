function form1(){
    validate = true;
    var name = document.getElementById('name').value;
    if(name== null || name == ""){
        alert('Please Enter A Valid Name');
        return validate = false;
    }

    var phone = document.getElementById('phone').value;
    var pcheck = /^[0-9]{0,10}$/;
    if(phone == null || phone == ""){
        alert('Phone Number Cant be Blank');
        return validate = false;
    }   
    else if(phone.length<10){
        alert('Please Enter A Valid Phone Number');
        return validate = false;
    }
    else if(phone.length>10){
        alert('Please Enter A Valid Phone Number');
        return validate = false;
    }
    else if(!phone.match(pcheck)){
        alert("Phone Number Should Contain Numeric Number");
        return validate = false;
    }

    var dob = document.getElementById('dob').value;
    if(dob == null || dob == ""){
        alert('Please Select Valid Date Of Birth');
        return validate = false;
    }
    var dobInput = document.getElementById("dob");
    var dob = new Date(dobInput.value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var monthDiff = today.getMonth() - dob.getMonth();
    
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    
    if (age < 18) {
        alert("You must be at least 18 years old.");
        window.location.href= 'index.html';
        return false;
    }

    var address = document.getElementById('address').value;
    if(address == null || address == ""){
        alert('Please Enter your Address');
        return validate = false;
    }
    else if(address.length<2){
        alert("Please Enter a Proper Address");
        return validate = false;
    }

    var state = document.getElementById('state');
    if(state.value == ""){
        alert('Please Select State');
        return validate = false;
    }

    var pincode = document.getElementById('pincode').value;
    var pincheck = /^[0-9]{0,6}$/
    if(pincode == null || pincode == ""){
        alert('Please Enter your Pincode');
        return validate = false;
    }
    else if(!pincode.match(pincheck)){
        alert("Pincode should contain numeric characters only" +
        "\n" +  "And Should be 6 Character long");
        return validate = false;
    }

    var unique = document.getElementById('unique');
    if(unique.value == ""){
        alert('Please Select Unique ID');
        return validate = false;
    }

    var idnumber = document.getElementById('idnumber').value;
    if(idnumber == null || idnumber == ""){
        alert('Please Enter Your ID Number');
        return validate = false;
    }

    if(validate = true){
        window.location.href = 'med.html';
    }
}

function dob() {
   
}
function form2(){
    validate2 = true;
    var bg = document.getElementById('bg').value;
    if(bg == ""){
        alert('Please Select Your Blood Group');
        return validate2 = false;
    }

    var illness = document.getElementById('illness').value;
    if(illness == ""){
        alert('Please Select Your Family Illness');
        return validate2 = false;
    }
  
    var txt = document.getElementById('text').value;
    if(illness == 'Others' && txt == ""){
        alert('Please Write About details for your family Illness in the Box Below');
        return validate2 = false;
    }

    var organ = document.getElementById('organ').value;
    if(organ == null || organ == ""){
        alert('Please Select your Organ to Donate !!');
        return validate2 = false;
    }
  
    var allergies = document.getElementById('allergies').value;
    if(allergies == null || allergies == ""){
        alert('Please Write About your allergies or Write NA');
        return validate2 = false;
    }

    var medical = document.getElementById('medical').value;
    if(medical == null || medical == ""){
        alert('Please Write About your Current Medical Condition'  +"\n"+ 'Or Write NA in the Box');
        return validate2 = false;
    }

    var hospital = document.getElementById('hospital').value;
    if(hospital == null || hospital == ""){
        alert('Please Write About your Pervious Hospitalization'  +"\n"+ 'Or Write NA in the Box');
        return validate2 = false;
    }

    if(validate2 = true){
        window.location.href = 'doc.html';
    }
}


function form3(){
    var photo = document.getElementById('photo');
    if(photo.value === ''){
        alert('Please Upload Your Photo');
        return false;
    }

    var id = document.getElementById('idd');
    if(id.value === ''){
        alert('Please Upload Your Id');
        return false;
    }

    var sign = document.getElementById('sign');
    if(sign.value === ''){
        alert('Please Upload Your Signature');
        return false;
    }

    var fwsign = document.getElementById('fwsign');
    if(fwsign.value === ''){
        alert('Please Upload Your First Witness Signature');
        return false;
    }

    var swsign = document.getElementById('swsign');
    if(swsign.value === ''){
        alert('Please Upload Your Second Witness Signature');
        return false;
    }

}

function check(){
    var search = document.getElementById('search').value;
    if(search == null || search == ""){
        alert('Please Enter ypur Name for Verification !!');
        return false;
    }
}


$("#register").submit(function(e) {
    e.preventDefault();
});
