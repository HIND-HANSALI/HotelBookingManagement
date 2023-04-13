
function changeStatusBooking(Bookingid , statut) {

    console.log("test")
    let checkpending = document.getElementById('pendingRadio');
    let bockingid = document.getElementById('Bookingid');
   

    let checkbooked = document.getElementById('bookedRadio');
    let checkcanceled = document.getElementById('cancelRadio');
    let checkcompleted = document.getElementById('completRadio');
    
    console.log(Bookingid , statut)

    bockingid.value=Bookingid ;

    if(statut==='booked'){
        checkbooked.setAttribute('checked', 'checked');
    }
    if(statut==='pending'){
        checkpending.setAttribute('checked', 'checked');
    }
    if(statut==='canceled'){
        checkcanceled.setAttribute('checked', 'checked');
    }
    if(statut==='completed'){
        checkcompleted .setAttribute('checked', 'checked');
    }

} 


// function fetch_rooms(){
   
//     let facilities_btn=document.getElementById('facilities_btn');
//     // let facilities_list=[];
//     let facility_list={"facilities":[]};

// let get_facilities=document.querySelectorAll('[name="facilities"]:checked');

// if( get_facilities.length>0){
    
//     get_facilities.forEach((facility)=>{
//         facility_list.facilities.push(facility.value);
//         // console.log(facilities_list);
//     })
//     facilities_btn.classList.remove('d-none');

// }else{
//     facilities_btn.classList.add('d-none');

// }
// facility_list=JSON.stringify(facility_list);
// // xhr.onload=function(){
// //     rooms_data.innerHtml=this.responseText;

// // }

// let xhr = new XMLHttpRequest();
// xhr.open("POST", "/fetch-rooms", true);
// xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
// xhr.send(facility_list);

// xhr.onload = function() {
//   rooms_data.innerHTML = this.responseText;
// };
// }
function fetch_rooms() {
    console.log('hi');
    let facilities_btn = $('#facilities_btn');
    let facility_list = { "facilities": [] };
    let olddata =$('#matching-rooms');
    let get_facilities = $('input[name="facilities"]:checked');
    if (get_facilities.length > 0) {
        get_facilities.each(function() {
            facility_list.facilities.push($(this).val());
        });
        facilities_btn.removeClass('d-none');
    } else {
        facilities_btn.addClass('d-none');
    }

    $.ajax({
        url: '/rooms/fetchFacilities',
        method: 'POST',
        dataType: 'json',
        data: JSON.stringify(facility_list),
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(rooms) {
            let html = '';
        if (rooms.length === 0) {
                html = '<div class="alert alert-warning">No rooms found with the selected facilities.</div>';
              } else {
            $.each(rooms, function(index, room) {
                // html += '<div class="room">';
                // html += '<h3>' + room.nameR + '</h3>';
                // html += '<p>' + room.descriptionR + '</p>';
                // html += '<p> hi form js </p>';
                // html += '</div>';
                html += '<div class="card mb-4 border-0 shadow">';
                html += '<div class="row g-0 p-3 align-items-center">';
                html += '<div class="col-md-5 mb-lg-0 mb-md-0 mb-3">';
                html += '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">';
                html += '<div class="carousel-inner">';
                
                $.each(room.chambreimages, function(i, image) {
                    if (i == 0) {
                        html += '<div class="carousel-item active">';
                    } else {
                        html += '<div class="carousel-item">';
                    }
                    html += '<img src="' + window.location.origin + '/assets/upload/rooms/' + image.picture + '" class="d-block w-100" alt="Room Image">';
                    html += '</div>';
                });
                html += '</div>';
                html += '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">';
                html += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                html += '<span class="visually-hidden">Previous</span>';
                html += '</button>';
                html += '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">';
                html += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                html += '<span class="visually-hidden">Next</span>';
                html += '</button>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-5 px-lg-3 px-md-3 px-0">';
                html += '<div class="d-flex align-items-center mb-2">';
                html += '<h5 class="mb-1 me-2">' + room.nameR + '</h5>';
                html += '<div>';
                html += '<i class="bi bi-star-fill text-warning"></i>';
                html += '<i class="bi bi-star-fill text-warning"></i>';
                html += '<i class="bi bi-star-fill text-warning"></i>';
                html += '<i class="bi bi-star-fill text-warning"></i>';
                html += '</div>';
                html += '</div>';
                html += '<div class="Facilities mb-3">';
                html += '<h6 class="mb-1">Facilities</h6>';
                $.each(room.facilities, function(index, facility) {
                    html += '<span class="badge rounded-pill bg-light text-dark text-wrap">' + facility.name + '</span>';
                });
                html += '</div>';
                html += '<div class="guests">';
                html += '<h6 class="mb-1">Guests</h6>';
                html += '<span class="badge rounded-pill bg-light text-dark text-wrap">' + room.numberBed + ' Adults</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-2">';
                html += '<a href="#!" class="text-dark ms-auto d-flex justify-content-end">';
                html += '<i class="bi bi-heart"></i>';
                html += '</a>';
                html += '<h6 class="mb-4 text-center">' + room.priceR + ' MAD per night </h6>';
                html += '<div class="d-flex justify-content-lg-between">';
                html += '<h6 class="text-striked text-muted mr-2">100 MAD</h6>';
                html +='<h6 class="text-success">32% off</h6>';
                html+='</div>';
                html += '<a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>';
                html += '<a href="/roomss/' + room.id + '" class="btn btn-sm w-100 btn-outline-dark shadow-none">Check details</a>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                
            })};
            olddata.html(html);            
            // $('#matching-rooms').html(html);
        },
        error: function(xhr, status, error) {
            console.log("An error occurred while fetching rooms");
        }
    });
}



function facilities_clear(){
let get_facilities=document.querySelectorAll('[name="facilities"]:checked');
get_facilities.forEach((facility)=>{
    facility.checked=false;
});
    facilities_btn.classList.add('d-none');
    fetch_rooms();

}