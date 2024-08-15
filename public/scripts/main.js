"use strict";

($ => {
  // mobile menu
  $("#mobileBtn").on("click", e => {
    e.preventDefault();
    $(e.currentTarget).addClass("hidden");
    $("#closeMobileNavHold").removeClass("hidden");
    setTimeout(function () {
      $("#mainNavHold").removeClass("fadeout").addClass("fadein block");
    }, 100);
  });
  $("#closeMobileNavHold").on("click", e => {
    e.preventDefault();
    $(e.currentTarget).addClass("hidden");
    $("#mobileBtn").removeClass("hidden");
    setTimeout(function () {
      $("#mainNavHold").removeClass("fadein block").addClass("fadeout");
    }, 100);
  });

  // mobile menu dropdown
  $(".main-nav_with-children").on("mouseenter", e => {
    $(e.currentTarget).parent().find(".main-nav_with-children-hold").addClass("fadein block").removeClass("fadeout");
    // console.log(
    //   $(e.currentTarget).parent().find(".main-nav__with-children-hold")
    // );
  });

  $(".main-nav_with-children").on("mouseleave", e => {
    $(e.currentTarget).parent().find(".main-nav_with-children-hold").removeClass("fadein block").addClass("fadeout");
    // console.log(
    //   $(e.currentTarget).parent().find(".main-nav__with-children-hold")
    // );
  });

  // speakers slider
  const speakersLineUp = $(".speakersSlider");
  speakersLineUp.owlCarousel({
    lazyLoad: true,
    touchDrag: false,
    mouseDrag: false,
    loop: false,
    autoplay: false,
    nav: false,
    navText: ["<i class='fas fa-chevron-left fa-lg'></i>", "<i class='fas fa-chevron-right fa-lg'></i>"],
    margin: 25,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        dots: true,
        nav: true,
        touchDrag: true,
        mouseDrag: true
      },
      600: {
        items: 2,
        dots: true
      },
      1200: {
        items: 4,
        dots: true
      }
    }
  });

  // partners slider
  const partnersList = $(".partnersSlider");
  partnersList.owlCarousel({
    lazyLoad: true,
    touchDrag: false,
    mouseDrag: false,
    loop: false,
    autoplay: false,
    nav: false,
    navText: ["<i class='fas fa-chevron-left fa-lg'></i>", "<i class='fas fa-chevron-right fa-lg'></i>"],
    margin: 25,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        dots: true,
        nav: true,
        touchDrag: true,
        mouseDrag: true
      },
      600: {
        items: 3,
        dots: true
      },
      1200: {
        items: 4,
        dots: true
      }
    }
  });

  // tabs
  $(".schedule-wrap-header ul").each(function () {
    var $active,
      $content,
      $links = $(this).find("a");
    $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
    $active.addClass("active");
    $content = $($active[0].hash);
    $links.not($active).each(function () {
      $(this.hash).hide();
    });
    $(this).on("click", "a", function (e) {
      e.preventDefault();
      $active.removeClass("active");
      $content.removeClass("active");
      $content.hide();
      $active = $(this);
      $content = $(this.hash);
      $active.addClass("active");
      $content.addClass("active");
      $content.show();
    });
  });
  if ($(".schedule-wrap").length > 0) {
    $("#pillars-dd").on("change", function () {
      var tabID = $(this).val();
      $(".schedule-wrap-content").removeClass("active");
      $(tabID).addClass("active");
    });
  }

  // inner tabs
  $(".inner-tabs ul").each(function () {
    var $active,
      $content,
      $links = $(this).find("a");
    $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
    $active.addClass("active");
    $content = $($active[0].hash);
    $links.not($active).each(function () {
      $(this.hash).hide();
    });
    $(this).on("click", "a", function (e) {
      e.preventDefault();
      $active.removeClass("active");
      $content.hide();
      $active = $(this);
      $content = $(this.hash);
      $active.addClass("active");
      $content.show();
    });
  });

  // speakers side tabs
  $(".speakers-col-left ul").each(function () {
    var $active,
      $content,
      $links = $(this).find("a");
    $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
    $active.addClass("active");
    $content = $($active[0].hash);
    $links.not($active).each(function () {
      $(this.hash).hide();
    });
    $(this).on("click", "a", function (e) {
      e.preventDefault();
      $active.removeClass("active");
      $content.hide();
      $content.removeClass('active');
      $active = $(this);
      $content = $(this.hash);
      $active.addClass("active");
      $content.addClass('active');
      $content.show();
    });
  });
  if ($(".speakers-col-container").length > 0) {
    $("#pillars-dd").on("change", function () {
      var tabID = $(this).val();
      $(".speakers-col-content").removeClass("active");
      $(tabID).addClass("active");
    });
  }
  if ($(".menu-toggle-section").length > 0) {
    $(".open-menu").on("click", e => {
      e.preventDefault();
      $(".sidebar-items").find(".sidebar-items-text ").removeClass("hidden");
      $(".sidebar").addClass("lg:w-[280px]");
      $(".profile-section").removeClass("lg:hidden");
      $(".close-menu").removeClass("hidden");
      $(".open-menu").addClass('hidden');
    });
    $(".close-menu").on("click", e => {
      e.preventDefault();
      $(".sidebar-items").find(".sidebar-items-text ").addClass("hidden");
      $(".sidebar").removeClass("lg:w-[280px]");
      $(".profile-section").addClass("lg:hidden");
      $(".open-menu").removeClass("hidden");
      $(".close-menu").addClass('hidden');
    });
  }
  if ($(".ticket-inputs").length > 0) {
    $(".ticket-booking").validate({
      rules: {
        name: "required"
      },
      messages: {
        name: "Please enter your name"
      }
    });
    $(".ticket-booking-1").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        },
        radiogroup: {
          required: true
        },
        organization: {
          required: true
        }
      },
      messages: {
        name: "Please enter your name",
        email: "Please enter a valid email address",
        organization: "Please enter your organization",
        topic: "Please select at least 2 topics",
        radiogroup: "Select Yes or No"
      },
      errorPlacement: function (error, element) {
        if (element.is(":radio")) {
          error.appendTo(element.parents('.radio-btns'));
        } else {
          // This is the default behavior
          error.insertAfter(element);
        }
      }
    });
  }

  // MODAL SECTION
  // if ($(".speakers-col-content-inner").length > 0) {

  //     $('.open-modal').click(function() {
  //         $('.modalOverlay').show().addClass('modal-open');
  //     });

  //     $('#close-modal').click(function() {
  //         var modal = $('#modalOverlay');
  //         modal.removeClass('modal-open');
  //         setTimeout(function() {
  //             modal.hide();
  //         }, 200);
  //     });
  // }

  // MODAL SECTION
  $(".speakers-col-content-inner").each(function () {
    $(this).on("click", ".open-modal", function (e) {
      console.log('Hello');
      $('.modalOverlay').show().addClass('modal-open');
    });
    $('.close-modal').click(function () {
      var modal = $('.modalOverlay');
      modal.removeClass('modal-open');
      setTimeout(function () {
        modal.hide();
      }, 200);
    });
  });
})(jQuery);
//# sourceMappingURL=maps/main.js.map
