// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// form
// var currentTab = 0; // Current tab is set to be the first tab (0)
// showTab(currentTab); // Display the current tab
//
// function showTab(n) {
//   // This function will display the specified tab of the form ...
//   var x = document.getElementsByClassName("tab");
//   x[n].style.display = "block";
//   // ... and fix the Previous/Next buttons:
//   if (n == 0) {
//     document.getElementById("prevBtn").style.display = "none";
//   } else {
//     document.getElementById("prevBtn").style.display = "inline";
//   }
//   if (n == (x.length - 1)) {
//     document.getElementById("nextBtn").innerHTML = "سفارش";
//   } else {
//     document.getElementById("nextBtn").innerHTML = "بعدی";
//   }
//   // ... and run a function that displays the correct step indicator:
//   fixStepIndicator(n)
// }

// function nextPrev(n) {
//   // This function will figure out which tab to display
//   var x = document.getElementsByClassName("tab");
//   // Exit the function if any field in the current tab is invalid:
//   if (n == 1 && !validateForm()) return false;
//   // Hide the current tab:
//   x[currentTab].style.display = "none";
//   // Increase or decrease the current tab by 1:
//   currentTab = currentTab + n;
//   // if you have reached the end of the form... :
//   if (currentTab >= x.length) {
//     //...the form gets submitted:
//     document.getElementById("regForm").submit();
//     return false;
//   }
//   // Otherwise, display the correct tab:
//   showTab(currentTab);
// }
//
// function validateForm() {
//   // This function deals with validation of the form fields
//   var x, y, i, valid = true;
//   x = document.getElementsByClassName("tab");
//   y = x[currentTab].getElementsByTagName("input");
//   // A loop that checks every input field in the current tab:
//   for (i = 0; i < y.length; i++) {
//     // If a field is empty...
//     if (y[i].value == "") {
//       // add an "invalid" class to the field:
//       y[i].className += " invalid";
//       // and set the current valid status to false:
//       valid = false;
//     }
//   }
//   // If the valid status is true, mark the step as finished and valid:
//   if (valid) {
//     document.getElementsByClassName("step")[currentTab].className += " finish";
//   }
//   return valid; // return the valid status
// }

// function fixStepIndicator(n) {
//   // This function removes the "active" class of all steps...
//   var i, x = document.getElementsByClassName("step");
//   for (i = 0; i < x.length; i++) {
//     x[i].className = x[i].className.replace(" active", "");
//   }
//   //... and adds the "active" class to the current step:
//   x[n].className += " active";
// }
//
// //persian datepicker


//ajax table
async function checkDate(e){
    const dateInput = document.querySelector('#date');
    const table = document.querySelector("#table");

    let time='';
    let class_name = '';
    let dd = document.getElementById('lunch-time').classList;
    dd.forEach((item)=>{
        class_name = item;
    })
    if(class_name == '')
    {
        time = document.querySelector('#time1').selectedOptions[0].value;
    }
    else {
        time = document.querySelector('#time2').selectedOptions[0].value;
    }
    console.log('this is time ->',time);
    let date = dateInput.value;
    let free_table = await $.ajax({
        url:'/ajax/order/checkDate',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            date: date,
            time: time
        },
        success:function (data){
            // console.log(data);
            free_table = free_table['tables'];
            table.innerHTML = "";
            free_table.forEach((data)=>{
                table.innerHTML += `
                            <option value="${data.id}"><span>${data.name}</span>-<span>${data.capacity}</span> نفره </option>
                        `;
            });
            table.parentElement.classList.remove("d-none");
        }
    });
}

//select meal
lunchTime = document.getElementById("lunch-time")
dinnerTime = document.getElementById("dinner-time")
selectBox = document.getElementById("selectbox")
selectBox.addEventListener("change",function(e){
    if(this.value == "dinner"){
        lunchTime.classList.add("d-none")
        dinnerTime.classList.remove("d-none")
    }
    if(this.value == "lunch"){
        dinnerTime.classList.add("d-none")
        lunchTime.classList.remove("d-none")
    }
})

//food perosn
function selectePerson(selected){
    $.ajax({
        url: 'http://127.0.0.1:8000/ajax/get/food',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            let select = `<select name="foods[]" id="" class="form-select form-control" aria-label="Default select example">`;
            data.forEach((item) => {
                select += `<option value='${item.id}'>${item.name}</option>`;
            })
            select += `</select>`;
            const foodPerson = document.querySelector('#foodPerson');
            let foods = ``;
            for(let i=0; i < selected.value; i++){
                foods += `<div class="mt-3 mt-md-4 mx-md-2">
                        <label for="" class="text-dark">انتخاب غذای فرد <span> ${1+i} </span></label>` +
                    select +
                    `</div>`;
            }
            foodPerson.innerHTML = foods;
        }
    })
}



