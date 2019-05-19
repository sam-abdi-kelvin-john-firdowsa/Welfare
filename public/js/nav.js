// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
var ps = new PerfectScrollbar(sideNavScrollbar);

// SideNav Default Options
$('.button-collapse').sideNav({
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on &lt;a&gt; clicks, useful for Angular/Meteor
    breakpoint: 1440, // Breakpoint for button collapse
    MENU_WIDTH: 240, // Width for sidenav
    timeDurationOpen: 300, // Time duration open menu
    timeDurationClose: 200, // Time duration open menu
    timeDurationOverlayOpen: 50, // Time duration open overlay
    timeDurationOverlayClose: 200, // Time duration close overlay
    easingOpen: 'easeOutQuad', // Open animation
    easingClose: 'easeOutCubic', // Close animation
    showOverlay: true, // Display overflay
    showCloseButton: false // Append close button into siednav
    });

    // Show sideNav
$('.button-collapse').sideNav('show');
// Hide sideNav
$('.button-collapse').sideNav('hide');