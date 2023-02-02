// AJAX filtering/sorting of blog posts
(function ($) {

  var locationFilter,
    industryFilter,
    search;


  $(document).on('change', '#industryFilter', function (e) {
    e.preventDefault();
    industryFilter = $(this).val();
    //console.log(industryFilter);
    fetch();
  });

  $(document).on('change', '#locationFilter', function (e) {
    e.preventDefault();
    locationFilter = $(this).val();
    //console.log(locationFilter);
    fetch();
  });

  $(document).on('click', '#searchSubmit', function (e) {
    e.preventDefault();

    var searchForm = $('#post-search-wrap');
    if (searchForm.find("#search").val().length !== 0) {
      search = searchForm.find("#search").val();
    } else {
      search = null;
    }

    //console.log(search);
    fetch();
  });

  function fetch() {
   

    var ajaxurl = wpAjax.wpurl + '/wp-admin/admin-ajax.php';

    $.ajax({
      url: ajaxurl,
      type: 'post',
      dataType: 'html',
      data: {
        search: search,
        industryFilter: industryFilter,
        locationFilter: locationFilter,
        action: 'ajax_filter_posts',
      },
      error: function (error) {
        console.warn(error);
      },
      success: function (response) {
        $('#response').empty().append(response);
        
      }
    });
  }


  
})(jQuery);

