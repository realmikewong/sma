// @ts-nocheck

const getOffset = (el) => {
  const rect = el.getBoundingClientRect();
  return {
    left: rect.left + window.scrollX,
    top: rect.top + window.scrollY,
  };
};

(function ($) {
  let currentPage = 1;
  // let currentCategories = [];
  let activeCategory = "all";

  // If Element Exists function
  $.fn.exists = function (callback) {
    var args = [].slice.call(arguments, 1);
    if (this.length) {
      callback.call(this, args);
    }
    return this;
  };

  initSmoothScrolling();

  $("[data-aos='slide-up']").exists(function () {
    wrapAOS();
  });

  function accountForHeader() {
    const navHeight = $("#wrapper-navbar").outerHeight();
    $("#full-width-page-wrapper").css("margin-top", navHeight);
    $("#single-wrapper").css("margin-top", navHeight);
    $("#search-wrapper").css("margin-top", navHeight);
    $("#page-wrapper").css("margin-top", navHeight);
  }

  $(window).on("resize", function () {
    accountForHeader();
  });

  accountForHeader();

  $("#navbarNavDropdown").hover(
    function () {
      $(".submenu-bar").addClass("active");
    },
    function () {
      $(".submenu-bar").removeClass("active");
    }
  );

  $(".navbar-toggler").on("click", function () {
    $(this).toggleClass("active");
    $("#navbarNavContainer").toggleClass("show");
  });

  $("[data-active-category]").exists(function () {
    activeCategory = $("#categoriesList").attr("data-active-category");
    $("ul.categories")
      .find(`[data-category='${activeCategory}']`)
      .children("a")
      .addClass("active");
  });

  $("#filterMenu .categories li a").on("click", function (e) {
    const category = $(this).text();
    if (category !== "All") {
      e.preventDefault();
      $("#allPostsFilter").removeClass("active");
      $("#filterMenu .categories li a").removeClass("active");
      $(this).addClass("active");

      activeCategory = $(this).text().toLowerCase();

      // const list = [];
      // $("#filterMenu .categories li a.active").each(function () {
      //   list.push($(this).text().toLowerCase());
      // });
      // currentCategories = list;

      $("#featuredHeroPost").hide();
      $("#featuredPosts").hide();
      $("#featuredEmptyHeroPost").hide();
      $("#emptyFeaturedHeroPost").addClass("active");

      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "get_posts_based_on_category",
          paged: 1,
          category: activeCategory,
        },
        success: function (res) {
          const response = JSON.parse(res);
          $("#blogPostList").html(response.html);

          if (currentPage >= response.max) {
            $("#loadMoreContainer").hide();
          }
        },
      });
    }
  });

  // Handle Load More Button
  $("#load-more").on("click", function () {
    currentPage++;

    // const currentBlogIds = [];
    // $(".post-box").each(function () {
    //   currentBlogIds.push($(this).attr("data-blog-id"));
    // });

    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      dataType: "html",
      data: {
        action: "freehand_load_more",
        paged: currentPage,
        // categories: currentCategories,
        category: activeCategory,
        // ids: currentBlogIds,
      },
      success: function (res) {
        const response = JSON.parse(res);
        $("#blogPostList").append(response.html);

        console.log(currentPage, activeCategory);

        if (currentPage >= response.max) {
          $("#loadMoreContainer").hide();
        }
      },
    });
  });

  function initAOS() {
    AOS.init({
      // disable: function () {
      //   const maxWidth = 1200;
      //   return window.innerWidth < maxWidth;
      // },
      offset: 120, // offset (in px) from the original trigger point
      delay: 250, // values from 0 to 3000, with step 50ms
      duration: 1000, // values from 0 to 3000, with step 50ms
      easing: "freehand-easing", // default easing for AOS animations
      once: false, // whether animation should happen only once - while scrolling down
      mirror: false, // whether elements should animate out while scrolling past them
      anchorPlacement: "top-bottom", // defines which position of the element regarding to window should trigger the animation
    });
  }

  function wrapAOS() {
    $("[data-aos='slide-up']").wrap("<div class='reveal-box'></div>");
  }

  initAOS();

  $(".post-slider").slick({
    dots: false,
    infinite: true,
    slidesToShow: 3,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Smooth Scrolling
  function initSmoothScrolling() {
    $('.navbar-nav a[href*="#"], .smooth-scroll')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function (event) {
        if (
          location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
          location.hostname == this.hostname
        ) {
          var target = $(this.hash);
          target = target.length
            ? target
            : $("[name=" + this.hash.slice(1) + "]");

          if (target.length) {
            event.preventDefault();

            const navHeight = $("#main-nav").outerHeight();

            $("#navbarNavContainer").removeClass("show");
            $("#navbarNavDropdown").removeClass("show");
            $(".navbar-toggler").removeClass("active");

            $("html, body").animate(
              {
                scrollTop: target.offset().top - navHeight,
              },
              1000,
              function () {
                var $target = $(target);
                $target.focus();

                if ($target.is(":focus")) {
                  return false;
                } else {
                  $target.attr("tabindex", "-1");
                  $target.focus();
                }
              }
            );
          }
        }
      });
  }
})(jQuery);
