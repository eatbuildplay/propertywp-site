function homepageSetup() {

  /*
  updateSearchFilterCounter();
  homeSearchCountLoaderStart();
  homeSearchFormSetup();
  */

}

function homeSearchCountLoaderStart() {

  console.log( "homeSearchCountLoaderStart" );

  var count = 0;
  window.homeSearchCountLoader = setInterval(function() {
    count++;
    var dots = new Array(count % 5).join('.');
    document.getElementById('home-search-count').innerHTML = dots;
  }, 250);

}

function homeSearchCountLoaderStop() {
  clearInterval( window.homeSearchCountLoader );
}

/* Handle anonymous users and cookies */
function getUserIdentifier() {

  /*
  if( aabTheme.userId > 0 ) {
    return aabTheme.userId;
  }
  */

  /*

  let userDataCookie = getCookie("userData");

  if( userDataCookie == null ) {
    return false; // could not find an identifier
  }



  let userData = JSON.parse( userDataCookie );
  return userData.hash;

  */

  return '1324321';

}

/*
if( aabTheme.userId == 0 ) {
  let userDataCookie = getCookie("userData");
  if( userDataCookie == null ) {
    let userData = {
      hash: makeUserHash(),
      userId: 0
    }
    setCookie("userData", userData, 90);
  }
}

function makeUserHash() {
  var hash = Math.random().toString(36).substr(2, 8);
  return hash.toUpperCase();
}
*/

/* validation Email */
function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

/* jQuery on ready */

