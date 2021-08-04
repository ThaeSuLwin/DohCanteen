const Styleswitcher = {
  $styleswitcher: $(`
    <div id="style-switcher-wrapper">
      <span id="style-switcher-toggle"><img src="assets/img/icons/settings.svg" alt=""></span>
      <div id="style-switcher">
        <div class="style-switcher-title">Color</div>
        <ul id="color-switcher" class="style-switcher-list list-colors"></ul>
        <div class="style-switcher-bottom">
            <a href="http://themeforest.net/user/suelo/portfolio?ref=suelo" target="_blank" class="btn btn-sm btn-outline-primary"><span>Check other products</span></a>
        </div>
        <a class="style-switcher-close"><img src="assets/img/icons/close.svg" alt=""></a>
      </div>
    </div>
  `),
  colors: [
    {
      name: 'beige',
      color: '#ddae71'
    },
    {
      name: 'blue',
      color: '#497ece'
    },
    {
      name: 'green',
      color: '#56a75f'
    },
    {
      name: 'mint',
      color: '#47a782'
    },
    {
      name: 'orange',
      color: '#d66b52'
    },
    {
      name: 'red',
      color: '#d15454'
    },
    {
      name: 'teal',
      color: '#58adb7'
    }
  ],
  init() {
    const _ = this
    _.$styleswitcher.appendTo('body')

    let activeScheme = $('#theme')
      .attr('href')
      .substring(5)

    activeScheme = activeScheme.substring(0, activeScheme.length - 4)
    activeScheme = activeScheme.split('-')
    let activeColor = activeScheme[1]

    const $colorSwitcher = $('#color-switcher')

    _.colors.forEach(o => {
      const $color = $(`
        <li>
          <a href="#" data-color="${o.name}">
            <span class="color" style="background-color: ${o.color};"></span>
          </a>
        </li>
      `)
      $color.appendTo($colorSwitcher)
    })

    _.$styleswitcher.find('ul a').on('click', function() {
      $(this)
        .parents('ul')
        .find('a.active')
        .removeClass('active')
      $(this).addClass('active')
      return false
    })

    $colorSwitcher.find('a').each(function() {
      if ($(this).data('color') == activeColor) $(this).addClass('active')
    })

    $colorSwitcher.find('a').on('click', function() {
      activeColor = $(this).data('color')
      _.setStyle(activeColor)

      return false
    })

    // Init Toggler
    $('#style-switcher-toggle').on('click', function(e) {
      $('#style-switcher-wrapper').toggleClass('show')
      e.stopPropagation()
    })

    $('#style-switcher .style-switcher-close').on('click', function(e) {
      $('#style-switcher-wrapper').removeClass('show')
      e.stopPropagation()
    })

    $('#style-switcher-wrapper').on('click', function(e) {
      $('#style-switcher-wrapper').removeClass('show')
    })

    _.$styleswitcher.on('click', function(e) {
      e.stopPropagation()
    })
  },
  setStyle(color) {
    $('#theme').attr('href', 'dist/theme-' + color + '.css')
  }
}

export default Styleswitcher


/* button /*

body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

