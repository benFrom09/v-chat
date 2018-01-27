/*************************************************
 * AJAX PROFILE REQUEST
 ***********************************************/

$('#profile-form').submit(function(e) {
    e.preventDefault();
    let url = $(this)[0].action;
    console.log(url);
    $.ajax({
        method: 'POST',
        url: url,
        data: {
            name: $('#name').val(),
            country: $('#country').val(),
            city: $('#city').val(),
            skill: $('#skill').val(),
            about: $('#about').val(),
            email: $('#mail').val(),
            _token: token
        }
    }).done(function(response) {
        console.log(response);
        display_profile_data(response);
    }).fail(function(jqxhr) {
        console.log(jqxhr.text);
    });
});

function display_profile_data(response) {

    $('#profile-name')[0].textContent = 'Profil de ' + response.name
    $('.avatar')[0].src = `https://www.gravatar.com/avatar/${response.avatar_url}`;
    $('.profile-user-mail')[0].src = `https://${response.email}`;
    $('.profile-user-mail')[0].textContent = response.email;
    $('.profile-user-location')[0].src = `https://google.com/maps?q=${response.city} ${response.country}`;
    $('.profile-user-location')[0].textContent = `${response.city}-${response.country}`;


    $('.profile-user-skill')[0].textContent = response.skill;
    $('.profile-user-about')[0].textContent = response.about;

}

/*************************************************
 * AJAX POST REQUEST
 ***********************************************/