jQuery(document).ready(function($) {

  // check if homepage and if it is run homepage setup function
  let homeEl = $('body.home');
  if( homeEl.length == 1 ) {
    let isHome = true;
    homepageSetup();
  }

  /* Restrict access to register form */
  let registerFormEl = $('#register-form');

  if( registerFormEl.length >= 1 ) {
    let userId = getUserIdentifier();
    let userIdNumeric = /^\d+$/.test(userId);
    if( userIdNumeric ) {
      registerFormEl.remove();
      let noticesEl = $('#notices');
      noticesEl.html('Your account is already registered.');
    }
  }

  /* Get cart properties
  let data = {
    userId: getUserIdentifier()
  }
  wp.ajax.post('cart_properties_load', data).done( function( response ) {
    if( response.code == 200 ) {
      window.cartProperties = response.cartProperties;
      $(document).trigger('cart_properties_loaded');
    }
  });

  */

  $(document).on('cart_properties_loaded', function() {

    if( window.cartProperties.length ) {
      window.cartCount = window.cartProperties.length;
    } else {
      window.cartCount = 0;
    }

    /* add cart count */
    var cartContent = '<div id="cart-indicator-wrap">';
    cartContent += '<div id="cart-count"></div>';
    cartContent += '</div>';
    $('#cart').prepend( cartContent );

    updateCartCountDisplay();
    $(document).trigger('cart_status_set');

  });

  /* User Register Form */

  /* Setup Parsely Validation */
  // $('#register-form').parsley();

  $('#register-form').submit( function(e) {
    e.preventDefault();
    let noticesEl = $('#notices');
    noticesEl.html('');
    let firstName = $('#field-first-name').val();
    let lastName = $('#field-last-name').val();
    let phone = $('#field-phone').val();
    let email = $('#field-email').val();
    let userHash = getUserIdentifier();

    let data = {
      firstName: firstName,
      lastName: lastName,
      email: email,
      phone: phone,
      userHash: userHash
    }

    wp.ajax.post('user_register', data).done(function (response) {
      let noticesEl = $('#notices');
      noticesEl.html('');
      var notices = [];
      if( response.code == 300 ) {
        notices.push('Registration Failed.');
      }
      if( response.code == 200 ) {
        notices.push('Registration Successful.');
      }
      $.each( notices, function( index, notice ) {
        noticesEl.append( notice );
      });
    });

  }); /* end jQuery ready */

  /* Cart click handler */
  $('#cart').on('click', function() {

    if( window.location.origin == 'https://acfengine.com') {
      location.href = window.location.origin + '/aab/cart/';
    } else {
      location.href = window.location.origin + '/cart/';
    }

  });

  // catch property saved event
  $(document).on('property_saved', function( event, propertyId ) {

    console.log('property_saved event caught... ' + propertyId)
    window.cartCount++;
    updateCartCountDisplay();

    let favEl = $(document).find('[data-property-id="' + propertyId + '"]');
    console.log(favEl)
    if( favEl.length ) {
      favEl.addClass('fav');
    }

  });

  function updateCartCountDisplay() {
    if( !window.cartCount ) {
      $('#cart-count').html( '0' );
    } else {
      $('#cart-count').html( window.cartCount );
    }

  }

  // catch property removed event
  $(document).on('property_removed', function( propertyId ) {

    window.cartCount--;

    if( window.cartStatus == 300 ) {
      if( window.cartCount < 1 ) {
        window.cartStatus = 200;
      }
    }

    updateCartCountDisplay();

  });

  // validate form
  if ( $('#submit-cma').length > 0 ) {
    $('#submit-cma').on('click', function () {
      let validationEmail = validateEmail($('#field-email').val());
      let inviteEmail = $('#field-email').val();
      if (!validationEmail || inviteEmail == '') {
        $('#error-email-validation').fadeIn();
        $('#error-email-validation').html('');
        bootstrap_alert = function () {
        }
        bootstrap_alert.warning = function (message) {
          $('#error-email-validation').html('<div class="alert alert-danger d-flex align-items-center" role="alert"><a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a><span>' + message + '</span></div>')
        }
        bootstrap_alert.warning('Please enter a valid email!');
      } else {
        $('#error-email-validation').hide();
        let data = {
          inviteEmail: inviteEmail
        }

        //send email
        /*
        wp.ajax.post('cart_property_invite', data).done(function (response) {
          console.log(response);
        });
        */
        location.href = document.domain+"/real-estate-evaluation/";

      }
    });
  }

  /*
   * Toggle search type to buy form
   */
  $('#scroll-down-button').on('click', function() {

    $("body,html").animate(
      {
        scrollTop: $("#homepage-content-start").offset().top
      },
      800 //speed
    );

  });

  // ===== Scroll to Top ====
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });

  $('#return-to-top').on('click', function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500 //speed
    );
  });

  /* Drag and Drop Widgets */
  $( "#draggable1" ).draggable({ revert: "invalid" });

  $( "#droppable1" ).droppable({
    accept: ".draggable1",
    classes: {
      "ui-droppable-active": "ui-state-active",
      "ui-droppable-hover": "ui-state-hover"
    },
    drop: function( event, ui ) {
      $( this )
        .addClass( "ui-state-highlight" )
        .find( "p" )
          .html( "Dropped!" );
    }
});

// end jQuery ready
});



/* Greensock Animation */
function animationSetup() {

  gsap.registerPlugin(ScrollTrigger);

  gsap.from('#home-1 h2', {
    scrollTrigger: {
      trigger: '#home-1',
      start: 'top bottom',
      end: "bottom top",
      toggleActions: "restart pause resume none",
      scrub: false
    },
    opacity: 0,
    duration: 3
  });

  gsap.from('#home-1-right h3', {
    scrollTrigger: {
      trigger: '#home-1',
      start: 'top bottom',
      end: "bottom top",
      toggleActions: "restart pause resume none",
      scrub: false
    },
    x: 900,
    duration: 2.5,
    ease: "bounce"
  });


  gsap.from('#home-1 h4', {
    scrollTrigger: {
      trigger: '#home-1',
      start: 'top bottom',
      end: "bottom top",
      toggleActions: "restart pause resume none",
      scrub: false
    },
    opacity: 0,
    duration: 6
  });

  /*
  gsap.to('#home-2', {
    scrollTrigger: {
      trigger: '#home-1',
      toggleActions: "restart pause resume none",
      scrub: true
    },
    x: 500,
    ease: "none",
    duration: 5
  });
  */

}
// animationSetup();
